<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<div class="form-group">
    <div class="form-group">
        <?php  echo t('Use the same id was wrapper start!'); ?><br />
	<?php  echo $form->label('id', t('ID')); ?>
	<?php   echo $form->text('id', $id); ?>
    </div>
</div>
