const http = require('http'),
  path = require('path'),
  express = require('express'),
  session = require('express-session'),
  bodyParser = require('body-parser'),
  mongoose = require('mongoose'),
  rutaUser = require('./rutaUsuario.js'),
  rutaEvento = require('./rutaEvento.js');
const PORT = 3000;
const app = express();
app.use(session({
  secret: "agendaNextU"
}));
const Server = http.createServer(app);
mongoose.connect('mongodb://localhost/agenda')
app.use(express.static('../client/'))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({
  extended: true
}))
app.use('/', rutaUser)
app.use('/events', rutaEvento)
Server.listen(PORT, function() {
  console.log(PORT)
})
