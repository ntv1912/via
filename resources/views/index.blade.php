@extends('layouts.master')

@section('title', 'Danh sách bài viết')

@section('content')
    <h1>Danh sách bài viết</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Thêm bài viết</a>

    <table class="table">
        <thead>
            <tr>
                <th>Tên bài viết</th>
                <th>Hình ảnh</th>
                <th>Chuyên mục</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    <td><img src="{{ asset('storage/'.$post->thumbnail) }}" width="50"></td>
                    <td>
                        @foreach($post->categories as $category)
                            {{ $category->name }},
                        @endforeach
                    </td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-warning">Sửa</a>
                        <a href="#" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@extends('layouts.master')

@section('title', 'Danh sách chuyên mục')

@section('content')
    <h1>Danh sách chuyên mục</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm chuyên mục</a>

    <table class="table">
        <thead>
            <tr>
                <th>Tên chuyên mục</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
