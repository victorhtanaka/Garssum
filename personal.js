var currentop = 1

function changeop(n) {
    document.getElementById('p' + currentop).style.color = '#B2B2B2';
    let numero = n.replace(/p/, '');
    currentop = parseInt(numero);
    document.getElementById(n).style.color = '#26DD9B';
}