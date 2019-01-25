@extends('layouts.app')

@section('title', 'View Post')

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
                    <p class="h2 float-left">View post</p>
                </div>

                <div class="card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $post->title }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Content:</strong>
                            {{ $post->content }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Creator:</strong>
                            {{ $post->user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Created At:</strong>
                            {{ date('H:i:s d M Y', $post->created_at->timestamp) }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Comments:</strong>

                            @forelse ($post->comments as $comment)
                                <p class="small">{{ $comment->user->name }} at {{ date('H:i:s d M Y', $comment->created_at->timestamp) }}</p>
                                <p>{{ $comment->content }}</p>
                                <hr>
                            @empty
                                <p>This post has no comments</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>New Comment:</strong>
                                        <textarea class="form-control" rows="5" name="content"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
