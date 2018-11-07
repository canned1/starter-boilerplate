const compression = require('compression')

const express = require('express')

const app = express()

const path = require('path')

const port = process.env.PORT || 5000

app.use(compression())

app.use(express.static(__dirname))

app.get('/', (_, res) => res.sendFile(path.join(`${__dirname}/views/index.html`)))

app.listen(port)
