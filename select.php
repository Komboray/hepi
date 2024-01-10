<?php
include("connect.php");

?>


<?php
$sql = " SELECT paybill
         FROM hostels
         WHERE id = 1";

$result = mysqli_query($conn, $sql);

echo "{$result}";

?>