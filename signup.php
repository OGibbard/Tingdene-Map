<!DOCTYPE html>

<html>
    <head>
        <Title>
            Sign up
        </Title>    
    </head>
    <body>
        <h1>
            Please Sign Up.
        </h1>
        <form action='signupprocess.php' method='POST'>
            User name:<input type='text' name='username'><br>
            Password:<input type='password' name='passwd'><br>
            Company:<input type='text' name='company'><br>
            <input type="radio" name="accounttype" value="user" checked>User<br>
            <input type="radio" name="accounttype" value="customer">Customer<br>
            <input type="radio" name="accounttype" value="admin">Admin<br>
            <input type="submit" value="Sign up">
        </form>
        <br>
        <a href="login.php">Click here to login.</a>
    </body>
</html>