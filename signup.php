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
            User name:<input type='text' name='Username'><br>
            Password:<input type='password' name='Pword'><br>
            <input type="radio" name="role" value="User" checked>User<br>
            <input type="radio" name="role" value="Customer">Customer<br>
            <input type="radio" name="role" value="Admin">Admin<br>
            <input type="submit" value="Sign up">
            <br>
            <br>
            <a href="login.php">Click here to login.</a>
        </form>
    </body>
</html>