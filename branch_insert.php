<?php
$con = mysqli_connect('localhost','root','root','library');

$branchid = $_POST['branchid'];
$managerid = $_POST['managerid'];
$address = $_POST['address'];

$query = "INSERT INTO branch VALUES ('$branchid','$managerid','$address')";
$result = mysqli_query($con,$query);

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Branch Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
</head>

<body>
<div class="jumbotron jumbotron-fluid">
<div class="container">';
if ($result) {
  echo '<h1 class="display-4">Branch entry recorded.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
 }
else {
  echo '<h1 class="display-4">Branch entry failed! Please try again!</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
echo '</div>
</div>
</body>
</html>';
$con->close();
?>
