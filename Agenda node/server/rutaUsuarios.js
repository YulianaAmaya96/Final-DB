const express = require('express')
const R = express.Router()
const Users = require('./modelUsuarios.js')
const session = require('express-session')
R.post('/login', function(req, res) {
  let x = req.body.user
  var y = req.body.pass
  Users.findOne({
    email: x
  }, (err, result) => {
    if (err) console.log(err)
    if (!result) {
      res.send("El nombre de usuario no existe");
    }
    result.comparePassword(y, function(err, isMatch) {
      if (isMatch && isMatch == true) {
        req.session.El_id = result.userId;
        res.send("valido");
      } else {
        res.send("Error: la contraseña es incorrecta");
      }
    })
  })
});

module.exports = R;
