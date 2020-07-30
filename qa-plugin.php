<?php
        
/*              
        Plugin Name: FS In List Ads
        Plugin URI: https://github.com/FazleySabbir/FS-In-List-Ads/
        Plugin Description: This plugin will give you a opportunity to show ads inside question list.
        Plugin Version: 1.2
        Plugin Date: 2020-07-26
        Plugin Author: Fazley Sabbir
        Plugin Author URI: https://www.facebook.com/profile.php?id=100013518669051                          
        Plugin License: GPLv2                           
        Plugin Minimum Question2Answer Version: 1.5
        Plugin Update Check URI: https://raw.githubusercontent.com/FazleySabbir/FS-In-List-Ads/master/qa-plugin.php
*/                      
                        
                        
        if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
                        header('Location: ../../');
                        exit;   
        }               

        qa_register_plugin_module('module', 'fs-inlist-ads-admin.php', 'fs_inlist_ads_admin', 'In List Admin');
        
        qa_register_plugin_layer('fs-inlist-ads-layer.php', 'In List Ads Layer');
		
		
                     
                        
/*                              
        Omit PHP closing tag to help avoid accidental output
*/                              
                          

