<?php
    session_start();
	$db = mysqli_connect("localhost","root","","authentication");
	if(mysqli_connect_errno()){
		echo 'DB Connection Error: '.mysqli_connect_error();
	}
	if(isset($_GET['name'])){
			$name = $_GET['name'];
	}
	$query = "SELECT * FROM cropdetails WHERE cropname='$name'";
    $result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/ico"  href="company_logo.png" />
    <title>TECH - AGRO</title>

    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Nanum+Pen+Script&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat+Brush|Coiny|Copse&display=swap" rel="stylesheet">
    
    <!----nav bar--->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!---nav bar end-->
    

<style>

    .head{
            text-align: center;
            margin-top: 60px;
        }
    #heading{
            font-family: 'Baloo Bhaina', cursive;
            font-size: 50px;
            color: white;
        }
    #subheading{
            font-family: 'Nanum Pen Script', cursive;
            font-size: 40px;
            color:white;
        }

    #know{
            color: red;
            text-decoration: none;
            background-color:#f2f2f2;
            border-radius: 20px;
            padding:2px 5px 2px 5px;
        }
    #learn{
            color: blue;
            text-decoration: none;
            background-color:#f2f2f2;
            border-radius: 20px;
            padding:2px 5px 2px 5px;
        }
    #produce{
            color: orange;
            text-decoration: none;
            background-color:#f2f2f2;
            border-radius: 20px;
            padding:2px 5px 2px 5px;
        }
    #gain{
            color: green;
            text-decoration: none;
            background-color:#f2f2f2;
            border-radius: 20px;
            padding:2px 5px 2px 5px;
        }
    .main_table{
    	margin: 0px 190px 0px 70px;
    }
    
    table{
        border-collapse:separate;   
        border-spacing: 0px 15px;
    } 
    td{
        border-radius: 20px;
    }  
    th{

        border-radius: 20px;
        margin-right: 500px;
        background-color: yellow;
    }
    #desc{
        font-family: 'Caveat Brush', cursive;
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

.table-1{
    background-color: #e6ffff;
}
.table-2{
    background-color: #ffe6ff;
}
.table-3{
    background-color: #ffe6e6;
}
.table-4{
    background-color: #ffffe6;
}
.table-5{
    background-color: #e6ffe6;
}

.table-6{
    background-color: #e6ffff;  
}

.table-7{
    background-color: #f2f2f2;
}
</style>
</head>



<body background="bg.jpg" style="background-size: 150px;">

    <!----nav bar----->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">TECH-AGRO</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.html">Home</a></li>
              <li><a href="crops.html">Crop Details</a></li>
              <li><a href="#">Crop Market</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="head">
        <h1 id="heading">CROP DETAILS</h1>
        <h3 id="subheading"><a id="know">KNOW</a> - <a id="learn">LEARN</a> - <a id="produce">PRODUCE</a> - <a id="gain">GAIN</a></h3>
    </div>

<div class="main_table">
    <table class="table">
        <thead>
            <tr >
                <th style="width:10%;" id="desc">CROP NAME</th>
                <th style="width:90%; text-align:center;font-family: 'Coiny', cursive;font-size: 25px;color:purple"><?php echo $name;?></th>
            </tr>
        </thead>
        <tbody>
        	<?php while($row=mysqli_fetch_assoc($result)):?>
        		<tr class="table-1">
        			<td id="desc">DESCRIPTION</td>
        			<td><?php echo $row['description'];?></td>
        		</tr>
        		<tr class="table-2">
        			<td id="desc">VARIETIES</td>
        			<td><?php echo $row['varieties'];?></td>
        		</tr>
        		<tr class="table-3">
        			<td id="desc">SEASON</td>
        			<td><?php echo $row['season'];?></td>
        		</tr>
        		<tr class="table-4">
        			<td id="desc">REQUIREMENTS</td>
        			<td><?php echo $row['requirement'];?></td>
        		</tr>
        		<tr class="table-5">
        			<td id="desc">HARVESTING</td>
        			<td><?php echo $row['harvesting'];?></td>
        		</tr>
        		<tr class="table-6">
        			<td id="desc">DISEASE</td>
        			<td><?php echo $row['disease'];?></td>
        		</tr>


        	<?<?php endwhile; ?>
           
        </tbody>
    </table>
</div>
</body>
</html>