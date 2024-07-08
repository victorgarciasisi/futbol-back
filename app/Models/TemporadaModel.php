<?php

namespace App\Models;

use CodeIgniter\Model;

class TemporadaModel extends Model
{
    protected $table = 'temporada';
    protected $primaryKey = 'idtemporada';

    public function getTemporadas()
    {
        return $this->orderBy('idtemporada', 'DESC')->findAll();
    }

    public function getClasificacion()
    {
        return $this->where('posicion !=', 0)
                    ->orderBy('idtemporada', 'DESC')
                    ->findAll();
    }

    public function getTemporada($idtemporada)
    {
        return $this->find($idtemporada);
    }

    public function getPorteroTemporada($idtemporada)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT apodo, foto, demarcacion, SUM(partido),
                SUM(titular), SUM(suplente), SUM(minutos), SUM(gol),
                SUM(amarilla), SUM(roja), jugador.idjugador, partido.idtemporada
                FROM jugador, partidojugador, partido
                WHERE jugador.idjugador = partidojugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND !(demarcacion = 'Entrenador')
                AND partido.idtemporada = $idtemporada
                AND demarcacion = 'portero'
                GROUP BY jugador.idjugador
                ORDER BY demarcacion DESC, SUM(partido) DESC, SUM(minutos) DESC");
        return $query->getResultArray();
    }

    public function getDefensaTemporada($idtemporada)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT apodo, foto, demarcacion, SUM(partido),
                SUM(titular), SUM(suplente), SUM(minutos), SUM(gol),
                SUM(amarilla), SUM(roja), jugador.idjugador, partido.idtemporada
                FROM jugador, partidojugador, partido
                WHERE jugador.idjugador = partidojugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND !(demarcacion = 'Entrenador')
                AND partido.idtemporada = $idtemporada
                AND demarcacion = 'Defensa'
                GROUP BY jugador.idjugador
                ORDER BY demarcacion DESC, SUM(partido) DESC, SUM(minutos) DESC");
        return $query->getResultArray();
    }

    public function getCentrocampistaTemporada($idtemporada)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT apodo, foto, demarcacion, SUM(partido),
                SUM(titular), SUM(suplente), SUM(minutos), SUM(gol),
                SUM(amarilla), SUM(roja), jugador.idjugador, partido.idtemporada
                FROM jugador, partidojugador, partido
                WHERE jugador.idjugador = partidojugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND !(demarcacion = 'Entrenador')
                AND partido.idtemporada = $idtemporada
                AND demarcacion = 'Centrocampista'
                GROUP BY jugador.idjugador
                ORDER BY demarcacion DESC, SUM(partido) DESC, SUM(minutos) DESC");
        return $query->getResultArray();
    }

    public function getAtacanteTemporada($idtemporada)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT apodo, foto, demarcacion, SUM(partido),
                SUM(titular), SUM(suplente), SUM(minutos), SUM(gol),
                SUM(amarilla), SUM(roja), jugador.idjugador, partido.idtemporada
                FROM jugador, partidojugador, partido
                WHERE jugador.idjugador = partidojugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND !(demarcacion = 'Entrenador')
                AND partido.idtemporada = $idtemporada
                AND demarcacion = 'Atacante'
                GROUP BY jugador.idjugador
                ORDER BY demarcacion DESC, SUM(partido) DESC, SUM(minutos) DESC");
        return $query->getResultArray();
    }

    public function getEntrenadorTemporada($idtemporada)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT apodo, foto, demarcacion, SUM(partido),
                SUM(titular), SUM(suplente), SUM(minutos), SUM(gol),
                SUM(amarilla), SUM(roja), jugador.idjugador, partido.idtemporada
                FROM jugador, partidojugador, partido
                WHERE jugador.idjugador = partidojugador.idjugador
                AND partidojugador.idpartido = partido.idpartido
                AND partido.idtemporada = $idtemporada
                AND demarcacion = 'Entrenador'
                GROUP BY jugador.idjugador
                ORDER BY demarcacion DESC, SUM(partido) DESC, SUM(minutos) DESC");
        return $query->getResultArray();
    }
}
