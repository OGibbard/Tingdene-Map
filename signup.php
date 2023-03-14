<!DOCTYPE html>

<html>
    <head>
        <!-- Import stylesheet -->
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <Title>
            Sign up
        </Title>    
    </head>
    <body>
        <!-- Main form -->
        <div class='main' height: '700px'>
        <p class='sign' align='center'>Sign Up:</p>
        <!-- Form -->
        <form class='form1' action='signupprocess.php' method='POST'>
            <input class='un' placeholder='Username' type='text' name='username'><br>
            <input class='pass' placeholder='Password' type='password' name='passwd'><br>
            <input type='hidden' name='accounttype' value='user'>
            <input class='submit' type="submit" value="Sign up">
        </form>
        <br>
        <!-- Other links for admin sign up and login -->
        <p align='center'><a href="signupadmin.php">Click here to sign up as an admin.</a></p>
        <p align='center'><a href="login.php">Click here to login.</a></p>
        <br>
        <br>
        </div>
    </body>
</html>