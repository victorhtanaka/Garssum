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

function readURL(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
  
      reader.onload = function (e) {
        const bannerImg = document.getElementById('bannerImg');
        bannerImg.src = e.target.result;
      };
  
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  function readURL1(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
  
      reader.onload = function (e) {
        const bannerImg = document.getElementById('profileImg');
        bannerImg.src = e.target.result;
      };
  
      reader.readAsDataURL(input.files[0]);
    }
  }
  