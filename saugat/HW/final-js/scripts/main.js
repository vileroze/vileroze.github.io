const btn = document.querySelector("#topBtn");

window.addEventListener("scroll", scrollFunction);

function scrollFunction(){
    if (window.pageYOffset > 100){
        btn.style.display = "block";
    }
    else{
        btn.style.display = "none";
    }
}

btn.addEventListener("click", backToTop);

function backToTop(){
    window.scrollTo(0,0);
}

const body = document.querySelector("body");
const day = document.querySelector('#day');
day.onclick = function() {
    body.style.backgroundColor = "white";
    body.style.color = "black"
}

const night = document.querySelector('#night');
night.onclick = function() {
    body.style.backgroundColor = '#203A43';
    body.style.color = 'white';
}