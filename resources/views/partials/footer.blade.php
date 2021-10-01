<footer>
    <section class="get-to-know">
        <article class="about-us" id="section-about">
            <a class="logo" href="{{ route('survey.index') }}">
                iAsk
            </a>
            <p><span class="underline"></span></p>
            <p><span style="font-weight: 600; font-style: italic;">iAsk</span> é uma plataforma online para
                gerenciamento de enquetes, que visa extrair dados
                específicos de um determinado grupo de pessoas, em forma de perguntas e respostas diretas.</p>
            <div class="contact">
                <p>
                    <span class="iconify" data-icon="carbon:phone" style="color: white;"></span> <span
                        class="info">(+244) 940-570-866</span>
                </p>
                <p>
                    <span class="iconify" data-icon="carbon:email" style="color: white;"></span> <span
                        class="info">suporte@iask.com</span>
                </p>
            </div>
        </article>
    </section>
    <section class="links">
        <div class="quick-link">
            <h2>Acesso rápido</h2>
            <p><span class="underline"></span></p>
            <ul>
                <li><a href="{{ route('survey.index') }}">Home</a></li>
                @auth()
                    <li><a href="javascript::void" class="anoucement-signin-button">Minhas enquetes</a></li>
                    <li><a href="javascript::void" class="anoucement-signin-button">Registo de enquetes</a></li>
                @else
                    <li><a href="javascript::void" class="anoucement-signin-button">Criar enquetes</a></li>
                @endauth
            </ul>
        </div>
        <div class="important-link">
            <h2>Links importantes</h2>
            <p><span class="underline"></span></p>
            <ul>
                <li><a href="javascript::void">Políticas de privacidade</a></li>
                <li><a href="javascript::void">Termo de responsabilidade</a></li>
                <li><a href="javascript::void">FAQ's</a></li>
            </ul>
        </div>

        <article class="social-media">
            <h2>Redes sociais</h2>
            <p><span class="underline"></span></p>
            <ul>
                <li><a href="https://www.facebook.com/evaristodomingospaulo.evaristo" target="_blank"><span class="iconify" data-icon="brandico:facebook"></span></a>
                </li>
                <li><a href="https://www.instagram.com/evaristo_tgm/" target="_blank"><span class="iconify"  data-icon="akar-icons:instagram-fill"></span></a>
                </li>
            </ul>
        </article>
    </section>
    <p class="copyright">&copy; evaripaulo <span id="year"></span> - todos os direitos reservados</p>
</footer>
