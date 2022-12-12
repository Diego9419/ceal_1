<?php

$host='localhost';
$user='root';
$password='';
$bd='ceal';

$conection =mysqli_connect($host,$user,$password,$bd,3308);


if(!$conection){
    echo "error en la conexion";
}