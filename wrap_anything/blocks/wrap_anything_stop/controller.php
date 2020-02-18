<?php 

namespace Concrete\Package\WrapAnything\Block\WrapAnythingStop;

use \Concrete\Core\Block\BlockController;
use Page;
use Permissions;
use User;
use Loader;

class Controller extends BlockController {

    protected $btDescription = "Close a open wrapper on your page.";
    protected $btName = "Wrapper Close";
    protected $btTable = 'btWrapAnythingStop';
    protected $btInterfaceWidth = "400";
    protected $btInterfaceHeight = "200";

    public function view() {
        $u = new User();
        $this->set('user', $u);
    }

    public function getBlockTypeName() {
        return t("Wrapper Close");
    }

    public function getBlockTypeDescription() {
        return t("Close a open wrapper on your page.");
    }

    public function getJavaScriptStrings() {
        return array(
            'id-required' => t('You must add an id.')
        );
    }
    
    public function validate($args) {
        $e = Loader::helper('validation/error');
        $id = trim($args['id']);
        if ($id === '') {
            $e->add(t('You must add an id'));
        }
        return $e;
    }

}
