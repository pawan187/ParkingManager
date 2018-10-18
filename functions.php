<?php

function get_lot_by_search($address) {
$connection = mysqli_connect("localhost","root","","parking_v2");
if($connection){
	//echo "connected";
}

$query = mysqli_query($connection," SELECT * FROM parkingdetails where address='$address'");

while($row = mysqli_fetch_array($query)) {


$product = <<<DELIMETER
			<span class="border border-primary">
            <div class="col-6">
                	<a href=/parking/sitepage.php?id={$row['pid']}>
                    <img src="{$row["picrurl"]}" alt="not found" height="100px" width="150px">
                   	<h6>{$row['address']}</h6>
                   	</a>
            </div>
            <div class="w-100"></div>
            </span>


DELIMETER;

echo $product;


        }


}

function check1(){

//The URL that we want to GET.
$url = 'http://localhost:8000';

//Use file_get_contents to GET the URL in question.
$contents = file_get_contents($url);

//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    //echo $contents;
}
$obj = json_decode($contents, true);
$n = sizeof($obj);
for ($i=0;$i < $n; $i++){ 
	# code...
	echo  $obj[$i]["itemname"],"\n";
}	
}
//$res = $obj[$n-1]["itemname"];
//echo $res;


function check(){

//The URL that we want to GET.
$url = 'https://thingspeak.com/channels/583148/field/1.json';

//Use file_get_contents to GET the URL in question.
$contents = file_get_contents($url);

//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    //echo $contents;
}
$obj = json_decode($contents, true);
$n = sizeof($obj['feeds']);
$res = $obj['feeds'][$n-1]["field1"];
//echo $res;
return  $res;
}
function update_status(){
	echo $_POST["wanttopark"];
	$connection = mysqli_connect("localhost","root","","parking_v2");
	if($connection){
		//echo "connected";
	}
	$id=$_GET["id"];
	$uid = $_SESSION["uid"];
	$info = $_POST["wanttopark"];
	$query = mysqli_query($connection," UPDATE parkingdetails SET statusinfo = '$info',uid = '$uid' WHERE parkingdetails.pid ='$id'");
	if($query){
		echo "updated succeffully";
	}else{
		echo "not updated";
	}

}
function get_lot() {
$connection = mysqli_connect("localhost","root","","parking_v2");
if($connection){
	//echo "connected";
}

$query = mysqli_query($connection," SELECT * FROM parkingdetails");

while($row = mysqli_fetch_array($query)) {


$product = <<<DELIMETER
			<span class="border border-primary" style="margin-top:10px;margin-left:10px;"">
            <div class="col-6">
                	<a href=/parking/sitepage.php?id={$row['pid']}>
                    <img src="{$row["picrurl"]}" alt="not found" height = "150px" width="300px">
                   	<h6>{$row['address']}</h6>
                   	</a>
            </div>
            <div class="w-100"></div>
            </span>


DELIMETER;

echo $product;


        }


}
function add_lot(){
$site_title = $_POST["site_title"];
$address = $_POST["address"];
$picrurl = $_POST["picrurl"];
$mapurl = $_POST["mapurl"];
$statusurl = $_POST["statusurl"];
$connection = mysqli_connect("localhost","root","","parking_v2");
if($connection){
	//echo "connected";
//	echo "connected";
	}	
	//INSERT INTO `parkingdetails`(`pid`, `address`, `title`, `picrurl`, `mapurl`, `statusurl`, `statusinfo`, `uid`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])

$query = mysqli_query($connection," INSERT INTO parkingdetails (address,title,picrurl,mapurl,statusurl) values('$address','$site_title','$picrurl','$mapurl','$statusurl')");
if(!$query){
	echo "lot added";
}

}
function get_lot_on_id($pid) {
$connection = mysqli_connect("localhost","root","","parking_v2");
if($connection){
	//echo "connected";
//	echo "connected";
	}

$query = mysqli_query($connection," SELECT * FROM parkingdetails WHERE pid = '$pid'");
while($row = mysqli_fetch_array($query)){
		return $row;
	}
}

function login(){
$connection = mysqli_connect("localhost","root","","parking_v2");
if($connection){
	//echo "connected";
	}
$username = $_POST["username"];

$password = $_POST["password"];
if($username && $password){
	$query = mysqli_query($connection," SELECT username , password, uid FROM usersdetails where username = '$username'");
	$num = mysqli_num_rows($query);
	//echo $num;
	if( $num != 0 ){
		while($row = mysqli_fetch_array($query)){
			$dbusername = $row["username"];
			$dbpassword = $row["password"];
			$dbuid = $row["uid"];
			if($dbusername==$username && $dbpassword==$password){
				$_SESSION["username"]=$username;
				$_SESSION["uid"]=$dbuid;
				echo "<script type='text/javascript'>location.href = '/parking/home.php';</script>";


			}
			else{
				echo "invalid password";
			}
		}
	}
	else{
		echo "invalid username";
	}
}
}

function get_user(){
	$uid = $_SESSION["uid"];
	$connection = mysqli_connect("localhost","root","","parking_v2");
	if($connection){
		//echo "connected";
	}
$query = mysqli_query($connection," SELECT * FROM usersdetails WHERE uid = '$uid'");
while($row = mysqli_fetch_array($query)){
		return $row;
}

}
function logout(){
	$_SESSION = array();
	session_destroy();
	echo "<script type='text/javascript'>location.href = '/parking/home.php';</script>";	
}
function signup(){
$connection = mysqli_connect("localhost","root","","parking_v2");
if($connection){
	//echo "connected";
}
$username = $_POST["username"];

$password = $_POST["password"];

$email= $_POST["email"];

$contact = $_POST["contact"];
if($username && $password){
	//echo "'$username','$password','$contact','$email'";
	$query = mysqli_query($connection," INSERT INTO usersdetails ( username, password,email, contacts) VALUES ('$username','$password','$email','$contact')");
	if($query){
		echo "signup succeffully";
		echo "<script type='text/javascript'>location.href = '/parking/login.php';</script>";		
	}
}
else{
	echo"fill the complete form";
}	
}

function get_comments($pid){
$connection = mysqli_connect("localhost","root","","parking_v2");
if($connection){
	//echo "connected";
}


$query = mysqli_query($connection," SELECT * FROM comments where pid = '$pid'");

echo "<div class='col-md-3 col-sm-6 hero-feature'>";
while($row = mysqli_fetch_array($query)) {


$product = <<<DELIMETER
                <div class="form-group">
                	   <h3>{$row['uid']}:</h3>
                        <p>{$row['commentdata']}</p>
                </div>
            


DELIMETER;

echo $product;

}
echo "</div>";
}
function add_comment($comment,$pid){
	//echo $comment,$pid;
	if(isset($_SESSION['uid'])){
	$uid = $_SESSION['uid'];
	$connection = mysqli_connect("localhost","root","","parking_v2");
	if($connection){
	//echo "connected";
	}
	$query = mysqli_query($connection," INSERT INTO comments (uid,pid,commentdata) values ( '$uid', '$pid','$comment'  )");
	}
	else{
		echo "<script type='text/javascript'>location.href = '/parking/login.php';</script>";		
	}
}
?>
