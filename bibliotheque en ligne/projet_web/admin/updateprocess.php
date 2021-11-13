
<?php
SESSION_START();
require_once 'connexiondb.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE livre set isbn='" . $_POST['isbn'] . "', titre='" . $_POST['titre'] . "', auteur='" . $_POST['auteur'] . "', nb_exemplaire='" . $_POST['nb_exemplaire'] . "' ,langue='" . $_POST['langue'] . "' WHERE isbn='" . $_POST['isbn'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM livre WHERE isbn='" . $_GET['isbn'] . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="admin.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <style>
form {
        margin: auto;
        width: 36%;
        padding: 0px 20px 5px 10px;
        background-color: rgb(236, 237, 245);
        margin-top: 10px;
        display:block;
    }

    
    
    label {
        font-size: 25px;
        color: rgb(11, 137, 146);
    }
    
    
    
   
    
    input:focus {
        background-color: cornsilk;
        border: 3px rosybrown;
    }
    
    .buttom {
        background-color: orange;
        border: seagreen;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        cursor: pointer;
        width: 70%;
        float:left;
        font-size: large;
    }
    .buttom:hover {
        background-color: cyan;
        transform:scale(1.02);
        color:black;
        transition: 0.4s ease-in-out;

    }
    #b1{
    color:indianRed;
    font-size:40px;
    -webkit-text-stroke: 0.3vh darkslategray;
    text-transform: uppercase;
}

body{
    background:linear-gradient(-45deg,firebrick,rosybrown,TEAL,chocolate);
    background-size:400% 400%;
    animation:gradient 15s ease infinite;
}
@keyframes gradient{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}
form p{
    padding-left:50px
}
form input {
    left: 100px;
    border-radius: 6px;
    position: relative;
    line-height: 40px;
    padding: 0 22px;
    font-size: 16px;
    margin: 2%;
}
form p{
    color:black;
}
    

</style>

  </head>
  <body>

  <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
			<h3>Welcome Admin <h3 id='b1'><?php 
				echo $_SESSION['adminn']['name_a'].'!';
                
				?><h3> </h3>
				
                
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Accounts</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="admin.php">Books</a>
                        </li>
                        <li>
                            <a href="user.php">Users</a>
                        </li>
                        <li>
                            <a href="emp.php">Empreints</a>
                        </li>
                        
                    </ul>
                </li>

                
                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Actions</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                       
                        <li>
                            <a href="update.php">Update book</a>
                        </li>
                        <li>
                            <a href="delete.php">Delete book</a>
                        </li>
                        <li>
                            <a href="insert.php">Insert book</a>
                        </li>
                        <br>
                        
                       
                    </ul>
                </li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
                
                
            </ul>

            
        </nav>
       
    





<form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?>
    </div>
    <div style="padding-bottom:5px;">
    
    </div>
    <p >isbn:</p>
    <input type="hidden" name="isbn" class="txtField" value="<?php echo $row['isbn']; ?>">
    <input type="text" name="isbn"  value="<?php echo $row['isbn']; ?>">
    <p>titre: </p>
    <input type="text" name="titre" class="txtField" value="<?php echo $row['titre']; ?>">
    <p>auteur :</p>
    <input type="text" name="auteur" class="txtField" value="<?php echo $row['auteur']; ?>">
    <p>nbre exemplaire:</p>
    <input type="text" name="nb_exemplaire" class="txtField" value="<?php echo $row['nb_exemplaire']; ?>">
   <p> langue: </p>
    <input type="text" name="langue" class="txtField" value="<?php echo $row['langue']; ?>">
    <input type="submit" name="submit" value="Submit" class="buttom">
</form>


     <!-- jQuery CDN - Slim version (=without AJAX) -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

  </body>
</html>