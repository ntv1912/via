@extends('layouts.master')

@section('title', 'Sửa chuyên mục')

@section('content')
    <h1>Sửa chuyên mục</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Tên:</label><br>
        <input type="text" name="name" value="{{ $category->name }}" required><br><br>

        <button type="submit">Cập nhật</button>
    </form>
@endsection
