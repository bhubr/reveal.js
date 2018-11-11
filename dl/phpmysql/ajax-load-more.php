<?php
// Inclut un fichier
require 'database.php';

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

$queryResult = $database->query(
  "SELECT firstname,lastname FROM employee LIMIT {$offset},10"
);
$resultsArray = [];
while ($row = $queryResult->fetch()) {
    array_push($resultsArray, $row);
}
header('Content-Type: application/json');
echo json_encode($resultsArray);
?>