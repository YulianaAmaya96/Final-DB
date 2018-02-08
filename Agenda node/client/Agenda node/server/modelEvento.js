const ose = require('mongoose')
const Chema = ose.Schema
let evento = new Chema({
  eventId: {
    type: Number,
    required: true,
    unique: true
  },
  usuarioId: {
    type: Number,
    required: true
  },
  title: {
    type: String,
    required: true
  },
  start: {
    type: String,
    required: true
  },
  start_hour: {
    type: String,
    required: false
  },
  end: {
    type: String,
    required: false
  },
  end_hour: {
    type: String,
    required: false
  },
})
let modelo = ose.model('Evento', evento)
module.exports = modelo;
