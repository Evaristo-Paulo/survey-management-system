@extends('template')
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('survey.index') }}">Home </a><span class="iconify"
            data-icon="akar-icons:chevron-right"></span></li>
    <li><a href="javascript::void">Actualização de enquetes </a></li>
</ul>
@endsection
@section('content')
<main>
    <section class="wrapper apartments n-default" id="section-highlight-apt">
        <div class="title">
            <h2>Actualização de <span class='lost-highlight'>enquete</span> </h2>
            <span class='underline'></span>
        </div>
    </section>
    <section class="wrapper">
        <div class="group">
            <div class="item enquete-edit">
                <form action="{{ route('survey.update', encrypt($question->id)) }}"
                    method="POST">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <fieldset>
                        <legend>Pergunta</legend>
                        <div class="form-group">
                            <textarea name="question" cols="2"
                                placeholder="Qual é a sua pergunta?">{{ $question->question }}</textarea>
                        </div>
                    </fieldset>
                    <fieldset id="boxOptions">
                        <legend>Alternativas</legend>
                        <div id="form-group-fieldset">
                            @foreach($options as $index => $item)
                                <div class="form-group">
                                    <input type="text" name="oldoptions[]" value="{{ $item->option }}" required
                                        placeholder="{{ $index + 1 }}ª Alternativa">
                                    @if( $index  != 0 && $index  != 1 )
                                        <a href="{{ route('survey.option.delete', encrypt($item->id)) }}"
                                            class="text-danger link"><span class="iconify"
                                                data-icon="iwwa:delete"></span></a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                    <div class="btn-field">
                        <button type="button" id="addOption"><span class="iconify text-white"
                                data-icon="akar-icons:plus"></span> Alternativa</button>
                        <button type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
