<button id="go-up"><span class="iconify" data-icon="bx:bx-chevron-up"></span></button>
<div class="detail">
    <div class="contact">
        <p>
            <span class="iconify" data-icon="carbon:phone" style="color: rgba(255, 255, 255, 0.856);"></span>
            <span class="info">(+244) 940-570-866</span>
        </p>
        <p>
            <span class="iconify" data-icon="carbon:email" style="color: rgba(255, 255, 255, 0.856);"></span>
            <span class="info">suporte@iask.com</span>
        </p>
    </div>
    <div class="user">
        <p>
            @auth()
                <a href="javascript::void" style="color: rgba(255, 255, 255, 0.856);"><span
                        class="info">{{ Auth::user()->name }}</span></a>
            @else
                <a href="javascript::void" class="anoucement-signin-button"
                    style="color: rgba(255, 255, 255, 0.856);"><span class="info">Faça o seu
                        login</span></a>
            @endauth
            <a href="javascript::void"><span class="iconify" data-icon="clarity:user-line"
                    style="font-size: 1.1rem; color: rgba(255, 255, 255, 0.856);"></span></a>
        </p>
    </div>
</div>
<header class="m-pages">
    <nav id="nav">
        <div class="up">
            <a class="logo" href="{{ route('survey.index') }}">
                iAsk
            </a>
            <div class="inner-nav">
                @auth()
                <ul class="nav-item-main">
                    <li id="section-home"><a href="{{ route('survey.index') }}">Home</a></li>
                    <li><a href="{{ route('survey.mine') }}">Minhas enquetes</a></li>
                    <li><a href="{{ route('survey.register.form') }}">Registo de enquetes</a></li>
                </ul>
                @endauth
                <ul id="create-anoucement">
                    @auth()
                        <li>
                            <a class="highlight" href="{{ route('auth.logout') }}"
                                style="display: flex;pointer-events: all; justify-content: space-between; align-items: center;">Sair
                                <span class="iconify" data-icon="ant-design:arrow-right-outlined"
                                    style="color: white; margin-left: 5px"></span></a>
                        </li>
                    @else
                        <li>
                            <a class="highlight" href="javascript:void"
                                style="display: flex;pointer-events: all; justify-content: space-between; align-items: center;">Criar
                                enquetes
                                <span class="iconify" data-icon="ant-design:arrow-right-outlined"
                                    style="color: white; margin-left: 5px"></span></a>
                        </li>
                        <li id="authenticate">
                            <ul class="dropdown">
                                <li><a href="javascript:void" class="anoucement-signin-button"
                                        style="display: flex; justify-content: flex-start; align-items: center;"><span
                                            class="iconify" data-icon="clarity:login-line"
                                            style="color: #A96262; margin-right: 5px;"></span>Entrar</a></li>
                                <li><a href="javascript:void" class="anoucement-signup-button"
                                        style="display: flex; justify-content: flex-start; align-items: center;"><span
                                            class="iconify" data-icon="gridicons:create"
                                            style="color: #A96262; margin-right: 5px"></span>Criar conta</a></li>
                            </ul>
                        </li>
                    @endauth
                </ul>
                <div class="close highlight" id="menu-mobile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="11">
                        <g fill="#fff" fill-rule="evenodd">
                            <path d="M0 0h24v1H0zM0 5h24v1H0zM0 10h24v1H0z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <div class="middle">
            <article id="banner-carrossel">
                <ul class="banner-carrossel-body">
                    <h2 class="banner-title-carrossel">Gerencia aqui os seus enquetes</h2>
                    <li class="active-carrossel"><img src='{{ url('survey/banner1.jpg') }}' /></li>
                    <li><img src='{{ url('survey/banner2.jpg') }}' /></li>
                    <li><img src='{{ url('survey/banner3.jpg') }}' /></li>
                </ul>
            </article>
        </div>
        <div class="down">
            @yield('breadcrumb')
            <article class="social-media">
                <h2 class="title-social-media">Redes sociais: </h2>
                <ul>
                    <li><a href="https://www.facebook.com/evaristodomingospaulo.evaristo" target="_blank"><span
                                class="iconify" data-icon="brandico:facebook"></span></a>
                    </li>
                    <li><a href="https://www.instagram.com/evaristo_tgm/" target="_blank"><span class="iconify"
                                data-icon="akar-icons:instagram-fill"></span></a></li>
                </ul>
            </article>
        </div>
    </nav>
</header>
