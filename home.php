<?php require_once("./config.php"); ?>
<?php require_once("./partials/header.php"); ?>
	<div class='container' style="margin-top:10px;">
		<div class="row">
			<?php 
			if(isset($_POST["search"]) and isset($_POST["search-element"])){
				$address = $_POST["search-element"];
				get_lot_by_search($address);
			}
			else{
			 get_lot();
			 //get_lot();
			  }
			?>

	</div></div>
<?php require_once("./partials/footer.php"); ?>
	
