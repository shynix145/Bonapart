<?php

if (session_status() === PHP_SESSION_NONE) {
session_start();
}

$pdo = new PDO("mysql:host=localhost;dbname=annonces_immo;charset=utf8", "root", "root");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM agents WHERE id = :id";
$res= $pdo->prepare($query);
$res->bindValue(':id', $_SESSION['agent_id'], PDO::PARAM_INT);
$res-> execute();

if ($res->rowCount() > 0){
    $agent = $res->fetch(PDO::FETCH_ASSOC);
    $_SESSION['prenom'] = $agent['prenom'];
} else {
    $_SESSION['agent_id']= null;
}


?>