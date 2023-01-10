@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h1>{{ $comment->title }}</h1>
                </div>
                <div class="card-body">
                    <p class="mt-3 mb-0">{{ $comment->description }}</p>
                </div>
                <div class="card-footer">
                    <div class="clearfix">
                        <span class="float-left">
                            Автор: {{ $comment->user->name }}
                            <br>
                            Дата: {{ date_format($comment->created_at, 'd.m.Y H:i') }}
                        </span>
                        @auth
                            @if (auth()->id() == $comment->user_id)
                                <a href="{{ route('admin.comment.edit', ['id' => $comment->id]) }}"
                                    class="btn btn-dark float-right">Редактирование новости</a>
                                <form action="{{ route('admin.comment.delete', ['id' => $comment->id]) }}" method="post"
                                    onsubmit="return confirm('Удалить новость?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3 id="comment-list">Все комментарии</h3>
    @if ($comments->count())
        @foreach ($comments as $comment)
        
            <div class="card mb-3" id="comment-{{ $comment->id }}">
                <div class="card-header p-2">
                    {{ $comment->user->name }}
                </div>
                <div class="card-body p-2">
                    {{ $comment->content }}
                </div>
                <div class="card-footer p-2">
                    {{ $comment->created_at }}
                </div>
            </div>
        @endforeach
    @else
        <p>Нет комментариев</p>
    @endif
@endsection
