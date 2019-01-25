@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <p class="h2 float-left">Posts</p>

                    <a href="{{ url('/posts/create') }}" class="btn btn-link float-right">Create new post</a>
                </div>

                <div class="card-body">

                    <div class="float-right">{!! $posts->links() !!}</div>

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Creator</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ Str::words($post->content, 10) }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ date('H:i:s d M Y', $post->created_at->timestamp) }}</td>
                                <td>
                                    <a class="btn" href="{{ route('posts.show', $post->id) }}">Show</a>

                                    <a class="btn" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="float-right">{!! $posts->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
