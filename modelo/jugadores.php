<?php
//incluyo el archivo de conexion
require_once "coneccion/coneccion.php";

class Jugador{

public static function getAll(){
    $db = new Coneccion();
    $query = "SELECT * FROM jugadores ORDER BY puntaje DESC";
    $result = $db->query($query);
    $datos = [];
    if($result->num_rows > 0){
        while($row= $result -> fetch_assoc()){
            $datos[] = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'puntaje' => $row['puntaje'],
                
            ];
            
        }
    }
    return $datos;
}//end getAll

public static function getWhere($nombre){
    $db = new Coneccion();
    $query = "SELECT * FROM jugadores where nombre = '$nombre'";
    $result = $db->query($query);
    $datos = [];
    if($result->num_rows){
        while($row= $result -> fetch_assoc()){
            $datos[] = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'puntaje' => $row['puntaje'],
                
            ];
            
        }
    }
    return $datos;
}//end getAll

public static function insert($nombre){
    $db = new Coneccion();
    $query = "INSERT INTO jugadores (id, nombre, puntaje) VALUES (NULL, '$nombre', 0)";
    $result = $db->query($query);
    if($result){
        return true;
    }
    else{
        return false;
    }

}

public static function update($nombre,$puntaje){
$db = new Coneccion();
$query = "UPDATE jugadores SET nombre = '$nombre', puntaje = '$puntaje' WHERE nombre = '$nombre'";
$result = $db->query($query);
if($db->affected_rows ){
    return true;
}
}//end update

public static function delete($nombre){
$db = new Coneccion();
$query = "DELETE FROM jugadores WHERE nombre = '$nombre'";
$result = $db->query($query);
if($db->affected_rows){
    return true;
}
}//end delete


}//end class
?>