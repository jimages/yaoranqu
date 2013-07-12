<?php header('Content-type:text/xml'); ?>
<?xml version="1.0" encoding="UTF-8"?>
<return>
	<code><?php echo $code; ?></code>
	<?php  if (isset($message)) { ?>
	<message><?php echo $message ?></message>
	<?php } ?>
</return>