<ul>
  <li><a href="#" class="chat_friend" data-id="1">Friend 1</a></li>
  <li><a href="#" class="chat_friend" data-id="2">Friend 2</a></li>
  <li><a href="#" class="chat_friend" data-id="287">Friend 287</a></li>
</ul>
<input type="hidden" name="openedChatBoxes" value="0" />

<div class="chatBoxHolder"></div>
<script type="text/javascript">

  $(function() {
      $('.chat_friend').click(function(e) {
          e.preventDefault();
          var userId = $(this).data('id');
          var divToShow = '<div class="chatBox" data-id="chat_box_' + userId + '" id="chat_box_' + userId + '"><div>Your chat box code here with user '+ userId + '</div><div><a href="#" class="close">close</a></div></div>';
          $('.chatBoxHolder').append(divToShow);
          /*
           * Here you can do what you want with ajax
           $.ajax({
           url: 'plugins/get_chatmate_id.php',
           data: {id: userId},
           success: function(data) {
           //$('#chat_box_' + userId); //At here, you can access your chat_box like this, but remember, this is a live element, so use 'on' function to manilulate
           var d = $('#message_area');
           d.scrollTop(d.prop("scrollHeight")); // scrolls down the div
           }
           });
           */
      });

      $('.chatBoxHolder').on('click', '.close', function() {
          $(this).closest('.chatBox').remove();
      });
  })
</script>