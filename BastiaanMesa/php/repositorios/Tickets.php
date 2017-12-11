 <?php
use php\clases\AdministradorConexion;
use php\clases\JsonMapper;
use php\modelos\Ticket;
use php\repositorios\TicketsRepositorio;

error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../clases/JsonMapper.php';
include '../clases/Utilidades.php';
include '../clases/AdministradorConexion.php';
include '../repositorios/TicketsRepositorio.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$administrador_conexion = new AdministradorConexion();

$conexion;
try
{
    $conexion = $administrador_conexion->abrir();
    if($conexion)
    {
        $accion = REQUEST('accion');
        $repositorio = new TicketsRepositorio($conexion);
        switch ($accion)
        {
            case 'insertar':
                $json = json_decode(REQUEST('ticket'));
                $mapper = new JsonMapper();
                $ticket = $mapper->map($json, new Ticket());
                $resultado = $repositorio->insertar($ticket);
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
            case 'actualizar':
                $json = json_decode(REQUEST('ticket'));
                $mapper = new JsonMapper();
                $ticket = $mapper->map($json, new Ticket());
                $resultado = $repositorio->actualizar($ticket) ;
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
            case 'eliminar':
                $llaves = json_decode(REQUEST('llaves'));
                $resultado = $repositorio->eliminar($llaves);
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
            case 'consultarPorLlaves':
                $llaves = json_decode(REQUEST('llaves'));
                $resultado = $repositorio->consultarPorLlaves($llaves);
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
            case 'consultar':
                $criteriosSeleccion = json_decode(REQUEST('criteriosSeleccion'));
                $resultado = $repositorio->consultar($criteriosSeleccion);
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
            case 'consultarPorNaye':
                $criteriosNayee = json_decode(REQUEST('criteriosNayee'));
                $resultado = $repositorio->consultarPorNaye($criteriosNayee);
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
                    
            case 'consultarPorEstatu':
                $resultado = $repositorio->consultarPorEstatu();
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                break;
                
            case 'consultarPorImportancia':
                $resultado = $repositorio->consultarPorImportancia();
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
                    
            case 'consultarPorVia':
                $resultado = $repositorio->consultarPorVia();
                if($resultado!=null)
                    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
                    break;
        }
    }
    
}
catch(Exception $e)
{
    echo $e->getMessage(), '\n';
}
finally
{
    $administrador_conexion->cerrar($conexion);
}


