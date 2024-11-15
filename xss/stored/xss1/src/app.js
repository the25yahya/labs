const express = require("express");
const app = express()
const sqlite = require("sqlite3");
const port = 3000

const db = new sqlite.Database('./lab.db', (err)=>{
    if (err) {
        console.error(err.message);
    }else{
        console.log("connected to sqlite db");
        
    }
})

// Create a table if it doesn't exist
db.run(`CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT
  )`);

app.get('/',(req,res) => {
    res.send("all good")
})

app.listen(port,()=>{
    console.log("server running at port : ", port);
})