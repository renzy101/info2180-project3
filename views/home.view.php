<?php
require 'partials/header.html';
session_start();
?>

<h3>Hello world!!</h3>
<div>welcome <?= $_SESSION['firstname']." ".$_SESSION['lastname']?><div>

<?php
session_destroy();
require 'partials/footer.html';
?>
