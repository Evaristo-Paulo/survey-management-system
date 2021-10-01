@extends('template')
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('survey.index') }}">Home </a><span class="iconify"
            data-icon="akar-icons:chevron-right"></span></li>
    <li><a href="javascript::void">Faça a sua votação </a></li>
</ul>
@endsection
@section('content')
<main>
    <section class="wrapper apartments n-default" id="section-highlight-apt">
        <div class="title">
            <h2>Faça a sua <span class='lost-highlight'>votação</span> </h2>
            <span class='underline'></span>
        </div>
    </section>
    <section class="wrapper" id="section-highlight-apt">
        <div class="group">
            <div class="item">
                <div class="info-item">
                    <p class="icon-question"><span class="iconify" data-icon="bi:patch-question-fill"
                            style="color: #f8a300;"></span></p>
                    <p class="enquete-title">{{ $question->question }}</p>
                    <p class="enquete-vote">{{ $question->vote }} Votos total</p>
                    <div class="vote-form">
                        <form action="{{ route('survey.vote.save', encrypt($question->id)) }}"
                            method="POST" id="vote-form">
                            {{ csrf_field() }}
                            @foreach($options as $item)
                                <div class="radio">
                                    <input type="radio" name="answers[]" id="{{ $item->id }}"
                                        value="{{ $item->id }}">
                                    <label for="{{ $item->id }}">{{ $item->option }}</label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                    @auth()
                        <div class="vote-info">
                            <a href="{{ route('survey.details', encrypt($question->id)) }}"
                                class="link text-warning"><span class="iconify" data-icon="gridicons:stats-up"></span>
                                Estatística de votação</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

    </section>

</main>
@endsection
