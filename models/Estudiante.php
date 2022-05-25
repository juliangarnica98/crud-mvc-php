<?php
    class Estudiante{

        private $conec;

        public $id;
        public $nombre;
        public $celular;
        public $correo;
        public $fk_id_curso;


        //conexion con base de datos 
        public function __construct()
        {
            try {
                $this->conec = Conexion::conectar();
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }

        //listar datos estudiante en la tabla
        public function listar(){
            try {
                $query="SELECT * FROM `estudiante` ORDER BY id DESC";
                $smt=$this->conec->prepare($query);
                $smt->execute();
                return $smt->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }

        //Listar por id para editar
        public function listarid($id){
            try {
                $query="SELECT * FROM estudiante where id=?";
                $smt=$this->conec->prepare($query);
                $smt->execute(array($id));
                return $smt->fetch(PDO::FETCH_OBJ);
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }

        //listar datos de los cursos
        public function listarCursos(){
            try {
                $query="SELECT * FROM `curso`";
                $smt=$this->conec->prepare($query);
                $smt->execute();
                return $smt->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }

        //eliminar estudiante por id
        public function eliminar($id){
            try {
                $query="DELETE from estudiante where id=?";
                $smt=$this->conec->prepare($query);
                $smt->execute(array($id));
                
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }

        //registrar un nuevo estudiante
        public function registrar(Estudiante $data){
            try {
                $query="INSERT into estudiante (nombre,celular,correo,fk_id_curso) values (?,?,?,?)";
                $this->conec->prepare($query)->execute(array($data->nombre,$data->celular,$data->correo,$data->fk_id_curso));
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }

        //actualizar un estudiante
        public function actualizar($data){
            try {
                $query="UPDATE estudiante set nombre=?,celular=?,correo=?,fk_id_curso=? where id=? ";
                $this->conec->prepare($query)->execute(array($data->nombre,$data->celular,$data->correo,$data->fk_id_curso,$data->id));
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }
        
    }
?>