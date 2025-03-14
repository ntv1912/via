@extends('layouts.master')

@section('title', 'Tạo bài viết mới')

@section('content')
    <h1>Tạo bài viết mới</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <label class="label-control" for="name">Tên:</label><br>
        <input class="form-control" type="text" name="name" required><br><br>

        <label for="thumbnail">Ảnh thu nhỏ:</label><br>
        <input  class="form-control" type="file" name="thumbnail" accept="image/*" required><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea  class="form-control" name="description" required></textarea><br><br>

        <label for="content">Nội dung:</label><br>
        <textarea  class="form-control" name="content"></textarea><br><br>

        <label for="categories">Chuyên mục:</label><br>
        <select  class="form-select" name="categories[]" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
