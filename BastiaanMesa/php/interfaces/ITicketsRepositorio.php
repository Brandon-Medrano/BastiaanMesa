<?php
namespace php\interfaces;

use php\modelos\Ticket;

interface ITicketsRepositorio
{
    public function insertar(Ticket $ticket);
    public function actualizar(Ticket $ticket);
    public function eliminar($id);
    
    public function consultarPorLlaves($id);
    public function consultar($criteriosSeleccion);
}