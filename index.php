<?php
include 'helpers.php';

$conn = connect();
echo "Connected";
disconnect($conn);
echo "Disconnected";
// Renders header.php - index.php - footer.php
render('main_body.php', ['title' => "Welcome!"]);



?>