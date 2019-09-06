@extends('admin.tables.layout')
@section('main_content')

    <thead>
    <tr>
        <th>ID Message</th>
        <th>ID Room</th>
        <th>ID User</th>
        <th>Content</th>
        <th></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID Message</th>
        <th>ID Room</th>
        <th>ID User</th>
        <th>Content</th>
        <th></th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($messages as $message)
        <tr>
            <td>{{$message -> id_messages}}</td>
            <td>{{$message -> id_room}}</td>
            <td>{{$message -> id_user}}</td>
            <td>{{$message -> content}}</td>
            <td><a href=""><i class="fas fa-user-edit"></i></a> | <a href="" onclick="return confirm('Are you sure?')" ><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    @endforeach
    </tbody>

@endsection
