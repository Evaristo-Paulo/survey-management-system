@extends('template')
@section('content')
<main>
    <section class="wrapper single" id="section-highlight-apt" data-aos="fade-up" data-aos-delay="200">
        <div class="title">
            <h2>Registo de <span class='lost-highlight'>enquetes</span> </h2>
            <span class='underline'></span>
            @if(session('url'))
                <h2 class="url-title">Copiar link de compartilhamento</h2>
                <input type="url" name="" class="url-generate" id="" value="{{ session('url') }}">
            @endif
        </div>
        <div class="getting-touch">
            <div class="form-contact">
                <article id="schedule-form">
                    <h2></h2>
                    <form action="{{ route('survey.register.save') }}" method="POST">
                        {{ csrf_field() }}

                        <fieldset>
                            <legend>Pergunta</legend>
                            <div class="form-group">
                                <textarea name="question" cols="2"
                                    placeholder="Qual é a sua pergunta?">{{ old('question') }}</textarea>
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
