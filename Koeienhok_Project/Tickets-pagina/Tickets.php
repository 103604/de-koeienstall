<?php
require '../Eventen/ConfigDb.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if(empty($_POST['datum'])) {
        echo "Fout!";
        return;
    }
        $datum = $_POST['datum'];
        $tijden = $_POST['tijden'];
        $aantal = $_POST['aantal'];
        $Pass = $_POST['Pass'];

        $query = "
        INSERT INTO Tickets ( datum, tijden, aantal, Pass)
        VALUES (:datum, :tijden, :aantal, :Pass)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            ':datum' => $datum,
            ':tijden' => $tijden,
            ':aantal' => $aantal,
            ':Pass' => $Pass,
        ]);

        $id = $pdo->lastInsertId();

        header("Location: Tickets_view.php?id=$id");
        die();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Dutch Comic Con - Tickets Kopen</title>
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
                <img src="herodutchcomiccon copy.png" alt="Logo">
            </div>
        </div>

        <a href="../index.html" class="menu-item link-box">
            <i class="fa-solid fa-house"></i> Home
        </a>

        <a href="../Tickets-pagina/Tickets.php" class="menu-item link-box active-nav">
            <i class="fa-solid fa-ticket"></i> Tickets Kopen
        </a>

        <a href="../Eventen/Index.php" class="menu-item link-box">
            <i class="fa-solid fa-calendar"></i> Evenementen
        </a>

        <a href="#" class="menu-item link-box">
            <i class="fa-regular fa-star"></i> Special Guests
        </a>

        <div class="menu-item social-box">
            <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
    </nav>

    <main class="main tickets-main">
        <h1 class="page-title">Tickets Kopen</h1>

        <div class="form-container">
            <form method="post" class="ticket-form">
                <div class="form-group">
                    <label>welke dag</label>
                    <div class="select-wrapper">
                        <select name="datum">
                            <option value="Maandag">Maandag</option>
                            <option value="Dinsdag">Dinsdag</option>
                            <option value="Donderdag">Donderdag</option>
                            <option value="Zaterdag">Zaterdag</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>welke teiden</label>
                    <div class="select-wrapper">
                        <input required name="tijden" type="time"><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label>hoeveel mensen</label>
                    <div class="select-wrapper">
                        <input required name="aantal" type="number"><br><br>
                    </div>
                </div>

                <div class="form-group options-group">
                    <label>fast pass</label>
                    <select name="Pass">
                        <option class="option-btn" value="ja">ja</option>
                        <option class="fa-solid fa-check"  value="nee">nee</option>
                    </select>
                </div>

                <input type="submit" class="submit-btn">
                <i class="fa-solid fa-chevron-right"></i>
            </form>
        </div>
    </main>
</div>
</body>
</html>

<form method="post">
    <label>datum</label>
    <input required name="datum" type="date"><br><br>

    <label>tijden</label>
    <input required name="tijden" type="time"><br><br>

    <label>aantal</label>
    <input required name="aantal" type="number"><br><br>

    <label>fast pass</label>
    <select name="Pass">
        <option value="ja">ja</option>
        <option value="nee">nee</option>
    </select><br>

    <input type="submit" value="Submit">