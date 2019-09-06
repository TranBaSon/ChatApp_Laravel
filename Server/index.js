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


io.on('connection',function(socket){
    console.log(socket.id + ' did connected')

})






client.query('SELECT * from users where id_user = 191', (err, res) => {
    if (err) {
        console.log(err.stack)
    } else {
        console.log(res.rows)
    }
})


app.get('/', function(req, res){
    return "ok"
})







