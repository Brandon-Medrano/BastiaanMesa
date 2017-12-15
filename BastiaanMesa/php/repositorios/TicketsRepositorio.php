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
                . " MSVRACTID, "
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
         
         $consulta = " SELECT MSVSOLICITUDASUNTO actividad, MSVSOLICITUDUSRSOLID usuarioSol, DATE_FORMAT(MSVSOLICITUDFSOL,'%d/%m/%Y') fInicial, ".
         " MSVSOLICITUDHSOL hInicial, B.MSVRACTNOML estado".
         " FROM bstnmsv.msvsolicitud A ".
        " LEFT JOIN bstnmsv.msvract B ON A.MSVRACTID = B.MSVRACTID ".
        " AND MSVSOLICITUDFSOL like CONCAT('%',?,'%') ".
        " WHERE MSVRACTNOML like CONCAT('%',?,'%') ".
             " AND MSVSOLICITUDUSRSOLID like CONCAT('%',?,'%') ";
         
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if($sentencia->bind_param("sss",$criteriosSeleccion->fInicial, $criteriosSeleccion->estado, $criteriosSeleccion->usuarioSol))
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($actividad, $usuarioSol, $fInicial, $hInicial, $estado))
                     {
                         while($row = $sentencia->fetch())
                         {
                             $ticket = (object) [
                                 'actividad' => utf8_encode($actividad),
                                 'usuarioSol' =>  utf8_encode($usuarioSol),
                                 'fInicial' =>  utf8_encode($fInicial),
                                 'hInicial' =>  utf8_encode($hInicial),
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
         $consulta =  " SELECT MSVSOLICITUDASUNTO  actividad, MSVSOLICITUDUSRSOLID usuarioSol,MSVSOLICITUDFSOL fInicial, MSVSOLICITUDFT fFinal, MSVRACTID estado".
             " FROM bstnmsv.msvsolicitud A".
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
         
         $consulta  =  " SELECT DISTINCT(B.MSVSOLICITUDUSRSOLID) usuarioSol, B.MSVUSUARIOSCEPER correo, C.MSVPROYNOMC proyecto,  MSVUSUARIOSTELCEL telefono, D.MSVSCTGANOML area, B.MSVUSUARIOSEXT extension ".
             " FROM bstnmsv.msvsolicitud A".
             " INNER JOIN bstnmsv.msvusuarios B ON A.MSVSOLICITUDUSRSOLID = B.MSVSOLICITUDUSRSOLID " .
             " INNER JOIN bstnmsv.msvsctga D ON A.MSVSCTGAID = D.MSVSCTGAID " .
             " INNER JOIN bstnmsv.msvproy C ON A.MSVPROYID = C.MSVPROYID ".
             " WHERE B.MSVSOLICITUDUSRSOLID  like CONCAT('%',?,'%') ";
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
     public function consultarPorArea($criteriosAreas)
     
     {
         $resultado = new Resultado();
         $areas = array();
         
         $consulta = " SELECT MSVSCTGAID id, MSVSCTGANOML agenteId".
             " FROM bstnmsv.msvsctga ".
             " WHERE MSVSCTGAID like CONCAT ('%',?,'%') ".
             "AND  MSVSCTGANOML  like CONCAT('%',?,'%')";
         
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if($sentencia->bind_param("ss",$criteriosAreas->agenteId,
                 $criteriosAreas->agente))
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($id, $agenteId)  )
                     {
                         while($row = $sentencia->fetch())
                         {
                             $area = (object) [
                                 'id' => utf8_encode($id),
                                 'agenteId' =>  utf8_encode($agenteId)
                             ];
                             array_push($areas,$area);
                         }
                         $resultado->valor = $areas;
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
     
     public function  consultarPorUsuario($criteriosUsuarios)
     
     {
         $resultado = new Resultado();
         $usuarios = array();
         
         $consulta = " SELECT MSVSOLICITUDUSRSOLID id, MSVUSUARIOSNOMC nayeagenteId".
             " FROM bstnmsv.msvusuarios ".
             " WHERE MSVSOLICITUDUSRSOLID like CONCAT ('%',?,'%') ".
             " AND  MSVUSUARIOSNOMC  like CONCAT('%',?,'%')";
         
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if($sentencia->bind_param("ss",$criteriosUsuarios->id,
                 $criteriosUsuarios->nayeagenteId))
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($id, $nayeagenteId)  )
                     {
                         while($row = $sentencia->fetch())
                         {
                             $usuario = (object) [
                                 'id' => utf8_encode($id),
                                 'nayeagenteId' =>  utf8_encode($nayeagenteId)
                             ];
                             array_push($usuarios,$usuario);
                         }
                         $resultado->valor = $usuarios;
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
     
     public function consultarPorProyecto($criteriosProyectos)
     
     {
         $resultado = new Resultado();
         $proyectos = array();
         
         $consulta = " SELECT MSVPROYID id, MSVPROYNOML agenteId".
             " FROM bstnmsv.msvproy ".
             " WHERE MSVPROYID like CONCAT ('%',?,'%') ".
             "AND  MSVPROYNOML  like CONCAT('%',?,'%')";
         
         if($sentencia = $this->conexion->prepare($consulta))
         {
             if($sentencia->bind_param("ss",$criteriosProyectos->agenteId,
                 $criteriosProyectos->agente))
             {
                 if($sentencia->execute())
                 {
                     if ($sentencia->bind_result($id, $agenteId)  )
                     {
                         while($row = $sentencia->fetch())
                         {
                             $proyecto = (object) [
                                 'id' => utf8_encode($id),
                                 'agenteId' =>  utf8_encode($agenteId)
                             ];
                             array_push($proyectos,$proyecto);
                         }
                         $resultado->valor = $proyectos;
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
     
     

}
