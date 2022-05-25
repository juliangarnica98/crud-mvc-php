listarEstudiante();



function listarEstudiante(){
    
    fetch("?c=index2",{
        method: "POST",
    }).then(response => response.text()).then(response => {
        estudiantes.innerHTML=response;
    })
}


if(document.getElementById("guardar")){
    document.getElementById("guardar").addEventListener('click',function(e){
        e.preventDefault();
        
        fetch("?c=guardar",{
            
            method: "POST",
            body: new FormData(form_estudiante)
        }).then(response => response.text()).then(response => {
            var parsedJson = JSON.parse(response);
            
             if (parsedJson['status'] == "ok") {
                 if (parsedJson['result'] == "guardar") {
                    listarEstudiante();
                    $('#estudianteModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: '¡Buen trabajo, se ha guardado!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                 } 
               
            }else{
                Swal.fire({
                    icon: 'error',
                    title: '¡Upss, error!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    });
}

function editarestudiante(id)
{   console.log(id);
    //console.log(form_editar+id);
    fetch("?c=editar&id="+id,{
            
        method: "POST",
        body: new FormData(form_editar)
    }).then(response => response.text()).then(response => {
        var parsedJson = JSON.parse(response);
        
         if (parsedJson['status'] == "ok") {
             if (parsedJson['result'] == "actualizar") {
                listarEstudiante();
                //$('#editarModal'.id).modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: '¡Buen trabajo, se ha actualizado!',
                    showConfirmButton: false,
                    timer: 1500
                })
             } 
           
        }else{
            Swal.fire({
                icon: 'error',
                title: '¡Upss, error!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

function eliminar(id){
    
    Swal.fire({
        title: '¿Estas seguro?',
        text: "¿Desea eliminar el registro?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch("?c=delete&id="+id,{
                method: "POST",
                body: id
            }).then(response => response.text()).then(response => {
                var parsedJson = JSON.parse(response);
                if (parsedJson['status'] == "ok") {
                    listarEstudiante();
                    Swal.fire(
                        'Eliminado!',
                        'Se ha eliminado correctamente.',
                        'success'
                      )            
                }      
            })
        }
      }) 
}
