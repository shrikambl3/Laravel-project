@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Post Message') }}</div>

                    <div class="card-body">
                        <form action="{{ url('home') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <!--  Name -->
                            <div class="form-group">
                                <div class="col-sm-6">
                                    Name: <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                            <!--  Email -->
                            <div class="form-group">
                                <div class="col-sm-6">
                                    Email: <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
                            <!--  Message -->
                            <div class="form-group">
                                <div class="col-sm-6">
                                    Message: <textarea type="text" name="message" id="message" class="form-control" value="{{ old('message') }}" required autofocus></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @if (count($errors) > 0)
                <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>Whoops! Something went wrong!</strong>
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @if (session('success'))
                <!-- Form Error List -->
                    <div class="alert alert-success">
                        <strong>Success!!</strong>
                        <br><br>
                        {{session('success')}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ url('delete') }}" method="GET" class="form-horizontal">
            <div class="row">
                {!! $posts->links() !!}
                <table id="t01">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message Content(most recent first/paginated, 10 per page)</th>
                <th>Delete</th>
            </tr>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td> {{$post->name}}</td>
                        <td> {{$post->email}}</td>
                        <td> {{$post->message}}</td>
                        <td> <input type="checkbox" name="list[{{$post->id}}]" value="{{$post->id}}"></td>
                    </tr>
                @endforeach
            @endif
        </table>
                {!! $posts->links() !!}
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Delete Message
                    </button>
                </div>
            </div>
        </form>
</div>

@endsection
