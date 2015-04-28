<?php 
ini_set('display_errors','on');
require_once 'app/Mage.php';
 Mage::app('default'); 
$_product = Mage::getModel('catalog/product')->getCollection();
$resource = Mage::getSingleton('core/resource');
$write = $resource->getConnection('core_write');
$tableName = $resource->getTableName('catalog_product_entity_media_gallery_value');
foreach ($_product as $pro) {
	$product = Mage::getModel('catalog/product')->load($pro->getId());
	$baseimage=$product->getImage();
	$imageGallery=$product->getMediaGallery();
	if(isset($imageGallery['images']) && count($imageGallery['images'])>0){
		foreach ($imageGallery['images'] as $value) {
			if(trim($baseimage)==trim($value['file'])){
				$value_id=$value['value_id'];
				if( ! $value['disabled']){
					$write->beginTransaction();
					$__fields = array();
					$__fields['disabled'] = 1;
					$__where = $write->quoteInto('value_id =?',$value_id);
					$write->update($tableName, $__fields, $__where);
					$write->commit();
			    	}
			}
		}
	}	
}
?>