<?php   
defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<?php 
$c = Page::getCurrentPage();
$cp = new Permissions($c);

if (!$user->checkLogin() || !$cp->canWrite() || !$c->isEditMode()) {?>
<div rel="<?php  echo $id; ?>" class="wrap-anything-start" data-class="<?php  echo $class; ?>" data-id="<?php  echo $bID; ?>"></div>
<?php  } else {
?>
<br /><div><?php  echo t('Start wrapper with ID:') . ' <b>' . $id . '</b><br />' . t('And class:') . ' <b>' . $class . '</b>'; ?></div><br />
<?php 
}
?>
