var socket = io.connect("http://localhost:3001");

function scroll(){
    $(" .list-messages").animate({
        scrollTop: $(
            ' .list-messages')[0].scrollHeight
    },100);
}

function scrollRoom(){
    $(" .list-room ").animate({
        scrollTop: $(
            ' .list-room ')[0].scrollHeight
    },100);
}

// load data
socket.on('sendData', function (data) {
    data.map(function (val) {
        if ($(".nameUser").text() == val.name){
            $('.list-messages').append('<div class="float-right col-8 mess-1" style="text-align: right"><div>'+val.content+'</div><p class="author">Me</p></div>')
        }else {
            $('.list-messages').append('<div class="float-left col-8 mess-2"><div>'+val.content+'</div><p class="author">'+val.name+'</p></div>')
        }
    })
    scroll()

})

socket.on('sendDataRoom', function (data) {
    $('.list-room').html("")
    data.map(function (val) {
        $('.list-room').append('<div class="dataRoom " idRoom=" '+ val.id_room+' ">'+ val.name+'</div>')
    })
    scrollRoom()

})
socket.on('updateDataRoom', function (data) {
    $('.list-room').html("")
    data.map(function (val) {
        $('.list-room').append('<div class="dataRoom " idRoom=" '+ val.id_room+' ">'+ val.name+'</div>')
    })
    scrollRoom()
})


$(document).ready(function () {

    //handle select---------------------------
    $('.list-room').hide();

    $('.select-room').click(function () {
        $('.list-room').show();
        $('.user-online').hide();
        $('.select-room').css('background','#C4E538')
        $('.select-online').css('background','none')
        scrollRoom();
    });

    $('.select-online').click(function () {
        $('.list-room').hide();
        $('.user-online').show();
        $('.select-room').css('background','none')
        $('.select-online').css('background','#C4E538')
    })

    //---------------------------------------


    $('.cssload-wave').hide();



    socket.emit('userOnline', $(".head").attr('atrID'));


    socket.on('listUserOnline', function (data) {
        $('.user-online').html("");
        data.map(function (x) {
            if ($(".nameUser").text() != x.name){
                $('.user-online').append("" +
                    "<div class='row rowUser'>" +
                    "<div><img class=\"avtar-online\" src=\"/avatars/"+x.avatar+"\" alt=\"\"></div>" +
                    "<div class=\"col-md-7\">"+x.name+"</div></div>")
            }
        })
    })




    //handle add room
    $('.add_room').click(function () {
        var name = $('.nameRoom').val();
        var pass = $('.passRoom').val();

        socket.emit('createRoom',[name,pass])


        if (name){
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            // var content = $('.input-messages').val();
            // console.log(content)
            // var id_room = $('.id_room').val();
            // console.log(id_room)
            // var id_user = $('.id_user').val();
            // console.log(id_user)

            // if (pass){
            //     $.ajax({
            //         url:'/create-room',
            //         type: 'post',
            //         data: {name:name ,password: pass},
            //         async: true,
            //         success:function (data) {
            //             console.log(data)
            //         }
            //     })
            // }else {
            //     $.ajax({
            //         url:'/create-room',
            //         type: 'post',
            //         data: {name:name},
            //         async: true,
            //         success:function (data) {
            //             console.log(data)
            //         }
            //     })
            // }

            $('#exampleModalCenter').modal('hide');
            $('.nameRoom').val("");
            $('.passRoom').val("");
            return false;
        }
    })






    // handle logout ----------------------------------
    $('.logout').click(function () {
        socket.emit('logout',$(".head").attr('atrID'));
        console.log("data logut")
    })


    socket.on('updateUser', function (data) {
        $('.user-online').html("");
        data.map(function (x) {
            if ($(".nameUser").text() != x.name){
                $('.user-online').append("" +
                    "<div class='row rowUser'>" +
                    "<div><img class=\"avtar-online\" src=\"{{asset('/avatars/"+x.avatar+")}}\" alt=\"\"></div>" +
                    "<div class=\"col-md-7\">"+x.name+"</div></div>")
            }
        })
        console.log(data)
    })
    //--------------------------------------------------



    $('.send').click(function () {
        socket.emit('send-message', {name: $(".nameUser").text(), mess: $('.input-messages').val()})
        scroll();
    })



    $('.list-messages').html("")
    socket.on('server-send-mess', function (data) {
        if ($(".nameUser").text() == data.name){
            $('.list-messages').append('<div class="float-right col-8 mess-1" style="text-align: right"><div>'+data.mess+'</div><p class="author">Me</p></div>')
        }else {
            $('.list-messages').append('<div class="float-left col-8 mess-2"><div>'+data.mess+'</div><p class="author">'+data.name+'</p></div>')
        }

        // handle scroll
       scroll()

    })


    //handle typing
    $('.input-messages').focusin(function () {
        socket.emit('client-typing')
    })

    $('.input-messages').focusout(function () {
        socket.emit('client-endTyping');
    })

    socket.on('start-typing', function () {
        $('.cssload-wave').show();
    })

    socket.on('end-typing', function () {
            $('.cssload-wave').hide();
    })




    // ajax handle data



    $('.send').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var content = $('.input-messages').val();
        console.log(content)
        var id_room = $('.id_room').val();
        console.log(id_room)
        var id_user = $('.id_user').val();
        console.log(id_user)


        $.ajax({
            url:'/',
            type: 'post',
            // data: 'content=' + content + 'id_room=' + id_room + 'id_user=' + id_user,
            data: {content:content ,id_room: id_room, id_user: id_user},
            async: true,
            success:function (data) {
                console.log(data)
            }
        })
        $('.input-messages').val(" ");
        return false;
    })






})
