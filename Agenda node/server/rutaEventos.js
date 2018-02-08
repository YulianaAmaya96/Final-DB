var exp = require('express');
const Router = exp.Router();
const Evento = require('./modelEventos.js');
Router.get('/all', function(req, res) {
  var userId = req.session.El_id;
  Evento.find({
    usuarioId: userId
  }).exec(function(err, docs) {
    if (err) {
      res.status(500)
      res.json(err)
    }
    res.json(docs)
  })
});

Router.post('/delete/:id', function(req, res) {
  let id = req.params.id
  Evento.remove({
    eventId: id
  }, (error) => {
    if (error) res.send(error);
    res.send("Solicitud realizada exitosamente")
  })
});

Router.post('/new', function(req, res) {
  let evento = new Evento({
    eventId: Math.floor(Math.random() * 50),
    usuarioId: req.session.El_id,
    title: req.body.title,
    start: req.body.start,
    start_hour: req.body.start_hour,
    end: req.body.end,
    end_hour: req.body.end_hour
  })
  evento.save(function(error) {
    if (error) {
      res.status(500)
      res.json(error)
    }
    res.send("Exito")
  })
});

Router.post('/upEvento', function(req, res) {
  var userId = req.session.El_id;
  Evento.update({
    usuarioId: userId,
    eventId: req.body.eventId
  }, {
    eventId: req.body.eventId,
    usuarioId: userId,
    title: req.body.titulo,
    start: req.body.fechaInicio,
    end: req.body.fechaFin
  }, (error, resultado) => {
    if (error) console.log("No se pudo actualizar " + error);
    let msj = {
      exito: true
    }
    console.log(resultado)
    res.json(msj)
  })
});

Router.post('/logout', function(req, res) {
  req.session.destroy(function(err) {
    if (err) res.send("No se pudo cerrar sesion " + err);
    res.send("Sesion cerrada exitosamente");
  })
});
module.exports = Router;
