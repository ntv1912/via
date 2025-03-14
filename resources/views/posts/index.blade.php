@extends('layouts.master')

@section('title', 'Danh sách bài viết')

@section('content')
    <h1>Danh sách bài viết</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Thêm bài viết</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Ảnh thu nhỏ</th>
                <th>Chuyên mục</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    <td><img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->name }}" width="100"></td>
                    <td>
                        @foreach ($post->categories as $category)
                            {{ $category->name }}
                        @endforeach
                    </td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
