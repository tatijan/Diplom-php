@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent

        <hr>
        <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">Создать категорию</a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>
                        @if($category->published == 0) {{'Не опубликовано'}}
                        @elseif($category->published == 1) {{'Опубликовано'}}
                        @endif
                    </td>
                    <td class="text-right">
                        <form onsubmit="if (confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.category.destroy', $category)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{ route('admin.category.edit', $category) }}"><i class="fa fa-edit"></i></a>

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
            {{ $categories->render() }}
        </table>
    </div>
@endsection
