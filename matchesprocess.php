   <?php
include 'connect.php';
$result = $connect->query("SELECT * FROM predictions ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "Available predictions 
       ";
}
?>