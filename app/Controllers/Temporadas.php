<?php

namespace App\Controllers;

use App\Models\TemporadaModel;
use CodeIgniter\RESTful\ResourceController;

class Temporadas extends ResourceController
{
    protected $modelName = 'App\Models\TemporadaModel';
    protected $format    = 'json';

    public function index()
    {
        $temporadas = $this->model->getTemporadas();
        return $this->respond($temporadas);
    }

    public function show($id = null)
    {
        $temporada = $this->model->getTemporada($id);

        if ($temporada) {
            $response = [
                'temporada' => $temporada,
                'porterosTemporada' => $this->model->getPorteroTemporada($id),
                'defensasTemporada' => $this->model->getDefensaTemporada($id),
                'centrocampistasTemporada' => $this->model->getCentrocampistaTemporada($id),
                'atacantesTemporada' => $this->model->getAtacanteTemporada($id),
                'entrenadorTemporada' => $this->model->getEntrenadorTemporada($id)
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Temporada no encontrada.');
        }
    }
}
