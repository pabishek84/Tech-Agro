<?php
session_start();
	$db = mysqli_connect("localhost","root","","authentication");
	if(mysqli_connect_errno()){
		echo 'DB Connection Error: '.mysqli_connect_error();
	}
	if(isset($_GET['error'])){
			$error = $_GET['error'];
	}

	if(isset($_POST['search'])){
		$name=$_POST['data'];
		$query = "SELECT * FROM crops WHERE cropname='$name' OR district='$name'";
	    $result = mysqli_query($db, $query);
	    /*if(mysqli_num_rows($messages)==0){
	    	header("Location: search.php?error=NO%20Records%20Found");
	    }*/
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
	<link rel="icon" type="image/ico"  href="company_logo.png" />

	<link href="https://fonts.googleapis.com/css?family=Concert+One|Covered+By+Your+Grace|Permanent+Marker|Rock+Salt&display=swap" rel="stylesheet">
	<!----nav bar--->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.alert{
			background:red;
			color:#fff;
			padding:4px;
			margin-bottom:10px;
			border-radius: 15px;
			text-align: center;
		}

		#ff{
			width: 350px;
			float: left;
			margin-right: 80px;
		}
		.table-dark {
		  color: #fff;
		  background-color: #343a40;
		  padding: 5px;
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
	<header id="ff">
		    <?php if(isset($error)): ?>
				<div class="alert"><?php echo $error; ?></div>
			<?php endif; ?>
	</header>
    
    <div style="margin-top: 50px">
	<form style="float: right;" method="post" action="search.php">
	    <input type="text" name="data" placeholder="Enter cropname/District">
	    <button name="search">search</button>
	</form>
    </div>
	<div class="container">
		  <h2>PRODUCTS</h2><br><br>
		  <div class="table-responsive">
		  <div class="table-dark">          
			  <table class="table">
			    <thead>
			      <tr>
			        <th scope="col">First Name</th>
			        <th scope="col">Lastname</th>
			        <th scope="col">Address</th>
			        <th scope="col">District</th>
			        <th scope="col">Phonenumber</th>
			        <th scope="col">Crop name</th>
			        <th scope="col">Quantity</th>
			        <th scope="col">Cost</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php while($row=mysqli_fetch_assoc($result)):?>
			      	<tr>
			      		<td><?php echo $row['firstname'];?></td>
			      		<td><?php echo $row['lastname'];?></td>
			      		<td><?php echo $row['address'];?></td>
			      		<td><?php echo $row['district'];?></td>
			      		<td><?php echo $row['phonenumber'];?></td>
			      		<td><?php echo $row['cropname'];?></td>
			      		<td><?php echo $row['quantity'];?></td>
			      		<td><?php echo $row['cost'];?></td>
			      	</tr>

			      <?php endwhile; ?>
			    </tbody>
		    </div>
		  </table>	
    </div>

</body>
</html>
