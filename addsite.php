<!DOCTYPE html>

<html>
    <head>
        <Title>
            Add site
        </Title>    
    </head>
    <body>
        <h1>
            Fill this in to add a site.
        </h1>
        <form action='addsiteprocess.php' method='POST'>
            Site name:<input type='text' name='sitename'><br>
            Site type:<input type='text' name='sitetype'><br>
            Latitude:<input type='text' name='latitude'><br>
            Longitude:<input type='text' name='longitude'><br>
            <input type="submit" value="Add site">
        </form>
        <br>
        <a href="login.php">Click here to login.</a>
    </body>
</html>