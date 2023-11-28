<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container-sm">

    <?php
    include 'connection.php';

    $sqlUser = "SELECT `userId`, `userName`, `userEmail`, `userPasswort` FROM `usertabelle`";

    $resultUser = $conn->query($sqlUser);
    $rowUser = $resultUser->fetch_assoc();

    if (isset($_GET['gerichtNummer'])) {
        $gerichtNummer = $_GET['gerichtNummer'];

        $sql = "SELECT * FROM kochbuchtabelle WHERE rezeptId = $gerichtNummer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $kochNameTest = $row["kochName"];
            $userNameTest = $rowUser["userName"];

            if ($kochNameTest !== $userNameTest) {
                echo '<script>
                function alertUser() {
                    alert("Du bist nicht der Ersteller dieses Rezeptes! Nur der Ersteller hat zugriff!");
                    window.location.href = "index2.php";
                }
                alertUser()
                </script>';
                
            }
    ?>




            <h1 style="text-align: center;">Edit Recipe</h1>
            <hr>
            <br>

            <form action="update_recipe.php" method="post">

                <input type="hidden" name="rezeptId" value="<?php echo $row['rezeptId']; ?>">

                <div class="mb-3">
                    <label for="kochName" class="form-label">Ersteller</label>
                    <input type="text" class="form-control" name="kochName" id="kochName" disabled value="<?php echo $row['kochName']; ?>">
                </div>

                <div class="mb-3">
                    <label for="kochBeschreibung" class="form-label">Ersteller Beschreibung</label>
                    <input type="text" class="form-control" name="kochBeschreibung" id="kochBeschreibung" value="<?php echo $row['kochBeschreibung']; ?>">
                </div>

                <br>
                <hr>
                <br>

                <h3>Dein Rezept-...</h3>
                
                <div class="mb-3">
                    <label for="rezeptName" class="form-label">Rezeptname</label>
                    <input type="text" class="form-control" name="rezeptName" id="rezeptName" value="<?php echo $row['rezeptName']; ?>">
                </div>

                <div class="mb-3">
                    <label for="rezeptBeschreibung" class="form-label">Beschreibung</label>
                    <textarea class="form-control" name="rezeptBeschreibung" id="rezeptBeschreibung" rows="2"><?php echo $row['rezeptBeschreibung']; ?></textarea>
                    
                </div>
                
                <div class="mb-3">
                    <label for="rezeptZutaten" class="form-label">Zutaten</label>
                    <textarea class="form-control" name="rezeptZutaten" id="rezeptZutaten" rows="2"><?php echo $row['rezeptZutaten']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="rezeptGeraete" class="form-label">Beschreibung</label>
                    <textarea class="form-control" name="rezeptGeraete" id="rezeptGeraete" rows="2"><?php echo $row['rezeptGeraete']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="rezeptSchritte" class="form-label">Geräte</label>
                    <textarea class="form-control" name="rezeptSchritte" id="rezeptSchritte" rows="2"><?php echo $row['rezeptSchritte']; ?></textarea>
                </div>
                
                <label for="x">Rezept Herkunft</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="x" id="x" onchange="test()">
                    <option selected disabled>-</option>
                    <option value="deutsch" <?php if($row['x'] == 'deutsch') echo 'selected'; ?>>Deutsch</option>
                    <option value="indisch" <?php if($row['x'] == 'indisch') echo 'selected'; ?>>Indisch</option>
                    <option value="turkisch" <?php if($row['x'] == 'turkisch') echo 'selected'; ?>>Türkisch</option>
                </select>

                <label for="y">Vorlieben</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="y" id="y" onchange="test()">
                    <option selected disabled>-</option>
                    <option value="Fleisch" <?php if($row['y'] == 'Fleisch') echo 'selected'; ?>>Alle Fleischsorten</option>
                    <option value="Helal" <?php if($row['y'] == 'Helal') echo 'selected'; ?>>Helal</option>
                    <option value="Vegan" <?php if($row['y'] == 'Vegan') echo 'selected'; ?>>Vegan</option>
                    <option value="Vegetarisch" <?php if($row['y'] == 'Vegetarisch') echo 'selected'; ?>>Vegetarisch</option>
                </select>

                <button type="submit" class="btn btn-primary btn-lg">Update Recipe</button>
                <button type="button" onclick="reloadPage()" class="btn btn-secondary btn-lg">Alles löschen</button>
<!-- 2 -->
            </form>

    <?php
        } else {
            echo "Recipe not found";
        }
    } else {
        echo "Invalid request";
    }

    $conn->close();
    ?>

</div>

<script>
    function reloadPage() {
        location.reload();
    }


</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<?php
include 'connection.php';
?>