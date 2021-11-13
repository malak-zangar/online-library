<?php 
SESSION_START();
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
    form p{color:black;}
    input  {
        width: 50%;
        height:12px;
        padding: 12px 40px;
        margin: 20px 40px;
        box-sizing: border-box;
        border: 2px solid rgb(118, 124, 146);
        border-radius: 4px;
        background-color: #edf2f8;
        color: rgb(94, 7, 7);
    }
    
   
    
    input:focus {
        background-color: cornsilk;
        border: 3px rosybrown;
    }
    
    #button {
        background-color: orange;
        border: seagreen;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        cursor: pointer;
        width: 80%;
       
        font-size: large;
        height:10%;
    }
    #button:hover {
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
    
    html,body{
    width:100%;
    height:100%;
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
                            <a href="javascript:window.location='insert.php?name='+(window.location.href).substr(window.location.href.indexOf('=')+1,(window.location.href).length-(window.location.href.indexOf('=')+1));">Insert book</a>
                        </li>
                        <br>
                        
                        
                       
                       
                        <li>
                            <a href="javascript:window.location='Update.php?name='+(window.location.href).substr(window.location.href.indexOf('=')+1,(window.location.href).length-(window.location.href.indexOf('=')+1));">Update Book</a>
                        </li>
                        <br>
                       
                        <li>
                            <a href="javascript:window.location='delete.php?name='+(window.location.href).substr(window.location.href.indexOf('=')+1,(window.location.href).length-(window.location.href.indexOf('=')+1));">Delete Book</a>
                        </li>
                    </ul>
                </li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
                
                
            </ul>

            
        </nav>
    <script>
        function c(){
            var v=window.location.href.indexOf('=')+1;
                var w=(window.location.href).substr(v,(window.location.href).length-v);
                return w;
        }
    </script>



	<form method="post" action="insertprocess.php?name='javascript:document.write(c());'" style="padding-left=100px;">
    <p style="color:pink;font-size:20px;"> Insert book:</p>
    
		<p>isbn:</p>
		<input type="text" name="isbn">
		<p>titre:</p>
		<input type="text" name="titre">
		
        <p>auteur:</p>
		<input type="text" name="auteur">
		
		<p>nombre exemplaire:</p>
		<input type="text" name="nb_exem">
        
		<p>langue:</p>
		<input type="text" name="langue">
		
		<input id="button" type="submit" name="save" value="submit">
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