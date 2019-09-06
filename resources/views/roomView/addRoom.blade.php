@extends('userView.common')
@section('main-content')

    <div class="container">

        <form action="{{ route("addRoom") }}" method="POST" >
            @csrf
            <div class="form-group"> <h1 class="text-info">Add room</h1> </div>
            <div class="form-group">
                <label for="name1">Name Room</label>
                <input type="text" class="form-control" id="name1" value="{{old("name")}}"  placeholder="Enter name" name="name">
                @if($errors->has("name"))
                    <p class="error" style="color:red">{{$errors->first("name")}}</p>
                @endif
            </div>
            <div class="form-group pt-3">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>

        </form>

    </div>

@endsection
