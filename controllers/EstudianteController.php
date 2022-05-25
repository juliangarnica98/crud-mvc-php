<?php
    include_once './models/Estudiante.php';

    class EstudianteController{

        public $est;

        public function __construct()
        {
            $this->est = new Estudiante();
        }
        public function index(){
            
            include_once 'views/home.php';
        }
        public function index2(){
            include_once 'views/tablaEstudiante.php';
        }

        /*public function nuevo(){
            $estu = new Estudiante();
            if (isset($_REQUEST['id'])) {
                $estu = $this->est->listarid($_REQUEST['id']);                
            }
            include_once 'views/save.php';
        }*/

        public function guardar(){
            $data = array();

            $estudiante = new Estudiante();
            $estudiante->id = $_POST['id'];
            $estudiante->nombre = $_POST['nombre'];
            $estudiante->celular = $_POST['celular'];
            $estudiante->correo = $_POST['correo'];
            $estudiante->fk_id_curso = $_POST['fk_id_curso'];

            $this->est->registrar($estudiante);           
            $data['status'] = 'ok';
            $data['result'] = 'guardar';
            /*$estudiante->id > 0 ? $this->est->actualizar($estudiante):$this->est->registrar($estudiante);           
            if($estudiante->id > 0){
                $data['status'] = 'ok';
                $data['result'] = 'actualizar';
            }else{
                $data['status'] = 'ok';
                $data['result'] = 'guardar';
            }*/
            echo json_encode($data);
        }

        public function editar(){
            $data = array();
            //$this->est->eliminar($_REQUEST['id']);
            $estudiante = new Estudiante();
            $estudiante->id = $_POST['editid'];
            $estudiante->nombre = $_POST['editnombre'];
            $estudiante->celular = $_POST['editcelular'];
            $estudiante->correo = $_POST['editcorreo'];
            $estudiante->fk_id_curso = $_POST['editfk_id_curso'];

            $this->est->actualizar($estudiante);         
            $data['status'] = 'ok';
            $data['result'] = 'actualizar';
            /*$estudiante->id > 0 ? $this->est->actualizar($estudiante):$this->est->registrar($estudiante);           
            if($estudiante->id > 0){
                $data['status'] = 'ok';
                $data['result'] = 'actualizar';
            }else{
                $data['status'] = 'ok';
                $data['result'] = 'guardar';
            }*/
            echo json_encode($data);
        }

        public function delete(){

            $this->est->eliminar($_REQUEST['id']);
            $data['status'] = 'ok';
            echo json_encode($data);
        }
    }
?>