<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

$result = mysqli_query($con,"SELECT * FROM members ");

echo "<table border='1'> 


<tr>
<th>id</th>
<th>username</th>
<th>email</th>
<th>password</th>
<th>salt</th>

</tr>";






while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['salt'] . "</td>";

  echo "</tr>";
}

echo "</table>";

mysqli_close($con);























?>

