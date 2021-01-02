/* const dbConnection = require('../../config/dbConnection'); */
const path = require('path');
const express = require('express');
const passport = require('passport');
const router = express.Router();
const pool = require('../../config/database');
const { isLoggedIn, isNotLoggedIn } = require('../lib/auth');

router.get('/', async(req, res) => {
    const respuesta = await pool.query('SELECT * FROM HOSPITAL');
    res.render('home', { resultado: respuesta })
});

router.get('/register', (req, res) => {
    res.render('register');
});

router.post('/register', passport.authenticate('local.signup', {
    successRedirect: '/register',
    failureRedirect: '/',
    failureFash: false,
    session: false
}));

router.get('/verificar', (req, res) => {
    res.render('verificar');
})


router.get('/login', (req, res) => {
    res.render('login');
})

router.get('/seleccionado', async(req, res) => {
    const respuesta = await pool.query('SELECT * FROM HOSPITAL');
    res.render('seleccionado', { resultado: respuesta })
})

router.get('/noseleccionado', (req, res) => {
    res.render('noseleccionado');
})

router.get('/dashboard', (req, res) => {
    res.render('dashboard');
})
router.get('/admin', (req, res) => {
    res.render('admin');
})

router.post('/verificar', (req, res) => {

    const { dni, nombre } = req.body;

    console.log(nombre);

    if (dni == '1' && nombre == 'persona') {

        res.redirect('seleccionado');
    } else {

        res.redirect('noseleccionado');
    }
})

router.post('/login', (req, res, next) => {
    //falta arregalarlo a router
    const { username, password } = req.body;

    passport.authenticate('local.signin', {
        successRedirect: '/dashboard',
        failureRedirect: '/',
        failureFlash: false,
        session: false
    })(req, res, next);

});

router.get('/logout', (req, res) => {
    req.logOut();
    res.redirect('/login');
});

module.exports = router;