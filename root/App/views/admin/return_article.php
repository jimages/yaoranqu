<?php header('Content-type: application/json') ?>
{
	"code":"<?php echo $code; ?>"
		<?php if($code == 1): ?> ,
	"error":"<?php echo $error; ?>"
	<?php endif; ?>
}