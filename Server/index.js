const express = require('express');
const app = express();
const { Pool, Client } = require('pg');


const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'chatapp',
    password: '18082000',
    port: 5432,
})

const client = new Client({
    user: 'postgres',
    host: 'localhost',
    database: 'chatapp',
    password: '18082000',
    port: 5432,
})
client.connect()

app.use(express.static('public'));
// app.set('view engine', 'ejs');
app.set('views','./views');



const server = require('http').Server(app);
const io = require('socket.io')(server)
server.listen(3001,() => console.log('listening port 3001!'));



var listUserOnline = [];
var listUser = [];



io.on('connection',function(socket){
    console.log(socket.id + ' did connected')
    io.sockets.emit('listUserOnline',listUser);


    // handle load connection --------------------------------------------------
    io.sockets.emit('listUserOnline',listUser);

    var loadData = " SELECT users.name, users.avatar, messages.content from users inner join messages on users.id_user = messages.id_user where messages.id_room = 1";
    client.query(loadData, (err, res) => {
        if (err) {
            console.log(err.stack)
        } else {
            io.sockets.emit('sendData',res.rows)
        }
    })

    var loadRoom = " SELECT * from room ";

    client.query(loadRoom, (err, res) => {
        if (err) {
            console.log(err.stack)
        } else {
            io.sockets.emit('sendDataRoom',res.rows)
        }
    })

    // handle create room-----------------------------------
    socket.on('createRoom', function (data) {
        console.log("data neeeee: " + data)
        var query;

        if (data[1]){
            query = {
                text: 'INSERT INTO room(name , password) VALUES($1, $2)',
                values: [data[0], data[1]],
            };
        }else {
            query = {
                text: 'INSERT INTO room(name ) VALUES($1)',
                values: [data[0]],
            };
        }

        client.query(query, (err, res) => {
            if (err) {
                console.log(err.stack)
            } else {
                var updateDataRoom = " SELECT * from room ";

                client.query(updateDataRoom, (err, res) => {
                    if (err) {
                        console.log(err.stack)
                    } else {
                        io.sockets.emit('sendDataRoom',res.rows)
                    }
                })
                // io.sockets.emit('updateDataRoom',res.rows)
            }
        })


        // var loadRoom = " SELECT * from room ";
        //
        // client.query(loadRoom, (err, res) => {
        //     if (err) {
        //         console.log(err.stack)
        //     } else {
        //         io.sockets.emit('updateDataRoom',res.rows)
        //     }
        // })
    })


    //--------------------------------------------------------------------------



    // create room







    // handle load update user online ------------------------------------------------
    socket.on('userOnline', function (data) {
        var getUser = " SELECT * from users where id_user =" + "'" + data + "'";
        client.query(getUser, (err, res) => {
            if (err) {
                console.log(err.stack)
            } else {

                if (listUserOnline.indexOf(res.rows[0].id_user) >= 0){
                    io.sockets.emit('listUserOnline',listUser);
                }else {
                    socket.userID = res.rows[0].id_user;
                    listUserOnline.push(res.rows[0].id_user);
                    listUser.push(res.rows[0]);
                    io.sockets.emit('listUserOnline',listUser);
                }
            }
        })
        addRoom(data,1);
    });
    //---------------------------------------------------------------------------------



    // handle user logout-------------------------------------------------------------
    socket.on('logout', function () {
        listUserOnline.splice(listUserOnline.indexOf(socket.userID), 1);
        listUser.map(function (v, i) {
            if (v.id_user == socket.userID){
                listUser.splice(i,1)
            }
        })
        socket.broadcast.emit('updateUser',listUser);
        console.log(listUser)
    });
    //--------------------------------------------------------------------------------




    // handle clien send mess --------------------------------------------------------
    socket.on('send-message', function (data) {
        io.sockets.emit('server-send-mess', data)
    })
    //--------------------------------------------------------------------------------




    //handle typing ------------------------------------------------------------------
    socket.on('client-typing', function () {
        socket.broadcast.emit('start-typing')
    })

    socket.on('client-endTyping', function () {
        socket.broadcast.emit('end-typing')
    })
    //--------------------------------------------------------------------------------


})



function addRoom(id_user,id_room){
    var getUserRoom = " SELECT * from user_room where id_user =" + id_user;
    client.query(getUserRoom, (err, res) => {
        if (err) {
            console.log(err.stack)
        } else {
            var check = 0;
            check = res.rows.map(function (val) {
                if (val.id_room == id_room){
                    return 1;
                }
            })
            if (check == 0){
                var query = {
                    text: 'INSERT INTO user_room(id_user, id_room) VALUES($1, $2)',
                    values: [id_user, id_room],
                };
                client.query(query, (err, res) => {
                    if (err) {
                        console.log(err.stack)
                    } else {
                        console.log('insert user in room succeed!')
                    }
                })
            }
        }
    })
}




app.get('/', function(req, res){
    return "ok"
})







