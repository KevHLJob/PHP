<?php include("db.php")?>


<?php include("Includes/header.php")?>


<div class="container p-4">
    <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message']))   {?>
                    <div class="alert alert-secundary alert-dismissible fade show" role="alert">
                     <?= $_SESSION['message']  ?>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     </button>
                    </div>

                <?php session_unset();} ?>

                <div class="card card-body">
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" 
                            placeholder="Titulo de la tarea" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2"  class="form-control" 
                            placeholder="Descripción de la tarea" ></textarea>
                        </div>
                       <input type="submit"  class="btn btn-success btn-block" 
                        name="save_task" value="Agendar">  
                    </form>

                 </div>
            
            
            </div>

        <div class="col-md-8">
            <table class="table table-dark">
                <thead>
                    <tr class="table-active">   
                        <th>Titulo</th>
                        <th>Descripción</th> 
                        <th>Fecha de creación</th>
                        <th>Acción</th>
                    </tr>

                </thead>   
                <tbody>
                    <?php
                    $consulta="SELECT * FROM task";
                    $rt=mysqli_query($conn,$consulta);

                    while($row =mysqli_fetch_array($rt)){  ?>
                        <tr>
                            <td><?php echo $row['Titulo'] ?></td>
                            <td><?php echo $row['Descripcion'] ?></td>
                            <td><?php echo $row['Fecha_creacion'] ?></td>
                            <td>
                                <a href="edit.php?Id=<?php echo $row['Id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?Id=<?php echo $row['Id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>




                            </td>
                        </tr>
                      <?php  } ?>
                </tbody>

            </table>
        
         

         </div>
    </div>

</div>


<?php include("Includes/Footer.php")?>