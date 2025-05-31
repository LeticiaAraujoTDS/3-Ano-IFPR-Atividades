function validarCampos() {

    var titulo = document.getElementById('titulo').value;
    var autor = document.querySelector('#autor').value;
    var genero = document.getElementById('genero').value;
    var paginas = document.getElementById('paginas').value;
    var mensagem = document.getElementById('erros');
    // alert(titulo + ' - ' + autor + ' - ' + genero + ' - ' + paginas);

    erros = [];
    if (titulo == '') {
        erros.push('Informe o título!');
    }
    if (autor == '') {
        erros.push('Informe o autor!');
    }
    if (genero == '') {
        erros.push('Informe o genêro!');
    }
    if(paginas == '') {
        erros.push('Informe o número de páginas!');
    } 

    if(erros.length > 0) {
        mensagem.innerHTML = erros.join("<br>");
        mensagem.style.color = 'red';
        return false;
    }

    return true;
}