import './bootstrap';

//Para confirmar la eliminación de usuario
// $(document).on("click",".coonfirmDelete", function(){
//     alert("test");
//     return false;
// });

function currentTime() {
    let date = new Date();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();

    // Convertir a formato de 12 horas
    let ampm = (hh >= 12) ? 'PM' : 'AM';
    hh = (hh % 12) || 12;

    hh = (hh < 10) ? "0" + hh : hh;
    mm = (mm < 10) ? "0" + mm : mm;
    ss = (ss < 10) ? "0" + ss : ss;

    let time = hh + ":" + mm + ":" + ss + " " + ampm;
    let watch = document.querySelector('#watch');
    watch.innerHTML = time;
}

setInterval(currentTime, 1000);