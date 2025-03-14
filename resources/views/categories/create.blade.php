@extends('layouts.master')

@section('title', 'Tạo chuyên mục mới')

@section('content')
    <h1>Tạo chuyên mục mới</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Tên:</label><br>
        <input class="form-control" type="text" name="name" required><br><br>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
