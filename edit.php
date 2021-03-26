<?php
include("db.php");

    if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $query="SELECT * FROM task WHERE Id= $id";
    $r= mysqli_query($conn,$query);

        if(mysqli_num_rows($r)==1){
        $row=mysqli_fetch_array($r);
        $titulo=$row['Titulo'];
        $desc=$row['Descripcion'];

        }

    }

    if(isset($_POST['update'])){
        $id = $_GET['Id'];
        $titulo =   $_POST['Titulo'];
        $desc   =   $_POST['Descripcion'];

        $query ="UPDATE task SET Titulo = '$titulo', Descripcion ='$desc' WHERE Id = $id ";

        mysqli_query($conn,$query);


        $_SESSION['message']='Tarea modificada.';
        header("Location: index.php");
    }   



?>

<?php include("Includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card  card-body">
                <form action="edit.php?Id=  <?php echo $_GET['Id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value=" <?php echo $titulo;?>"
                        class="form-control" placeholder="Modificar titulo">    
                    </div>
                    <div class="form-group">
                        <textarea name="description"  rows="2" class="form-control" 
                        placeholder="Modificar la descripcion">
                        <?php echo $desc; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="update"> Modificar</button>
                </form>

            </div>
        </div>
    </div>

</div>
<?php include("Includes/Footer.php")?>



