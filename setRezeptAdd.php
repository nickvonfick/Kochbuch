<?php
include("connection.php");

// Daten aus dem Formular erhalten und in die Datenbank einfügen
$rezeptName = $_POST["rezeptName"];
$rezeptBeschreibung = $_POST["rezeptBeschreibung"];
$rezeptZutaten = $_POST["rezeptZutaten"];
$rezeptGeraete = $_POST["rezeptGeraete"];
$rezeptSchritte = $_POST["rezeptSchritte"];
$kochName = $_POST["kochName"];
$kochBeschreibung = isset($_POST["kochBeschreibung"]) ? $_POST["kochBeschreibung"] : "";
$x = $_POST["x"];
$y = $_POST["y"];

// Hier sollte die eigentliche SQL-Insert-Anweisung sein, die auf deine Tabelle abgestimmt ist
$sql = "INSERT INTO kochbuchtabelle (rezeptName, rezeptBeschreibung, rezeptZutaten, rezeptGeraete, rezeptSchritte, kochName, kochBeschreibung, x, y) 
        VALUES ('$rezeptName', '$rezeptBeschreibung', '$rezeptZutaten', '$rezeptGeraete', '$rezeptSchritte', '$kochName', '$kochBeschreibung', '$x', '$y')";

if ($conn->query($sql) === TRUE) {
    header("Location: index2.php");
}
//  else {
//     echo "Fehler beim Hinzufügen von Rezept: " . $conn->error . "<br>";
// }

// Verbindung schließen
$conn->close();
?>
