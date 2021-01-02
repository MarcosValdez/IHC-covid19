const passport = require('passport');
const LocalStrategy = require('passport-local').Strategy;

const pool = require('../../config/database');
const helpers = require('../lib/helpers');

passport.use('local.signin', new LocalStrategy({
    usernameField: 'username',
    passwordField: 'password',
    passReqToCallback: true
}, async(req, username, password, done) => {

    const rows = await pool.query('SELECT * FROM ADMINISTRADOR WHERE nombre_admin = ?', [username]);

    if (rows.length > 0) {
        const user = rows[0];
        const validPassword = await helpers.matchPassword(password, user.password);

        if (validPassword) {
            console.log('Welcome');
            done(null, user, req.flash('success', 'Welcome ' + user.username));
        } else {
            done(null, false, req.flash('message', 'Contraseña incorrecta'));
        }
    } else {
        return done(null, false, req.flash('message', 'El usuario no existe'));
    }
}));

passport.use('local.signup', new LocalStrategy({
    usernameField: 'username',
    passwordField: 'password',
    passReqToCallback: true
}, async(req, username, password, done) => {
    const { type } = req.body;
    console.log(req.body);
    const newUser = {
        nombre_admin: username,
        password,
        permiso: type
    };
    newUser.password = await helpers.encryptPassword(password);
    const result = await pool.query('INSERT INTO ADMINISTRADOR SET ?', [newUser]);
    console.log(result);
    newUser.id = result.insertId;
    return done(null, newUser);
}));

passport.serializeUser((user, done) => {
    console.log('serializeUser', user);
    done(null, user.id);
});

passport.deserializeUser(async(id, done) => {
    const rows = await pool.query('SELECT * FROM ADMINISTRADOR WHERE id_admin = ?', [id.id_admin]);
    done(null, rows[0]);
});