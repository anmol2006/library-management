<?php
$con = mysqli_connect('localhost','root','root','library');
$isbn = $_POST['isbn'];
$return_id = $_POST['return_id'];
$returned_book_name = $_POST['returned_book_name'];
$library_card_id = $_POST['library_card_id'];
$return_date = $_POST['return_date'];
$branch_returned = $_POST['branch_returned'];

$return_query = "INSERT INTO returned_books VALUES ('$return_id','$returned_book_name','$library_card_id','$return_date','$isbn','$branch_returned')";
$update_query = "UPDATE books SET status = 'Available' WHERE ISBN = $isbn";

$res1 = mysqli_query($con,$return_query);
$res2 = mysqli_query($con,$update_query);

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


if ($res1 && $res2) {
  echo '<h1 class="display-4">Book returned successfully.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
else {
  echo '<h1 class="display-4">Book return failed! Please try again.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
echo '</div>
</div>
</body>
</html>';
$con->close();
?>
