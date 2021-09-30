<div class="modal n-regular">
    <div class="modal-container">
        <!-- MAIN MENU -->
        <section class="modal-body" id="menu-mobile-modal">
            @auth()
                <article>
                    <h2>Menu</h2>
                    <ul>
                        <li><a style="display: flex; justify-content: flex-start; align-items: center;"
                                href="{{ route('survey.index') }}"><span class="iconify"
                                    data-icon="ci:home-alt-check"></span>Home</a>
                        </li>
                        <li><a style="display: flex; justify-content: flex-start; align-items: center;"
                                href="{{ route('survey.mine') }}"><span class="iconify"
                                    data-icon="icon-park-outline:doc-success"></span>Minhas enquetes</a>
                        </li>
                        <li><a style="display: flex; justify-content: flex-start; align-items: center;"
                                href="{{ route('survey.register.form') }}"><span class="iconify"
                                    data-icon="icon-park-outline:doc-add"></span>Registo de enquetes</a></li>
                        <li><a style="display: flex; justify-content: flex-start; align-items: center;"
                                href="{{ route('auth.logout') }}"><span class="iconify"
                                    data-icon="ant-design:logout-outlined"></span>Sair</a></li>
                    </ul>
                </article>
            @else
                <article>
                    <h2>Criar enquete</h2>
                    <ul>
                        <li><a href="javascript:void" class="anoucement-signin-button"
                                style="display: flex; justify-content: flex-start; align-items: center;"><span
                                    class="iconify" data-icon="clarity:login-line"></span>Entrar</a>
                        </li>
                        <li><a href="javascript:void" class="anoucement-signup-button"
                                style="display: flex; justify-content: flex-start; align-items: center;"><span
                                    class="iconify" data-icon="gridicons:create"></span>Criar conta</a>
                        </li>
                    </ul>
                </article>
            @endauth
        </section>

        <!-- ANOUCEMENT SIGNIN -->
        <section class="modal-body" id="anoucement-signin-modal">
            <article>
                <h2>Entrar na plataforma</h2>
                <form action="{{ route('auth.login') }}" class="" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" required
                            placeholder="E-mail">
                        @if($errors->has('email'))
                            <span class="text-danger-error" style="font-size: .9rem">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="{{ old('password') }}" required
                            placeholder="Senha">
                        @if($errors->has('password'))
                            <span class="text-danger-error" style="font-size: .9rem">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <a href="javascript:void" class="anoucement-signup-button">Não tem uma conta?</a>
                    <div class="btn-field">
                        <button>Entrar</button>
                    </div>
                </form>
            </article>
        </section>

        <!-- ANOUCEMENT SIGNIN -->
        <section class="modal-body" id="anoucement-signup-modal">
            <article>
                <h2>Criar conta na plataforma</h2>
                <form action="{{ route('user.register.save') }}" class="" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" required
                            placeholder="Nome completo">
                        @if($errors->has('name'))
                            <span class="text-danger-error">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" required
                            placeholder="E-mail">
                        @if($errors->has('email'))
                            <span class="text-danger-error">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="{{ old('password') }}" required
                            placeholder="Senha">
                        @if($errors->has('password'))
                            <span class="text-danger-error">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="repeat" value="{{ old('repeat') }}" required
                            placeholder="Repetir senha">
                        @if($errors->has('repeat'))
                            <span class="text-danger-error">
                                {{ $errors->first('repeat') }}
                            </span>
                        @endif
                    </div>
                    <div class="btn-field">
                        <button type="submit">Criar</button>
                    </div>
                </form>
            </article>
        </section>

        <p class="modal-close"><span class="iconify" data-icon="ei:close"></span>
        </p>
    </div>
</div>
