<%= error_messages_for 'Translation' %>


    <fieldset>
        <label for="translation_origin">_{Origin}</label>
        <?php echo $form_helper->text_field('Translation', 'origin', array('value' => $Translation->origin, 'disabled' => true)) ?>
    </fieldset>

    <fieldset>
        <label for="translation_dictionary">_{Dictionary}</label>
        <?php echo $form_helper->text_field('Translation', 'dictionary', array('value' => $Translation->dictionary)) ?>
    </fieldset>

