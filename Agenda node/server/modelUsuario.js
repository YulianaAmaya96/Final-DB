const mongoose = require('mongoose')
const Schema = mongoose.Schema

var obj = require('bcrypt');
const saltRounds = 10;

let esquem = new Schema({
  userId: {
    type: Number,
    required: true,
    unique: true
  },
  nombre: {
    type: String,
    required: true
  },
  email: {
    type: String,
    required: true
  },
  password: {
    type: String,
    required: true
  },
  birth: {
    type: String,
    required: true
  },
})


esquem.pre('save', function(next) {
  var user = this;
  if (!user.isModified('password')) return next();
  obj.genSalt(saltRounds, function(err, salt) {
    if (err) return next(err);
    obj.hash(user.password, salt, function(err, hash) {
      if (err) return next(err);
      user.password = hash;
      next();
    });
  });
});

esquem.methods.comparePassword = function(candidatePassword, cb) {
  obj.compare(candidatePassword, this.password, function(err, isMatch) {
    if (err) return cb(err);
    cb(null, isMatch);
  });
};


let model = mongoose.model('Usuario', esquem)
module.exports = model;
