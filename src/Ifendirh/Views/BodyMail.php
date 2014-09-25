<?php
namespace Ifendirh\Views;
/**
* 
*/
class BodyMail
{
	
	public static function create($fields)
	{
		$body = '';
		foreach ($fields as $fieldName => $fieldValue) {
			if(!in_array($fieldName, $exclude) ){
				$body .= $fieldName.' : '.$fieldValue.'<br />';
			}
			
		}
		return $body;
	}
}
