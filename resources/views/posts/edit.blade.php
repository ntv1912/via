@extends('layouts.master')

@section('title', 'Sửa bài viết')

@section('content')
    <h1>Sửa bài viết</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="label-control" for="name">Tên:</label><br>
        <input class="form-control" type="text" name="name" value="{{ $post->name }}" required><br><br>

        <label for="thumbnail">Ảnh thu nhỏ:</label><br>
        <input class="form-control" type="file" name="thumbnail" accept="image/*"><br>
        <img src="{{ $post->thumbnail }}" alt="{{ $post->name }}" width="100"><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea class="form-control" name="description" required>{{ $post->description }}</textarea><br><br>

        <label for="content">Nội dung:</label><br>
        <textarea class="form-control" name="content">{{ $post->content }}</textarea><br><br>

        <label for="categories">Chuyên mục:</label><br>
        <select class="form-select" name="categories[]" multiple>
            @if (isset($categories) && count($categories) > 0)
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            @else
                <option value="" disabled>Không có chuyên mục nào</option>
            @endif
        </select><br><br>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
