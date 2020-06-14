var mysql      = require('mysql');
var connection = mysql.createConnection({
    host: "database-1.c2ccpjw7s7h5.us-east-1.rds.amazonaws.com",
    user: "admin",
    password: "whysoserious",
    database: "test"
});

connection.connect((err) => {
    if (err) throw err;
    console.log('Connected!');
    
  });