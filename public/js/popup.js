const modal = document.querySelector(".aviso-popup");

function abrirPopup() {
    modal.classList.add('ativo');
}

function fecharPopup() {
    modal.classList.remove('ativo');
}

