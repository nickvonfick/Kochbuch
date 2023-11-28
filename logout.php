<?php
session_start();
session_unset();
session_destroy();
header("Location: index2.php"); // Weiterleitung zur Startseite oder einer anderen Seite nach dem Abmelden
exit();
?>
