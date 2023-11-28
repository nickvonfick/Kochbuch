<!-- index.php -->
 <!-- <!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezept hinzufügen bitte</title>
</head>
<body>
    <h2>Rezept hinzufügen</h2>
    <form action="setRezeptAdd.php" method="post">

        <label for="rezeptName">Rezeptname:</label>
        <input type="text" name="rezeptName" id="s" required>
        <br>

        <label for="rezeptBeschreibung">Rezeptbeschreibung:</label>
        <input type="text" name="rezeptBeschreibung" id="rezeptBeschreibung" required>
        <br>

        <label for="rezeptZutaten">rezeptZutaten:</label>
        <input type="text" name="rezeptZutaten" id="rezeptZutaten" required>
        <br>

        <label for="rezeptGeraete">rezeptGeraete:</label>
        <input type="text" name="rezeptGeraete" id="rezeptGeraete" required>
        <br>

        <label for="rezeptSchritte">rezeptSchritte:</label>
        <input type="text" name="rezeptSchritte" id="rezeptSchritte" required>
        <br>

        <label for="kochName">kochName:</label>
        <input type="text" name="kochName" id="kochName" required>
        <br>

        <label for="kochBeschreibung">kochBeschreibung:</label>
        <input type="text" name="rezeptBeschreibung" id="kochBeschreibung" required>
        <br>

        <label for="x">x:</label>
        <input type="text" name="x" id="x" required>
        <br>

        <label for="y">y:</label>
        <input type="text" name="y" id="y" required>
        <br>

        <br>
        <input type="submit" value="Speichern">
    </form>
</body>
</html> -->

<?php
include 'connection.php';

// Stellen Sie sicher, dass der Benutzer eingeloggt ist, bevor Sie die Abfrage ausführen
session_start();
if (!isset($_SESSION['userLoggedIn']) || $_SESSION['userLoggedIn'] !== true) {
    // Benutzer ist nicht eingeloggt, hier können Sie eine Umleitung oder Fehlermeldung einfügen
    header("Location: login.php");
    exit;
}

// SQL-Abfrage für die Benutzerdaten
$sql = "SELECT `userId`, `userName`, `userEmail`, `userPasswort` FROM `usertabelle`";

// Führen Sie die Abfrage aus
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>



    <div class="container-sm">

    <h1 style="text-align: center;" >Rezept hinzufügen</h1>
    <hr>
    <br>

    <div class="mb-3">
        <h3>Über dich...</h3>
        
        <form action="setRezeptAdd.php" method="post">

        <div class="mb-3">
    <label for="kochName" class="form-label">Ersteller</label>
    <?php
    echo '<input type="text" class="form-control" name="kochName" id="kochName" value="' . $row['userName'] . '" readonly>';
    }}
?>
</div>
        <!-- <div class="mb-3">
            <label for="kochBeschreibung" class="form-label">Ersteller Beschreibung</label>
            <input type="text" class="form-control" name="kochBeschreibung" id="kochBeschreibung" placeholder="5 Sternekoch">
        </div> -->

            <br>
            <hr>
            <br>

            <h3>Dein Rezept-...</h3>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Rezeptname</label>
            <input type="text" class="form-control" name="rezeptName" id="rezeptName" placeholder="Auflauf mit Käse">
            </div>

            <div class="mb-3">
            <label for="rezeptBeschreibung" class="form-label">Beschreibung</label>
            <textarea class="form-control" name="rezeptBeschreibung" id="rezeptBeschreibung" rows="2" placeholder="Bsp.: Geschgmolzener Käse mit Grünkohl"></textarea>
            </div>
            
            <div class="mb-3">
            <label for="rezeptZutaten" class="form-label">Zutaten</label>
            <textarea class="form-control" name="rezeptZutaten" id="rezeptZutaten" rows="2"
            placeholder="Bsp. - 100g Käse... ">
            </textarea>
            </div>

            <div class="mb-3">
            <label for="rezeptGeraete" class="form-label">Geräte</label>
            <textarea class="form-control" name="rezeptGeraete" id="rezeptGeraete" rows="2" 
            placeholder="Bsp. : - Messer">
        </textarea>
            </div>

            <div class="mb-3">
            <label for="rezeptSchritte" class="form-label">Beschreibung</label>
            <textarea class="form-control" name="rezeptSchritte" id="rezeptSchritte" rows="2" 
            placeholder="Bsp. : 1. Käse schmelzen lassen">
        </textarea>
            </div>
            
            <label for="x">Rezept Herkunft</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="x" id="x" onchange="test()">
                <option selected disabled>-</option>
                <option value="deutsch">Deutsch</option>
                <option value="indisch">Indisch</option>
                <option value="turkisch">Türkisch</option>

        </select>

        <label for="y">Vorlieben</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="y" id="y" onchange="test()">
                <option selected disabled>-</option>
                <option value="Fleich">alle Fleichsorten</option>
                <option value="Helal">helal</option>
                <option value="Veagan">veagan</option>
                <option value="Vegetarisch">vegetarisch</option>
        </select>

        <button type="submit" class="btn btn-primary btn-lg">Abschicken</button>
        <button type="button" onclick="reload()" name="reload"class="btn btn-secondary btn-lg">Löschen</button>

    </from>
    </from>



</div>


<!-- Der HTML-Code für das Formular geht hier weiter -->

<?php
$conn->close();
?>


<script>
    function reload() {
        location.reload()
    }
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

