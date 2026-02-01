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

      // 5. Ahrefs Keywords
      var ahrefsKeywordsElem = row.querySelector('.article_ahrefs_keywords');
      rowData.push(ahrefsKeywordsElem ? ahrefsKeywordsElem.innerText || ahrefsKeywordsElem.textContent : '');

      // 6. Ahrefs Traffic
      var ahrefsTrafficElem = row.querySelector('.article_ahrefs_traffic');
      rowData.push(ahrefsTrafficElem ? ahrefsTrafficElem.innerText || ahrefsTrafficElem.textContent : '');

      // 7. Кліки
      var clicksElem = row.querySelector('.article_google_click');
      rowData.push(clicksElem ? clicksElem.innerText || clicksElem.textContent : '');

      // 8. Покази
      var viewsElem = row.querySelector('.article_google_views');
      rowData.push(viewsElem ? viewsElem.innerText || viewsElem.textContent : '');

      // 9. Ключові фрази (останній стовпчик td)
      var keywordsElem = cells[cells.length - 1];
      rowData.push(keywordsElem ? keywordsElem.innerText || keywordsElem.textContent : '');

      // 10. Посилання
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
