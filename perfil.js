var currentop = 1

function changeop(n) {
    document.getElementById('p' + currentop).style.color = '#B2B2B2';
    let numero = n.replace(/p/, '');
    document.getElementById('rightdiv' + currentop).style.display = 'none';
    let newpage = n.replace(/p/, 'rightdiv');
    document.getElementById(newpage).style.display = 'flex';
    currentop = parseInt(numero);
    document.getElementById(n).style.color = '#26DD9B';
}


function validaImagem(input) {
    var caminho = input.value;

    if (caminho) {
        var comecoCaminho = (caminho.indexOf('\\') >= 0 ? caminho.lastIndexOf('\\') : caminho.lastIndexOf('/'));
        var nomeArquivo = caminho.substring(comecoCaminho);

        if (nomeArquivo.indexOf('\\') === 0 || nomeArquivo.indexOf('/') === 0) {
            nomeArquivo = nomeArquivo.substring(1);
        }

        var extensaoArquivo = nomeArquivo.indexOf('.') < 1 ? '' : nomeArquivo.split('.').pop();

        if (extensaoArquivo != 'gif' &&
            extensaoArquivo != 'png' &&
            extensaoArquivo != 'jpg' &&
            extensaoArquivo != 'jpeg') {
            input.value = '';
            alert("É preciso selecionar um arquivo de imagem (gif, png, jpg ou jpeg)");
        }
    } else {
        input.value = '';
        alert("Selecione um caminho de arquivo válido");
    }
    if (input.files && input.files[0]) {
        var arquivoTam = input.files[0].size / 1024 / 1024;
        if (arquivoTam < 16) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagemSelecionada').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            input.value = '';
            alert("O arquivo precisa ser uma imagem com menos de 16 MB");
        }
    } else{
        document.getElementById('imagemSelecionada').setAttribute('src', '#');
    }
}


function redirect(where) {
    window.location.href = where
}

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
  