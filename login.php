<?php
ob_start(); // Starte die Ausgabe-Pufferung
session_start();

// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kochbuch";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Wenn das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['userEmail'];
    $userPasswort = $_POST['userPasswort'];

    // Überprüfung der Anmeldeinformationen
    $sql = "SELECT * FROM usertabelle WHERE userEmail='$userEmail' AND userPasswort='$userPasswort'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Anmeldung erfolgreich
        $_SESSION['userLoggedIn'] = true;
        header("Location: index2.php"); // Weiterleitung nach erfolgreicher Anmeldung
        exit();
    } else {
        // Anmeldung fehlgeschlagen
        $error = "Ungültige Anmeldeinformationen";
    }
}

$conn->close();
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary" >
  <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal text-body-emphasis">Willkommen</h1>
      <p class="fs-5 text-body-secondary">wir freuen uns, dass Sie den Weg zu unserer Webseite gefunden haben! Hier dreht sich alles um das Teilen und Entdecken von köstlichen Rezepten. Um die volle Bandbreite unserer Angebote zu nutzen, laden wir Sie herzlich dazu ein, sich zu registrieren und Teil unserer lebendigen Koch-Community zu werden. </p>
    </div>

      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-2">Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closePage()" ></button>
        </div>
  
        <div class="modal-body p-5 pt-0">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="vorname" placeholder="Mustermann">
              <label for="floatingInput">Name</label>
            </div> -->

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" name="userEmail" id="userEmail" placeholder="test@gmail.com">
              <label for="userEmail">Email</label>
            </div>

            <div class="form-floating mb-3">
              <input type="passwort"  class="form-control rounded-3" id="userPasswort" name="userPasswort" placeholder="Musti">
              <label for="userPasswort">Passwort</label>
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Anmelden</button>
          </form>

          <hr>


          <div class="modal-header p-5 pb-4 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-2">Registrieren</h1>
        </div>

        <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" name="userEmail" id="userEmail" placeholder="test@gmail.com">
              <label for="userEmail">Email</label>
            </div>

            <div class="form-floating mb-3">
              <input type="passwort"  class="form-control rounded-3" id="userPasswort" name="userPasswort" placeholder="Musti">
              <label for="userPasswort">Passwort</label>
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Registrieren</button>

            <div>Probleme? <a href="">Klick hier</a></div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function closePage() {
        window.location.href = "index2.php"
    }
  </script>

</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmelden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="text-center">

<main class="form-signin">
   
        <h1 class="h3 mb-3 fw-normal">Anmelden</h1>


        <div class="form-floating">
            <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="name@example.com" required>
            <label for="userEmail">E-Mail-Adresse</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="userPasswort" name="userPasswort" placeholder="Passwort" required>
            <label for="userPasswort">Passwort</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Anmelden</button>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></script>
</body>
</html> -->
