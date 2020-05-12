<?php
$con = mysqli_connect('localhost','root','root','library');
$library_card_id = $_POST['card_id'];
$name = $_POST['name'];
$contact_no = $_POST['contact_no'];
// $fine_pending = $_POST['fine'];
$registered_branch= $_POST['branch'];

$query = "INSERT INTO customer VALUES ('$library_card_id','$name','$contact_no',0,'$registered_branch')";
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
  echo '<h1 class="display-4">Customer registered successfully.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
else {
  echo '<h1 class="display-4">Customer registration failed! Please try again.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
echo '</div>
</div>
</body>
</html>';
$con->close();
?>
