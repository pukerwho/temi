var $ = require("jquery");

$('.reject-task-js').on('click', function () {
  let postId = $(this).data('post-id');
  let rejectMessage = $('#message-' + postId + '').val();

  let data = {
    'action': 'task_reject_click_action',
    'postId': postId,
    'rejectMessage': rejectMessage,
  };
  $.ajax({
    url: ajaxurl, // AJAX handler
    data: data,
    type: 'POST',
    beforeSend: function (xhr) {
      console.log('Загружаю');
    },
    success: function (data) {
      if (data) {
        console.log(data);
        window.location.reload();
      }
    }
  });
})