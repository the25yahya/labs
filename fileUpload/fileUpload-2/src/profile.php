<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<style>
    *{
        margin:0px;
        padding:0px;
        font-family:arial;
    }
    .update-profile{
        display:flex;
        align-items:center;
    }
    .update-profile div{
        display:flex;
        flex-direction:column;
    }
    .update-profile img{
        width:80px;
        border-radius:100%;
    }
</style>
<body>
    <div class="container">
        <div style="border-bottom:1px solid black;padding:15px">
            <h1 style="font-size:24px;font-weight:bold">Account</h1>
            <h2 style="font-size:16px;color:grey;margin-top:8px">Manage your profile</h2>
        </div>
        <div style="padding:20px">
            <div class="update-profile">
                <img src="/assets/profile.png" alt="">
                <div>
                    <p style="font-size:1.2rem">Profile picture</p>
                    <form action="/handlePfp" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" id="file">
                        <button type="submit" style="padding:3px 4px 3px 4px;background-color:black;color:white;margin-top:10px">upload</button>
                    </form>
                </div>
            </div>
            <div style="margin-top:50px">
                <h2 style="margin:10px">Details</h2>
                <div>
                    <div>
                        <div>
                            <label style="display:block" for="username">username</label>
                            <input name="username" type="text">
                        </div>
                        <div>
                            <label style="display:block" for="email">email</label>
                            <input name="email" type="email">
                        </div>
                    </div>
                    <button style="padding:3px 4px 3px 4px;background-color:black;color:white;margin-top:10px">save</button>
                </div>
            </div>
            <div></div>
            <div></div>
        </div>
    </div>
</body>
</html>