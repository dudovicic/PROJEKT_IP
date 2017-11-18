<!DOCTYPE html>
<html lang="hr">
<head>

    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Interesting</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 
</head>
<body class="background2">
 
  <header role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
              <a class="navbar-brand" href="#">  <a target="_blank" href="images/z_grb.png">
				<img id="grb" src="images/z_grb.png"  title="coat of arms" width="60" height="79"></a></a>
		</div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://localhost/PROJEKT_IP/projekt.html">Home</a></li>
        <li><a href="http://localhost/PROJEKT_IP/interesting.php">Interesting</a></li>
        <li><a href="http://localhost/PROJEKT_IP/gallery.html">Gallery</a></li>
        <li><a href="http://localhost/PROJEKT_IP/contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
   


<div class="section bg">
  <div class="container">
          <div class="row" style="text-align:center; border-bottom:1px dashed #ccc;  padding:0 0 20px 0; margin-bottom:40px;">

    <h1>Interesting facts</h1></div>
    <div class="col two bg margin extrapad">
     
	  <div class="imgholder">
	   <a target="_blank" href="images/galerija25.png">
	  			<img src="images/galerija25.png" width="370" height="300"></a>
	  </div>
	   <span class="feature side">Stone balls</span>
      <p class="side">No one knows, how old they are and how they occurred. Some are convinced that the globe remains of a meteorite that once fell in this area,
	  and others are quite seriously talking about how the balls are actually the work of some ancient civilizations. Scientists in BiH say that this is a very 
	  perplexing natural phenomena resulting after the retreat of glaciers.</p> 
    </div>
	
    <div class="col two bg margin extrapad">
       <div class="imgholder">
	  		<a target="_blank" href="images/galerija3.jpg">
	  			<img src="images/galerija3.jpg" width="370" height="300"></a>
					  </div>
	  
      <span class="feature side">Kiseljak</span>
      <p class="side">Kiseljak is famous as one of the richest mineral water sources, and comes from the village of Bistrik. The marketing of this water, first
	  labeled «Žepački kiseljak», began in 1955 and continued until 1967. It restarted in July of 2015, after an increase in investment for equipment and water processing. 
	  The health benefits of this water are not yet sufficiently explored.</p>
    </div>
    <div class="group margin"></div>
    <div class="col two bg margin extrapad">
     <div class="imgholder">
	  			<a target="_blank" href="images/galerija26.jpg">
	  			<img src="images/galerija26.jpg" width="370" height="300"></a>

	  </div>
      <span class="feature side">Žepče</span>
      <p class="side">Name the city is derived from the Latin Emti (shopping, buy) -xemtio-xepcio-XEPCOH-Zepce. There are written documents that prove that the 
	  city of Zepce at the end of the 12th century maintains trade links with the Republic of Dubrovnik.

</p>
    </div>
    <div class="col two bg margin extrapad">
<div class="imgholder">
	  			<a target="_blank" href="images/galerija27.jpg">
	  			<img src="images/galerija27.jpg" width="370" height="300"></a>

	  </div>
      <span class="feature side">Monuments</span>
	   <p class="side">In the municipality of Zepce, following cultural monuments can be found. Orthodox Church in the city center, built in 1894,Jewish cemetery near the city, is 300 years old,
Alibeg’s Mosque in the city center - was declared a national monument

</p>
    
    </div>
    <div class="group"></div>
  </div>
</div>

 <?php include 'config.php';
  $nameErr =""; ?>



	 
<div class="comBom">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <input id="username" type="text" name="name" value="" placeholder="Name"><span class="error">* <?php echo $nameErr;?></span>
<br>
  <textarea id="comment" name="comment" value="comment" cols="50" rows="6"></textarea><br>
  <input type="submit" value="Comment"  id ="submit">

 </form>
 
</div>
 
  <?php 

$msgErr = "";
$name = $comment = $submit="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (!empty($_POST["name"]) AND  (!empty($_POST["comment"]))){
    
	  

/* query umetanje podataka */
$sqlQuery = "INSERT INTO `tblcomment` (`PERSON`, `COMMENT`, `DATEPOSTED`) 
VALUES ('".$_POST['name']."','".$_POST['comment']."',Now())";

  
$result = mysqli_query($con, $sqlQuery) or die(mysqli_error($con));
/* provjera query */



if ($result==1) {
	/* query primanje podataka*/ 
    $sqlQuery = "SELECT * FROM  `tblcomment`  order by ID desc"; 
	/* execute the query */
	$result = mysqli_query($con, $sqlQuery) or die(mysqli_error($con));
	while ($row = mysqli_fetch_array($result)) {

		echo '<div class="panel panel-primary">'; 
		echo '<div class="panel-heading"></span> Posted by : ' . $row['PERSON'].'</div>';
		echo '<div class="panel-body">';
		echo  $row['COMMENT'];
		echo '</div>';
		echo '<div class="panel-footer">';
		echo 'Date Posted:' . $row['DATEPOSTED'];
		echo '</div>';
		echo '</div>'; 
	}	
}
	 
 }
}


else{


  /* query primanje podataka*/ 
    $sqlQuery = "SELECT * FROM  `tblcomment` order by ID desc"; 
  
  $result = mysqli_query($con,$sqlQuery) or die(mysqli_error($con));
 
  while ($row = mysqli_fetch_array($result)) {

    echo '<div class="panel panel-primary">'; 
    echo '<div class="panel-heading"></span> Posted by : ' . $row['PERSON'].'</div>';
    echo '<div class="panel-body">';
    echo  $row['COMMENT'];
    echo '</div>';
    echo '<div class="panel-footer">';
    echo 'Date Posted:' . $row['DATEPOSTED'];
    echo '</div>';
    echo '</div>'; 
  }  

  }

?>

	<!-- izbornik-->
	<script>
	$(document).ready(function() {   
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
</script>

</body>
</html>
