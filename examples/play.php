<?php
	require_once '../cecilia.bootstrap.php';
	
	$c = new \cecilia\core\Cecilia();
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
	<?php $c->play('spotify:track:'); ?>
</body>
</html>