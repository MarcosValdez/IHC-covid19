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

    const newUser = {
        nombre_admin: username,
        password,
        permiso: type
    };
    newUser.password = await helpers.encryptPassword(password);
    const result = await pool.query('INSERT INTO ADMINISTRADOR SET ?', [newUser]);

    newUser.id = result.insertId;
    return done(null, newUser);
}));

passport.use('local.validate', new LocalStrategy({
    usernameField: 'username',
    passwordField: 'password',
    passReqToCallback: true
}, async(req, username, password, done) => {

    const rows = await pool.query('SELECT * FROM PERSONA WHERE dni = ?', [username]);

    if (rows.length > 0) {
        const user = rows[0];
        const fec = user.fecha_emision.toLocaleDateString();
        let primeraFecha = [],
            segundaFecha = [],
            aux = '';
        for (let i = 0; i < password.length; i++) {
            if (i == 4) {
                primeraFecha.push(aux);
                aux = '';
            } else if (i == 7) {
                primeraFecha.push(aux);
                aux = '';
            } else {
                aux += password[i];
            }
        }
        primeraFecha.push(aux);
        aux = '';
        let t = 0;
        for (let i = 0; i < fec.length; i++) {
            if (fec[i] == '/') {
                if (t == 1) {
                    aux = '0'.concat(aux);
                }
                t = 0;
                segundaFecha.push(aux);
                aux = '';
            } else {
                aux += fec[i];
                t++;
            }
        }
        if (t == 1) {
            aux = '0'.concat(aux);
        }
        segundaFecha.push(aux);
        console.log(primeraFecha);
        console.log(segundaFecha);
        validPassword = false;

        //localhost
        if (primeraFecha[0] == segundaFecha[2] && primeraFecha[1] == segundaFecha[1] && primeraFecha[2] == segundaFecha[0]) {
            validPassword = true;
        }

        //en despliegue
        /* if (primeraFecha[0] == segundaFecha[2] && primeraFecha[1] == segundaFecha[0] && primeraFecha[2] == segundaFecha[1]) {
            validPassword = true;
        } */
        if (validPassword) {
            done(null, user, req.flash('success', [user.dni, user.id_hospital]));
        } else {
            done(null, false, req.flash('validate', 'Fecha de emision no valida, vuelva a ingresar los datos'));
        }
    } else {
        return done(null, false, req.flash('validate', 'El DNI no existe, vuelva a ingresar los datos'));
    }
}));


passport.serializeUser((user, done) => {
    done(null, user.id_admin);
});

passport.deserializeUser(async(id, done) => {
    const rows = await pool.query('SELECT * FROM ADMINISTRADOR WHERE id_admin = ?', [id]);
    done(null, rows[0]);
});