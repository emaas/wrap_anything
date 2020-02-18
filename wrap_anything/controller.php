<?php 
namespace Concrete\Package\WrapAnything;
use Package;
use BlockType;
use Loader;
defined('C5_EXECUTE') or die(_("Access Denied."));


class controller extends Package {
	protected $pkgHandle = 'wrap_anything';
	protected $appVersionRequired = '5.7.0.4';
	protected $pkgVersion = '1.0.0';
	
	public function getPackageName() {
		return t('Wrap anything');
	}
	
	public function getPackageDescription() {
		return t('Enable your page to look fantastic by wrapping multiple blocks in a single wrapping div.');
	}
	
	public function install() {
		$pkg = parent::install();
		BlockType::installBlockTypeFromPackage('wrap_anything_start', $pkg);
		BlockType::installBlockTypeFromPackage('wrap_anything_stop', $pkg);
	}
        
        public function uninstall() {
            parent::uninstall();
            $db = Loader::db();
            $db->Execute('DROP TABLE btWrapAnythingStop');
            $db->Execute('DROP TABLE btWrapAnythingStart');
        }
}