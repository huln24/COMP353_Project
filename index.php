<?php
include 'utilities/helpers.php';

$conn = connect();

disconnect($conn);

// Renders header.php - index.php - footer.php
render('index_body.php', ['title' => "Welcometo HFESTS!"]);
?>