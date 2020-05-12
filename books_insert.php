<?php
$con = mysqli_connect('localhost','root','root','library');
$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$status= $_POST['status'];

$query = "INSERT INTO books VALUES ('$isbn','$title','$author','$category','$status')";
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
  echo '<h1 class="display-4">Book entry recorded.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
else {
  echo '<h1 class="display-4">Book entry failed! Please try again.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
echo '</div>
</div>
</body>
</html>';
$con->close();
?>
