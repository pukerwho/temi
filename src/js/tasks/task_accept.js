var $ = require("jquery");

$('.task-accept-js').on('click', function () {
  let postId = $(this).data('post-id');

  let data = {
    'action': 'task_accept_click_action',
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
        thisBtns = document.querySelectorAll('.task-accept-btn[data-post-id="' + postId + '"]');
        for (thisBtn of thisBtns) {
          thisBtn.classList.add('bg-green-500');
          thisBtn.classList.add('text-white');
        }
        // window.location.reload();
      }
    }
  });
})