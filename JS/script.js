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
    }else{
        console.log("Error");
    }
}
xhr.send(); 