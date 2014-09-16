<?php

/**
 *
 * (c) Nicolas LUDOVIC <nicolas.ludovic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Save the data in the list
 *
 * @author nicolas
 */

namespace Ifendirh\Subscriber;

class GlobalSubscriber {

    private $apiKey;
    private $listId;
    private $matchingFields;
    private $data;
    private $errorMsg;

    public function setApiKey($apiKey) {
        $this->errorMsg = "";
        $this->apiKey = $apiKey;
        return $this;
    }

    public function setListId($listId) {
        $this->listId = $listId;
        return $this;
    }

    public function addMatchingFields($fields) {
        $this->matchingFields = $fields;
        return $this;
    }

    public function addDataToList($data) {
        $this->data = $data;
        return $this;
    }

    public function subscribe() {
        $mailchimpManager = new \Mailchimp($this->apiKey);
    
        $dataToSave = array();
        //the fieldsListName is the name that mailchimp recognize 
        //the fieldsFormName is the name in data array key 
        foreach($this->matchingFields as $fieldsListName => $fieldsFormName){
            $dataToSave[$fieldsListName] = $this->data[$fieldsFormName];
        }
        
        $mailchimpManager->lists->subscribe($this->listId, array("email"=> $this->data[$this->matchingFields['EMAIL']]), $dataToSave, 'html', false, true, false, false);
        if (!empty($mailchimpManager->errorCode) && $mailchimpManager->errorCode != 214) {
            $this->addErrorMessage($mailchimpManager->errorMessage);
            return false;
        } else {
            return true;
        }
    }
    
    private function addErrorMessage($msg){
        $this->errorMsg .= $msg;
        return $this;
    }
    
    public function getErrorMsg() {
        return $this->errorMsg;
    }

}
