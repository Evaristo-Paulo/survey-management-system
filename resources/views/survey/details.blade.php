@extends('template')
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('survey.index') }}">Home </a><span class="iconify"
            data-icon="akar-icons:chevron-right"></span></li>
    <li><a href="javascript::void">Detalhes sobre a enquete </a></li>
</ul>
@endsection
@section('content')
<main>
    <section class="wrapper apartments n-default" id="section-highlight-apt">
        <div class="title">
            <h2>Detalhes sobre a <span class='lost-highlight'>enquete</span> </h2>
            <span class='underline'></span>
        </div>
    </section>
    <section class="wrapper" id="section-highlight-apt">
        <div class="group">
            <div class="item">
                <div class="info-item">
                    <p class="icon-question"><span class="iconify" data-icon="gridicons:stats-up"
                            style="color: #f8a300;"></span></p>
                    <p class="enquete-title">{{ $question->question }}</p>
                    <p class="enquete-vote">URL da pergunta</p>
                    <p><input type="url" name="" class="url-generate url-details" id=""
                            value="{{  $question->url }}"></p>
                    <p class="enquete-vote">{{ $question->vote }} Votos total</p>
                    <ul id="options">
                        @foreach($options as $item)
                            <li class="options-item">
                                <ul>
                                    <li class="progress-bar-title">
                                        <div class="bar-title">
                                            {{ $item['option'] }}
                                        </div>
                                        <div class="number-vote">
                                            @if($item['vote'] == 0 || $item['vote'] == 1)
                                                {{ $item['vote'] }} Voto
                                            @else
                                                {{ $item['vote'] }} Votos
                                            @endif
                                        </div>
                                    </li>
                                    <li class="progress-bar">
                                        <div class="bar">
                                            <div class="inner" data-vote="{{ $item['percentage'] }}"></div>
                                        </div>
                                        <div class="number-vote">{{ $item['percentage'] }}%</div>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                    @auth
                    <div class="icon-info">
                        <a href="{{ route('survey.edit.form', encrypt($question->id) ) }}"
                            class="link text-warning"><span class="iconify text-dark"
                                data-icon="akar-icons:edit"></span> Editar</a>
                        <form action="{{ route('survey.delete') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <input type="hidden" name="id" value="{{ $question->id }}">
                            <button type="submit" class="link text-danger"><span class="iconify"
                                    data-icon="codicon:trash"></span> Excluir</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>

            <div class="graphic">
                <div id="detail-graphic"></div>
            </div>

            <input type="hidden" id='data_graphic'  value="{{ $data }}">
            <input type="hidden" id='question'  value="{{ $question->question }}">
        </div>
    </section>

</main>
@endsection

@push('js')
<script src="{{ url('graphic/highcharts.js') }}"></script>
<script src="{{ url('graphic/highcharts-3d.js') }}"></script>
<script src="{{ url('graphic/modules/series-label.js') }}"></script>
<script src="{{ url('graphic/modules/exporting.js') }}"></script>
<script src="{{ url('graphic/modules/export-data.js') }}"></script>
<script src="{{ url('graphic/modules/cylinder.js') }}"></script>
<script src="{{ url('graphic/all-graphic.js') }}"></script>
@endpush
