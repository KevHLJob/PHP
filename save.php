<?php

include("db.php");

//Si selecciona agendar
// usara esta condicional para guardar....
if (isset($_POST['save_task'])){
    $title= $_POST['title'];
    $des= $_POST['description'];

    $query = "INSERT INTO task(Titulo, Descripcion) VALUES ('$title','$des')";
    $r = mysqli_query($conn, $query);
    if(!$r){

        die("Query failed...");
        
    }

$_SESSION['message']='Tarea guardada...';
$_SESSION['message_type']='success';

    header("Location: index.php");


}

?>