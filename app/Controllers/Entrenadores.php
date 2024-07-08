<?php

namespace App\Controllers;

use App\Models\EntrenadorModel;
use CodeIgniter\RESTful\ResourceController;

class Entrenadores extends ResourceController
{
    protected $modelName = 'App\Models\EntrenadorModel';
    protected $format    = 'json';

    public function index()
    {
        $entrenadores = $this->model->getEntrenadores();
        return $this->respond($entrenadores);
    }

    public function show($id = null)
    {
        $entrenadorFicha = $this->model->getFichaEntrenador($id);

        if ($entrenadorFicha) {
            $response = [
                'entrenadorFicha' => $entrenadorFicha,
                'entrenadorTemporadas' => $this->model->getTemporadaEntrenador($id),
                'entrenadorSuma' => $this->model->getEntrenadorSuma($id)
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Entrenador no encontrado.');
        }
    }
}
