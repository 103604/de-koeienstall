<?php


try {
    include 'ConfigDb.php';
    include 'Classes.php';
        ?>

  <!doctype html>
  <html lang='en'>
  <head>
  <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
      <style>
          * {
              box-sizing: border-box;
              margin: 0;
              padding: 0;
          }
          body {
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
          }
      </style>

  </head>
  <body>
  <table border="1">

      <tr>
          <th>Podium</th>
          <th>datum</th>
          <th>tijd</th>
          <th>Artiest</th>
          <th>OMSCHRIJVING</th>
      </tr>



  <?php
  foreach ($resultaten as $row) {
      echo   "<tr>
                <td>" . $row['Locatie'] . "</td>
                <td>" . $row['DATUM'] . "</td>
                <td>" . $row['TIJD'] . "</td>
                <td>" . $row['artiest_NAAM'] . "</td>
                <td>" . $row['optreden_omschrijving'] . "</td>
               </tr>";}
  ?>
  </table>
  </body>
</html>




<?php
} catch (PDOException $e) {
    echo "Fout: " . $e->getMessage();
}
    ?>