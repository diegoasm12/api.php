<?php
require_once "modelo/jugadores.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['nombre'])){
            echo json_encode(Jugador::getWhere($_GET['nombre']));
        }
        else{
            echo json_encode(Jugador::getAll());}
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'));
        if(isset($data->nombre)){
            if(Jugador::insert($data->nombre)){
                http_response_code(201);
            }
            else{
                http_response_code(500);
            }
        }
        else{
            http_response_code(400);
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        if(isset($data->nombre,$data->puntaje)){
            if(Jugador::update($data->nombre,$data->puntaje)){
                http_response_code(200);
            }
            else{
                http_response_code(500);
            }
        }
        else{
            http_response_code(400);
        }
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        if(isset($data->nombre)){
            if(Jugador::delete($data->nombre)){
                http_response_code(200);
            }
            else{
                http_response_code(500);
            }
        }
        else{
            http_response_code(400);
        }
        break;
}