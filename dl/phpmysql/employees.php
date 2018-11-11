<?php
// Inclut un fichier
require 'database.php';

$where = isset($_GET['search'])
  ? " WHERE lastname LIKE '%{$_GET['search']}%'"
  : "";

$queryResult = $database->query(
  "SELECT firstname,lastname FROM employee{$where}"
);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <body>
    <ul>
    <?php while ($row = $queryResult->fetch())
    {
        echo '<li>' . $row['firstname'] . ' ' . $row['lastname'] . '</li>';
    } ?>
    </ul>
    <form>
      <input name="search" /><input type="submit" value="Filtrer" />
    </form>
  </body>
</html>
