document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems,{
        coverTrigger: false,
        constrainWidth: false
    });
});

const registros = document.getElementById("registros");

registros.addEventListener('click', e => {
    cambiarBoton(e);
})

const cambiarBoton = e => {
    const boton = document.getElementById(e.target.id);
    if(e.target.classList.contains("green")){
        boton.classList.remove("green");
        boton.classList.add("red");
        boton.innerHTML = "NO DISPONIBLE";
    } else if(e.target.classList.contains("red")){
        boton.classList.remove("red");
        boton.classList.add("green");
        boton.innerHTML = "DISPONIBLE";
    }
}