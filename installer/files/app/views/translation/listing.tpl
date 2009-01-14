<div id="content_menu">
    <ul class="menu">        
        <li class="active"><%= link_to _('Listing Translations'), :action => 'listing' %></li>
    </ul>
    <p class="information">{_controller_information}</p>
</div>

<div class="content">
    {?Translations}
    <h1>_{Listing available Translations}</h1>
    <div class="listing">
        <table cellspacing="0" summary="_{Listing available Translations}">

            <tr>
                <th scope="col">_{Context}</th>
                <th scope="col">_{Available Languages}</th>
                <th scope="col"><span class="auraltext">_{Item actions}</span></th>
            </tr>

            {loop Translations}
            <tr {?Translation_odd_position}class="odd"{end}>
                <td class="field">{Translation-context}</td>
                <td class="field">
                    {loop languages}
                        <?php 
                            if ($language != 'en') {
                                echo $translation_helper->link_to_dictionary_list($Translation['context'], $language);
                            }
                        ?>
                    {end}
                </td>
                <td class="operation"><%= link_to_destroy Translation %></td>
            </tr>
            {end}
        </table>
    </div>

    {?translation_pages.links}
    <div class="paginator">
        <div id="header"><?php  echo translate('Showing page %page of %number_of_pages',array('%page'=>$translation_pages->getCurrentPage(),'%number_of_pages'=>$translation_pages->pages))?></div>
        {translation_pages.links?}
    </div>
    {end}

    {else}

    <h1>_{No Translations available yet.}</h1>

    {end}

</div>












