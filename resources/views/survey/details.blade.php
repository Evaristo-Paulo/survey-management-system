@extends('template')
@section('content')
<main>
    <section class="wrapper" id="section-highlight-apt" data-aos="fade-up" data-aos-delay="200">
        <div class="title">
            <h2>Detalhes sobre a <span class='lost-highlight'>enquete</span> </h2>
            <span class='underline'></span>
        </div>
        <div class="group">
            <div class="item">
                <div class="info-item">
                    <p class="icon-question"><span class="iconify" data-icon="gridicons:stats-up"
                            style="color: #f8a300;"></span></p>
                    <p class="enquete-title">{{ $question->question }}</p>
                    <p class="enquete-vote">{{ $question->vote }} Votos total</p>
                    <ul id="options">
                        @foreach($options as $item)
                            <li class="options-item">
                                <ul>
                                    <li class="progress-bar-title">
                                        <div class="bar-title">
                                            {{ $item->option }}
                                        </div>
                                        <div class="number-vote">
                                            @if($item->vote == 0)
                                            {{ $item->vote }} Voto
                                            @else
                                            {{ $item->vote }} Votos
                                            @endif 
                                        </div>
                                    </li>
                                    <li class="progress-bar">
                                        <div class="bar">
                                            <div class="inner" data-vote="{{ $item->vote }}"></div>
                                        </div>
                                        <div class="number-vote">{{ $item->vote }}%</div>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                    <div class="icon-info">
                        <a href="{{ route('survey.edit.form', encrypt($question->id) ) }}" class="link text-warning"><span class="iconify text-dark"
                                data-icon="akar-icons:edit"></span> Editar</a>
                        <form action="{{ route('survey.delete') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <input type="hidden" name="id" value="{{ $question->id }}">
                            <button type="submit" class="link text-danger"><span class="iconify" data-icon="codicon:trash"></span> Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
