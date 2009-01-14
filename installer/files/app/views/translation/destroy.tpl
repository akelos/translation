<div id="content_menu">
    <ul class="menu">
        <li><%= link_to _('Create new Translation'), :action => 'add' %></li>
        <li class="primary"><%= link_to _('Edit Translation'), :action => 'edit', :id => Translation.id %></li>
        <li><%= link_to _('Show Translation'), :action => 'show', :id => Translation.id %></li>
        <li class="active"><%= link_to _('Deleting Translation'), :action => 'destroy', :id => Translation.id %></li>
        <li><%= link_to _('Show available Translations'), :action => 'listing' %></li>
    </ul>
    <p class="information">{_controller_information}</p>
</div>


<div class="content">
<h1>_{Deleting Translation}</h1>
<p class="warning">_{Are you sure you want to delete this Translation?}</p>

<%=  start_form_tag :action => 'destroy', :id => Translation.id %>

    <dl>
        <?php  $content_columns = array_keys($Translation->getContentColumns()); ?>
        {loop content_columns}
          <dt><%= translate( titleize( content_column ) ) %>:</dt>
          <dd><?php  echo  $Translation->get($content_column) ?>&nbsp;</dd>
        {end}
    </dl>

    <div id="operations">
        <%= confirm_delete %> _{or} <%= cancel_link %>
    </div>
  </form>
</div>
