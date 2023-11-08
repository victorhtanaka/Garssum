var currentop = 1

function changeop(n) {
    document.getElementById('p' + currentop).style.color = '#B2B2B2';
    let numero = n.replace(/p/, '');
    document.getElementById('rightdiv' + currentop).style.display = 'none';
    let newpage = n.replace(/p/, 'rightdiv');
    document.getElementById(newpage).style.display = 'flex';
    currentop = parseInt(numero);
    document.getElementById(n).style.color = '#26DD9B';
    console.log(currentop)
}

if (currentop !== 1) { 
    document.getElementById("body1").style.overflow = "hidden";
} else {
    document.getElementById("body1").style.overflow = "scroll";
}