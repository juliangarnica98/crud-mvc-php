<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo estudiante</title>
    <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 p-4 border rounded ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 text-center">
            <form action="" method="POST" id="form_estudiante">
                <!-- <form action="?c=guardar" method="POST" id="form_estudiante">-->
                <?php 
                
                ?>
                <input type="hidden" name="id" id="id" value="<?php echo $estu->id ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value="<?php echo $estu->nombre ?>">
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>0
                    <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular" value="<?php echo $estu->celular ?>">
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php echo $estu->correo ?>">
                </div>
                <div class="form-group">
                    <label for="curso">Selecciona un curso</label>
                    <select class="form-control" id="fk_id_curso" name="fk_id_curso">
                        <?php foreach ($this->est->listarCursos() as $key) {?>
                            <option value="<?php echo $key->id ?>" <?php echo $key->id === $estu->fk_id_curso ? 'selected': '' ?>><?php echo $key->nombre ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
            </form>
            </div>
        </div>
    </div>
    <!-- <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    <script src="./resources/functions.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>