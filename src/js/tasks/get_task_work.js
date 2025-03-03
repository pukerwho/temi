var $ = require("jquery");

$('.get-task-work-js').on('click', function () {
  let postId = $(this).data('post-id');
  let taskAuthor = $(this).data('author-id');

  let data = {
    'action': 'get_task_work_click_action',
    'postId': postId,
    'taskAuthor': taskAuthor,
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
        check_message = data;
        thisBtns = document.querySelectorAll('.get-task-work-js[data-post-id="' + postId + '"]');
        if (check_message === 'good') {
          for (thisBtn of thisBtns) {
            thisBtn.classList.add('bg-green-500');
            thisBtn.innerText = "Стаття ваша!";
          }

        } else {
          for (thisBtn of thisBtns) {
            thisBtn.classList.add('bg-red-500');
            thisBtn.innerText = "Хтось вже поцупив(";
          }
        }
        console.log(data);
        // window.location.reload();
      }
    }
  });
})