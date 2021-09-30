<div class="modal">
    <div class="modal-container">
        <!-- MAIN MENU -->
        <section class="modal-body" id="menu-mobile-modal">
            <article>
                <h2>Anúnciar</h2>
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
        </section>

        <!-- ANOUCEMENT SIGNIN -->
        <section class="modal-body" id="anoucement-signin-modal">
            <article>
                <h2>Entrar na plataforma</h2>
                <form action="{{ route('auth.login') }}" class="" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <input type="email" name="email" required placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required placeholder="Senha">
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
                        <input type="text" name="name" required placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="password" name="repeat" required placeholder="Repetir senha">
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
