<?php require_once("./config.php");?>
<?php
if(isset($_GET["check"])){
	signup();
}
?>
<?php require_once("./partials/header.php"); ?>
	<div class='container' style="margin-top:10px;">
		<div class="row">
				 <div class="col">
            		<div class="col-sm-4 col-sm-offset-5">
        		            <h1> sign up</h1>
        			    <form class="" action="/parking/signup.php?check=true" method="POST" >
        		        <div class="form-group"><label for="">
        		            username:<input type="text" name="username" class="form-control"></label>
        		        </div>
        		         <div class="form-group"><label for="password">
        		            Password:<input type="password" name="password" class="form-control"></label>
        	        	
        		         <div class="form-group"><label for="">
        		            email:<input type="text" name="email" class="form-control"></label>
						</div>
						<div class="form-group"><label for="">
        		            contact:<input type="text" name="contact" class="form-control"></label>
        		        </div>        	        	
                		<div class="form-group">
                		  <input type="submit" name="signup" class="btn btn-primary" >
                		</div>
            			</form>
            
            		</div>
        		</div>
		</div>
	</div>
<?php require_once("./partials/footer.php"); ?>
	
