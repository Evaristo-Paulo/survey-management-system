@extends('template')
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('survey.index') }}">Home </a><span class="iconify"
            data-icon="akar-icons:chevron-right"></span></li>
    <li><a href="javascript::void">Registo de enquetes </a></li>
</ul>
@endsection
@section('content')
<main>
    <section class="wrapper apartments n-default" id="section-highlight-apt">
        <div class="title">
            <h2>Registo de <span class='lost-highlight'>enquetes</span> </h2>
            <span class='underline'></span>
            @if(session()->has('url') && session()->has('success'))
                <h2 class="url-title">Copia o link da pergunta anterior e compartilha com quem quiseres</h2>
                <input type="url" name="" class="url-generate" id="" value="{{ session('url') }}">
            @endif
        </div>
    </section>
    <section class="wrapper single" id="section-highlight-apt">
        <div class="getting-touch">
            <div class="form-contact">
                <article id="schedule-form">
                    <h2></h2>
                    <form action="{{ route('survey.register.save') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>Pergunta</legend>
                            <div class="form-group">
                                <textarea name="question" cols="2" placeholder="Qual é a tua pergunta?">{{ old('question') }}</textarea>
                            </div>
                        </fieldset>
                        <fieldset id="boxOptions">
                            <legend>Alternativas</legend>
                            <div id="form-group-fieldset">
                                <div class="form-group">
                                    <input type="text" name="options[]" required placeholder="1ª Alternativa">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="options[]" required placeholder="2ª Alternativa">
                                </div>
                            </div>
                        </fieldset>
                        <div class="btn-field">
                            <button type="button" id="addOption"><span class="iconify text-white"
                                    data-icon="akar-icons:plus"></span> Alternativa</button>
                            <button type="submit">Registar</button>
                        </div>
                    </form>
                </article>
                <div class="deal">
                    @include('partials.svg-register')
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
