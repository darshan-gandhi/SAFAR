<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title> Safar: Your comfort drives us! </title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.detail
{
	height:500px;
}

#pholder {
	max-height: 100px;
	max-width: 100px;
}

.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.wrapper {
	text-align: center;
}

#info {

}

#footer {
  background-color: #e3f2fd;
   height: 50px;
    font-family: 'Verdana', sans-serif;
    padding: 20px;
}
</style>
</head>
<body style="background-color: powderblue;">
<!--header-->
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <div class= "navbar-header">
        <button type= "button" class="navbar-toggle" data-toggle= "collapse" data-target= "#bs-safar-navbar-collapse-1">
          <span class= "sr-only"> Toggle navigation </span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
         </button>
      <a class="navbar-brand" href="#"> Safar </a> 
    </div>
  <div class= "collapse navbar-collapse navbar-right" id="bs-safar-navbar-collapse-1">
    <ul class= "nav navbar-nav">
       <ul class= "nav navbar-nav">
      <li> <a href="./first_page.php"> Home </a> </li>

      <li> <a href="./homepage_safar.php"> Logout </a> </li>
      
    </ul>
    </ul>
    </div>  
  </div>
</nav>
<!--end of navbar-->
<!--generic info-->
<div class= "container-fluid">
 <div class= "col-md-4" >
  <div class= "panel panel-info" id="info" >
      <div class= "panel-heading">
        <h4 class= "panel-title" align="center"> Your Information </h4>
      </div> 
<?php 
//$_SESSION['logged_user']=1;
//session_start();
$server="localhost";
$username="root";
$password="";
$db="safar";
$t= $_SESSION['logged_user'];
$conn = new mysqli($server,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
  $result= $conn->query ("SELECT * FROM customer where cid = '$t'");
  $row = $result->fetch_assoc();
  $result1= $conn->query ("SELECT * FROM ride_details where cid = '$t' ORDER BY rid DESC LIMIT 1");
  $row1 = $result1->fetch_assoc();
  //echo mysqli_num_rows($result1);
  /*if (mysqli_num_rows($result)>0)
  {
    $count= mysqli_num_rows($result);
  }
 while($row = $res1->fetch_assoc()) 
{*/

  $n = $row['name'];
  $e = $row['email'];
  $l = $row['locality'];
  $g = $row['gender'];
  $s = $row1['source'];
  $d = $row1['destination'];

//mysqli_close($conn);

?>
    <div class= "panel panel-body detail">
      <img id="pholder" class= "center" src="./images/placeholder.png">
      <br>
      <br>
      <table class = "table">
      <tr>
         <td align="center">Name: <?php echo "$n"; ?></td>
      </tr>
      
      <tr>
         <td align="center">E-mail: <?php echo "$e"; ?></td>
      </tr>
      
      <tr>
         <td align="center">Locality: <?php echo "$l"; ?></td>
      </tr>

      <tr>
         <td align="center">Gender: <?php echo "$g";?></td>
      </tr>

      <tr>
         <td align="center">Latest Trip: <?php echo " $s to $d  ";?></td>
      </tr>
   </table>
   <br>
   <br>
   <div class= "wrapper">
   <button onclick="location.href='http://localhost/safar/book.php'" type="button" class="btn btn-success" value="book">
     Book a cab</button>
   </div>

      </div>
    </div>
  </div>
<!-- end of generic info-->
<div class="col-md-8">
  <div class="panel panel-success">
    <div class="panel-heading" align="center"><b>Ride Details</b></div>
    <h3 align="center">Ride History</h3>
    <div class="panel-body log">
      
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>Driver Name</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Fare</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $result2;
      $sql2= "SELECT * FROM ride_details where cid = '$t'";
      $result2 = mysqli_query ($conn,$sql2);
  while ($row2 = mysqli_fetch_assoc($result2))
  {
    $dn = $row2['dname'];
  $sc = $row2['source'];
  $ds = $row2['destination'];
  $fr = $row2['fare'];
  ?>
      <tr>
        <td><?php echo "$dn"; ?></td>
        <td><?php echo "$sc"; ?></td>
        <td><?php echo "$ds"; ?></td>
        <td><?php echo "$fr"; ?></td>
      </tr>
   <?php } ?>   
    </tbody>
  </table>

    </div>
  </div>
</div>
</div>

<footer id="footer">
    <span class="pull-right"><strong>Version</strong> 1.0.0</span>
    <p><b>Copyright&nbsp;</b>&copy; Somaiya Vidyavihar | Design and Development. All Rights Reserved.</p>
</footer>
</body>
</html>
