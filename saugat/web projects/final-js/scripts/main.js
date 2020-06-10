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
const btn = document.querySelector("button");
const heading = document.querySelector("h1");
const body = document.querySelector("body");
btn.onclick = function()
{
    const btnClass = btn.getAttribute('class');
    if ( btnClass === 'nightMode'){
        btn.setAttribute('class', 'dayMode');
        btn.textContent = 'day mode';
        body.style.backgroundColor = "black";
        heading.style.color = "yellow";
    }
    else{
        btn.setAttribute('class', 'nightMode');
        btn.textContent = 'night mode';
        body.style.backgroundColor = "white";
        heading.style.color = "red";
    }
}