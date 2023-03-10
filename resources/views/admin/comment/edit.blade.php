@extends('layouts.admin')

@section('content')
    <h1>Редактирование комментария</h1>
    <form method="post" action="{{ route('admin.comment.update', ['id' => $comment->id]) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <textarea class="form-control" name="content" placeholder="Текст комментария" maxlength="500" rows="5">{{ old('content') ?? $comment->content }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
