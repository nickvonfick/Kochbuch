<?php
include("connection.php");

if (isset($_FILES['bild'])) {
    $maxFileSize = 5 * 1024 * 1024; // Beispiel: Maximal 5 MB

    if ($_FILES['bild']['size'] > $maxFileSize) {
        die("Fehler: Die Dateigröße ist zu groß. Maximale Größe: " . $maxFileSize / (1024 * 1024) . " MB");
    }

    $bild = file_get_contents($_FILES['bild']['tmp_name']);

    $sql = "INSERT INTO bildertabelle (bild) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $bild);

    if ($stmt->execute()) {
        echo "Bild wurde erfolgreich hochgeladen und in der Datenbank gespeichert.";
    } else {
        echo "Fehler beim Hochladen des Bildes.";
    }

    $stmt->close();
}

$conn->close();
?>
