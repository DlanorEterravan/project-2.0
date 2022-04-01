<?php
include_once 'Setings/autoload.php';

$obj = new tasks(); /* inicio de la clase Task */

$tareas = $obj->showTask(); /* muestra los datos de la base de datos tasks*/

include_once 'includes/header.php';
?>

<div class="container d-flex justify-content-center mt-3">
    <strong><h1 class="color1">ESTAS SON TUS TAREAS PENDIENTES.</h1></strong>
</div>

<!-- IGNORAR-->
            <?php
            /* $p0 = 1500000;
            $percent = 2.5;
            $aug = 10000;
            $p = 2000000;
            $years = 0;
            $percent /= 100;

            while($p0 < $p){
                $p0 = $p0 + $p0 * $percent + $aug;
                $years++;
            }
            echo $years; */
            ?>
<!-- IGNORAR-->

<div class="container p-4">
    <!-- contenedor con un padding de 4 -->
    <div class="row">
        <!-- fila -->
        <div class="col-md-4">
            <!-- columna con un margin de 4 -->

        <!-- INICIO DE MENSAJE DE ALERTA -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>    
        <!--FIN MENSAJE DE ALERTA -->
        
            <div class="card card-body">
                <!-- etiqueta para form -->
                <form action="save_task.php" method="POST">
                    <h4 class="d-flex justify-content-center">--INSERTE NUEVA TAREA--</h4>
                    <br>

                    <div class="form-group">
                        
                        <input type="text" class="form-control" name="titulo" placeholder="Inserte titulo">
                    </div><!-- fin de la clase form-group -->

                    <div class="form-group">
                        
                        <textarea name="description" class="form-control" cols="40" placeholder="Inserte Descripcion"></textarea>
                    </div><!-- fin de la clase form-group -->

                    <div class="form-group">
                        
                        <input type="time" name="time" class="form-control"">
                    </div><!-- fin de la clase form-group -->

                    <input type="submit" class="btn btn-success btn-block" name="guardar_datos" value="Guardar datos">
                </form>
                    
                    <?php if(!empty($tareas)){ ?>
                        <br>
                            <form action="delete_all.php" method="POST">
                                <input type="submit" class="btn btn-danger btn-block" name="delete_all" value="Borrar todos datos">
                            </form>
                    <?php } ?>

            </div><!-- fin de la clase card card-body-->
        </div><!-- fin de la clase col-md-4-->
        <div class="col-md-8">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>Descripcion</td>
                        <td>Hora de Inicio</td>
                        <td>Accion</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tareas as $tarea) {?>
                        <tr>
                            <td><?php echo $tarea['titulo']; ?></td>
                            <td><?php echo $tarea['descripcion']; ?></td>
                            <td><?php echo date("g:i a",strtotime($tarea['horaInicio'])); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $tarea['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>

                                <a href="delete_task.php?id=<?php echo $tarea['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div><!-- fin de la class: row-->
</div> <!-- fin del container p-4-->