var $ = require("jquery");

$('.balance-refresh-js').on('click', function () {
  let userId = $(this).data('user-id');

  let data = {
    'action': 'balance_refresh_click_action',
    'userId': userId,
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
        thisUserRow = document.querySelector('.user-row[data-user-row="' + userId + '"] ');
        balanceUserDiv = thisUserRow.querySelector(".user-row-balance");
        btnUserDiv = thisUserRow.querySelector(".balance-refresh-js");
        btnUserDiv.classList.add('bg-green-200');
        balanceUserDiv.innerText = "0";

        console.log(data);
        // window.location.reload();
      }
    }
  });
})