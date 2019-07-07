@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{route('admin.category.index')}}">Создать категорию</a>
                <a class="list-group-item" href="{{route('admin.category.index')}}">
                    <h4 class="list-group-item-heading">Создано категорий - {{$categories->count()}}</h4>
                </a>

                @foreach($categories as $category)
                    <form class="form-horizontal" action="{{route('admin.questions.show')}}" method="post">
                        <input type="hidden" name="category" value="{{$category->id}}">
                        <input type="hidden" name="categoryTitle" value="{{$category->title}}">
                        {{ csrf_field() }}
                        <input class="show" style="width: 100%; text-align: left; font-style: italic;" type="submit" name="" value="{{$category->title}} - {{$category->questions->count()}} вопр.">
                    </form>

                    <p style="font-size: 13px; margin: 5px 0 10px 15px;" class="text">
                        Опубликовано - {{$category->questions->where('published', '=', 1)->count()}} /
                        Ждут ответа - {{$category->questions->where('published', '=', 0)->count()}} /
                        Скрыто - {{$category->questions->where('published', '=', 2)->count()}}
                    </p>

                @endforeach
            </div>

            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{route('admin.question.index')}}">Создать вопрос</a>
                <a class="list-group-item" href="{{route('admin.questions.showAllNullAnswer')}}">
                    <h4 class="list-group-item-heading">Вопросы без ответов - {{$countNull}}</h4>
                </a>

                @foreach($categories as $category)
                    <form class="form-horizontal" action="{{route('admin.questions.showNullAnswer')}}" method="post">
                        <input type="hidden" name="category" value="{{$category->id}}">
                        <input type="hidden" name="categoryTitle" value="{{$category->title}}">
                        {{ csrf_field() }}
                        <input class="show" style="width: 100%; text-align: left; font-style: italic;" type="submit" name="" value="{{$category->title}}">

                    </form>
                    <p style="font-size: 13px; margin: 5px 0 10px 15px;" class="text">
                        Ждут ответа - {{$category->questions->where('published', '=', 0)->count()}}
                    </p>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Стоп-слова
                        </div>

                        <form id="form-add-stop-words" class="form-horizontal">
                        {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="col-lg-10 input-group">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                    <span class="input-group-btn">
                                        <button id="addStopWord" class="btn btn-default">
                                            <i class="fa fa-plus"></i> Добавить стоп-слово
                                        </button>
                                    </span>
                                </div>
                                <div class="col-sm-offset-3 col-sm-6">

                                </div>
                            </div>
                        </form>
                        <div class="panel-body">
                            <table id="stop-words" class="table table-striped task-table">
                                <tbody>
                                @forelse ($stopWords as $stopWord)
                                    <tr data-id="{{$stopWord->id}}">
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $stopWord->name }}</div>
                                        </td>

                                        <td>
                                            <button class="deleteStopWord btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr id="stop-word-no-data">
                                        <td colspan="3" class="text-center"><h2>Данных нет</h2></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Заблокированные вопросы
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">

                            <thead>
                            <th class="w25">Вопрос</th>
                            <th class="w15">Категория</th>
                            <th class="w15">Стоп-слова</th>
                            <th class="text-right">Действие</th>
                            </thead>
                            <tbody>


                            @forelse ($blocked as $question)
                                <tr data-id="{{$question->id}}">
                                    <td class="border">{{$question->description}}</td>
                                    <td class="border">{{$question->category->title}}</td>
                                    <td class="border col-lg-6">
                                        @php
                                        $stopWordIds = \App\QuestionStopWords::where('question_id', '=', $question->id)->pluck('stop_word_id')->toArray();
                                        $stopWords = \App\StopWord::find($stopWordIds)->pluck('name')->toArray();
                                            echo implode(', ', $stopWords)
                                        @endphp
                                    </td>
                                    <td class="text-center border">
                                        <form id="form-blocked-questions" class="col-lg-2">
                                            {{ csrf_field() }}
                                            <button class="unblockQuestion btn btn-default"><i class="fa fa-unlock"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"><h2>Данных нет</h2></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
