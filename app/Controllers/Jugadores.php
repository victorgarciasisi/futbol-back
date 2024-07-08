<?php

namespace App\Controllers;

use App\Models\JugadorModel;
use CodeIgniter\RESTful\ResourceController;

class Jugadores extends ResourceController
{
    protected $modelName = 'App\Models\JugadorModel';
    protected $format    = 'json';

    public function index()
    {
        $jugadores = $this->model->getJugadores();
        return $this->respond($jugadores);
    }

    public function show($id = null)
    {
        $jugadorFicha = $this->model->getFichaJugador($id);

        if ($jugadorFicha) {
            $response = [
                'jugadorFicha' => $jugadorFicha,
                'jugadorTemporadas' => $this->model->getTemporadaJugador($id),
                'jugadorSuma' => $this->model->getJugadorSuma($id)
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Jugador no encontrado.');
        }
    }

    public function partidos($idjugador, $idtemporada)
    {
        $jugadorFicha = $this->model->getFichaJugador($idjugador);

        if ($jugadorFicha) {
            $response = [
                'jugadorFicha' => $jugadorFicha,
                'jugadorPartidos' => $this->model->getTemporadaJugadorPartidos($idjugador, $idtemporada),
                'jugadorSumaPartidos' => $this->model->getJugadorSumaPartidos($idjugador, $idtemporada)
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Jugador no encontrado.');
        }
    }
}
