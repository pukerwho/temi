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
    var headerCells = table.querySelectorAll('thead th');
    if (headerCells.length) {
      var headerRow = Array.prototype.map.call(headerCells, function (cell) {
        return escapeCsvValue(cell.innerText || cell.textContent);
      });
      rows.push(headerRow.join(','));
    }

    var bodyRows = table.querySelectorAll('tbody tr');
    Array.prototype.forEach.call(bodyRows, function (row) {
      if (!isVisibleRow(row)) {
        return;
      }
      var cells = row.querySelectorAll('td, th');
      var rowValues = Array.prototype.map.call(cells, function (cell) {
        return escapeCsvValue(cell.innerText || cell.textContent);
      });
      rows.push(rowValues.join(','));
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
