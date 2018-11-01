var compression = require('compression')
var express = require('express');
var app = express();
var path = require('path');
var port = process.env.PORT || 3000

app.use(compression())

app.get('/', function(req, res) {
    res.sendFile(path.join(__dirname + '/website/index.html'));
});

app.get('/quibdo', function(req, res) {
    res.sendFile(path.join(__dirname + '/website/quibdo.html'));
});

app.get('/politicas-de-privacidad', function(req, res) {
    res.sendFile(path.join(__dirname + '/website/privacy.html'));
});

app.listen(port);