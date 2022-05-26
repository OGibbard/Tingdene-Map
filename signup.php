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
            <input type="radio" name="accounttype" value="User" checked>User<br>
            <input type="radio" name="accounttype" value="Customer">Customer<br>
            <input type="radio" name="accounttype" value="Admin">Admin<br>
            <input type="submit" value="Sign up">
        </form>
        <br>
        <a href="login.php">Click here to login.</a>
    </body>
</html>