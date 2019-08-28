@extends('admin.tables.layout')
@section('main_content')

    <thead>
    <tr>
        <th>ID Room</th>
        <th>Name</th>
        <th>Active</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID Room</th>
        <th>Name</th>
        <th>Active</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{{$room -> id_room}}</td>
            <td>{{$room -> name}}</td>
            <td>{{$room -> is_active}}</td>
        </tr>
    @endforeach
    </tbody>

@endsection
