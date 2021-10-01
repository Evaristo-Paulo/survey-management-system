<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('survey/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ url('survey/vendor/owl.carousel/assets/owl.carousel.min.css') }}"
        rel="stylesheet">
    <link href="{{ url('survey/vendor/aos/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('survey/style.css') }}">
    <link rel="stylesheet" href="{{ url('survey/enquete.css') }}">
    <title>
        @auth
            ({{ $global_questions->where('user_id', Auth::user()->id)->count() }})
        @endauth
        iAsk
    </title>
</head>

<body>
    <div id="container">
        @include('sweetalert::alert')
        @include('partials.nav')

        @yield('content')

        @include('partials.footer')
    </div>
    <!-- MODAL -->
    @include('partials.modal')
    
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ url('survey/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('survey/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ url('survey/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('survey/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('survey/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('survey/script.js') }}"></script>
</body>

</html>
