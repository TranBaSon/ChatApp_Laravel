@extends('admin.tables.layout')
@section('main_content')

    <thead>
    <tr>
        <th>ID Message</th>
        <th>ID Room</th>
        <th>ID User</th>
        <th>Content</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID Message</th>
        <th>ID Room</th>
        <th>ID User</th>
        <th>Content</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($messages as $message)
        <tr>
            <td>{{$message -> id_messages}}</td>
            <td>{{$message -> id_room}}</td>
            <td>{{$message -> id_user}}</td>
            <td>{{$message -> content}}</td>
        </tr>
    @endforeach
    </tbody>

@endsection
