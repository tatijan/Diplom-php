
@foreach ($categories as $category)

    @if (isset($question->category->id))
        <option value="{{$category->id or ""}}" @if ($question->category->id == $category->id) selected="" @endif>{{$category->title or ""}}</option>
    @else
        <option  value="{{$category->id or ""}}" >
            {!! $delimiter or "" !!}{{$category->title or ""}}
        </option>
    @endif

@endforeach