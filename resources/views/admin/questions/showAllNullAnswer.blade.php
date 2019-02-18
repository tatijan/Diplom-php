@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список вопросов без ответов @endslot
            @slot('parent') Главная @endslot
            @slot('active') Вопросы без ответов  @endslot
        @endcomponent

        <hr>
        <a href="{{route('admin.question.create')}}" class="btn btn-primary pull-right">Создать вопрос</a>
        <table class="table table-striped">
            <thead>
            <th class="w5">Имя</th>
            <th class="w15">Email</th>
            <th class="w25">Вопрос</th>
            <th class="w25">Ответ</th>
            <th class="w15">Статус</th>
            <th class="w15">Категория</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>


            @forelse ($questions as $question)
                <tr>
                    <td class="border">{{$question->name}}</td>
                    <td class="border">{{$question->email}}</td>
                    <td class="border">{{$question->description}}</td>
                    <td class="border">{{$question->answer}}</td>
                    <td class="border">
                        @if($question->published == 0) {{'Не опубликовано'}}
                        @elseif($question->published == 1) {{'Опубликовано'}}
                        @elseif($question->published == 2) {{'Скрыто'}}
                        @endif
                    </td>
                    <td class="border">{{$question->category->title}}</td>
                    <td class="text-center border">
                        <form onsubmit="if (confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.question.destroy', $question)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{ route('admin.question.edit', $question) }}"><i class="fa fa-edit"></i></a>

                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данных нет</h2></td>
                </tr>
            @endforelse
            </tbody>
            {{ $questions->render() }}
        </table>

    </div>
@endsection