<?php
namespace php\repositorios;

use Exception;
use php\interfaces\IRealizadoresRepositorioMS;
use php\modelos\RealizadorMS;
use php\modelos\Resultado;

include "../interfaces/IRealizadoresRepositorioMS.php";
include "../modelos/RealizadorMS.php";
include "../clases/Resultado.php";

class RealizadoresRepositorioMS implements IRealizadoresRepositorioMS
{
    protected $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    
    public function insertar(RealizadorMS $realizadorMS)
    {
        $resultado =  "";
        
        $consulta = " INSERT INTO BSTNTRN.MSVREALIZADOR "
            . " (MSVREALIZADORID, "
                    . " MSVREALIZADORPNOMBRE, "
                        . " MSVREALIZADORSNOMBRE, "
                            . " MSVREALIZADORAPATERNO, "
                                . " MSVREALIZADORAMATERNO, "
                                    . " MSVREALIZADORCEPER, "
                                        . " MSVREALIZADORTELCEL, "
                                            . " MSVREALIZADORAREA) "
                                            . " VALUE(?,?,?,?,?,?,?,?) ";
                                            if($sentencia = $this->conexion->prepare($consulta))
                                            {
                                                if( $sentencia->bind_param("ssssssss",$realizadorMS->id,
                                                    $realizadorMS->primerNombre,
                                                    $realizadorMS->segundoNombre,
                                                    $realizadorMS->apellidoPaterno,
                                                    $realizadorMS->apellidoMaterno,
                                                    $realizadorMS->correoElectronicoPersonal,
                                                    $realizadorMS->telefonoCelular,
                                                    $realizadorMS->area))
                                                {
                                                    if(!$sentencia->execute())
                                                        $resultado->mensajeError = "Fall� la ejecuci�n (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                }
                                                else
                                                    $resultado->mensajeError = "Fall� el enlace de par�metros";
                                            }
                                            else
                                                $resultado->mensajeError = "Fall� la preparaci�n: (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                
                                                return $resultado;
    }
    
    public function eliminar($llaves)
    {
        $resultado = new Resultado();
        $consulta = " DELETE FROM BSTNTRN.MSVREALIZADOR "
            . "  WHERE MSVREALIZADORID  = ? ";
            if($sentencia = $this->conexion->prepare($consulta))
            {
                if($sentencia->bind_param("s",$llaves->id))
                {
                    if($sentencia->execute())
                    {
                        $resultado->valor = $llaves->id;
                    }
                    else
                        $resultado->mensajeError = "Fall� la ejecuci�n (" . $this->conexion->errno . ") " . $this->conexion->error;
                }
                else
                    $resultado->mensajeError = "Fall� el enlace de par�metros";
            }
            else
                $resultado->mensajeError = "Fall� la preparaci�n: (" . $this->conexion->errno . ") " . $this->conexion->error;
                
                return $resultado;
    }
    
    public function actualizar(RealizadorMS $realizadorMS)
    {
        $resultado = new Resultado();
        $consulta = " UPDATE BSTNTRN.MSVREALIZADOR SET"
                . " MSVREALIZADORPNOMBRE = ?, "
                    . " MSVREALIZADORSNOMBRE = ?, "
                        . " MSVREALIZADORAPATERNO = ?, "
                            . " MSVREALIZADORAMATERNO = ?, "
                                . " MSVREALIZADORCEPER = ?, "
                                    . " MSVREALIZADORTELCEL = ?, "
                                        . " MSVREALIZADORAREA = ? "
                                        . " WHERE MSVREALIZADORID = ? ";
                                        if($sentencia = $this->conexion->prepare($consulta))
                                        {
                                            if($sentencia->bind_param("ssssssss",
                                                $realizadorMS->primerNombre,
                                                $realizadorMS->segundoNombre,
                                                $realizadorMS->apellidoPaterno,
                                                $realizadorMS->apellidoMaterno,
                                                $realizadorMS->correoElectronicoPersonal,
                                                $realizadorMS->telefonoCelular,
                                                $realizadorMS->area,
                                                $realizadorMS->id))
                                            {
                                                if($sentencia->execute())
                                                {
                                                    $resultado->valor=true;
                                                }
                                                else
                                                    $resultado->mensajeError = "Fall� la ejecuci�n (" . $this->conexion->errno . ") " . $this->conexion->error;
                                            }
                                            else  $resultado->mensajeError = "Fall� el enlace de par�metros";
                                        }
                                        else
                                            $resultado->mensajeError = "Fall� la preparaci�n: (" . $this->conexion->errno . ") " . $this->conexion->error;
                                            return $resultado;
    }
    
    public function consultar($criteriosSeleccion)
    {
        $resultado = new Resultado();
        $realizadoresMS = array();
        
        $consulta =   " SELECT "
            . " MSVREALIZADORID id, "
                    . " MSVREALIZADORPNOMBRE primerNombre, "
                        . " MSVREALIZADORSNOMBRE segundoNombre, "
                            . " MSVREALIZADORAPATERNO apellidoPaterno, "
                                . " MSVREALIZADORAMATERNO apellidoMaterno, "
                                    . " MSVREALIZADORCEPER correoElectronicoPersonal, "
                                        . " MSVREALIZADORTELCEL telefonoCelular, "
                                            . " MSVREALIZADORAREA area "
                                            . " FROM BSTNTRN.MSVREALIZADOR  "
                                                . " WHERE MSVREALIZADORID like  CONCAT('%',?,'%') "
                                                    . " AND MSVREALIZADORPNOMBRE like  CONCAT('%',?,'%') "
                                                        . " AND MSVREALIZADORSNOMBRE like  CONCAT('%',?,'%') ";
                                                        
                                                        if($sentencia = $this->conexion->prepare($consulta))
                                                        {
                                                            if($sentencia->bind_param("sss",$criteriosSeleccion->id,$criteriosSeleccion->primerNombre,$criteriosSeleccion->segundoNombre))
                                                            {
                                                                if($sentencia->execute())
                                                                {
                                                                    if ($sentencia->bind_result($id, $primerNombre, $segundoNombre, $apellidoPaterno, $apellidoMaterno,  $telefonoCelular,  $correoElectronicoPersonal, $area)  )
                                                                    {
                                                                        while($row = $sentencia->fetch())
                                                                        {
                                                                            $realizadorMS = (object) [
                                                                                'id' =>  utf8_encode($id),
                                                                                'primerNombre' => utf8_encode($primerNombre),
                                                                                'segundoNombre' => utf8_encode($segundoNombre),
                                                                                'apellidoPaterno' => utf8_encode($apellidoPaterno),
                                                                                'apellidoMaterno' => utf8_encode($apellidoMaterno),
                                                                                'telefonoCelular' => utf8_encode($telefonoCelular),
                                                                                'correoElectronicoPersonal' => utf8_encode($correoElectronicoPersonal),
                                                                                'area' => utf8_encode($area)
                                                                            ];
                                                                            array_push($realizadoresMS,$realizadorMS);
                                                                        }
                                                                        $resultado->valor = $realizadoresMS;
                                                                    }
                                                                    else
                                                                        $resultado->mensajeError = "Fall� el enlace del resultado.";
                                                                }
                                                                else
                                                                    $resultado->mensajeError = "Fall� la ejecuci�n (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                            }
                                                            else
                                                                $resultado->mensajeError = "Fall� el enlace de par�metros";
                                                        }
                                                        else
                                                            $resultado->mensajeError = "Fall� la preparaci�n: (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                            return $resultado;
    }
    
    public function consultarPorLlaves($llaves)
    {
        $resultado = new Resultado();
        $consulta =  " SELECT "
            . " MSVREALIZADORID id, "
                    . " MSVREALIZADORPNOMBRE primerNombre, "
                        . " MSVREALIZADORSNOMBRE segundoNombre, "
                            . " MSVREALIZADORAPATERNO apellidoPaterno, "
                                . " MSVREALIZADORAMATERNO apellidoMaterno, "
                                    . " MSVREALIZADORCEPER correoElectronicoPersonal, "
                                        . " MSVREALIZADORTELCEL telefonoCelular, "
                                            . " MSVREALIZADORAREA area "
                                            . " FROM BSTNTRN.MSVREALIZADOR  "
                                                . " WHERE MSVREALIZADORID  = ?";
                                                if($sentencia = $this->conexion->prepare($consulta))
                                                {
                                                    if($sentencia->bind_param("s",$llaves->id))
                                                    {
                                                        if($sentencia->execute())
                                                        {
                                                            if ($sentencia->bind_result($id, $primerNombre, $segundoNombre, $apellidoPaterno, $apellidoMaterno, $correoElectronicoPersonal,  $telefonoCelular, $area ))
                                                            {
                                                                if($sentencia->fetch())
                                                                {
                                                                    $realizadorMS = new RealizadorMS();
                                                                    $realizadorMS-> id =  utf8_encode($id);
                                                                    $realizadorMS->primerNombre = utf8_encode($primerNombre);
                                                                    $realizadorMS->segundoNombre = utf8_encode($segundoNombre);
                                                                    $realizadorMS->apellidoPaterno = utf8_encode($apellidoPaterno);
                                                                    $realizadorMS-> apellidoMaterno = utf8_encode($apellidoMaterno);
                                                                    $realizadorMS->correoElectronicoEmpresa = utf8_encode($correoElectronicoPersonal);
                                                                    $realizadorMS->telefonoCelular = utf8_encode($telefonoCelular);
                                                                    $realizadorMS->area = utf8_encode($area);
                                                                    $resultado->valor = $realizadorMS;
                                                                }
                                                                else
                                                                    $resultado->mensajeError = "No se encontr� ning�n resultado.";
                                                            }
                                                            else
                                                                $resultado->mensajeError = "Fall� el enlace del resultado";
                                                        }
                                                        else
                                                            $resultado->mensajeError = "Fall� la ejecuci�n (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                    }
                                                    else
                                                        $resultado->mensajeError = "Fall� el enlace de par�metros";
                                                }
                                                else
                                                    $resultado->mensajeError = "Fall� la preparaci�n: (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                    return $resultado;
    }
    
}

