<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rezeptId = $_POST['rezeptId'];
    $rezeptName = $_POST['rezeptName'];
    $rezeptBeschreibung = $_POST['rezeptBeschreibung'];
    $rezeptZutaten = $_POST['rezeptZutaten'];
    $rezeptGeraete = $_POST['rezeptGeraete'];
    $rezeptSchritte = $_POST['rezeptSchritte'];
    $x = $_POST['x'];
    $y = $_POST['y'];

    $sql = "UPDATE kochbuchtabelle SET 
            rezeptName='$rezeptName', 
            rezeptBeschreibung='$rezeptBeschreibung',
            rezeptZutaten='$rezeptZutaten',
            rezeptGeraete='$rezeptGeraete',
            rezeptSchritte='$rezeptSchritte',
            x='$x',
            y='$y'
            WHERE rezeptId=$rezeptId";

    if ($conn->query($sql) === TRUE) {
        // Rezept erfolgreich aktualisiert, weiterleiten zu gerichtDetails.php
        echo '<script>window.location.href = "gerichtDetails.php?gerichtNummer=' . $rezeptId . '";</script>';
    } else {
        echo "Fehler beim Aktualisieren des Rezepts: " . $conn->error;
    }
}

$conn->close();
?>
                            