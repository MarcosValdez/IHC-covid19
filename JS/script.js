var xhr = new XMLHttpRequest();

xhr.open('GET', '../PHP/servidor.php');

xhr.onload = function(){
    if(xhr.status == 200){
        var json = JSON.parse(xhr.responseText);
        var template = ``;
        json.map(function(data){
            template += `
                <h2>${data.id}</h2>
                <p>${data.nombre}</p>
                <p>${data.nombre}</p>
                <p>${data.nombre}</p>
                <p>${data.nombre}</p>
                <hr>
            `;
            return template;
        });
        document.getElementById("lista").innerHTML = template;
        console.log(datos);
    }else{
        console.log("Error");
    }
}
xhr.send(); 

$(document).ready(function() {
    $('#data').DataTable( {
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
        },
        "lengthChange":false,
        "order": [],
        "pageLength": 5
    } );
} );
/* sticky menu */

window.addEventListener("scroll", function(){
    let header = document.querySelector("header");
    header.classList.toggle("sticky", window.scroll > 0); 
})
