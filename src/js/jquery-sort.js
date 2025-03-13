var $ = require("jquery");

$('.prott-sort-js').on('click', function () {
  var n = $(this).data('sort-id');
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("prott-table");

  // Оновлення іконки стрілки
  $('.sort-arrow').addClass('hidden');
  var arrow = $('.prott-sort-js[data-sort-id="' + n + '"] .sort-arrow');
  arrow.toggleClass('rotate-180').removeClass('hidden').addClass('active');

  switching = true;
  dir = "asc";

  function getNumericValue(cell) {
    if (!cell) return 0;
    let text = cell.innerText || cell.textContent;
    text = text.replace(/[^\d.-]/g, ''); // Видаляємо всі символи, крім чисел, крапок і мінуса
    return parseFloat(text) || 0; // Перетворюємо в число, якщо не число — повертаємо 0
  }

  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = getNumericValue(rows[i].getElementsByTagName("TD")[n].querySelector('.data-sort-prott'));
      y = getNumericValue(rows[i + 1].getElementsByTagName("TD")[n].querySelector('.data-sort-prott'));

      if ((dir == "asc" && x > y) || (dir == "desc" && x < y)) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount++;
    } else if (switchcount == 0 && dir == "asc") {
      dir = "desc";
      switching = true;
    }
  }
});