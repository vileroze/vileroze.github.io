const btn = document.querySelector("#top");

window.addEventListener("scroll", scrollFunction);

function scrollFunction(){
    if (window.pageYOffset > 100){
        btn.style.display = "block";
    }
    else{
        btn.style.display = "none";
    }
}




/* toggler*/
const btn2 = document.querySelector("#nightMode");
var heading = document.querySelectorAll("h1");
const body = document.querySelector("body");
btn2.onclick = function()
{
    const btnClass = btn2.getAttribute('class');
    if ( btnClass === 'night'){
        btn2.setAttribute('class', 'day');
        btn2.textContent = 'day mode';
        body.style.backgroundColor = "black";
        body.style.color = "yellow";
    }
    else{
        btn2.setAttribute('class', 'night');
        btn2.textContent = 'night mode';
        body.style.backgroundColor = "white";
        body.style.color = "red";
    }
}