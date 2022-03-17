<?php

function f1 ($conexion){
    $dbHost ='localhost';
$dbUsername ='root';
$dbPassword ='';
$dbDatabase ='tutorial_db';
    $conexion=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);
    $html="<ul>";
    $sql="select email form register";
    $datos= mysqli_query($conexion, $sql) or die("no se pudo hacer consulta");
    $tupla= mysqli_fetch_array($datos);
    while ($tupla){
        $email=$tupla['email'];
        $html="<li>$email </li>";
        $tupla= mysqli_fetch_array($datos);
    }
    $html="</ul>";
    return $html;
    
}
    
    
    
