<html>

<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="aboutus.php">
    <link href="http://127.0.0.1/projet/projet/login.php">
    <link rel="shortcut icon" type="image/png" href=" images/logo.png">
    <link href="welcome.php">
</head>
<style>
    form {
        margin: auto;
        width: 70%;
        padding: 10px;
    }
    
    table {
        border: 3px dotted rgb(80, 3, 3);
        width: 100%;
        padding: 20px;
    }
    
    h1 {
        text-align: center;
        color: rgba(160, 8, 102, 0.671);
        font-family: 'cac_champagneregular', Arial, serif;
        text-decoration: underline;
        font-size: 50px;
        padding: 10px;
    }
    
    label {
        font-size: 23px;
        color: rgb(11, 137, 146);
        padding: 12px 10px 12px 30px;
    }
    
    .un {
        width: 40%;
        background-color: rgb(250, 244, 250);
    }
    
    input,
    select {
        width: 95%;
        padding: 12px 40px;
        margin: 10px 40px;
        box-sizing: border-box;
        border: 2px solid rgb(118, 124, 146);
        border-radius: 4px;
        background-color: #edf2f8;
        color: rgb(94, 7, 7);
        font-size: 15px;
    }
    
    input:focus {
        background-color: cornsilk;
        border: 3px rosybrown;
    }
    
    .empty {
        text-align: center;
        background-color: rgba(247, 199, 221, 0.836);
        color: rgb(36, 7, 163);
    }
    
    p {
        margin: 10px;
        font-size: 20px;
    }
    
    button {
        background-color: #9fdb12;
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        cursor: pointer;
        width: 25%;
        position: relative;
        margin: 20px 50px;
        font-size: large;
        display: inline-block;
        float: right;
    }
    
    button:hover {
        opacity: 0.9;
    }
    
    .navbar {
        width: 85%;
        margin: auto;
        padding: 25px 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        background-color: rgb(243, 255, 240);
    }
    
    .logo {
        width: 120px;
        cursor: pointer;
        height: 100px;
    }
    
    .navbar ul li {
        list-style: none;
        display: inline-block;
        margin: 0 20px;
        position: relative;
    }
    
    .navbar ul li a {
        text-decoration: none;
        color: rgb(179, 44, 44);
        text-transform: uppercase;
        font-size: large;
    }
    
    .navbar ul li::after {
        content: '';
        height: 3px;
        width: 0%;
        background: #e4471f;
        position: absolute;
        left: 0;
        bottom: -10px;
        transition: 0.5;
    }
    
    .navbar ul li:hover::after {
        width: 100%;
    }
</style>

<body>
    <div class="navbar">
        <img src="logo.png" class="logo" height=50 width=400>
        <ul>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="welcome.phpl#contact">Contact Us</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="sign_up.php">Sign Up</a></li>
        </ul>
    </div>
    <form  action="signupprocess.php" method="post">
        <h1>SIGN UP :</h1>
        <table>
            <tr>
                <td class="un"><label>name : </label></td>
                <td> <input type="text" placeholder="Enter your full name please." name="name_u"  required> </td>
            </tr>
            <tr>
                <td class="un"> <label>CIN : </label></td>
                <td> <input type="number" placeholder="Enter your ID please." name="cin_u"  required></td>
            </tr>
            <tr>
                <td class="un"><label>Mail Address : </label></td>
                <td> <input type="text" placeholder="Enter your mail address please." name="mail_u" required></td>
            </tr>
            <tr>
                <td class="un"> <label>   Password : </label></td>
                <td><input type="password" placeholder="Enter your password please." name ="password1" required> </td>
            </tr>
            <tr>
                <td class="un"> <label>  Confirm Password : </label></td>
                <td> <input type="password" placeholder="Reenter your password please." name ="password2" required></td>
            </tr>
            <tr>
                <td class="un"><label>Status : </label></td>
                <td> <select name="selecteur">
               <option value="professor">Professor</option>
                <option value="student">Student</option>
              </select></td>
            </tr>
            <tr>
                <td class="un"><label>Phone number : </label></td>
                <td> <input type="text" placeholder="Enter your phone number please." name="phone_u" required> </td>
            </tr>

        </table>
        <button type="submit" name="save">Submit</button>
        <button type="reset">Cancel</button>
    </form>
</body>

</html>