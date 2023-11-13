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