<?php   
defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<?php 
$c = Page::getCurrentPage();
$cp = new Permissions(Page::getCurrentPage());

if (!$user->checkLogin() || !$cp->canWrite() || !$c->isEditMode()) {?>
<div class="wrap-anything-stop" rel="<?php  echo $id; ?>"></div>
<?php  } else {
?>
<br /><div><?php  echo t('Close a open wrapper with ID:') . ' <b>' . $id . '</b>'; ?></div><br />
<?php 
}
?>
