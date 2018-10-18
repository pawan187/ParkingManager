<?php 
require_once("./config.php");
if(isset($_POST["addlot"])){
    echo "lot adding";
    add_lot();
}
?>

<?php require_once("./partials/header.php"); ?>
        <div class="container">
            <div class="container-fluid">
        <div class="col-sm-6 col-sm-offset-5">
                                    <h1> ADDING A PARKING LOT</h1>
                            <form class="" action="/parking/admin.php" method="POST">
                            <div class="form-group"><label for="">
                                address<input type="text" name="address" class="form-control"></label>
                            </div>
                             <div class="form-group"><label >
                                site_title<input type="text" name="site_title" class="form-control"></label>
                            </div>
                            <div class="form-group"><label for="">
                                pic url<input type="text" name="picrurl" class="form-control"></label>
                            </div>
                            <div class="form-group"><label for="">
                                map url<input type="text" name="mapurl" class="form-control"></label>
                            </div>
                             <div class="form-group"><label >
                                status url<input type="text" name="statusurl" class="form-control"></label>
                            </div>
                            <div class="form-group">
                              <button type="submit" name="addlot" class="btn btn-primary" >add lot</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
	
    <?php require_once("./partials/footer.php"); ?>
	
