<?php
$con = mysqli_connect('localhost','root','root','library');
$method = $_POST['emp_param'];

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1 class="heading">Showing Employee Records</h1>
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Employee ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Designation</th>
      <th scope="col">Salary</th>
      <th scope="col">Branch</th>
      <th scope="col">Date of Birth</th>
    </tr>
  </thead>
  <tbody>';

if($method=='all')
{
  $query="SELECT * FROM employee";
  $result=$con->query($query);
}
elseif ($method=='by_branch_id') {
  $id=$_POST['branch_id_val'];
  $query = "SELECT * FROM employee WHERE branch_works_in= $id";
  $result = $con->query($query);
}
elseif($method=='by_emp_id') {
  $emp_id = $_POST['emp_id_val'];
  $query = "SELECT * FROM employee WHERE employee_id= $emp_id";
  $result = $con->query($query);
}
while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
  echo '<tr>
          <th scope="row">'.$row['employee_id'].'</th>
          <td>' . $row['employee_name'] . "</td>
          <td>" . $row['designation'] . "</td>
          <td>" . $row['salary'] . "</td>
          <td>" . $row['branch_works_in'] . "</td>
          <td>" . date("d-m-Y", strtotime($row['DOB'])) . "</td>
          </tr>";
}
echo "</tbody>
</table>
</body>
</html>";
$con->close();
?>
