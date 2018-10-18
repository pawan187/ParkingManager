<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/parking/config.php');
?>
<!DOCTYPE html>
<html>
<head> 
	<title>parking manager</title>
	<link rel="shortcut icon" href="https://freeiconshop.com/wp-content/uploads/edd/car-flat.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<style type="text/css">
	body{
		background-image: url("https://www.setaswall.com/wp-content/uploads/2018/01/BMW-E92-Wallpaper-26-1920x1200.jpg");
	}
		
	</style>
	

</head>
<body >
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="/parking/home.php">
  	<i class="fas fa-car"></i>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/parking/home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      	<?php if(!isset($_SESSION["username"])){
        echo "<a class='nav-link' href='/parking/login.php'>Login</a>";
    	}?>
      </li>

      <li class="nav-item active">
      	<?php if(isset($_SESSION["username"])){
      		if($_SESSION["username"]=="pawan"){
       		 echo "<a class='nav-link' href='/parking/admin.php'>Admin</a>";
    		}
    	}
    	?>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/parking/help.php"> help <span class="sr-only">(current)</span></a>
      </li>
      <li>
      	
      <form class="form-inline my-2 my-lg-0" action="/parking/home.php" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search-element">
      <button name="search" class="btn btn-primary btn-sm" type="submit">Search</button>
    
    </form>
      </li>
    </ul>
    <?php if(isset($_SESSION["username"])){
    	echo "<a class='btn btn-primary btn-sm' href='/parking/profile.php'>profile</a>";
        }
        ?>
	
  </div>
</nav>