<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ifendirh\Views\Helper;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;

/**
 * Description of GoogleAnalyticsHelper
 *
 * @author tbwa-lamatrix
 */
class GoogleAnalyticsHelper {
    
    public function __construct() {
        ;
    }

    //display the google analytics
    public function display() {
        $yaml = new Parser();
        try {
            $config = $yaml->parse(file_get_contents('config/config.yml'));
            if (isset($config['google_analytics']) && !empty($config['google_analytics']['code'])) {
                $codeAnalytics = $config['google_analytics']['code'];
                $js = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '$codeAnalytics', 'auto');
  ga('send', 'pageview');";
                echo $js;
            }
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }

}
