<?php
require '../Eventen/ConfigDb.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
    SELECT *
    FROM Tickets
    WHERE id = :id
");

$stmt->execute([
    ':id' => $id
]);

$ticket = $stmt->fetch(PDO::FETCH_ASSOC);

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


    <h1>controleer of uw informatie correct is</h1> <br> <br>
    <tr>
        <th>datum</th>
        <th>tijden</th>
        <th>aantal</th>
        <th>fast pass</th>
    </tr>



    <?php
        echo   "<tr>
                <td>" . $ticket["datum"] . "</td>
                <td>" . $ticket['tijden'] . "</td>
                <td>" . $ticket['aantal'] . "</td>
                <td>" . $ticket["Pass"] . "</td>
               </tr>";

    ?>
</table>
<br>
<a href="Tickets.php">
    De informatie klopt
</a>
</body>
</html>
