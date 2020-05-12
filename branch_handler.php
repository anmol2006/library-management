<?php
    $con = mysqli_connect('localhost','root','root','library');
    
    $method = $_POST['branch_param'];

    echo '<!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Branch Records</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
      </head>
      <body>
        <h1 class="heading">Showing Branch Records</h1>
        <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Branch ID</th>
          <th scope="col">Manager ID</th>
          <th scope="col">Address</th>
        </tr>
      </thead>
      <tbody>';

    if($method=='all')
    {
      $query="SELECT * FROM branch";
      $result=$con->query($query);
    }
    elseif ($method=='by_branch_id') {
      $id=$_POST['branch_id_val'];
      $query = "SELECT * FROM branch WHERE branch_id= $id";
      $result = $con->query($query);
    }
    while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
      echo '<tr>
              <th scope="row">'.$row['branch_id'].'</th>
              <td>' . $row['manager_id'] . "</td>
              <td>" . $row['address'] . "</td>
              </tr>";
    }
echo "</tbody>
    </table>
  </body>
</html>";
$con->close();
?>
