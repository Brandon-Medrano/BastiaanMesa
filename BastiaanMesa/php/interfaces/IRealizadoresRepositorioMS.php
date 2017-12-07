<?php
namespace php\Interfaces;
use php\modelos\RealizadorMS;

interface IRealizadoresRepositorioMS
{
    //data mapper
    public function insertar(RealizadorMS $realizadorMS);
    public function actualizar(RealizadorMS $realizadorMS);
    public function eliminar($id);
    
    public function consultarPorLlaves($id);
    public function consultar($criteriosSeleccion);
}
