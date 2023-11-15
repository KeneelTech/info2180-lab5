<?php

header("Access-Control-Allow-Origin: *");

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if (isset($_GET['country'])) {
  $country = $_GET['country'];

  // Prepare and execute the query
  $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
  $stmt->execute(['country' => "%$country%"]);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  // Default action if 'country' parameter is not set
  $results = [];
}

?>

<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
