<?php
        session_start();
        $userLoggedIn = isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn'];
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kochbuch</title>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body id="marginLeft">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
      </symbol>
    </svg>
<!-- ------------------------------------------------------- -->

    <?php
    include('connection.php');


        if (isset($_GET['gerichtNummer'])) {
            $gerichtNummer = $_GET['gerichtNummer'];

            $sql = "SELECT * FROM kochbuchtabelle WHERE rezeptId = $gerichtNummer";

            $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
    <!-- ------------------------------------------------------- -->

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
    <circle cx="12" cy="12" r="10"></circle>
    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path>
  </symbol>
  <symbol id="cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
  </symbol>
  <symbol id="chevron-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
  </symbol>
</svg>

<div class="container">
  <header class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="rezeptAdd.php">Teile uns DEIN Rezeot</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">Kosch mid Auslender</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg> -->
<!-- Anpassung des Edit-Links -->
          <a class="link-secondary" href="edit_form.php?gerichtNummer=<?php echo $row['rezeptId']; ?>">Edit</a>


          <div class="col-4 d-flex justify-content-end align-items-center">
          <?php if ($userLoggedIn): ?>
            <a class="link-secondary" href="rezeptAdd.php"><h2>+</h2></a>
            <a class="btn btn-sm btn-outline-secondary" href="logout.php">Abmelden</a>
          <?php else: ?>
            <a class="btn btn-sm btn-outline-secondary" href="login.php">Anmelden</a>
            <?php endif; ?>
          </div>


      </div>
    </div>
  </header>

  
  <div class="nav-scroller py-1 mb-3 border-bottom">
    <nav class="nav nav-underline justify-content-between">
      <a class="nav-item nav-link link-body-emphasis" href="index2.php">Beliebte Rezepte</a>
      <a class="nav-item nav-link link-body-emphasis" href="index.html">Deutsch</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Türkisch</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Italänisch</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Indisch</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Kurdisch</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Russisch</a>
    </nav>
  </div>
</div>

<!-- --------------------------------- -->
<div class="row g-5" id="margin">
    <div class="col-md-8">
      <div class="pb-4 mb-4 fst-italic border-bottom" id="rezeptname">
      <?php
        echo "<h1>{$row['rezeptName']}</h1>";
        ?>
      </div>
      <svg class="bd-placeholder-img" width="100%" height="40%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>

      <br>
        <h3>Beschreibung</h3>
    	<?php
        echo "<p>{$row['rezeptBeschreibung']}</p>";
        ?>
        <h3>Zutaten</h3>
        <?php
          echo "<p>{$row['rezeptZutaten']}</p>";
        ?>
            <h3>Küchengeräte:</h3>
        <?php
          echo "<p>{$row['rezeptGeraete']}</p>";
        ?>
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-body-tertiary rounded">
          <h4 class="fst-italic">Über den Koch</h4>
          <a href="#">
          <?php
          echo "<div>{$row['kochName']}</div>";
          ?>
          </a>
          <br>
          <p class="mb-0">
          <?php
          echo "<div>{$row['kochBeschreibung']}</div>";
          ?>
          </p>
        </div>

        <div>
          <h4 class="fst-italic">Ähnliche Gerichte</h4>

          <?php
          $gerichtLand = $row['x'];

          $sqlGerichte = "SELECT rezeptName, kochName, rezeptId FROM kochbuchtabelle WHERE x = '$gerichtLand' LIMIT 3";
          $resultGerichte = $conn->query($sqlGerichte);

          if($resultGerichte->num_rows >0 ) {
            while($row = $resultGerichte->fetch_assoc()){
              
            echo'<ul class="list-unstyled">';
            echo '<li>';
            echo '<a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">';
            echo '<svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>';
            echo '<div class="col-lg-8">';
            echo '<h6 class="mb-0">' . $row['rezeptName'] .  '</h6>';
            echo '<small class="text-body-secondary">' . $row['kochName'] .  '</small>';
            echo '</div>';
            echo '</a>';
            echo '<a href="gerichtDetails.php?gerichtNummer=' . $row['rezeptId'] . '" class="icon-link gap-1 icon-link-hover stretched-link">';
            echo '</li>';
            echo '</ul>';


            }
          } 
          ?>
        </div>
      </div>
    </div>
  </div>


<style>
    #margin {
        margin-bottom: 200px;
    }
    #marginLeft {
        margin-left: 10px;
    }
</style>


<!-- kommentar------------------------------------------------------------------------- -->
<hr>
<br>
<h3>Kommentare</h3>

<section style="background-color: #eee;">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong me-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                  height="60" />
                <div>
                  <h6 class="fw-bold text-primary mb-1">User</h6>
                  <p class="text-muted small mb-0">Username</p>
                </div>
              </div>
              <p class="mt-3 mb-4 pb-2">User Kommentar</p>
            </div>

            <div class="card-body" style="background-color: rgb(172, 171, 171);">
                <div class="d-flex flex-start align-items-center">
                  <img class="rounded-circle shadow-1-strong me-3"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                    height="60" />
                  <div>
                    <h6 class="fw-bold text-primary mb-1">Koch</h6>
                    <p class="text-muted small mb-0"> Kochname</p>
                  </div>
                </div>
                <p class="mt-3 mb-4 pb-2">Koch Kommentar</p>
              </div>

            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
              <div class="d-flex flex-start w-100">
                <img class="rounded-circle shadow-1-strong me-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                  height="40" />
                <div class="form-outline w-100">
                  <textarea placeholder="Dein Kommentar" class="form-control" id="textAreaExample" rows="4"
                    style="background: #fff;"></textarea>
                  <label class="form-label" for="textAreaExample">Message</label>
                </div>
              </div>
              <div class="float-end mt-2 pt-1">
                <button type="button" class="btn btn-primary btn-sm">Senden</button>
                <button type="button" class="btn btn-outline-primary btn-sm">Löschen</button>
              </div>
            </div>
          </div>
  </section>
 
</main>

<footer class="py-5 text-center text-body-secondary bg-body-tertiary">
  <p>Kochbuch von shababs<a href="https://getbootstrap.com/">IU</a> by <a href="https://twitter.com/mdo">@Ahmet @Ari @Niket</a>.</p>
  <p class="mb-0">
    <a href="">Geh hoch
    </a>
  </p>
</footer>
<!-- <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->


<!-- <script src="script.php"></script> -->

<script>
  document.getElementById("rezeptname").innerHTML = "<?php echo htmlspecialchars($rezeptname); ?>";
</script>

<?php
} else {
echo "Gericht nicht gefunden";
}
} else {
echo "Ungültige Anfrage";
}
$conn->close();
?>

</body>

</html>