@extends('admin.tables.layout')
@section('main_content')

    <thead>
    <tr>
        <th>ID User</th>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Active</th>
        <th></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID User</th>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Active</th>
        <th></th>

    </tr>
    </tfoot>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user -> id_user}}</td>
            <td><img style="width: 50px" src="{{asset("avatars/$user->avatar")}}" alt=""> </td>
            <td>{{$user -> name}}</td>
            <td>{{$user -> email}}</td>
            <td>{{$user -> password}}</td>
            <td>{{$user -> is_active}}</td>
            <td><a href="{{url("editUser/".$user->id_user)}}"><i class="fas fa-user-edit"></i></a> | <a href="{{url("removeUser/".$user->id_user)}}" onclick="return confirm('Are you sure?')" ><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    @endforeach
    </tbody>

@endsection




