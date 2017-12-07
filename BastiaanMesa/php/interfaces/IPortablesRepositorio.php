<?php
namespace php\interfaces;

use php\modelos\Portable;

interface IPortablesRepositorio
{
    public function insertar(Portable $portable);
    public function actualizar(Portable $portable);
    public function eliminar($id);
    
    public function consultarPorLlaves($id);
    public function consultar($criteriosSeleccion);
    
}
