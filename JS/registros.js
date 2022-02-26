document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems,{
        coverTrigger: false,
        constrainWidth: false
    });

    var elems2 = document.querySelectorAll('.modal');
    var instances2 = M.Modal.init(elems2, {});
});

const registros = document.getElementById("registros");

registros.addEventListener('click', e => {
    cambiarBoton(e);
})

const cambiarBoton = e => {
    const boton = document.getElementById(e.target.id);
    if(e.target.classList.contains("green") && e.target.id[0] === "d"){
        boton.classList.remove("green");
        boton.classList.add("red");
        boton.innerHTML = "NO DISPONIBLE";
    } else if(e.target.classList.contains("red") && e.target.id[0] === "d"){
        boton.classList.remove("red");
        boton.classList.add("green");
        boton.innerHTML = "DISPONIBLE";
    } else if(e.target.id[0]==="e"){
        const id = document.getElementById(`r-${e.target.id[e.target.id.length-1]}`);
        const modal = document.getElementById("modal-e");
        modal.innerHTML = `Desea eliminar el registro ${id.innerHTML}`;
    }
}