<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <style>
        body{
            display:grid;
            place-items:center;
            padding-top:50px;
        }
        form{
            text-align:center;
            padding:20px;
            border: 1px solid black
        }
        .input{
            display:flex;
            flex-direction:column;
            text-align:start;
            margin-top:10px
        }
        .input label{
            margin:2px;
            font-size:16px
        }
        .input input{
            padding: 3px 6px 3px 6px;
            margin-top:4px;
            width:200px
        }
        button{
            margin-top:20px;
            background-color:black;
            color:white;
            padding:4px 4px 4px 4px;
            width:150px
        }
    </style>
    <form action="/handleLogin" method="POST">
        <h1 class="title">Login</h1>
        <div class="input">
            <label for="email">email</label>
            <input required name="email" type="email" placeholder="Enter you email adress">
        </div>
        <div class="input">
            <label for="password">password</label>
            <input required name="password" type="password">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>