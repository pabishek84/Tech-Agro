<?php
	session_start();
	$db = mysqli_connect("localhost","root","","authentication");
	if(mysqli_connect_errno()){
		echo 'DB Connection Error: '.mysqli_connect_error();
	}

	if(isset($_GET['success'])){
		$success = $_GET['success'];
	}

        if(isset($_POST['submits'])){
	        $firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$address=$_POST['address'];
			$district=$_POST['district'];
			$phonenumber=$_POST['phonenumber'];
			$cropname=$_POST['cropname'];
			$quantity=$_POST['quantity'];
			$cost=$_POST['cost'];

			$query="INSERT INTO `crops`(`id`, `firstname`, `lastname`, `address`, `district`, `phonenumber`, `cropname`, `quantity`, `cost`) VALUES ('NULL','$firstname','$lastname','$address','$district','$phonenumber','$cropname','$quantity','$cost')";

			if(!mysqli_query($db,$query)){
		  			die(mysqli_error($db));  		
		  		}else{
		  			header("Location: crop.php?success=Inserted%20Succeesfully");
		  		}

        }
?>

<!DOCTYPE html>
<html>
<head>
	<title>TECH AGRO</title>

	<link rel="icon" type="image/ico"  href="company_logo.png" />

	<link href="https://fonts.googleapis.com/css?family=Concert+One|Covered+By+Your+Grace|Permanent+Marker|Rock+Salt&display=swap" rel="stylesheet">
	<!----nav bar--->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<style type="text/css">

		body{
			background-image: url(2.jpg);
			background-size: 1560px;
			position: relative;
		}
		section{
			background-color: #f2f2f2 ;
			width: 500px;
			padding: 15px;
			border-radius: 20px;


		}
		h1{
			color:red;
		}
		input[type="number"],input[type="text"]{
			border-radius: 5px;
			padding-left: 10px;
			height: 20px;
			width: 350px;
			outline: none;
		}
		button{
			width: 150px;
			height: 50px;
			font-size: 20px;
			font-weight: bold;
			border-radius: 20px;
			outline: none;
		}
		label{
			font-weight: bold;
		}
		.success{
			background:green;
			text-align: center;
			color:#fff;
			padding:4px;
			margin-bottom:10px;	
	    }
	</style>
</head>
<body>
	<!----nav bar----->
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="index.html">TECH-AGRO</a>
    		</div>
    		<ul class="nav navbar-nav">
		      <li class="active"><a href="index.html">Home</a></li>
		      <li><a href="crops.html">Crop Details</a></li>
          <li><a href="crop.php">Sell Crops</a></li>
		      <li><a href="product.php">Crop Market</a></li>
		    </ul>
	  	</div>
	</nav>

	
	<div style="margin-top:50px ">
		<center><section>
			<center><h1>ENTER YOUR DETAILS HERE</h1></center>
			<center>
				<form method="POST" action="crop.php">

					<label>ENTER YOUR FIRST NAME</label><br><input type="text" name="firstname" placeholder="Enter your first name" required><br><br>
					<label>ENTER YOUR LAST NAME</label><br><input type="text" name="lastname" placeholder="Enter the last name"required><br><br>
					<label>ENTER YOUR ADDRESS</label><br><input type="text" name="address" placeholder="Enter your address"required><br><br>
					<label>ENTER YOUR DISTRICT</label><br><input type="text" name="district" placeholder="Enter your district" required><br><br>
					<label>ENTER YOUR PHONE NUMBER</label><br><input type="number" name="phonenumber" placeholder="Enter your phone number" required><br><br>
					<label>ENTER THE CROP NAME</label><br><input type="text" name="cropname" placeholder="Enter the crop name" required><br><br>
					<label>ENTER THE QUANTITY</label><br><input type="number" name="quantity" placeholder="Enter crop quantity" required><br><br>
					<label>ENTER THE COST </label><br><input type="number" name="cost" placeholder="Enter rate" required><br><br>
					<button name="submits">SUBMIT</button>
				</form>
			</center>
		</section></center>
    </div>
    <footer>
    	   <?php if(isset($success)): ?>
				<div class="success"><?php echo $success; ?></div>
			<?php endif; ?>
    </footer>>

</body>
</html>
