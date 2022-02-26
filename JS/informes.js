document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems,{
        coverTrigger: false,
        constrainWidth: false
    });
    var elems2 = document.querySelectorAll('.modal');
    var instances2 = M.Modal.init(elems2, {});
})

const informes = document.getElementById("informes");

informes.addEventListener('click', e => {
    eliminar(e);
})

const eliminar = e => {
    if(e.target.id[0]==="e"){
        const id = document.getElementById(`r-${e.target.id[e.target.id.length-1]}`);
        const modal = document.getElementById("modal-e");
        modal.innerHTML = `Desea eliminar el informe ${id.innerHTML}`;
    }
}