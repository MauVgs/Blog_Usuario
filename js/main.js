let formulario = document.getElementById('formulario');
let areaDeComentarios = document.getElementById('comentario');

document.querySelector('#areaComentario').addEventListener('keypress', function (e) {
    var key = e.which || e.keyCode;
    if (key === 13) { // 13 is enter
      // code for enter
      e.preventDefault();
      let datos = new FormData(formulario);
  
      console.log(datos);
      console.log(datos.get('usuario'))
      console.log(datos.get('comentario'));
      console.log(datos.get('nota'));
  
      if(datos.get('usuario') != '' || datos.get('comentario') != ''){
  
          fetch('/comentar.php',{
              method: 'POST',
              body: datos
          })
              .then( res => res.json())
              .then( data => {
                  
                  document.getElementById('areaComentario').value = '';
  
  
                  let datos =data.split('/');
                  let usr = datos[1];
                  let comment = datos[3]; 
  
                  if(data){
                    //Creación de Div Padre
                    let areaComentario = document.createElement('div');
                    areaComentario.className = 'areaComentario';
    
                    //Creación de Div hijo donde se agregan el comentario
                    let comentario = document.createElement('div');
                    comentario.className = 'comentario';
    
                    //Colocación del comentario
                    let com = document.createElement('p');
                    com.innerText = comment;
                    comentario.appendChild(com);

                    let br = document.createElement('br');
                    br.innerText = comment;
                    comentario.appendChild(br);
    
                    //Colocación del usuario
                    let usuario = document.createElement('p');
                    let strong = document.createElement('strong')
                    strong.innerHTML = `Por: ` + usr;
                    usuario.appendChild(strong);
                    comentario.appendChild(usuario)
                    //Se añaden los elementos al DOM
                    areaComentario.appendChild(comentario);
                    areaDeComentarios.appendChild(areaComentario);
                    $("#hide").hide();
                  }
              });
              scrollTop();
      }
    }
});


formulario.addEventListener('submit', function(e){
    e.preventDefault();
    let datos = new FormData(formulario);

    console.log(datos);
    console.log(datos.get('usuario'))
    console.log(datos.get('comentario'));
    console.log(datos.get('nota'));

    if(datos.get('usuario') != '' || datos.get('comentario') != ''){

        fetch('/comentar.php',{
            method: 'POST',
            body: datos
        })
            .then( res => res.json())
            .then( data => {
                
                document.getElementById('areaComentario').value = '';


                let datos =data.split('/');
                let usr = datos[1];
                let comment = datos[3]; 

                if(data){
                    //Creación de Div Padre
                    let areaComentario = document.createElement('div');
                    areaComentario.className = 'areaComentario';

                    //Creación de Div hijo donde se agregan el comentario
                    let comentario = document.createElement('div');
                    comentario.className = 'comentario';

                    //Colocación del comentario
                    let com = document.createElement('p');
                    com.innerText = comment;
                    comentario.appendChild(com);


                    let br = document.createElement('br');
                    br.innerText = comment;
                    comentario.appendChild(br);

                    //Colocación del usuario
                    let usuario = document.createElement('p');
                    let strong = document.createElement('strong')
                    strong.innerHTML = `Por: ` + usr;
                    usuario.appendChild(strong);
                    comentario.appendChild(usuario)
                    //Se añaden los elementos al DOM
                    areaComentario.appendChild(comentario);
                    areaDeComentarios.appendChild(areaComentario);
                    $("#hide").hide();
                }
            });
            scrollTop();
    }

})

window.onload = function() {
    scrollTop();
};

function scrollTop() {
    $("#scroll").animate({ scrollTop: $("#alto").height() }, 4000);
}
