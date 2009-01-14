<?php

class TranslationHelper extends AkActionViewHelper
{ 
    function cancel_link($url = array('action' => 'listing'))
    {
        return $this->_controller->url_helper->link_to($this->t('Cancel'), $url, array('class'=>'action'));
    }

    function save_button()
    {
        return '<input type="submit" value="'.$this->_controller->t('Save').'" class="primary" />';
    }

    function confirm_delete()
    {
        return '<input type="submit" value="'.$this->_controller->t('Delete').'" />';
    }

    function link_to_show(&$Record)
    {
        return $this->_controller->url_helper->link_to($this->_controller->t('Show'), array('action' => 'show', 'context' => $Record), array('class'=>'action'));
    }
    
    function link_to_edit(&$Record)
    {
        return $this->_controller->url_helper->link_to($this->_controller->t('Edit'), array('action' => 'edit', 'context' => $Record), array('class'=>'action'));
    }

    function link_to_destroy(&$Record)
    {
    	return $this->_controller->url_helper->link_to($this->_controller->t('Delete'), array('action' => 'destroy', 'context' => $Record), array('class'=>'action'));
    }

    function link_to_dictionary_list($context, $file)
    {
        return $this->_controller->url_helper->link_to($this->_controller->t(Ak::locale('description', $file)), array('action' => 'show', 'context' => $context, 'file' => $file), array('class'=>'action'));
    }

    function translation_text_field(&$Dictionary, $key)
    {
        return strlen($Dictionary) > 60 ?
            $this->_controller->form_tag_helper->text_area_tag("dictionary[$key]", $Dictionary, array('size' => '50x8')) :
            $this->_controller->form_tag_helper->text_field_tag("dictionary[$key]", $Dictionary, array('size' => 60));
    }
}

?>
