<?php
$host_name = "localhost";
$database = "iptables";
$user_name = "admin";
$password = "admin";

try {
    $bdd = new PDO('mysql:host='.$host_name.';dbname='.$database.';charset=utf8',$user_name,$password);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());}
?>