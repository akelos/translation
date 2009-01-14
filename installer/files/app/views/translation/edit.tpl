<div id="content_menu">
    <ul class="menu">
        <li class="active"><%= link_to _('Edit Translation'), :action => 'edit', :context => params-context, :file => params-file, :id => params-dictionary %></li>
        <li><%= link_to _('Showing Translation'), :action => 'show', :context => params-context, :file => params-file %></li>
        <li class="primary"><%= link_to _('Show available Contexts'), :action => 'listing' %></li>
    </ul>
    <p class="information">{_controller_information}</p>
</div>

<div id="content">
  <h1>_{Editing Translations}</h1>
  
  <%= start_form_tag :action => 'edit', :context => params-context, :file => params-file, :dictionary => params-dictionary %>

  <div class="form">
    <%= render :partial => 'form' %>
  </div>

    <div id="operations">
      <%= save_button %> _{or}  <%= cancel_link %>
    </div>

  </form>
</div>
