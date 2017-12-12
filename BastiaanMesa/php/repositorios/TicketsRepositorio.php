<?php
namespace php\repositorios;

use Exception;
use php\interfaces\ITicketsRepositorio;
use php\modelos\Resultado;
use php\modelos\Ticket;
include "../interfaces/ITicketsRepositorio.php";
include "../modelos/Ticket.php";
include "../clases/Resultado.php";

class TicketsRepositorio implements ITicketsRepositorio
{
    protected $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    
    
    public function calcularId()
    {
        $resultado = new Resultado();
        $consulta =  "SELECT MAX(IFNULL(MSVSOLICITUDNOLIN,0))+1 AS id FROM bstnmsv.msvsolicitud";
        
        
        if($sentencia = $this->conexion->prepare($consulta))
        {
            if($sentencia->execute())
            {
                if ($sentencia->bind_result($id))
                {
                    if($sentencia->fetch())
                    {
                        $resultado->valor = $id;
                    }
                    else
                        $resultado->mensajeError = "No se encontró ningún resultado";
                }
                else
                    $resultado->mensajeError = "Falló el enlace del resultado";
            }
            else
                $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
        }
        else
            $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
            return $resultado;
    }
    
    public function insertar(Ticket $ticket)
    {
        $resultado =  $this->calcularId();
        if($resultado->mensajeError=="")
        {
            $id = $resultado->valor;
            $consulta = " INSERT INTO bstnmsv.msvsolicitud "
                . " (MSVSOLICITUDNOLIN, "
                . " MSVSOLICITUDFSOL, "
                . " MSVSOLICITUDHSOL, "
                . " MSVSOLICITUDUSRSOLID, "
                . " MSVSCTGAID, "
                . " MSVVSOLID, "
                . " MSVSOLICITUDUSRRLZ, "
                . " MSVETCKTTID, "
                . " MSVPROYID, "
                . " MSVSOLICITUDASUNTO, "
                . " MSVSOLICITUDDESC)"
                . " VALUE(?,?,?,?,?,?,?,?,?,?,?)";
                              if($sentencia = $this->conexion->prepare($consulta))
                                   {
                                      if( $sentencia->bind_param("issssssssss",$id,
                                          $ticket->fSolicitud,
                                          $ticket->hInicial,
                                          $ticket->ugenero,
                                          $ticket->areaSoli,
                                          $ticket->viaId,
                                          $ticket->usuarioSol,
                                          $ticket->recesoId,
                                          $ticket->proyecto,
                                          $ticket->asunto,
                                          $ticket->dsc))
                                      {
                                         if(!$sentencia->execute())
                                             $resultado->mensajeError = "Fall� la ejecuci�n (" . $this->conexion->errno . ") " . $this->conexion->error;
                                      }
                                     else
                                          $resultado->mensajeError = "Fall� el enlace de par�metros";
                                     }
                                       else
                                           $resultado->mensajeError = "Fall� la preparaci�n: (" . $this->conexion->errno . ") " . $this->conexion->error;
                                   }
           return $resultado;
    }
     public function eliminar($llaves)
     {
         $resultado = new Resultado();
         $consulta = " DELETE FROM bstnmsv.msvsolicitud "
             . "  WHERE MSVSOLICITUDNOLIN = ? ";
             if($sentencia = $this->conexion->prepare($consulta))
             {
                 if($sentencia->bind_param("s",$llaves->id))
                 {
                     if($sentencia->execute())
                     {
                         $resultado->valor = $llaves->id;
                     }
                     else
                         $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
                 }
                 else
                     $resultado->mensajeError = "Falló el enlace de parámetros";
             }
             else
                 $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
                 
                 return $resultado;
     }
     
     public function actualizar(Ticket $ticket)
     {
         $resultado = new Resultado();
         $consulta = " UPDATE BSTNTRN.BTMPERSONAL SET"
             . " SIOUSUARIOID = ?,  "
                 . " BTMPERSONALRECID = ?, "
                     ." BTMPERSONALFINI = ?, "
                         ." BTMPERSONALHINI = ?, "
                             ." BTMPERSONALFFIN = ?, "
                                 ." BTMPERSONALHFIN = ?, "
                                     ." BTMPERSONALDUR = ?, "
                                         ." BTMPERSONALDURS = ?, "
                                             ." BTMPERSONALFECHA = ?, "
                                                 ." BTCRECESONOMC = ? "
                                                     ." WHERE BTMPERSONALIDN = ? ";
                                                     if($sentencia = $this->conexion->prepare($consulta))
                                                     {
                                                         if($sentencia->bind_param("sssssssssss",$movimiento->agente,
                                                             $movimiento->recesoId,
                                                             $movimiento->fInicial,
                                                             $movimiento->hInicial,
                                                             $movimiento->fFinal,
                                                             $movimiento->hFinal,
                                                             $movimiento->dPersonal,
                                                             $movimiento->dsPersonal,
                                                             $movimiento->fPersonal,
                                                             $movimiento->recesoC,
                                                             $movimiento->id))
                                                             
                                                         {
                                                             if($sentencia->execute()){
                                                                 $resultado->valor=true;
                                                             }else
                                                                 $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                         }
                                                         else  $resultado->mensajeError = "Falló el enlace de parámetros";
                                                     }
                                                     else
                                                         $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
                                                         return $resultado;
     }
     
     public function consultar($criteriosSeleccion)
     {
         $resultado = new Resultado();
         $tickets = array();
         
         $consulta = " SELECT MSVSOLICITUDASUNTO actividad, MSVSOLICITUDUSRSOLID usuarioSol, DATE_FORMAT(MSVSOLICITUDFSOL,'%d/%m/%Y') fInicial, DATE_FORMAT(MSVSOLICITUDFT,'%d/%m/%Y') fFinal, MSVETCKTTID estado".
             " FROM bstnmsv.msvsolicitud".
             " WHERE MSVETCKTTID  like CONCAT('%',?,'%') ".
             " AND (MSVSOLICITUDFSOL like CONCAT('%',?,'%') ".
             " OR MSVSOLICITUDFT like CONCAT('%',?,'%')) ".
             " AND MSVSOLICITUDUSRSOLID like CONCAT('%',?,'%') ";
         
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if($sentencia->bind_param("ssss",$criteriosSeleccion->fInicial, $criteriosSeleccion->fFinal, $criteriosSeleccion->estado, $criteriosSeleccion->usuarioSol))
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($actividad, $usuarioSol, $fInicial, $fFinal, $estado))
                     {
                         while($row = $sentencia->fetch())
                         {
                             $ticket = (object) [
                                 'actividad' => utf8_encode($actividad),
                                 'usuarioSol' =>  utf8_encode($usuarioSol),
                                 'fInicial' =>  utf8_encode($fInicial),
                                 'fFinal' =>  utf8_encode($fFinal),
                                 'estado' => utf8_encode($estado)
                             ];
                             array_push($tickets,$ticket);
                         }
                         $resultado->valor = $tickets;
                     }
                     else
                         $resultado->mensajeError = "Falló el enlace del resultado.";
                 }
                 else
                     $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
             }
             else
                 $resultado->mensajeError = "Falló el enlace de parámetros";
         }
         else
             $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
             return $resultado;
     }
     public function consultarPorVia()
     {
         $resultado = new Resultado();
         $tickets = array();
         
         $consulta = "SELECT"
             . "  MSVTSOLID idVias, "
             . " MSTVSOLNOML descVias"
             . " from  bstnmsv.msvtsol";
                     if($sentencia = $this->conexion->prepare($consulta))
                     {
                         if(true)
                         {
                             if($sentencia->execute())
                             {
                                 if ($sentencia->bind_result($idVias, $descVias))
                                 {
                                     while($row = $sentencia->fetch())
                                     {
                                         $ticket = (object) [
                                             'idVias' => utf8_encode($idVias),
                                             'descVias' =>  utf8_encode($descVias)
                                         ];
                                         array_push($tickets,$ticket);
                                     }
                                     $resultado->valor = $tickets;
                                 }
                                 else
                                     $resultado->mensajeError = "Falló el enlace del resultado.";
                             }
                             else
                                 $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
                         }
                         else
                             $resultado->mensajeError = "Falló el enlace de parámetros";
                     }
                     else
                         $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
                         return $resultado;
     }
     
     
     public function consultarPorImportancia()
     {
         $resultado = new Resultado();
         $tickets = array();
         
         $consulta = "SELECT"
                     . " MSVNIMPID idImportancias, "
                     . " MSVNIMPNOML descImportancias"
                     . " from  bstnmsv.msvnimpid";
                     if($sentencia = $this->conexion->prepare($consulta))
                     {
                         if(true)
                         {
                             if($sentencia->execute())
                             {
                                 if ($sentencia->bind_result($idImportancias, $descImportancias))
                                 {
                                     while($row = $sentencia->fetch())
                                     {
                                         $ticket = (object) [
                                             'idImportancias' => utf8_encode($idImportancias),
                                             'descImportancias' =>  utf8_encode($descImportancias)
                                         ];
                                         array_push($tickets,$ticket);
                                     }
                                     $resultado->valor = $tickets;
                                 }
                                 else
                                     $resultado->mensajeError = "Falló el enlace del resultado.";
                             }
                             else
                                 $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
                         }
                         else
                             $resultado->mensajeError = "Falló el enlace de parámetros";
                     }
                     else
                         $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
                         return $resultado;
     }
     
     public function consultarPorEstatu()
     {
         $resultado = new Resultado();
         $tickets = array();
         
         $consulta = "SELECT "
             . " MSVETCKTTID idEstatus, "
             . " MSVETCKTNOML descEstatus "
             . " FROM bstnmsv.msvetckt ";
         
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if(true)
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($idEstatus, $descEstatus))
                     {
                         while($row = $sentencia->fetch())
                         {
                             $ticket = (object) [
                                 'idEstatus' => utf8_encode($idEstatus),
                                 'descEstatus' =>  utf8_encode($descEstatus)
                             ];
                             array_push($tickets,$ticket);
                         }
                         $resultado->valor = $tickets;
                     }
                     else
                         $resultado->mensajeError = "Falló el enlace del resultado.";
                 }
                 else
                     $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
             }
             else
                 $resultado->mensajeError = "Falló el enlace de parámetros";
         }
         else
             $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
             return $resultado;
     }
     
     
     public function consultarPorLlaves($llaves)
     {
         
         $resultado = new Resultado();
         $consulta =  " SELECT MSVSOLICITUDASUNTO  actividad, MSVSOLICITUDUSRSOLID usuarioSol,MSVSOLICITUDFSOL fInicial, MSVSOLICITUDFT fFinal, MSVETCKTTID estado".
             " FROM bstnmsv.msvsolicitud".
             " WHERE MSVETCKTTID  like CONCAT('%',?,'%') ";
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if($sentencia->bind_param("s",$llaves->id))
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($actividad, $usuarioSol, $fInicial, $fFinal, $estado))
                     {
                         if($sentencia->fetch())
                         {
                             $movimiento = new Ticket();
                             $movimiento->actividad =  utf8_encode($actividad);
                             $movimiento->usuarioSol =  utf8_encode($usuarioSol);
                             $movimiento->fInicial =  utf8_encode($fInicial);
                             $movimiento->fFinal =  utf8_encode($fFinal);
                             $movimiento->estado =  utf8_encode($estado);
                             $resultado->valor = $ticket;
                             
                         }
                         else
                             $resultado->mensajeError = "No se encontró ningún resultado.";
                     }
                     else
                         $resultado->mensajeError = "Falló el enlace del resultado";
                 }
                 else
                     $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
             }
             else
                 $resultado->mensajeError = "Falló el enlace de parámetros";
         }
         else
             $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
             return $resultado;
     }
     
     public function consultarPorNaye($criteriosNayee)
     {
         
         $resultado = new Resultado();
         $nayee = array();
         
         $consulta  =  " SELECT DISTINCT(B.MSVUSUARIOSNOMC) usuarioSol, B.MSVUSUARIOSCEPER correo, C.MSVPROYNOMC proyecto,  MSVUSUARIOSTELCEL telefono, D.MSVSCTGANOML area, B.MSVUSUARIOSEXT extension ".
             " FROM bstnmsv.msvsolicitud A".
             " INNER JOIN bstnmsv.msvusuarios B ON A.MSVSOLICITUDUSRSOLID = B.MSVSOLICITUDUSRSOLID " .
             " INNER JOIN bstnmsv.msvsctga D ON A.MSVSCTGAID = D.MSVSCTGAID " .
             " INNER JOIN bstnmsv.msvproy C ON A.MSVPROYID = C.MSVPROYID ".
             " WHERE B.MSVUSUARIOSNOMC  like CONCAT('%',?,'%') ";
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if($sentencia->bind_param("s",$criteriosNayee-> usuarioSol))
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($usuarioSol, $correo, $proyecto, $telefono, $area, $extension ))
                     {
                         while($row = $sentencia->fetch())
                         {
                             $naye = (object) [
                                 'usuarioSol' =>  utf8_encode($usuarioSol),
                                 'correo' =>  utf8_encode($correo),
                                 'telefono' =>  utf8_encode($telefono),
                                 'proyecto' =>  utf8_encode($proyecto),
                                 'area' =>  utf8_encode($area),
                                 'extension' =>  utf8_encode($extension)
                             ];
                             array_push($nayee,$naye);
                         }
                         $resultado->valor = $nayee;
                     }
                     else
                         $resultado->mensajeError = "Falló el enlace del resultado";
                 }
                 else
                     $resultado->mensajeError = "Falló la ejecución (" . $this->conexion->errno . ") " . $this->conexion->error;
             }
             else
                 $resultado->mensajeError = "Falló el enlace de parámetros";
         }
         else
             $resultado->mensajeError = "Falló la preparación: (" . $this->conexion->errno . ") " . $this->conexion->error;
             return $resultado;
     }
   

}
