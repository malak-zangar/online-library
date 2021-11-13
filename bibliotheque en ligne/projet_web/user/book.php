<?php
session_start();
require_once 'connexiondb.php';
$conn->query("set names 'utf8' ");
$result = mysqli_query($conn,"SELECT * FROM livre where nb_exemplaire>0");
/*echo $_SESSION['adminn']['mail_a'];*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Panel</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="user.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">

    </script>

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
#f {
    padding-top: 6%;
}

#i1 {
    
    border-radius: 25px;
    position: relative;
    line-height: 20px;
    padding: 0 22px;
    font-size: 20px;
    margin: 2%;
   
}

#i1:hover {
    background-color: black;
    color: snow;
    cursor: pointer;
    transition: 0.4s ease-in-out;
    transform: scale(1.0.2);
}

#i2 {
    left: 40%;
    border-radius: 50%;
    position: relative;
    line-height: 100px;
    padding: 0 22px;
    font-size: 26px;
    margin: 2%;
    background-color: gray;
    border: none;
    font-size: 1.2em;
}

#i2:hover {
    background-color: darkorange;
    color: snow;
    cursor: pointer;
    transform: scale(1.09);
    transition: 0.4s ease-in-out;
}

#f select {
    left: 0px;
    border-radius: 25px;
    position: relative;
    line-height: 20px;
    padding: 0 22px;
    font-size: 25px;
    margin: 3%;
  

#f select:hover {
    background-color: black;
    color: snow;
    cursor: pointer;
    transition: 0.4s ease-in-out;
    transform: scale(1.2);
}

	</style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
			<h3>Welcome  <h3 id='b1'><?php 
				echo $_SESSION['user']['name_u'].'!';
                
				?><h3> </h3>
				
                
            </div>

            <ul class="list-unstyled components">
            
                
                
                
                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Actions</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                       
                      
                        <li>
                            <a href="user.php">Account Information</a>
                        </li>
                        <br>
                        
                        
                       
                       
                        <li>
                            <a href="emp.php">Empreints</a>
                        </li>
                        <br>
                       
                        <li>
                            <a href="book.php">Books</a>
                        </li>
                    </ul>
                </li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
                
                
            </ul>

            
        </nav>
        <!-- Page Content  -->
        <div class="search">
        
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

            
            <p style="color:pink;font-size:50px;"> Available books:</p>
			<?php
            if (mysqli_num_rows($result) > 0) {
		   ?>
		<table>
		
		<tr>
			<th>isbn</th>
			<th>titre</th>
			<th>auteur</th>
			<th>nb_exemplaire</th>
			<th>langue</th>
            <th > Action <th>
		</tr>
		<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row["isbn"]; ?></td>
			<td><?php echo $row["titre"]; ?></td>
			<td><?php echo $row["auteur"]; ?></td>
			<td><?php echo $row["nb_exemplaire"]; ?></td>
			<td><?php echo $row["langue"]; ?></td>
            <td><a href="empr.php?isbn=<?php echo $row["isbn"]; ?>"><u>Emprenter</u></a></td>
            
            
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
    <form id="f" action="search.php" method="post">
        <h3>Search Bar</h3>
            <select name='i'> 
                <option value='titre'>titre</option>
                <option value='auteur'>auteur</option>
            </select><br>
            <input id="i1" name="i1" type="text" placeholder="type to search ..."><br>
            <input id="i2" name="i2" type="submit" value="Search">

        </form>
    </div>
</body>

</html>