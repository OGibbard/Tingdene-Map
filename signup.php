<!DOCTYPE html>

<html>
    <head>
        <Title>
            Login
        </Title>    
    </head>
    <body>
        <h1>
            Please login.
        </h1>
        <form action='signupprocess.php' method='POST'>
            User name:<input type='text' name='Username'><br>
            Password:<input type='password' name='Pword'><br>
            <input type="radio" name="role" value="User" checked>User<br>
            <input type="radio" name="role" value="Customer" checked>Customer<br>
            <input type="radio" name="role" value="Admin" checked>Admin<br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>