<?php  
namespace Concrete\Package\WaveText\Block\WaveText;
use \Concrete\Core\Block\BlockController,
BlockType,
Loader;
defined('C5_EXECUTE') or die(_("Access Denied."));

	class Controller extends BlockController {
		
		var $pobj;
		
		protected $btTable = 'btWaveText';
		protected $btInterfaceWidth = "420";
		protected $btInterfaceHeight = "380";
		
		public function getBlockTypeDescription() {
			return t("Create text headers with a cool wave effect!");
		}
		public function getBlockTypeName() {
			return t("Wave Text");
		}
		
		public function view() {
			
			$b = $this->getBlockObject();         
			$btID = $b->getBlockTypeID();
			$bt = BlockType::getByID($btID);
			$uh = Loader::helper('concrete/urls');

			$this->addFooterItem('<script type="text/javascript" src="' . $uh->getBlockTypeAssetsURL($bt) . '/wt-js/wave.js"></script>');
		}

		function save($data) { 
			$db = Loader::db();
			//Settings Data
			$args['wtText'] 	= $data['wtText'];
			$args['wtPeriod'] 	= is_numeric($data['wtPeriod']) ? intval($data['wtPeriod']) : '50';
			$args['wtAmplitude'] = is_numeric($data['wtAmplitude']) ? intval($data['wtAmplitude']) : '20';
			$args['wtLetterSpace'] = is_numeric($data['wtLetterSpace']) ? intval($data['wtLetterSpace']) : '14';

			//Design Data
			$args['wtColor'] = isset($data['wtColor']) ? $data['wtColor'] : '#333333';
			$args['wtFormat'] 	= $data['wtFormat'];
			$args['wtHeight'] = is_numeric($data['wtHeight']) ? intval($data['wtHeight']) : '50';
		
			parent::save($args);
		}
		
		
	}
	
?>