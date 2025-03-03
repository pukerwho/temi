var $ = require("jquery");

$('.remove-task-click-js').on('click', function () {
  let postId = $(this).data('post-id');

  let data = {
    'action': 'remove_task_click_action',
    'postId': postId,
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