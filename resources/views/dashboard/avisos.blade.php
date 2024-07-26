<div class="avisos">
    @foreach ($conteudo["posts"] as $post)
    <div class="aviso-content">
        <div class="aviso-imagem">
            <img src="img/aviso-banner.jpg" alt="" />
        </div>
        <div class="aviso-texto">
            <h6 class="aviso-titulo">{{ $post->titulo }}</h6>
        </div>
        <button class="abrir-popup">Mostrar</button>

        <div class="aviso-popup">
            <div class="popup-content">
                <p>{!! nl2br(e($post->conteudo)) !!}</p>
                <button class="fechar-popup">Fechar</button>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        const abrirPopupBtns = document.querySelectorAll(".abrir-popup");
        const fecharPopupBtns = document.querySelectorAll(".fechar-popup");

        abrirPopupBtns.forEach(abrirBtn => {
            abrirBtn.addEventListener('click', () => {
                const popup = abrirBtn.nextElementSibling;
                popup.classList.add('ativo');
            });
        });

        fecharPopupBtns.forEach(fecharBtn => {
            fecharBtn.addEventListener('click', () => {
                const popup = fecharBtn.parentElement.parentElement;
                popup.classList.remove('ativo');
            });
        });
    </script>
</div>

