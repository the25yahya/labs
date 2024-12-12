const sqlite = require("sqlite3");

// Connect to the SQLite database
const db = new sqlite.Database('./lab.db', (err) => {
    if (err) {
        console.error(err.message);
    } else {
        console.log("Connected to SQLite database");
    }
});

// Delete the `users` table if it exists
db.run(`DROP TABLE IF EXISTS users`, (err) => {
    if (err) {
        console.error("Error deleting `users` table:", err.message);
    } else {
        console.log("Deleted `users` table (if it existed)");
    }
});

// Create the `comments` table
db.run(
    `CREATE TABLE IF NOT EXISTS comments (
        user TEXT,
        comment TEXT
    )`,
    (err) => {
        if (err) {
            console.error("Error creating `comments` table:", err.message);
        } else {
            console.log("Created `comments` table");

            // Insert dummy data into the `comments` table
            const insertStmt = db.prepare(`INSERT INTO comments (user, comment) VALUES (?, ?)`);
            const dummyData = [
                ["Alice", "This is Alice's first comment!"],
                ["Bob", "Bob's thoughts on this topic."],
                ["Charlie", "Charlie agrees with Alice!"],
            ];

            dummyData.forEach(([user, comment]) => {
                insertStmt.run(user, comment, (err) => {
                    if (err) {
                        console.error("Error inserting dummy data:", err.message);
                    }
                });
            });

            insertStmt.finalize(() => {
                console.log("Inserted dummy data into `comments` table");

                // Fetch and display all rows from the `comments` table
                db.all(`SELECT * FROM comments`, [], (err, rows) => {
                    if (err) {
                        console.error("Error fetching data:", err.message);
                    } else {
                        console.log("Fetched data from `comments` table:");
                        rows.forEach((row) => {
                            console.log(`${row.user}: ${row.comment}`);
                        });
                    }

                    // Close the database connection
                    db.close((err) => {
                        if (err) {
                            console.error("Error closing database:", err.message);
                        } else {
                            console.log("Database connection closed");
                        }
                    });
                });
            });
        }
    }
);
