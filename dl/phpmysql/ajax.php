<?php
// Inclut un fichier
require 'database.php';

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

$queryResult = $database->query(
  "SELECT firstname,lastname FROM employee LIMIT {$offset},10"
);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <body>
    <ul id="list">
    <?php while ($row = $queryResult->fetch())
    {
        echo '<li>' . $row['firstname'] . ' ' . $row['lastname'] . '</li>';
    } ?>
    </ul>
    <button id="load-more">Load more</button>
    <script>
      var page = 0;
      document.getElementById('load-more').addEventListener('click', function() {
        fetch('ajax-load-more.php?offset=' + (page * 10))
          .then(res => res.json())
          .then(employees => {
            const items = employees.map(
              item => '<li>' + item.firstname + ' ' + item.lastname + '</li>';
            ).join('');
            document.getElementById('list').innerHTML += items;
          });
      });
    </script>
  </body>
</html>
