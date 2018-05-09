@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="card">
            <div class="card-header">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                You are logged in!
            </div>
        </div>
    </div>

    <div class="row">

        <table id="t01">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td> {{$post->name}}</td>
                        <td> {{$post->email}}</td>
                        <td> {{$post->message}}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        {!! $posts->links() !!}
    </div>

</div>
@endsection
