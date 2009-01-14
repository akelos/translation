<?php

class TranslationController extends ApplicationController
{
    var $controller_information = 'Translation management area.';
    
    var $models = 'Translation';
    var $controller_menu_options = array('Listing'=> array('id'=>'listing','url'=>array('controller'=>'translation','action'=>'listing')));

    function index()
    {
        $this->redirectToAction('listing');
    }

    function listing()
    {
        $this->Translations =& $this->Translation->getContextDirs();
        $this->languages = explode(',', AK_APP_LOCALES);
    }

    function show()
    {
        $this->_findTranslationOrRedirect();
    }

    function add()
    {
        $this->_addOrEditTranslation('add');
    }

    function edit()
    {
        $this->_findTranslationOrRedirect();
        $this->_updateTranslation();
    }

    function destroy()
    {
        $this->_findTranslationOrRedirect();
        if($this->Request->isPost()){
            $this->Translation->destroy();
            $this->flash_options = array('seconds_to_close' => 10);
            $this->flash['notice'] = $this->t('Translation was successfully deleted.');
            $this->redirectToAction('listing');
        }
    }
    
    function _findTranslationOrRedirect()
    {
        if(!empty($this->params['context']) && !empty($this->params['file'])) {
            if ('show' == $this->_action_name) {
                $originals =& $this->Translation->getEntries($this->params['context']);
                $dictionaries =& $this->Translation->getEntries($this->params['context'], $this->params['file']);
                if ($originals) {
                    foreach($originals as $key => $value) {
                        $this->Dictionaries[$key] = @$dictionaries[$key];
                    }
                }
            }
        } else {
            $this->flash['error'] = $this->t('Translation not found.');
            $this->redirectToAction('listing');
        }
    }

    function _updateTranslation()
    {
        if(!empty($this->params['dictionary'])){
            $file = $this->Translation->locales_dir.DS.$this->params['context'].DS.$this->params['file'].'.php';
            $this->Translation->createOrUpdateFile($this->params['dictionary'], $file);
            $this->flash['notice'] = $this->t('Translation was successfully updated.');
            $this->redirectTo(array('action' => 'show', 'context' => $this->params['context'], 'file' => $this->params['file']));
        }
    }
}

?>