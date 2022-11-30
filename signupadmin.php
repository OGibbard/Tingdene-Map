<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <Title>
            Sign up
        </Title>    
    </head>
    <body>
        <div class='main' height: '700px'>
        <p class='sign' align='center'>Sign Up as Admin:</p>
        <form class='form1' action='signupprocess.php' method='POST'>
            <input class='un' placeholder='Username' type='text' name='username'><br>
            <input class='un' placeholder='Company' type='text' name='company'><br>
            <input class='pass' placeholder='Password' type='password' name='passwd'><br>
            <input type='hidden' name='accounttype' value='admin'>
            <input class='submit' type="submit" value="Sign up">
        </form>
        <br>
        <p align='center'><a href="signup.php">Click here to sign up as an user.</a></p>
        <p align='center'><a href="login.php">Click here to login.</a></p>
        <br>
        <br>
        </div>
    </body>
</html>