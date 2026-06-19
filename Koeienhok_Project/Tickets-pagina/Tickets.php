<?php
include 'Tickets_verwerk.php';
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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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
</form>

</body>
</html>
