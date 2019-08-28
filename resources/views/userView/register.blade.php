@extends('userView.common')
@section('main-content')

<div class="container">

    <form action="{{ route("editUser") }}" method="POST" >
        @csrf
        <div class="form-group"> <h1 class="text-info">Eidt Info</h1> </div>
        <div class="form-group">
            <label for="name1">Name</label>
            <input type="text" class="form-control" id="name1" value="{{old("name")}}"  placeholder="Enter name" name="name">
            @if($errors->has("name"))
                <p class="error" style="color:red">{{$errors->first("name")}}</p>
            @endif
        </div>
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
        <div>
            <label for="inputGroupFileAddon01">Avatar</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" value="{{old("avatar")}}" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="avatar">
                    <label class="custom-file-label" for="inputGroupFile01">Choose avatar</label>
                </div>
            </div>
        </div>
        <div class="form-group pt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>

@endsection
