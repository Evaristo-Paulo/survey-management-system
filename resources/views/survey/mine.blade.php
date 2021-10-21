@extends('template')
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('survey.index') }}">Home </a><span class="iconify"
            data-icon="akar-icons:chevron-right"></span></li>
    <li><a href="javascript::void">Minhas enquetes </a></li>
</ul>
@endsection
@section('content')
<main>
    <section class="wrapper apartments n-default" id="section-highlight-apt">
        <div class="title">
            <h2>Minhas <span class='lost-highlight'>enquetes</span> </h2>
            <span class='underline'></span>
        </div>
    </section>
    <section class="wrapper" id="section-highlight-apt">
        <div class="group">
            @forelse($questions as $item)
                <x-survey :item="$item" />
            @empty
                <p style="font-size: 1.2rem; text-align: center">Não há enquetes registadas</p>
            @endforelse
        </div>
        {{ $questions->links() }}
    </section>

</main>
@endsection
