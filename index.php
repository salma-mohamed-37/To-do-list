<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/master.css"/>
        <meta charset="UTF-8"/>
        <title>To Do List </title>
    </head>
    <body>
    <?php include'header.php' ?>
        <form>
            SIGN UP <br/>
            <span>
                - All fields of form are required <br>
                - Password is at least 8 characters with at least 1 number and 1 special character <br>
                - Password must match confirm password <br>
              </span>
            <label for="firstname"><span>*</span>First Name:</label>
            <input type="text" name="firstname" id="firstname" required/> 
            <br/>
            <label for="lastname"><span>*</span>Last Name:</label>
            <input type="text" name="lastname" id="lastname" required/>
            <br/>
            <label for="username"><span>*</span>Username:</label>
            <input type="text" name="username" id="username" required/>
            <br/>
            <label for="password"><span>*</span>Password:</label>
            <input type="password" name="password" id="password" required/>
            <br/>
            <label for="cpassword"><span>*</span>Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassword" required/>
            <br/>
            <input type="button" value="Sign up" name="submit" style="display:block;margin:auto;" onclick="signup()"/>
            <span id="error"></span>
            <p id="message"></p>
            <p>If you already have an account <a href="signin.php"><input type="button" name="signin" value="sign in"/></a></p>
            
        </form>
        <?php include'footer.php' ?>
        <script src="JS/ajax.js"></script>
        <script src="JS/validations.js"></script>
        
    </body>
</html>
