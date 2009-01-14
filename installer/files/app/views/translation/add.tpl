<div id="content_menu">
    <ul class="menu">
        <li class="active"><%= link_to _('Creating new Translation'), :action => 'add' %></li>
        <li class="primary"><%= link_to _('Show available Translations'), :action => 'listing' %></li>
    </ul>
    <p class="information">{_controller_information}</p>
</div>


<div id="content">
  <h1>_{Creating new Translation}</h1>
  
  <%= start_form_tag :action => 'add' %>

    <div class="form">
      <%=  render :partial => 'form' %>
    </div>

    <div id="operations">
      <%= save_button %> _{or}  <%= cancel_link %>
    </div>

  </form>
</div>

