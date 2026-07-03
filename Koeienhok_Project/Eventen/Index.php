<?php


try {
    include 'ConfigDb.php';
    include 'Classes.php';
        ?>

    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hero Dutch Comic Con - Aankomende Evenementen</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Knewave&family=Onest:wght@400;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
    <div class="wrapper">
        <nav class="menu">
            <div class="menu-item top-box">
                <div class="logo-text">Hero Dutch<br>Comic Con</div>
                <div class="logo-badge">
                <img src="../Guest/herodutchcomiccon copy.png" alt="Logo">
                </div>
            </div>

        <a href="../Home/index.html" class="menu-item link-box">
            <i class="fa-solid fa-house"></i> Home
        </a>

            <a href="../Tickets-pagina/Tickets.php" class="menu-item link-box">
                <i class="fa-solid fa-ticket"></i> Tickets Kopen
            </a>

            <a href="Index.php" class="menu-item link-box active-nav">
                <i class="fa-solid fa-calendar"></i> Evenementen
            </a>

            <a href="../Guest/index.html" class="menu-item link-box">
                <i class="fa-regular fa-star"></i> Special Guests
            </a>

            <div class="menu-item social-box">
                <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </nav>

        <main class="main events-main">
            <h1 class="page-title">Aankomende evenementen</h1>

            <div class="table-container">
                <div class="table-header-title">
                    <i class="fa-solid fa-calendar"></i>
                    <h2>Evenementen</h2>
                </div>

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
  <table border="1" class="events-table">
      <thead>
      <tr>
          <th>Podium</th>
          <th>datum</th>
          <th>tijd</th>
          <th>Artiest</th>
          <th>OMSCHRIJVING</th>
      </tr>
      </thead>


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