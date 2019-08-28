@extends('admin.tables.layout')
@section('main_content')

    <thead>
    <tr>
        <th>ID User</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Active</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID User</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Active</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user -> id_user}}</td>
            <td>{{$user -> name}}</td>
            <td>{{$user -> email}}</td>
            <td>{{$user -> password}}</td>
            <td>{{$user -> is_active}}</td>
        </tr>
    @endforeach
    </tbody>

@endsection




