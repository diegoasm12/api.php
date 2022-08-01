<?php
class Coneccion extends Mysqli{
/*function __construct(){
    parent::__construct("localhost","root","","torneo");
    $this->query("SET NAMES 'utf8'")
}*/

function __construct(){
    parent::__construct("apis.mysql.database.azure.com","diego","Dsoto12."
    ,"torneo",3306,NULL,MYSQLI_CLIENT_SSL,array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            "allow_self_signed"=>true,
            "cafile"=>"C:\xampp\htdocs\torneo\certificado\DigiCertGlobalRootCA.crt.pem"

        )
    ));
    
}
}//end class
?>
