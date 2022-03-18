const contenido = document.getElementById("contenido");
const tablaCont = document.getElementById("tabla-registros").content;
const fragment = document.createDocumentFragment();
const mapaPrueba = document.getElementById("map1");

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems,{
        coverTrigger: false,
        constrainWidth: false
    });

    var elems2 = document.querySelectorAll('.modal');
    var instances2 = M.Modal.init(elems2, {});
});

function iniciarMap(){
    let coord = {lat: 3.4743554,lng:-76.5118369};
    let map = new google.maps.Map(document.getElementById("map1"),{
        zoom:15,
        center: coord
    });
    let marker = new google.maps.Marker({
        position: coord,
        map: map,
        title: `<h2>Hola mundo</h2>`
    })
}

const btnCambio = document.getElementById("btn-cambio");
if(btnCambio.innerHTML.trim() == "ver mapa"){
    mapaPrueba.style.display = "none";
    const cloneTabla = tablaCont.cloneNode(true);
    fragment.appendChild(cloneTabla);
    contenido.appendChild(fragment);
}

btnCambio.addEventListener('click', e => {
    alternar(e);
})

const alternar = e => {
    if(e.target.classList.contains("r-tabla")){
        btnCambio.innerHTML = "ver mapa";
        btnCambio.classList.remove("r-tabla");
        btnCambio.classList.add("r-mapa");

        mapaPrueba.style.display = "none";
        const cloneTabla = tablaCont.cloneNode(true);
        fragment.appendChild(cloneTabla);
        contenido.appendChild(fragment);
    } else if(e.target.classList.contains("r-mapa")){
        btnCambio.innerHTML = "ver tabla";
        btnCambio.classList.remove("r-mapa");
        btnCambio.classList.add("r-tabla");

        const registros = document.getElementById("registros");
        contenido.removeChild(registros);
        mapaPrueba.style.display = "";
    }
}

contenido.addEventListener('click', e => {
    obtenerId(e);
})

const obtenerId = e => {
    if(e.target.classList.contains("material-icons")){
        const inputId = document.getElementById("info-id");
        inputId.value = e.target.id;
    }
}