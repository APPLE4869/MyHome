<?php 

require_once(dirname(__FILE__) . '/../../../config/database.php');

include(dirname(__FILE__) . '/../../../config/config_sql.php');

require_once(dirname(__FILE__) . '/../../../config/config.php');

require_once(dirname(__FILE__) . '/data.php');

?>
<!DOCTYPE html>
<html lang="ja">
<head>

	<?php include(dirname(__FILE__) . '/../../../config/head_inner.php'); ?>

	<?php include(dirname(__FILE__) . '/../style.php'); ?>
	
	<?php include_once(dirname(__FILE__) . '/../../../config/analyticstracking.php') ?>
	
</head>
<body>

	<?php

	include(dirname(__FILE__) . '/../privacy.php');
	

	include(dirname(__FILE__) . '/../header.php');

	
	include(dirname(__FILE__) . '/../globalnav.php');
	

	include(dirname(__FILE__) . '/room.php');
	

	include(dirname(__FILE__) . '/../footer.php');

	?>


	<script src="<?= $jquery; ?>"></script>
	<script type="text/javascript" src="./../../../../js/<?= $js_file; ?>"></script>
</body>
</html>