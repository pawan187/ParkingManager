<?php require_once("./config.php");
$pid =  $_GET["id"];
if(isset($_POST["wanttopark"])){
	if(isset($_SESSION["uid"])){
		update_status();
	}else{
		echo "<script type='text/javascript'>location.href = '/parking/login.php';</script>";		
	}
}
if(isset($_POST["comment"]) and isset($pid)){
	//echo "comment is uploading";
	add_comment($_POST["datacomment"],$pid);
}
$space = get_lot_on_id($pid);

?>
<?php require_once("./partials/header.php"); ?>
	<div class="container">
		<div class="container-fuild">
		<br>
			<div class="row">
				<div class="col">
					<img src="<?php echo $space["picrurl"];?>" height='300' width="500" >

				</div>
		
				<div class="col">
					<h2>title: <?php echo $space["title"];?></h2>
					<p>address :
						<?php echo $space["address"];?>
					</p>
					<h6>
					<?php
					$check  = check(); 
					//echo $check;
					//check the spot is empty or not
						if($check==1){
							//if yes print spot is occupied
							echo "spot is occupied";
							}
						else{
						//there is a space
							echo "spot is empty";
							echo "</br>";
							if($space["statusinfo"]==True){
								if(isset($_SESSION["uid"])){
									if($space["uid"]==$_SESSION["uid"]){
									echo "please click this when you leave:";
									echo "<form action='/parking/sitepage.php?id=".$space["pid"]."' method='POST'>
									<button name='wanttopark' value=0>click here</button>
									</form>";
									}
								}
								else{
									echo "any person heading to the spot :";
									echo "yes";
								}
							}
							else{
								echo "any person heading to the spot :";
								echo "no";
								echo "</br>";
								echo "do you want to park:";
								echo "<form action='/parking/sitepage.php?id=".$space["pid"]."' method='POST'>
								<button name='wanttopark' value=1>click here</button>
								</form>";
       						}
						}
					?>
					</h6>
				</div>
			</div>
	
		</br>
			<div class="row">
				<div class="col">
					<h6>
						this is a link to the location of the parking spot <a href="<?php echo $space["mapurl"];?>">link</a>
					</h6>
					<span class="border border-primary">	
					<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d60322.73503409181!2d72.88241751915916!3d19.100155440812205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3be7c8820de45b07%3A0x34d5ce67410d9e0!2sVidyavihar%2C+Mumbai%2C+Maharashtra!3m2!1d19.079961!2d72.89876699999999!4m5!1s0x3be7c8081c1d7b43%3A0xbaf100c54b8be366!2sPowai%2C+Mumbai%2C+Maharashtra!3m2!1d19.1196773!2d72.9050809!5e0!3m2!1sen!2sin!4v1538137031966" width="1200" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				
					</span>
				</div>
			</div>
			<br>
				<div align='center' >
					<h4>live status of the lot</h4>
					<iframe src='<?php echo $space["statusurl"];?>' height=300 width=500 ></iframe>
				</div>
							<br>
			<div>
				<h4>comments:</h4>
				<?php
			 get_comments($pid);?>
			
			</div>
			<div class="row">
				<form action='/parking/sitepage.php?id=<?php echo $space["pid"];?>' method="POST">
					<input type="text" name="datacomment">
					<input type='submit' name='comment'>
				</form>
			</div>
		</div>
	<br>
	</div>
</br>

<?php require_once("./partials/footer.php"); ?>