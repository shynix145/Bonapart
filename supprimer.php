<?php

require_once 'config.php';
  require_once './partials/head.php';
  require_once './partials/header.php';
  require_once './partials/nav.php';


  if(!isset($_SESSION['agent_id'])) {
    header("Location: login.php");
    exit();
  }

  if(isset($_GET['id'])){
    
  $id = $_GET['id'];
  $agent_annonce = 'SELECT * FROM annonces WHERE id= :id';
  $pre = $pdo->prepare($agent_annonce);
  $pre->bindValue(':id', $id, PDO::PARAM_INT);
  $pre->execute();
  $tbl = $pre->fetch(PDO::FETCH_ASSOC);
    if(empty($tbl) || $tbl['agent_id']!= $_SESSION['agent_id']){
        header('Location: dashboard.php');
        exit();
    }else{
        $sqlSupp = 'DELETE FROM annonces WHERE id = :id ';
        $sup = $pdo->prepare($sqlSupp);
        $sup->bindValue(':id' , $id , PDO::PARAM_INT);
        $sup->execute();

        header('Location: dashboard.php');
        exit();
    }

  }

  


?>