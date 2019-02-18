@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
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
                            Опубликовано - {{$category->questions->where('published', 1)->count()}} /
                            Ждут ответа - {{$category->questions->where('published', 0)->count()}} /
                            Скрыто - {{$category->questions->where('published', 2)->count()}}
                        </p>

                        </a>
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
                            Ждут ответа - {{$category->questions->where('published', 0)->count()}}
                        </p>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection