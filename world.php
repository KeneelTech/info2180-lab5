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

<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['continent']) ?></td>
      <td><?= htmlspecialchars($row['independence_year']) ?></td>
      <td><?= htmlspecialchars($row['head_of_state']) ?></td>
    </tr>
  <?php endforeach; ?>
</table>
