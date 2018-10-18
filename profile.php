<?php 
require_once("./config.php");
if(isset($_GET["hello"])){
    logout();
}
$user = get_user();
//echo $user["email"];
?>

<?php require_once("./partials/header.php"); ?>
	<div class='container' style="margin-top:10px;">
		<div class="row">
			<div class="col">
                <h6>Name:<?php echo $_SESSION["username"]; ?>
                </h6>
                <h6>contact:<?php echo $user["contacts"];?>
                </h6>
                <h6>email:<?php echo $user["contacts"];?>
                </h6>

                <a href='/parking/profile.php?hello=true'>logout</a>
</div>

            <div class="col">
                <img src="">
            </div>
        </div>
	</div>
	
    <?php require_once("./partials/footer.php"); ?>
	
