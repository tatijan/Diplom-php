@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание вопроса @endslot
            @slot('parent') Главная @endslot
            @slot('active') Вопросы @endslot
        @endcomponent
        <hr />

        <form class="form-horizontal" action="{{route('admin.question.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.questions.partials.form')
        </form>
    </div>
@endsection