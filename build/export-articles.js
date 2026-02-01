document.addEventListener('DOMContentLoaded', function () {
  var exportButton = document.querySelector('.еxport_button');
  if (!exportButton) {
    return;
  }

  function isVisibleRow(row) {
    if (!row) {
      return false;
    }
    if (row.offsetParent === null) {
      return false;
    }
    var style = window.getComputedStyle(row);
    return style.display !== 'none' && style.visibility !== 'hidden';
  }

  function normalizeCellValue(value) {
    if (value === null || value === undefined) {
      return '';
    }
    // Видаляємо зайві пробіли, переноси рядків та спеціальні символи, які можуть заважати
    return String(value).replace(/\s+/g, ' ').trim();
  }

  function escapeCsvValue(value) {
    var normalized = normalizeCellValue(value);
    if (/["\n,]/.test(normalized)) {
      return '"' + normalized.replace(/"/g, '""') + '"';
    }
    return normalized;
  }

  function getActiveArticlesTable() {
    return document.querySelector('table.articles');
  }

  function buildCsvFromTable(table) {
    var rows = [];
    
    // Визначений порядок заголовків
    var headers = [
      'Назва статті',
      'Дата',
      'Автор',
      'Сайт',
      'Ahrefs Keywords',
      'Ahrefs Traffic',
      'Кліки',
      'Покази',
      'Ключові фрази',
      'Посилання'
    ];
    rows.push(headers.map(escapeCsvValue).join(','));

    var bodyRows = table.querySelectorAll('tbody tr');
    Array.prototype.forEach.call(bodyRows, function (row) {
      if (!isVisibleRow(row)) {
        return;
      }
      
      var rowData = [];
      var cells = row.querySelectorAll('td');

      // 1. Назва статті
      var titleElem = row.querySelector('.article_title');
      rowData.push(titleElem ? titleElem.textContent || titleElem.innerText : '');

      // 2. Дата
      var dateElem = row.querySelector('.article_date');
      rowData.push(dateElem ? dateElem.textContent || dateElem.innerText : '');

      // 3. Автор
      rowData.push(cells[1] ? cells[1].textContent || cells[1].innerText : '');

      // 4. Сайт
      rowData.push(cells[2] ? cells[2].textContent || cells[2].innerText : '');

      // 5. Ahrefs Keywords
      var ahrefsKeywordsElem = row.querySelector('.article_ahrefs_keywords');
      rowData.push(ahrefsKeywordsElem ? ahrefsKeywordsElem.textContent || ahrefsKeywordsElem.innerText : '');

      // 6. Ahrefs Traffic
      var ahrefsTrafficElem = row.querySelector('.article_ahrefs_traffic');
      rowData.push(ahrefsTrafficElem ? ahrefsTrafficElem.textContent || ahrefsTrafficElem.innerText : '');

      // 7. Кліки
      var clicksElem = row.querySelector('.article_google_click');
      rowData.push(clicksElem ? clicksElem.textContent || clicksElem.innerText : '');

      // 8. Покази
      var viewsElem = row.querySelector('.article_google_views');
      rowData.push(viewsElem ? viewsElem.textContent || viewsElem.innerText : '');

      // 9. Ключові фрази
      var keywordsElem = row.querySelector('.article_keywords');
      rowData.push(keywordsElem ? keywordsElem.textContent || keywordsElem.innerText : '');

      // 10. Посилання
      var linkElem = row.querySelector('.article_link');
      rowData.push(linkElem ? linkElem.getAttribute('href') : '');

      rows.push(rowData.map(escapeCsvValue).join(','));
    });

    return rows.join('\r\n');
  }

  function downloadCsv(csvContent) {
    // Використовуємо BOM для коректного відображення кирилиці в Excel
    var BOM = '\uFEFF';
    var blob = new Blob([BOM + csvContent], { type: 'text/csv;charset=utf-8;' });
    var url = URL.createObjectURL(blob);
    var link = document.createElement('a');
    var now = new Date();
    var dateStamp = now.toISOString().slice(0, 10);
    link.href = url;
    link.download = 'articles-export-' + dateStamp + '.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
  }

  exportButton.addEventListener('click', function () {
    var table = getActiveArticlesTable();
    if (!table) {
      alert('Таблиця не знайдена для експорту.');
      return;
    }

    var csvContent = buildCsvFromTable(table);
    if (!csvContent) {
      alert('Немає даних для експорту.');
      return;
    }

    downloadCsv(csvContent);
  });
});
