<?php

namespace App\Controllers;

use App\Models\PartidoModel;
use CodeIgniter\RESTful\ResourceController;

class Partidos extends ResourceController
{
    protected $modelName = 'App\Models\PartidoModel';
    protected $format    = 'json';

    public function index()
    {
        $partidos = $this->model->getPartidos();
        $sumapPartidos = $this->model->getSumPartidos();

        $response = [
            'partidos' => $partidos,
            'sumapPartidos' => $sumapPartidos
        ];

        return $this->respond($response);
    }

    public function temporada($idtemporada = null)
    {
        $partidoTemporadas = $this->model->getPartidoTemporada($idtemporada);

        if ($partidoTemporadas) {
            return $this->respond($partidoTemporadas);
        } else {
            return $this->failNotFound('Temporada no encontrada.');
        }
    }

    public function show($idpartido = null)
    {
        $partido = $this->model->getPartido($idpartido);

        if ($partido) {
            $partidoFicha = $this->model->getFichaPartido($idpartido);

            $response = [
                'partido' => $partido,
                'partidoFicha' => $partidoFicha
            ];

            return $this->respond($response);
        } else {
            return $this->failNotFound('Partido no encontrado.');
        }
    }
}
