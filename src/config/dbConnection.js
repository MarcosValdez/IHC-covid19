const mysql = require('mysql');

module.exports = () => {
    return mysql.createConnection({
        host: 'bbqawibtcfyfmjgv0usz-mysql.services.clever-cloud.com',
        user: 'uhywjyex8jbxjeox',
        password: 'QnGKOhD8Heed8htTO8OJ',
        database: 'bbqawibtcfyfmjgv0usz'
    });
}   