<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<div class="form-group">
	<?php  echo $form->label('id', t('ID')); ?>
	<?php   echo $form->text('id', $id); ?>
</div>
<div class="form-group">
	<?php  echo $form->label('class', t('Class')); ?>
	<?php   echo $form->text('class', $class); ?>
</div>
