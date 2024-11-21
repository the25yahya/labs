const exp = require("constants");
const express = require("express");
const app = express()
const path = require("path");
const port = 3000
const sqlite = require("sqlite3");

// Connect to the SQLite database
const db = new sqlite.Database('./lab.db', (err) => {
    if (err) {
        console.error(err.message);
    } else {
        console.log("Connected to SQLite database");
    }
});


app.use('/static',express.static(path.join(__dirname,'static')))
app.use(express.json())

app.get('/',(req,res) => {
    res.sendFile(path.join(__dirname, 'static', 'index.html'));
})
app.get('/api/comments',(req,res) => {
    db.all('SELECT * FROM comments',[],(err,rows)=>{
        if (err) {
            console.error(err.message);
            res.status(500).json({error:"FAILED TO FETCH COMMENTS"});
        }else{
            res.json(rows);
        }
    })
})

app.post('/api/addComments', (req, res) => {
    const { user, comment } = req.body;

    // Validate request data
    if (!user || !comment) {
        return res.status(400).json({ error: "User and comment fields are required" });
    }

    // Insert comment into the database
    const sql = 'INSERT INTO comments (user, comment) VALUES (?, ?)';
    db.run(sql, [user, comment], function (err) {
        if (err) {
            console.error(err.message);
            return res.status(500).json({ error: "Failed to add comment" });
        }
        res.status(201).json({ message: "Comment added successfully", id: this.lastID });
    });
});


app.listen(port, '0.0.0.0', () => {
    console.log(`Server running at http://0.0.0.0:${port}`);
});
