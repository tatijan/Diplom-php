@foreach ($categoriesAll as $category)
    <option  value="{{$category->id or ""}}" required>
        {!! $delimiter or "" !!}{{$category->title or ""}}
    </option>
@endforeach 