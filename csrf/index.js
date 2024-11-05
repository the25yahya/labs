const express = require('express')
const app = express()
const PORT = 3000
const path = require('path')
const expressLayouts = require('express-ejs-layouts');

//ejs engine 
app.set('view engine','ejs')
app.set('views',path.join(__dirname,'views'))


// Use express-ejs-layouts middleware
app.use(expressLayouts);
app.set('layout', 'layouts/base'); // Set the default layout

app.use(express.static(path.join(__dirname,'public')))

app.get('/',(req,res)=>{
    res.render('index',{title:'home',message:'welcome to the home page'})
})

app.listen(PORT,()=>{
    console.log("SERVER LISTENING ON PORT",PORT);
    
})