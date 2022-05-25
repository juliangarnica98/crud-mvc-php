<?php foreach ($this->est->listar() as $key) { ?>
    <tr>
        <th id="id_to_delete"><?php echo $key->id?></th>
        <th ><?php echo $key->nombre?></th>
        <th ><?php echo $key->celular?></th>
        <th ><?php echo $key->correo?></th>
        <th >
            <button onclick="eliminar(<?php echo $key->id?>)" class="btn btn-danger" id="eliminar"><i class="fas fa-trash-alt"></i></i></button>
            
        </th>
        <th >
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarModal<?php echo $key->id?>"><i class="fas fa-edit"></i></button>
            <!--<a href="?c=nuevo&id=<?php echo $key->id?>" class="btn btn-success">Editar</a>-->
        </th>
    </tr>

    <div class="modal fade" id="editarModal<?php echo $key->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title <?php echo $key->id?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="POST" id="form_editar<?php echo $key->id?>">
                <!-- <form action="?c=guardar" method="POST" id="form_estudiante">-->
                <?php 
                
                ?>
                <input type="hidden" name="editid" id="editid" value="<?php echo $key->id ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="editnombre" name="editnombre" placeholder="Nombre completo" value="<?php echo $key->nombre ?>">
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" name="editcelular" id="editcelular" placeholder="Celular" value="<?php echo $key->celular ?>">
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" id="editcorreo" name="editcorreo" placeholder="Correo" value="<?php echo $key->correo ?>">
                </div>
                <div class="form-group">
                    <label for="curso">Selecciona un curso</label>
                    <select class="form-control" id="editfk_id_curso" name="editfk_id_curso">
                        <?php foreach ($this->est->listarCursos() as $key) {?>
                            <option value="<?php echo $key->id ?>"<?php echo 'selected' ?> ><?php echo $key->nombre  ?></option>
                            <!--<option value="<?php echo $key->id ?>" <?php echo $key->id === $estu->fk_id_curso ? 'selected': '' ?>><?php echo $key->nombre ?></option>-->
                        <?php } ?>
                    </select>
                </div>
                
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" onclick="editarestudiante(<?php echo $key->id ?>)" id="guardarestudiante">Guardar cambios</button>
            </div>
            </div>
        </div>
    </div>
<?php } ?>

