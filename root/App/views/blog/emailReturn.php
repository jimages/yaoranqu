<?php header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<return>
	<code><?php echo $code; ?></code>
	<?php if(isset($message)): ?>
	<message><?php echo $message; ?></message>
	<?php endif; ?>
</return>