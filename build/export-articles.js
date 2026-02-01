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
      'Ahrefs',
      'GSC',
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

      // 1. Назва статті (тільки з класу .article_title)
      var titleElem = row.querySelector('.article_title');
      rowData.push(titleElem ? titleElem.innerText || titleElem.textContent : '');

      // 2. Дата
      var dateElem = row.querySelector('.article_date');
      rowData.push(dateElem ? dateElem.innerText || dateElem.textContent : '');

      // 3. Автор (2-й стовпчик в оригінальній таблиці)
      rowData.push(cells[1] ? cells[1].innerText || cells[1].textContent : '');

      // 4. Сайт (3-й стовпчик)
      rowData.push(cells[2] ? cells[2].innerText || cells[2].textContent : '');

      // 5. Ahrefs (4-й стовпчик)
      rowData.push(cells[3] ? cells[3].innerText || cells[3].textContent : '');

      // 6. GSC (5-й стовпчик)
      rowData.push(cells[4] ? cells[4].innerText || cells[4].textContent : '');

      // 7. Ключові фрази (6-й стовпчик)
      rowData.push(cells[5] ? cells[5].innerText || cells[5].textContent : '');

      // 8. Посилання
      var linkElem = row.querySelector('.article_link');
      rowData.push(linkElem ? linkElem.getAttribute('href') : '');

      rows.push(rowData.map(escapeCsvValue).join(','));
    });

    return rows.join('\r\n');
  }

  function downloadCsv(csvContent) {
    var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
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
