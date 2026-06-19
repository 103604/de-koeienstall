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

echo $ticket["datum"]. "<br>";
echo $ticket["tijden"]. "<br>";;
echo $ticket["aantal"]. "<br>";;
echo $ticket["Pass"]. "<br>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultaat</title>
</head>
<body>

</body>
</html>
