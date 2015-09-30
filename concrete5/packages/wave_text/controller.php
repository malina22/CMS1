<?php  
namespace Concrete\Package\WaveText;
use BlockType,
Package,
Loader;
defined('C5_EXECUTE') or die(_("Access Denied."));
class Controller extends Package {

    protected $pkgHandle = 'wave_text';
    protected $appVersionRequired = '5.7.0.4';
    protected $pkgVersion = '2.0';

	public function getPackageDescription() {
		return t("Create text headers with a cool wave effect!");
	}
	
	public function getPackageName() {
		return t("Wave Text");
	}

    public function install() {
        $pkg = parent::install();
        // install block 
        BlockType::installBlockTypeFromPackage('wave_text', $pkg); 
    }
	public function uninstall(){
		parent::uninstall();
		$db = Loader::db();
		$db->Execute('DROP TABLE IF EXISTS btWaveText');
	}
}
?>