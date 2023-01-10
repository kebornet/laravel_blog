@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h1>{{ $post->title }}</h1>
                </div>
                <div class="card-body">
                    <p class="mt-3 mb-0">{{ $post->description }}</p>
                </div>
                <div class="card-footer">
                    <div class="clearfix">
                        <span class="float-left">
                            Автор: {{ $post->user->name }}
                            <br>
                            Дата: {{ date_format($post->created_at, 'd.m.Y H:i') }}
                        </span>
                        @auth
                            @if (auth()->id() == $post->user_id)
                                <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                                    class="btn btn-dark float-right">Редактирование новости</a>
                                <form action="{{ route('admin.post.delete', ['id' => $post->id]) }}" method="post"
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

    @auth
        @include('post.part.comment')
    @endauth

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
                    <form action="{{ route('comment-like.store', ['comment_id' => $comment->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fa fa-heart"></i>
                        </button>
                        {{ count($comment->likedUsers) }}
                    </form>
                    <br>
                    {{ $comment->created_at }}
                </div>
            </div>
        @endforeach
    @else
        <p>Нет комментариев</p>
    @endif
@endsection
