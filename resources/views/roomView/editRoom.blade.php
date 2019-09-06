@extends('userView.common')
@section('main-content')

    <div class="container">

        <form action="{{ route("editRoom") }}" method="POST" >
            @csrf
            <input type="hidden" name="id_room" value="{{$room->id_room}}">
            <div class="form-group"> <h1 class="text-info">Edit room</h1> </div>
            <div class="form-group">
                <label for="name1">Name Room</label>
                <input type="text" class="form-control" id="name1" value="{{old("name")}}"  placeholder="Enter name" name="name">
                @if($errors->has("name"))
                    <p class="error" style="color:red">{{$errors->first("name")}}</p>
                @endif
            </div>
            <div class="form-group pt-3">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>

        </form>

    </div>

@endsection
