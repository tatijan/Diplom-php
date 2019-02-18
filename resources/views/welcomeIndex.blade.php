<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Resource style -->
    <script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
    <title>FAQ</title>

</head>
<body>
<header>
    <h1>Топ вопросов!</h1>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href="#form">Задать вопрос</a>
            <a href="{{ url('/admin') }}">Я админ</a>
        </div>
    </div>
</header>

<section class="cd-faq" id="top">
    <ul class="cd-faq-categories">
        @foreach ($categories as $category)
            <li><a href="#{{ $category->id }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>

    <div class="cd-faq-items">
        @foreach ($categories as $category)
            <ul id="{{ $category->id }}" class="cd-faq-group">
                <li class="cd-faq-title"><h2>{{ $category->title }}</h2></li>

                @foreach ($questions as $question)
                    @if($question->category_id == $category->id)
                        <li>
                            <a class="cd-faq-trigger" href="#0"><p><h4>{{ $question->name }}</h4></p>{{ $question->description }}</a>

                            <div class="cd-faq-content">
                                <p>{{ $question->answer }}</p>
                            </div>
                        </li>
                    @endif
                @endforeach

            </ul>
        @endforeach
    </div>
    <a href="#0" class="cd-close-panel">Close</a>

    <div class="cd-faq-items">
        <h2></h2>
        <form id="form" class="form-horizontal" action="{{route('site')}}" method="post">
            <fieldset class="form">
                <legend><h1>Введите свой вопрос вопрос</h1></legend>

                {{-- Form include --}}
                @include('partials.form')
                {{ csrf_field() }}
            </fieldset>
        </form>
    </div>

</section>

<footer>
    <div class="footer">
        <a href="#top">В начало</a>
    </div>
</footer>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>