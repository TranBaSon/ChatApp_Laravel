@extends('admin.tables.layout')
@section('main_content')

    <thead>
    <tr>
        <th>ID Room</th>
        <th>Name</th>
        <th>Active</th>
        <th></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID Room</th>
        <th>Name</th>
        <th>Active</th>
        <th></th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{{$room -> id_room}}</td>
            <td>{{$room -> name}}</td>
            <td>{{$room -> is_active}}</td>
            <td><a href="{{url("editRoom/".$room->id_room)}}"><i class="fas fa-user-edit"></i></a> | <a href="{{url("removeRoom/".$room->id_room)}}" onclick="return confirm('Are you sure?')" ><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    @endforeach
    </tbody>

@endsection
