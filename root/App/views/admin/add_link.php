<?php header('Content-type: application/json') ?>
{
	"code": "<?php echo $code; ?>"
	<?php if(isset($message)): ?>,
	"message" : "<?php echo $message; ?>"
	<?php endif; ?>
}