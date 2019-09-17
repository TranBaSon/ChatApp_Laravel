<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Chat</title>

    <script src="{{asset('/Utilities/jquery.js')}}"></script>
    <script src="{{asset('/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src=" {{asset('/Utilities/socket_io.js')}}"></script>
    <script src=" {{asset('/js/handleChat.js')}}"></script>

    <link href=" {{asset('/css/messages.css')}}" rel="stylesheet">
    <link href=" {{asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/fontawesome-free/css/all.css')}}" rel="stylesheet">


</head>

<body>

<nav data="{{ Auth::user()}}" atrID="{{ Auth::user()->id_user }}" class="navbar navbar-expand-md navbar-dark head" style="background-color: #3c6382">

    <div>
        <a href="#">
            <img class="avatar" src="{{asset('/avatars/'.Auth::user()->avatar)}}" alt="">
        </a>
    </div>
    <a href="" class="nav-link link-user nameUser">{{ Auth::user()->name }}</a>
    <div>
        <a class="nav-link link-user logout" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</nav>
<div class="container mt-5">

    <div class="row">
{{--        online col--}}
        <div class="col-md-4">
            <div  class="col-md-12 row select-chat">
                <div class="col-md-6 select-online active"><i class="fas fa-street-view"> online</i></div>
                <div class="col-md-6 select-room"><i class="fas fa-users"> room</i></div>
            </div>

            <div class="user-online col-md-12">

            </div>

            <div class="list-room col-md-12">

            </div>
        </div>

{{--        mess coll--}}
        <div class="col-md-7">
            <div atrID="1231" class="col-md-12 row">
                <div class="col-md-4"><i class="fas fa-plus-circle btn" data-toggle="modal" data-target="#exampleModalCenter"></i></div>
                <div class="col-md-6 room">
                    <i class="fas fa-globe-asia"> World Room</i>
                </div>
            </div>
            <div class="col-md-12 messages ml-1">
                <div class="list-messages   mb-3" data-spy="scroll" data-offset="0">

                </div>
                <div>
                    <div class="form-group">
                        <form >
                            <div class="cssload-wave">
                                <span></span><span></span><span></span><span></span><span></span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control input-messages" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" name="content">
                                <input type="hidden" name="id_room" class="id_room" value="1">
                                <input type="hidden" name="id_user" class="id_user" value="{{ Auth::user()->id_user }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline- btn-info send" type="submit" id="button-addon2">Button</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Room</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <label for="roomName">Room Name</label>
                            <input id="roomName" type="text" class="form-control nameRoom" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" name="roomName">
                            <label for="passRoom">Password</label>
                            <input id="passRoom" type="text" class="form-control passRoom" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" name="passRoom">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary add_room">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>

</body>

</html>







