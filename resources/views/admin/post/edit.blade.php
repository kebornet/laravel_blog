@extends('layouts.admin')

@section('content')
    <h1 class="mt-2 mb-3">Редактировать новость</h1>
    <form method="post" action="{{ route('admin.post.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Название" required
                value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="excerpt" placeholder="Краткое описание" required>{{ $post->excerpt }}</textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Описание" rows="7" required>{{ $post->description }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </div>
    </form>
@endsection
