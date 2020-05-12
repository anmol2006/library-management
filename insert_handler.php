<?php
$con = mysqli_connect('localhost','root','root','library');
$selectedTable = $_POST['table'];
switch ($selectedTable) {
  case 'books':
    header("Location: books_details.html");
    exit;
    break;
  case 'branch':
    header("Location: branch_details.html");
    exit;
    break;
  case 'employee':
    header("Location: employee_registration.html");
    exit;
    break;
  case 'customer':
    header("Location: customer_registration.html");
    exit;
    break;
  case 'issued_books':
    header("Location: book_issue.html");
    exit;
    break;
  case 'returned_books':
    header("Location: book_return.html");
    exit;
    break;
  default:
    echo "Error selecting table! Please try again";
}
$con->close();
?>
