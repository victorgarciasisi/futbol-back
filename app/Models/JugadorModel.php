<?php

namespace App\Models;

use CodeIgniter\Model;

class JugadorModel extends Model
{
    protected $table = 'jugador';
    protected $primaryKey = 'idjugador';

    public function getJugadores()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT foto, apodo, nombre, demarcacion, SUM(partido),
                SUM(titular), SUM(suplente), SUM(minutos), SUM(gol),SUM(amarilla), SUM(roja),
                partidojugador.idjugador
                FROM partidojugador, jugador
                WHERE (partidojugador.idjugador = jugador.idjugador
                AND demarcacion != 'Entrenador')
                GROUP BY partidojugador.idjugador
                ORDER BY SUM(minutos) DESC");
        return $query->getResultArray();
    }

    public function getFichaJugador($idjugador)
    {
        return $this->find($idjugador);
    }

    public function getTemporadaJugador($idjugador)
    {
        $db = \Config\Database::connect();
        $db->query('SET SESSION sql_mode = ""');
        $query = $db->query("SELECT temporada, division, sum(partido),
                sum(titular), sum(suplente), sum(amarilla), sum(roja),
                sum(gol), sum(minutos), temporada.idtemporada, jugador.idjugador
                FROM partidojugador, temporada, jugador, partido
                WHERE jugador.idjugador = $idjugador
                AND partidojugador.idjugador = jugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND temporada.idtemporada = partido.idtemporada
                GROUP BY temporada");
        return $query->getResultArray();
    }

    public function getJugadorSuma($idjugador)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT sum(partido), sum(titular), sum(suplente),
                sum(minutos), sum(amarilla), sum(roja), sum(gol)
                FROM partidojugador, jugador, partido
                WHERE jugador.idjugador = $idjugador
                AND partidojugador.idjugador = jugador.idjugador
                AND partidojugador.idpartido = partido.idpartido");
        return $query->getResultArray();
    }

    public function getTemporadaJugadorPartidos($idjugador, $idetemporada)
    {
        $db = \Config\Database::connect();
        $db->query('SET SESSION sql_mode = ""');
        $query = $db->query("SELECT temporada, division, jornada, resultado,
                partido, titular, suplente, minutos, amarilla, roja, gol,
                temporada.idtemporada, partido.idpartido
                FROM partidojugador, temporada, jugador, partido
                WHERE jugador.idjugador = $idjugador
                AND temporada.idtemporada = $idetemporada
                AND partidojugador.idjugador = jugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND temporada.idtemporada = partido.idtemporada
                AND partido > 0 GROUP BY jornada ORDER BY idpartido ASC");
        return $query->getResultArray();
    }

    public function getJugadorSumaPartidos($idjugador, $idtemporada)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT sum(partido), sum(titular), sum(suplente),
                sum(minutos), sum(amarilla), sum(roja), sum(gol)
                FROM partidojugador, jugador, partido, temporada
                WHERE jugador.idjugador = $idjugador
                AND temporada.idtemporada = $idtemporada
                AND partidojugador.idjugador = jugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND temporada.idtemporada = partido.idtemporada
                GROUP BY temporada");
        return $query->getResultArray();
    }
}
