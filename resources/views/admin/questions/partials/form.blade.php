<label for="">Статус</label>
<select class="form-control" name="published">
        @if (isset($question->id))
                <option value="0" @if ($question->published == 0) selected="" @endif>Не опубликовано</option>
                <option value="1" @if ($question->published == 1) selected="" @endif>Опубликовано</option>
                <option value="2" @if ($question->published == 2) selected="" @endif>Скрыто</option>
        @else
                <option value="0">Не опубликовано</option>
                <option value="1">Опубликовано</option>
                <option value="2">Скрыто</option>
        @endif
</select>

<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Введите имя" value="{{$question->name or ""}}" required>

<label for="">email</label>
<input type="email" class="form-control" name="email" placeholder="Введите email" value="{{$question->email or ""}}" required>


<label for="">Вопрос</label>
<textarea class="form-control" name="description" placeholder="Текст вопроса" value="{{$question->description or ""}}" required>{{$question->description or ""}}</textarea>

<label for="">Категория вопроса</label>
<select class="form-control" name="category_id">

        @include('admin.questions.partials.categories', ['categories' => $categories])
</select>

<label for="">Ответ</label>
<textarea class="form-control" name="answer" placeholder="Текст ответа" value="{{$question->answer or ""}}">{{$question->answer or ""}}</textarea>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">