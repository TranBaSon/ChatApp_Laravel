@extends('admin.tables.layout')
@section('main_content')
    <thead>
    <tr>
        <th>ID User-Room</th>
        <th>ID User</th>
        <th>ID Room</th>
        <th>Active</th>
        <th></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID User-Room</th>
        <th>ID User</th>
        <th>ID Room</th>
        <th>Active</th>
        <th></th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($userRooms as $userRoom)
        <tr>
            <td>{{$userRoom -> id_userRoom}}</td>
            <td>{{$userRoom -> id_user}}</td>
            <td>{{$userRoom -> id_room}}</td>
            <td>{{$userRoom -> is_active}}</td>
            <td><a href=""><i class="fas fa-user-edit"></i></a> | <a href="" onclick="return confirm('Are you sure?')" ><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    @endforeach
    </tbody>

@endsection



