@extends('userView.common')
@section('main-content')

    <div class="container">

        <form action="{{ route("login") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email1">Email</label>
                <input type="email" class="form-control" id="email1" value="{{old("email")}}"  placeholder="Enter email" name="email">
            </div>
            @if($errors->has("email"))
                <p class="error" style="color:red">{{$errors->first("email")}}</p>
            @endif
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" value="{{old("password")}}" id="password1" placeholder="Password" name="password">
            </div>
            @if($errors->has("password"))
                <p class="error" style="color:red">{{$errors->first("password")}}</p>
            @endif
            <div class="form-group pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>

@endsection
