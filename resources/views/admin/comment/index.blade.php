@extends('layouts.admin')

@section('content')
    <h1>Мои комментарии</h1>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th width="12%">Дата и время</th>
            <th width="47%">Текст</th>
            <th width="17%">Автор</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>{{ iconv_substr($comment->content, 0, 100) }}…</td>
                <td>{{ $comment->user->name }}</td>
                <td>
                    <a href="{{ route('admin.comment.edit', ['id' => $comment->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('admin.comment.delete', ['id' => $comment->id]) }}" method="post"
                        onsubmit="return confirm('Удалить этот комментарий?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <i class="far fa-trash-alt text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
