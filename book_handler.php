<?php
$con       = mysqli_connect('localhost','root','root','library');
$method    = $_POST['book_param'];

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1 class="heading">Showing Book Records</h1>
    <table class="table table-striped table-bordered">
  <thead>';
  if($method == 'pending_return')
  {
    echo '
      <tr>
    <th scope="col">Issue ID</th>
    <th scope="col">Issued Book Name</th>
    <th scope="col">Library Card ID</th>
    <th scope="col">Issue Date</th>
    <th scope="col">ISBN</th>
    <th scope="col">Branch</th>
  </tr>
  </thead>
  <tbody>';

  $query   = "SELECT *,issued_books.library_card_id as card_id, issued_books.ISBN as isbn FROM issued_books LEFT JOIN returned_books ON issued_books.library_card_id= returned_books.library_card_id AND returned_books.
  return_date is NULL";
  $result  = $con->query($query);

  while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
    if ( (strtotime('now')- strtotime($row['issue_date']))/(60*60*24) >14) {
      echo '<tr>
              <th scope="row">'.$row["issue_id"].'</th>
              <td>' . $row['issued_book_name']. "</td>
              <td>" . $row['card_id']. "</td>
              <td>" . date('d-m-Y',strtotime($row['issue_date'])) . "</td>
              <td>" . $row['isbn']. "</td>
              <td>" . $row['branch_issued']. "</td>
              </tr>";
    }
  }

  }
  else{
    echo '
  <tr>
    <th scope="col">ISBN</th>
    <th scope="col">Title</th>
    <th scope="col">Author</th>
    <th scope="col">Category</th>
    <th scope="col">Status</th>
  </tr>
  </thead>
  <tbody>';
if($method=='all')
{
  $query   = "SELECT * FROM books";
  $result  = $con->query($query);
}
elseif ($method=='available') {
  $query   = "SELECT * FROM books WHERE status = 'Available'";
  $result  = $con->query($query);
}
elseif($method=='by_title') {
  $title   = $_POST['title_val'];
  $query   = "SELECT * FROM books WHERE title LIKE '%$title%'";
  $result  = $con->query($query);
}
while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
  echo '<tr>
          <th scope="row">'.$row['ISBN'].'</th>
          <td>' . $row['title'] . "</td>
          <td>" . $row['author'] . "</td>
          <td>" . $row['category'] . "</td>
          <td>" . $row['status'] . "</td>
          </tr>";
}
}
echo "</tbody>
</table>
</body>
</html>";
$con->close();
?>
