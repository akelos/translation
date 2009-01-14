<?php
# This class is accessed by the makelos script
class TranslationInstaller
{
    function install()
    {
        $plugin_app_dir = AK_BASE_DIR.DS.'app'.DS.'vendor'.DS.'plugins'.DS.'translation'.DS.'installer'.DS.'files'.DS.'app'.DS.'*';
        $app_dir = AK_BASE_DIR.DS.'app';
    	
        // copy translation files into app dir
        $cmd = "cp -R $plugin_app_dir ".$app_dir;
        exec($cmd);
        if(
        	!file_exists($app_dir.DS.'controllers'.DS.'translation_controller.php') || 
        	!file_exists($app_dir.DS.'models'.DS.'translation.php') ||
        	!file_exists($app_dir.DS.'helpers'.DS.'translation_helper.php') ||
        	!file_exists($app_dir.DS.'views'.DS.'translation') ||
        	!file_exists($app_dir.DS.'views'.DS.'translation'.DS.'add.tpl') ||
        	!file_exists($app_dir.DS.'views'.DS.'translation'.DS.'destroy.tpl') ||
        	!file_exists($app_dir.DS.'views'.DS.'translation'.DS.'edit.tpl') ||
        	!file_exists($app_dir.DS.'views'.DS.'translation'.DS.'_form.tpl') ||
        	!file_exists($app_dir.DS.'views'.DS.'translation'.DS.'listing.tpl') ||
        	!file_exists($app_dir.DS.'views'.DS.'translation'.DS.'show.tpl')
        ) {
          	echo "\ntranslation installation failed during attempt to copy ";
            return;
        }
        echo "\ntranslation is now installed\n";
    } // function install
 
    function uninstall()
    {
        // remove translation files from app dir
        $plugin_app_dir = AK_BASE_DIR.DS.'app'.DS.'vendor'.DS.'plugins'.DS.'translation'.DS.'installer'.DS.'files'.DS.'app';
        $app_dir = AK_BASE_DIR.DS.'app';
        exec("rm ".$app_dir.DS.'controllers'.DS.'translation_controller.php');
        exec("rm ".$app_dir.DS.'models'.DS.'translation.php');
        exec("rm ".$app_dir.DS.'helpers'.DS.'translation_helper.php');
        exec("rm -rf ".$app_dir.DS.'views'.DS.'translation');
        echo "\ntranslation has been uninstalled\n";
    }
}
?>