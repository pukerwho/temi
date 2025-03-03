var $ = require("jquery");

$('.task-link-js').on('click', function () {
  let postId = $(this).data('post-id');
  let taskSite = $(this).data('site-url');

  let taskLink = $('.task-link[data-inputlink-id="' + postId + '"]').val();
  console.log(taskSite);
  if (taskLink != '') {
    if (taskLink.includes(taskSite)) {
      let data = {
        'action': 'add_link_click_action',
        'postId': postId,
        'taskLink': taskLink,
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
    } else {
      $('.task-link-error[data-task-id="' + postId + '"]').removeClass('hidden');
      $('.task-link-error[data-task-id="' + postId + '"]').text('Сайт не співпадає');
    }

  } else {
    $('.task-link-error[data-task-id="' + postId + '"]').removeClass('hidden');
    $('.task-link-error[data-task-id="' + postId + '"]').text('Треба щось ввести');
  }

})