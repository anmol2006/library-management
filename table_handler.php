<?php
$con = mysqli_connect('localhost','root','root','library');
$selectedTable = $_POST['table'];
switch ($selectedTable) {
  case 'books':
    // echo "Books!!!!!";
    header("Location: retrieve_books.html");
    exit;
    break;
  case 'branch':
    header("Location: retrieve_branch.html");
    exit;
    break;
  case 'employee':
    header("Location: retrieve_employee.html");
    exit;
    break;
  case 'customer':
    header("Location: retrieve_customer.html");
    exit;
    break;
  default:
    echo "Error selecting table! Please try again";
}
$con->close();
?>
