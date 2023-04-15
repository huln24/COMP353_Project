<?php
include 'utilities/helpers.php';

$conn = connect();

// Renders header.php - index.php - footer.php
render('index_body.php', ['title' => "Welcometo HFESTS!"]);

// disconnect from server
disconnect($conn);
?>