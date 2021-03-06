<?php
  session_start(); 

  $username = "Username";
  $email    = "Email";

  if(isset($_SESSION['username']) && isset($_SESSION['email'])){
    $username = $_SESSION['username'];
    $email    = $_SESSION['email'];
  }  
?> 

<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Search Results</title>

    <style type="text/css">

    html,body { 
     	height: 100%; 
      	margin: 0px; 
      	padding: 0px; 
    }

    .full {
      	height: 100% 
    }

    .white-color {
      	background-image: linear-gradient(to right, white, lightblue);
	}

	.bor-l{
  		border-left-style: solid;
  		border-color: lightblue;
	}

	.bor-r{
  		border-right-style: solid;
  		border-color: lightblue;
	}

	img {
    	max-width:90%;
    	height:auto;
	}

    </style>
  </head>

  <body style="height: 100%">

  	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Picstagram</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Search <span class="sr-only">(current)</span></a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="upload.php">Upload</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="profile.php">Profile</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="mainpageloggedin.php">Feed</a>
	      </li>
	      <!--<li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>-->
	    </ul>
	    <ul class="navbar-nav navbar-right">
            <li class="nav-item active"><a class="nav-link" href="#">Logged in as <b><?php echo $username ?></b></a></li>
    		<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
    	</ul>
	    <!--<form class="form-inline my-2 my-lg-0" method="post" action="result.php">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchinput">
	      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
	    </form>-->
	  </div>
	</nav>
	<div class="row full">
		<div class="col-md-4 white-color bor-r"></div>
		<div class="col-md-4" id="imgcontent2">
			  <div class="form-group">
			    <label for="searchinput" class="mt-3">Enter keyword</label>
			    <input type="text" class="form-control mt-2" id="searchinput" name="searchinput" required>
			  </div>
			  <div class="row">
			  	<div class="col-md-4"></div>
			  	<button class="btn btn-primary col-md-4 mt-3" onclick="search()">Search</button>
			  </div>	
		</div>
		<div class="col-md-4 white-color bor-l"></div>
	</div>

	<script>
		function search() {
  			
			val = document.getElementById('searchinput').value;
			val = encodeURIComponent(val);
			document.getElementById("imgcontent2").innerHTML = "";
			console.log(val);

  			var xmlhttp = new XMLHttpRequest();
		    
		    xmlhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
		        document.getElementById("imgcontent2").innerHTML = this.responseText;
		        console.log(this.responseText);
		        console.log("DONE121212");
		      }
		    };

		    xmlhttp.open("GET", "search.php?q=" + val, true);
		    xmlhttp.send();
 	 }

	</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
