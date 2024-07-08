<?php

namespace App\Models;

use CodeIgniter\Model;

class PartidoModel extends Model
{
    protected $table = 'partido';
    protected $primaryKey = 'idpartido';

    public function getPartidos()
    {
        $db = \Config\Database::connect();
        $db->query('SET SESSION sql_mode = ""');
        $query = $db->query("SELECT partido.idtemporada, temporada, count(jornada),
                sum(ganado), sum(empatado), sum(perdido), sum(golesfavor), sum(golescontra)
                FROM partido, temporada
                WHERE partido.idtemporada = temporada.idtemporada
                GROUP BY partido.idtemporada
                ORDER BY idtemporada DESC");
        return $query->getResultArray();
    }

    public function getSumPartidos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT partido.idtemporada, temporada, count(jornada),
                sum(ganado), sum(empatado), sum(perdido), sum(golesfavor), sum(golescontra)
                FROM partido, temporada
                WHERE partido.idtemporada = temporada.idtemporada");
        return $query->getResultArray();
    }

    public function getPartidoTemporada($idtemporada)
    {
        return $this->where('idtemporada', $idtemporada)->findAll();
    }

    public function getPartido($idpartido)
    {
        return $this->find($idpartido);
    }

    public function getFichaPartido($idpartido)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT partidojugador.idpartido, partidojugador.idjugador,
                foto, demarcacion, apodo, partido, titular, suplente, minutos, roja, amarilla, gol
                FROM partidojugador, jugador
                WHERE idpartido = '$idpartido' AND partido > 0
                AND demarcacion != 'entrenador'
                AND partidojugador.idjugador = jugador.idjugador
                ORDER BY titular DESC, demarcacion DESC, minutos DESC");
        return $query->getResult();
    }
}
