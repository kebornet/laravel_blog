@extends('layouts.admin')

@section('content')
    <h1 class="mt-2 mb-3">Мои новости</h1>
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <?php foreach ($posts as $post) : ?>
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">{{ $post->excerpt }}</div>
                <div class="card-footer">
                    <div class="clearfix">
                        <span class="float-left">
                            Дата: {{ date_format($post->created_at, 'd.m.Y H:i') }}
                        </span>
                        <a href="{{ route('admin.post.show', ['id' => $post->id]) }}" class="btn btn-dark loat-right">Читать
                            далее
                            ...</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
@endsection
