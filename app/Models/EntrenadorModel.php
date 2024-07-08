<?php

namespace App\Models;

use CodeIgniter\Model;

class EntrenadorModel extends Model
{
    protected $table = 'jugador';
    protected $primaryKey = 'idjugador';

    public function getEntrenadores()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('partidojugador')
                      ->select('foto, apodo, nombre, demarcacion, SUM(partido) as partido, partidojugador.idjugador')
                      ->join('jugador', 'partidojugador.idjugador = jugador.idjugador')
                      ->where('demarcacion', 'Entrenador')
                      ->groupBy('partidojugador.idjugador');

        return $builder->get()->getResultArray();
    }

    public function getEntrenadorSuma($idjugador)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('partidojugador')
                      ->select('SUM(partido) as suma')
                      ->join('jugador', 'partidojugador.idjugador = jugador.idjugador')
                      ->join('partido', 'partidojugador.idpartido = partido.idpartido')
                      ->where('jugador.idjugador', $idjugador);

        return $builder->get()->getRowArray();
    }

    public function getFichaEntrenador($idjugador)
    {
        return $this->where('idjugador', $idjugador)->first();
    }

    public function getTemporadaEntrenador($idjugador)
    {

        /*
		$builder = $db->table('partidojugador')
                      ->select('temporada, division, SUM(partido) as partido, temporada.idtemporada')
                      ->join('jugador', 'partidojugador.idjugador = jugador.idjugador')
                      ->join('partido', 'partidojugador.idpartido = partido.idpartido')
                      ->join('temporada', 'temporada.idtemporada = partido.idtemporada')
                      ->where('jugador.idjugador', $idjugador)
                      ->groupBy('temporada');

        return $builder->get()->getResultArray();
		*/
		
		$db = \Config\Database::connect();
		$this->db->query('SET SESSION sql_mode = ""');
		$query = $db->query("SELECT temporada, division, sum(partido), temporada.idtemporada
				from partidojugador, temporada, jugador, partido
				where jugador.idjugador=$idjugador
				and partidojugador.idjugador=jugador.idjugador
				and partidojugador.idpartido=partido.idpartido
				and temporada.idtemporada=partido.idtemporada
				group by temporada");
	    return $query->getResultArray();
    }

	

}
