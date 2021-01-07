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
    failureFash: false
}));

router.get('/verificar', (req, res) => {
    res.render('verificar');
})


router.get('/login', isNotLoggedIn, (req, res) => {
    res.render('login');
})

router.get('/seleccionado', async(req, res) => {
    const respuesta = await pool.query('SELECT * FROM HOSPITAL');
    res.render('seleccionado', { resultado: respuesta })
})

/* router.get('/dashboard', (req, res) => {
    res.render('dashboard');
}) */

router.get('/dashboard', isLoggedIn, async(req, res) => {
    const personas = await pool.query('SELECT * FROM PERSONA');
    const ubicaciones = await pool.query('SELECT * FROM UBICACION');
    const categorias = await pool.query('SELECT * FROM CATEGORIA');
    const subcategorias = await pool.query('SELECT * FROM SUBCATEGORIA');
    res.render('admin', { personas, ubicaciones, categorias, subcategorias });
})

/* router.post('/verificar', (req, res) => {

    const { dni, nombre } = req.body;

    res.redirect('seleccionado');
}) */

router.post('/verificar', (req, res, next) => {

    /* console.log(req.body); */

    /* if (req.body['g-recaptcha-response'] === undefined || req.body['g-recaptcha-response'] === '' || req.body['g-recaptcha-response'] === null) {
        res.render('verificar')
        return res.json({ "responseError": "something goes to wrong" });
    }
    const secretKey = "6Lehlh4aAAAAAIVBY7LYIR1lRub1is89RB156d3s";

    const verificationURL = "https://www.google.com/recaptcha/api/siteverify?secret=" + secretKey + "&response=" + req.body['g-recaptcha-response'] + "&remoteip=" + req.connection.remoteAddress;

    request(verificationURL, function(error, response, body) {
        body = JSON.parse(body);

        if (body.success !== undefined && !body.success) {
            return res.json({ "responseError": "Failed captcha verification" });
            res.render('/verificar')
        }
        res.json({ "responseSuccess": "Sucess" });

        console.log("viewoviewbnvibewvoibewvoibwev");
    });
 */
    passport.authenticate('local.validate', {
        successRedirect: '/seleccionado',
        failureRedirect: '/verificar',
        failureFash: true,
        session: false
    })(req, res, next);

});

router.post('/login', (req, res, next) => {
    /* const { username, password } = req.body; */

    passport.authenticate('local.signin', {
        successRedirect: '/dashboard',
        failureRedirect: '/login',
        failureFlash: true
    })(req, res, next);

});

router.post('/captcha', (req, res) => {
    if (req.body === undefined || req.body === '' || req.body === null) {
        return res.json({
            "responseError": "captcha error "
        });
    }
    const secretKey = "6Lehlh4aAAAAAIVBY7LYIR1lRub1is89RB156d3s";
    const verificationURL = "https://www.google.com/recaptcha/api/siteverify?secret=" + secretKey + "&response=" + req.body + "&remoteip=" + req.connection.remoteAddress;
    request(verificationURL, function(error, response, body) {
        body = JSON.parse(body);
        if (body.success !== undefined && !body.success) {
            return res.json({ "responseError": "Failed captcha verification" });
        }
        console.log("Funciona")
        res.json({ "responseSuccess": "Sucess" });
    });
});

router.get('/logout', (req, res) => {
    req.logOut();
    res.redirect('/login');
});

module.exports = router;