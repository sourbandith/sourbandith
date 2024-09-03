<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>MIS Project Cloud Computing</title>
  </style>
</head>
<body>
<?php
  $servername = "ls-7066ce898ba83e9967e18279dc532bd61f6384e7.c16oeiom4t18.ap-southeast-1.rds.amazonaws.com";
  $username = "dbmasteruser";
  $password = "^jRXa:Tb80;+um*1:Wr6+[{Ne7c{uDqj";
  $dbname = "dbmaster";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    echo '<script>
      Swal.fire({
        title: "Connection failed: ' . $conn->connect_error . '",
        icon: "error"
      });
    </script>';
    exit();
  } else {
    echo '<script>
      Swal.fire({
        title: "Connected Successfully",
        icon: "success"
      });
    </script>';
  }

  // Fetch data from the database
  $sql = "SELECT id, full_name, group_name FROM new_table";
  $result = $conn->query($sql);

  // Check if there are results
  if ($result->num_rows > 0) {
    // Prepare table rows
    $rows = '';
    while($row = $result->fetch_assoc()) {
      $rows .= '
        <tr>
          <th scope="row">' . $row['id'] . '</th>
          <td>' . htmlspecialchars($row['full_name']) . '</td>
          <td>' . htmlspecialchars($row['group_name']) . '</td>
        </tr>';
    }
  } else {
    $rows = '<tr><td colspan="3" class="text-center">No data available</td></tr>';
  }

  // Close the connection
  $conn->close();
?>
  <div class="container">
    <div class="card">
      <div class="card-header">
        MIS Project Cloud Computing
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">FULL NAME</th>
              <th scope="col">GROUP</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $rows; ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-center text-white py-2">
        &copy; 2024 MIS Project
      </div>
    </div>
  </div>

</body>
</html>
