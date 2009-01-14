<div id="content_menu">
    <ul class="menu">
        <li class="active"><%= link_to _('Showing Translation'), :action => 'show', :context => params-context, :file => params-file %></li>        
        <li><%= link_to _('Show available Contexts'), :action => 'listing' %></li>
    </ul>
    <p class="information">{_controller_information}</p>
</div>


<div id="content">
    <h1>_{Translation details}</h1>

    <dl>
        <dt><%= translate( titleize( 'Context:' ) ) %>:</dt>
        <dd>{params-context},&nbsp;&nbsp;<strong><%= translate( titleize( 'Language:' ) ) %>:</strong>&nbsp;&nbsp;{params-file} </dd>
    </dl>

    {?Dictionaries}
    <%= start_form_tag :action => 'edit', :context => params-context, :file => params-file %>    
    <div class="listing">        
        <table cellspacing="0" summary="_{Listing available Translations}">
            <tr>
                <th scope="col"><%= sortable_link 'Original' %></th>
                <th scope="col">_{Translation}</th>                
            </tr>

            {loop Dictionaries}
            <tr {?Dictionary_odd_position}class="odd"{end}>
                <td class="field"><?php echo htmlentities($Dictionary_loop_key)?></td>
                <td class="field"><%= translation_text_field Dictionary, Dictionary_loop_key %></td>
            </tr>
            {end}
        </table>        
    </div>
    <div id="operations">
      <%= save_button %> _{or}  <%= cancel_link %>
    </div>
    </form>
    {else}
    <h1>_{No Dictionaries available yet.}</h1>
    {end}
</div>
