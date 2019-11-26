function setLike(id_nota, idUser){
    $('#like'+id_nota).addClass('corazonRojo');
    $('#like'+id_nota).attr('onclick', `quitLike(${id_nota})`);
    
    fetch('/like.php',{
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_nota=${id_nota}&usuario_id=${idUser}&active=0`
    })
    .then( res => res.json()).then(console.log('Like'));    
}

function quitLike(id_nota, idUser){
    $('#like'+id_nota).removeClass('corazonRojo');
    $('#like'+id_nota).attr('onclick', `setLike(${id_nota})`);
    fetch('/like.php',{
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_nota=${id_nota}&usuario_id=${idUser}&active=1`
    })
    .then( res => res.json()).then(console.log('Dislike'));   
}
































// let datos = {
//     method: 'POST',
//     headers: {
//     'Content-Type': 'application/x-www-form-urlencoded'
//         },
//     body: `id_nota=${id_nota}&id_user=${user}`
//     };

// function getLike(id_nota, user){

//     let datos = {
//         method: 'POST',
//         headers: {
//         'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: `id_nota=${id_nota}&id_user=${user}`
//     };
//     //Dislike
//     if($('#like'+id_nota).attr('name') == 'on'){
//         //Fetch
//         fetch('/notLiked.php',datos)
//         .then( res => res.json());
        
//         $('#like'+id_nota).removeClass('corazonRojo');
//         $('#like'+id_nota).attr('name', 'off')
//     }
//     //Like
//     else if ($('#like'+id_nota).attr('name') == 'off'){
//         //Fetch

//         fetch('/isLiked.php',datos)
//         .then( res => res.json());

//         $('#like'+id_nota).addClass('corazonRojo');
//         $('#like'+id_nota).attr('name', 'on')
//     }
    
// }

// let bandera = true;

// function getLike(id){
//     if(bandera){
//         $(".apagado_" + id).addClass("corazonRojo");
//         return bandera = false;
        
//     }else{
//         $(".apagado_" + id).removeClass("corazonRojo");
//         return bandera = true; 
//     }
// }

