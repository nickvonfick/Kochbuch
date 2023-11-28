<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kochbuch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Stellen Sie sicher, dass der Benutzer eingeloggt ist, bevor Sie die Abfrage ausführen
session_start();
if (!isset($_SESSION['userLoggedIn']) || $_SESSION['userLoggedIn'] !== true) {
    // Benutzer ist nicht eingeloggt, hier können Sie eine Umleitung oder Fehlermeldung einfügen
    echo "You are not logged in.";
    exit;
}

// SQL-Abfrage für die Benutzerdaten
$sql = "SELECT `userId`, `userName`, `userEmail`, `userPasswort` FROM `usertabelle`";

// Führen Sie die Abfrage aus
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Durchlaufen Sie die Ergebnisse und geben Sie die Daten aus
    while ($row = $result->fetch_assoc()) {
        echo "UserID: " . $row['userId'] . "<br>";
        echo "UserName: " . $row['userName'] . "<br>";
        echo "UserEmail: " . $row['userEmail'] . "<br>";
        // Sie sollten niemals Passwörter auf diese Weise ausgeben, dies dient nur zu Demonstrationszwecken
        echo "UserPassword: " . $row['userPasswort'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No users found.";
}

$conn->close();
?>
