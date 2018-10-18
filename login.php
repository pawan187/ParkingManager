<?php require_once("./config.php");
//check1();
?>
<?php
	if(isset($_POST["Login"])){
		login();
}
	
?>
 
<?php require_once("./partials/header.php"); ?>
    <!-- Page Content -->
    <div class="container">

      <header>
      	<div class="container-fluid">
 			<div class="row">
 				<div class="col">

        			<div class="col-sm-4 col-sm-offset-5">
        				            <h1> Login</h1>
        			    <form class="" action="/parking/login.php" method="POST">
        			        <div class="form-group"><label for="">
        			            username<input type="text" name="username" class="form-control"></label>
        			        </div>
        			         <div class="form-group"><label for="password">
        			            Password<input type="password" name="password" class="form-control"></label>
        			        </div>

               		 		<div class="form-group">
               		 		  <button type="submit" name="Login" class="btn btn-primary" >Login</button>
                			</div>
            			</form>
            		</div>
            	<div class="col">
            			<div class="form-group">
            				<a href="/parking/signup.php">
               			 	<button type="submit" name="signup" class="btn btn-primary" >signup</button>
                			</a>
                		</div>
                	
            	</div>
        	</div>
        </div>
       </div>
    </header>


    </div>
<?php require_once("./partials/footer.php"); ?>
	
