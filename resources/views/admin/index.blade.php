@extends('layouts.admin')

@section('content')
    <h1>Личный кабинет {{ auth()->user()->name }}</h1>
@endsection
