
<?php
SESSION_START();
include_once 'connexiondb.php';
$result = mysqli_query($conn,"SELECT * FROM user");
/*echo $_SESSION['adminn']['mail_a'];*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CAdmin Panel</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="admin.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<style>
		table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}
th{
	text_align:center;
	color:violet;
}

tr:nth-child(even) {
    background-color: white;
}
#b1{
    color:indianRed;
    font-size:40px;
    -webkit-text-stroke: 0.3vh darkslategray;
    text-transform: uppercase;
}
tr:hover{
    background-color: darkorange;
    color: snow;
    cursor: pointer;
    transition: 0.4s ease-in-out;
    transform: scale(1.02);
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
			<h3>Welcome Admin<h3 id='b1'> <?php 
				echo $_SESSION['adminn']['name_a'].'!';
				?> </h3></h3>
				
                
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Accounts</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="admin.php">books</a>
                        </li>
                        <li>
                            <a href="user.php">User</a>
                        </li>
                        <li>
                            <a href="emp.php">Empreints</a>
                        </li>
                        
                    </ul>
                </li>
                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Actions </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                       
                       
                        
                       
                        <li>
                            <a href="insertuser.php">Insert user</a>
                        </li>
                        <br>
                        
                        
                        

                    </ul>
                </li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
                
                
            </ul>

            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Collapse Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    
                </div>
            </nav>

            
            <p style="color:pink;font-size:50px;"> Our users:</p>
			<?php
            if (mysqli_num_rows($result) > 0) {
		   ?>
		<table>
		
		<tr>
			<th>cin_u</th>
			<th>name_u</th>
			<th>password_u</th>
			<th>status</th>
			<th>mail_u</th>
            <th>phone_u</th>
            <th colspan="2">Actions</th>
		</tr>
		<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row["cin_u"]; ?></td>
			<td><?php echo $row["name_u"]; ?></td>
			<td><?php echo $row["password_u"]; ?></td>
			<td><?php echo $row["status"]; ?></td>
			<td><?php echo $row["mail_u"]; ?></td>
            <td><?php echo $row["phone_u"]; ?></td>
            <td><a href="deleteprocessuser.php?cin_u=<?php echo $row["cin_u"]; ?>"><u>Delete</u></a></td>
            <td><a href="updateprocessuser.php?cin_u=<?php echo $row["cin_u"]; ?>"><u>Update</u></a></td>
		</tr>
		<?php
		$i++;
		}
		?>
		</table>
		<?php
		}
		else{
			echo "No result found";
		}
		?>

            
            
        </div>
    </div>



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