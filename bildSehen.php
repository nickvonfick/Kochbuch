<?php
include("connection.php");

$bildId = 1; // Setze die tatsächliche Bild-ID hier

$sql = "SELECT bild FROM bildertabelle WHERE bildId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $bildId); // Das i steht für integer
$stmt->execute();
$stmt->bind_result($bild);
$stmt->fetch();
$stmt->close();

// Den Inhalt des Bildes direkt aus der Datenbank in das img-Tag einfügen
echo '<img src="data:image/jpeg;base64,' . base64_encode($bild) . '" alt="Bild">';
$conn->close();
?>
