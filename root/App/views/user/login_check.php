<?php header('Content-type: application/json'); ?>
{	<?php if(isset($token)): ?>
	"token":"<?php echo $token ; ?>",
	<?php endif; ?>
	"code":"<?php echo $code ;?>",
	<?php  if($code == 1 ):?>
	"error":"E002"
	<?php endif; ?>
	<?php if(isset($where_to_go)): ?>
	"go":"<?php echo $where_to_go; ?>"
	<?php endif; ?>
}