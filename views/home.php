<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto CRUD</title>
    <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
    
</head>
<body>
    <div class="m-lg-5">
        <div class="container pt-5">
            <div class="row d-flex justify-content-center">    
                    <h1>Lista de estudiantes</h1>                    
                </div>
            <div class="row d-flex justify-content-center pt-lg-2">
                <div class="col-md-10">
                    <!--<a href="?c=nuevo" class="btn btn-primary">Nuevo</a><br>-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#estudianteModal"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="container pt-lg-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <table class="table text-center" id="tablaEstudiantes">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody id="estudiantes">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="estudianteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="POST" id="form_estudiante">
                <!-- <form action="?c=guardar" method="POST" id="form_estudiante">-->
                <?php 
                
                ?>
                <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value="">
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular" value="">
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="">
                </div>
                <div class="form-group">
                    <label for="curso">Selecciona un curso</label>
                    <select class="form-control" id="fk_id_curso" name="fk_id_curso">
                        <?php foreach ($this->est->listarCursos() as $key) {?>
                            <option value="<?php echo $key->id ?>" ><?php echo $key->nombre ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
            </div>
            </div>
        </div>
    </div>

    
    
    <script src="./resources/js/jquery-3.6.0.min.js"></script>
    <script src="./resources/js/bootstrap.min.js"></script>
    <script src="./resources/functions.js"></script>
    <script src="./resources/js/sweetalert2@11.js"></script>
   
</body>
</html>