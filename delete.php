<?php

include("db.php");

if (isset($_GET['Id'])){
    $id=$_GET['Id'];
    $query="DELETE FROM task WHERE Id = $id";
    $r=mysqli_query($conn,$query);
    if(!$r){
        die("La consulta de borrar falló...");
    }

    $_SESSION['message']= 'Tarea borrada...';
    $_SESSION['message_type']= 'danger';
    header("Location: index.php");
}


?>