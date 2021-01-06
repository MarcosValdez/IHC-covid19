const express = require('express');
const morgan = require('morgan');
const path = require('path');
const sesion = require('express-session');
const flash = require('connect-flash');
const mysqlStore = require('express-mysql-session');
const bodyParser = require('body-parser');
const passport = require('passport');
const { database } = require('./config/keys');

const app = express();

require('./app/lib/passport');

app.set('port', process.env.PORT || 3000);
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, './app/views'));

app.use(morgan('dev'));
app.use(express.json());

app.use(bodyParser.urlencoded({ extended: false }));
app.use(sesion({
    secret: 'mysqlsession',
    resave: false,
    saveUninitialized: false,
    store: new mysqlStore(database)
}));

app.use(flash());

app.use(passport.initialize());

app.use(passport.session());

app.use((req, res, next) => {
    app.locals.success = req.flash('success');
    app.locals.message = req.flash('message');
    app.locals.validate = req.flash('validate');
    app.locals.user = req.user;
    next();
});

app.use(require('./app/routes/routes'))

app.use(express.static(path.join(__dirname, 'app/public')));

app.use(function(req, res, next) {
    res.status(404).render('404');
});

app.listen(app.get('port'), () => {
    console.log('Server on port ', app.get('port'));
    console.log(`http://localhost:${app.get('port')}`)
});