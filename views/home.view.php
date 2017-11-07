<?php
require 'partials/header.html';
session_start();
?>
<h3>Hello world!!</h3>
<div>welcome <?php echo $_SESSION['user']?><div>

<?php
session_destroy();
require 'partials/footer.html';
?>
