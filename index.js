const app = require('express')();
const http = require('http').createServer(app);
const io = require('socket.io')(http);
// const {Pool, Client} = require("pg");

// const pool = new Pool({
//   user: 'postgres',
//   host: 'localhost',
//   database: 'sadop',
//   password: '3737Arveja',
//   port: 5432
// })

// const client = new Client({
//   user: 'postgres',
//   host: 'localhost',
//   database: 'sadop',
//   password: '3737Arveja',
//   port: 5432
// })

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/src/public/modulos/chat/');
});

io.on('connection', (socket) => {
    socket.on('chat message', (msg) => {
      io.emit('chat message', msg);
    });
  });

http.listen(3000, () => {
  console.log('listening on *:3000');
});

io.emit('some event', { someProperty: 'some value', otherProperty: 'other value' }); // This will emit the event to all connected sockets

io.on('connection', (socket) => {
    socket.broadcast.emit('hi');
  });

