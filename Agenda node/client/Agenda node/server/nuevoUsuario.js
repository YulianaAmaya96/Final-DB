var mongoose = require('mongoose');
var user = require('./modelUsuario.js');
var url = 'mongodb://localhost/agenda';

mongoose.Promise = global.Promise;

var promise = mongoose.connect(url, {
  useMongoClient: true
});

promise.then(function(db) {
  var insertarRegistro = function(callback) {
    let Usuario = new user({
      userId: "0",
      nombre: "Pepito",
      email: "Pepito@mail.com",
      password: "67890qwert",
      birth: "1996-05-11"
    })
    Usuario.save((error) => {
      if (error) callback(error)
      callback(null, "Success!")
    })
  }
  insertarRegistro((error, result) => {
    if (error) console.log(error)
    console.log(result)
    mongoose.connection.close()
  })
});
