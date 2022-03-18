document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems,{
        coverTrigger: false,
        constrainWidth: false
    });
    let elems2 = document.querySelectorAll('.carousel');
    let instances2 = M.Carousel.init(elems2, {
        indicators: true,
        duration: 100
    });
});

function iniciarMap(){
    let coord = {lat: 3.4743554,lng:-76.5118369};
    // let coord2 = {lat: 3.471992, lng:-76.5117772};

    // const image =
    // "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

    let map = new google.maps.Map(document.getElementById("map"),{
        zoom:15,
        center: coord
    });
    let marker = new google.maps.Marker({
        position: coord,
        map: map,
        title: `<h2>Hola mundo</h2>`
    })
    // let marker2 = new google.maps.Marker({
    //     position: coord2,
    //     map: map,
    //     title: "Hello world",
    //     icon: image
    // })
}