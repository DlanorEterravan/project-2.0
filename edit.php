<?php
include_once "includes/header.php";
include_once 'Setings/autoload.php';

$edit = new tasks();
$edit->validarEdit();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
}

if(isset($_POST['editar_datos'])){
    header('location: index.php');
}

?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name ='titulo' class="form-control" placeholder="Inserte nuevo titulo" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="descripcion" class="form-control" rows="5" cols="40" placeholder="Inserte nueva descripcion"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="time" name="time" class="form-control" >
                    </div>

                    <input type="submit" name="editar_datos" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
</div>