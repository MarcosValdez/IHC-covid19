let tb = document.getElementById('tabla').getElementsByTagName('tbody')[0];
let tb2 = document.getElementById('tabla2').getElementsByTagName('tbody')[0]
for (let i = 0; i < tb.rows.length; i++) {
    tb.rows[i].onclick = function() {
        TableRowClick(this, i);
    }
}
let a, b, c, del;

function TableRowClick(x, it) {
    a = x.cells[0].innerHTML;
    b = x.cells[1].innerHTML;
    c = x.cells[2].innerHTML;
    del = it;
    //alert(msg);
}

document.getElementById('btn-izq').addEventListener("click", function() {
    let newrow = document.getElementById('tabla2').getElementsByTagName('tbody')[0].insertRow();
    document.getElementById('tabla').getElementsByTagName('tbody')[0].deleteRow(del);

    /* newrow.innerHTML = '<tr><td>nueva compañia</td><td>nuevo contacto</td><td>nuevo pais</td>tr>'; */
    newrow.innerHTML = `<tr><td>${a}</td><td>${b}</td><td>${c}</td></tr>`;
    /*  newrow.onclick = function(){
         TableRowClick(this);
     }; */
    tb = document.getElementById('tabla').getElementsByTagName('tbody')[0];
    tb2 = document.getElementById('tabla2').getElementsByTagName('tbody')[0];
});

for (let i = 0; i < tb2.rows.length; i++) {
    tb2.rows[i].onclick = function() {
        TableRowClick2(this, i);
    }
}
let a1, b1, c1, del1;

function TableRowClick2(x, ii) {
    a1 = x.cells[0].innerHTML;
    b1 = x.cells[1].innerHTML;
    c1 = x.cells[2].innerHTML;
    del1 = ii;
    //alert(msg);
}
document.getElementById('btn-der').addEventListener("click", function() {
    let newrow2 = document.getElementById('tabla').getElementsByTagName('tbody')[0].insertRow();
    document.getElementById('tabla2').getElementsByTagName('tbody')[0].deleteRow(del1);
    /* newrow.innerHTML = '<tr><td>nueva compañia</td><td>nuevo contacto</td><td>nuevo pais</td>tr>'; */
    newrow2.innerHTML = `<tr><td>${a1}</td><td>${b1}</td><td>${c1}</td></tr>`;
    /* newrow2.onclick = function(){
        TableRowClick2(this);
    }; */
    tb = document.getElementById('tabla').getElementsByTagName('tbody')[0];
    tb2 = document.getElementById('tabla2').getElementsByTagName('tbody')[0];
})