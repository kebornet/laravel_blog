@extends('layouts.admin')

@section('content')
    <h1 class="mt-2 mb-3">Создание новости</h1>
    <form method="post" action="{{ route('admin.post.store') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Название" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="excerpt" placeholder="Краткое описание" required></textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Описание" rows="7" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
    </form>
@endsection
