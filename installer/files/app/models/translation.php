<?php

class Translation extends ActiveRecord
{
    function  __construct() {
        $this->locales_dir = AK_ENVIRONMENT == 'testing' ? AK_TEST_DIR.DS.'fixture'.DS.'app'.DS.'locales' : AK_BASE_DIR.DS.'app'.DS.'locales';
    }

    /**
     * Get list of context dirs in $this->locales_dir
     *
     * @param string $locales_dir if not set, locales_dir will set to $this->locales_dir
     * @return array of context dirs
     */
    function getContextDirs()
    {
        $context_dirs = array();
        $dirs = Ak::dir($this->locales_dir, array('dirs' => true, 'files' => false));
        foreach($dirs as $dir) {
            $dir_name = array_values($dir);            
            if ($dir_name[0] != 'localize' && is_file($this->locales_dir.DS.$dir_name[0].DS.AK_FRAMEWORK_LANGUAGE.".php")) {
                array_push($context_dirs, array('context' => $dir_name[0]));
            }
        }
        return $context_dirs;
    }

    function getEntries($context, $locale = 'en')
    {
        if(is_file($this->locales_dir.DS.$context.DS.$locale.'.php')) {
            require_once $this->locales_dir.DS.$context.DS.$locale.'.php';
        }
        return @$dictionary;
    }

    function createOrUpdateFile($dictionaries, $file)
    {
        $handle = fopen($file, 'w+');
        if ($handle) {
            $content  = "<?php \n";
            $content .= "\$dictionary = array();\n";
            foreach($dictionaries as $key => $value) {
                $content .= "\$dictionary['".$key."'] = '".addslashes($value)."';\n";
            }
            $content .= '?>';
        }
        fclose($handle);
        Ak::file_put_contents($file, $content);
    }

    function _addToContextDirs($item, $key)
    {
        echo $item.' holds '.key;
    }
}

?>