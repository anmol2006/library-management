<?php
$con = mysqli_connect('localhost','root','root','library');
$employee_id = $_POST['id'];
$employee_name = $_POST['empname'];
$designation = $_POST['designation'];
$salary = $_POST['sal'];
$branch_works_in= $_POST['branch_works_in'];
$dob = $_POST['dob'];

$query = "INSERT INTO employee VALUES ('$employee_id','$employee_name','$designation','$salary','$branch_works_in','$dob')";
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
  echo '<h1 class="display-4">Employee registered successfully.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
else {
  echo '<h1 class="display-4">Employee registration failed! Please try again.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
echo '</div>
</div>
</body>
</html>';
$con->close();
?>
