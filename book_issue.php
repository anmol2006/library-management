<?php
$con = mysqli_connect('localhost','root','root','library');
$isbn = $_POST['isbn'];
$issue_id = $_POST['issue_id'];
$issued_book_name = $_POST['issued_book_name'];
$library_card_id = $_POST['library_card_id'];
$issue_date = $_POST['issue_date'];
$branch_issued = $_POST['branch_issued'];

$insert_query = "INSERT INTO issued_books VALUES ('$issue_id','$issued_book_name','$library_card_id','$issue_date','$isbn','$branch_issued')";
$update_query = "UPDATE books SET status = 'Unavailable' WHERE ISBN = $isbn";
$res1 = mysqli_query($con,$insert_query);
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
  echo '<h1 class="display-4">Book issued successfully.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
else {
  echo '<h1 class="display-4">Book issue failed! Please try again.</h1>
    <p class="lead"><a href="cover.html">Go to home page</a></p>';
}
echo '</div>
</div>
</body>
</html>';
$con->close();
?>
