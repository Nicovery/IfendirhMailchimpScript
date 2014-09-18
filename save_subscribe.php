<?php
session_start();

/**
 *
 * (c) Nicolas LUDOVIC <nicolas.ludovic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * this will store the data in database and send it to mailchimp
 *
 * @author nicolas
 */
require "vendor/autoload.php";

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;
use Ifendirh\Validator\FormValidator;
use Ifendirh\Subscriber\GlobalSubscriber;
use Ifendirh\Database\DatabaseManager;
use Ifendirh\Database\Person;
use Ifendirh\Views\BodyMail;

include_once 'lib/securimage/securimage.php';
$securimage = new Securimage();
if ($securimage->check($_POST['captcha_code']) != false) {
    
    // Get the YAML file and parse it
    $yaml = new Parser();
    $state = 0;
    try {
        
        //set config in cache
        $config = $yaml->parse(file_get_contents('config/config.yml'));
        
        //set validators for each fields of
        if (isset($config['constraints'])) {
            $validator = new FormValidator();
            $fieldConstraints = $config['constraints'];
            foreach ($fieldConstraints as $field => $constraints) {
                $_POST[$field] = isset($_POST[$field]) ? $_POST[$field] : null;
                $validator->addValidation($field, $_POST[$field], $constraints);
            }
        }
        
        if ($validator->isAllValid()) {
            
            //get the mailchimp matching
            if (isset($config['mailchimp_matching'])) {
                $mailchimpConfig = $config['mailchimp_config'];
                if ($mailchimpConfig['enable']) {
                    if (isset($mailchimpConfig['api_key']) && isset($mailchimpConfig['list_id'])) {
                        $subscriberManager = new GlobalSubscriber();
                        $subscriberManager
                            ->setApiKey($mailchimpConfig['api_key'])
                            ->setListId($mailchimpConfig['list_id'])
                            ->addMatchingFields($config['mailchimp_matching'])
                            ->addDataToList($_POST)->subscribe();
                        $errorMsg = $subscriberManager->getErrorMsg();
                        if (empty($errorMsg)) {
                            $state = 1;
                        }
                    }
                }
            }
            
            //store in database
            $databaseConfig = $config['database_config'];
            if ($databaseConfig['enable']) {
                
                $dbManager = new DatabaseManager($databaseConfig['dababase_name'], $databaseConfig['user'], $databaseConfig['password'], $databaseConfig['host']);
                
                $databaseMatching = $config['database_matching'];
                $person = new Person($dbManager);
                $data = array();
                
                foreach ($databaseMatching['fields'] as $databaseField => $formField) {
                    $data[$databaseField] = $_POST[$formField];
                }
                $person->insert($databaseMatching['table'], $data);
                $state = 1;
            }
            
            //send email
            $mailsCopy = $config['mails_copy'];
            if (!empty($mailsCopy['to'])) {
                $transport = \Swift_MailTransport::newInstance();
                
                // $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');
                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                    ->setFrom(array($mailsCopy['from']['email'] => $mailsCopy['from']['name']))
                    ->setTo($mailsCopy['to'])
                    ->setSubject($mailsCopy['subject'])
                    ->setContentType('text/html')
                    ->setBody(BodyMail::create($_POST));
                
                $result = $mailer->send($message);
            }
        }
    }
    catch(ParseException $e) {
        printf("Unable to parse the YAML string: %s", $e->getMessage());
    }
    
    header('location:confirm.php?state=' . $state);
}else{
    header('location:index.php');

}
