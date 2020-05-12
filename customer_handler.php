<?php
$con       = mysqli_connect('localhost','root','root','library');
$method    = $_POST['customer_param'];

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1 class="heading">Showing Customer Records</h1>
    <table class="table table-striped table-bordered">
  <thead>
  <tr>
    <th scope="col">Library Card ID</th>
    <th scope="col">Name</th>
    <th scope="col">Contact Number</th>
    <th scope="col">Fine Pending</th>
    <th scope="col">Branch</th>
  </tr>
  </thead>
  <tbody>';

  if($method == 'pending_fine')
  {
  $query   = "SELECT *,issued_books.library_card_id as card_id, issued_books.ISBN as isbn FROM issued_books LEFT JOIN returned_books ON
  issued_books.library_card_id= returned_books.library_card_id AND returned_books.return_date is NULL";
  $res  = $con->query($query);

  while($row = $res->fetch_assoc()) {
    $days= (strtotime('now')- strtotime($row['issue_date']))/(60*60*24);
    if ($days>14) {
      $card = $row['card_id'];
      $update_query = "UPDATE customer SET fine_pending = ($days-14) WHERE library_card_id = $card ";
      $ans = $con->query($update_query);
    }
  }
  $final_query = "SELECT * FROM customer WHERE fine_pending > 0";
  $result = $con->query($final_query);
  }
  elseif($method=='all')
{
  $query   = "SELECT * FROM customer";
  $result  = $con->query($query);
}
elseif ($method=='by_branch_id') {
  $branch_id = $_POST['branch_id_val'];
  $query   = "SELECT * FROM customer WHERE registered_branch = $branch_id";
  $result  = $con->query($query);
}
elseif($method=='by_card_id') {
  $card_id   = $_POST['card_id_val'];
  $query   = "SELECT * FROM customer WHERE library_card_id = $card_id";
  $result  = $con->query($query);
}
while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
  echo '<tr>
          <th scope="row">'.$row['library_card_id'].'</th>
          <td>' . $row['name'] . "</td>
          <td>" . $row['contact_no'] . "</td>
          <td>" . $row['fine_pending'] . "</td>
          <td>" . $row['registered_branch'] . "</td>
          </tr>";
}
echo "</tbody>
</table>
</body>
</html>";
$con->close();
?>
