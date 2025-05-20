var $ = require("jquery");
$('#update-stats-btn').on('click', function () {
  let data = {
    'action': 'update_article_stats',
  };
  $.ajax({
    url: ajaxurl, // AJAX handler
    data: data,
    type: 'POST',
    beforeSend: function (xhr) {
      console.log('Load...');
    },
    success: function (data) {
      if (data) {
        console.log(data);
        alert('Інформацію оновлено');
      }
    }
  });
});

// document.addEventListener('DOMContentLoaded', function () {
//   const updateBtn = document.getElementById('update-stats-btn');
//   if (updateBtn) {
//     updateBtn.addEventListener('click', function () {
//       fetch('/wp-admin/admin-ajax.php?action=get_cached_article_stats')
//       // Показати alert
//       alert('Інформацію оновлено');
//       // Оновити дату останнього оновлення
//       const updatedEl = document.getElementById('stats-last-update');
//       if (updatedEl) {
//         const now = new Date();
//         const formatted = now.toLocaleDateString('uk-UA');
//         updatedEl.textContent = 'Оновлено: ' + formatted;
//       }
//     });
//   }
//   // Load stats when modal opens
//   // document.querySelectorAll('.modal-open-js[data-modal-id="modal-pay"]').forEach(function (btn) {
//   //   btn.addEventListener('click', function () {
//   //     fetch('/wp-admin/admin-ajax.php?action=get_cached_article_stats')
//   //       .then(res => res.json())
//   //       .then(data => {
//   //         // оновити DOM таблиць з data.authors і data.sites
//   //         if (data.authors && Array.isArray(data.authors)) {
//   //           const tbody = document.getElementById('stats-authors-tbody');
//   //           if (tbody) {
//   //             tbody.innerHTML = '';
//   //             data.authors.forEach(author => {
//   //               const tr = document.createElement('tr');
//   //               tr.innerHTML = `
//   //                 <td class="p-2">${author.name}</td>
//   //                 <td class="p-2">${author.count}</td>
//   //                 <td class="p-2">${author.keywords}</td>
//   //                 <td class="p-2">${author.clicks}</td>
//   //                 <td class="p-2">${author.zero_views}</td>
//   //                 <td class="p-2">${author.zero_keywords}</td>
//   //               `;
//   //               tbody.appendChild(tr);
//   //             });
//   //           }
//   //         }
//   //         if (data.sites && Array.isArray(data.sites)) {
//   //           const tbody = document.getElementById('stats-sites-tbody');
//   //           if (tbody) {
//   //             tbody.innerHTML = '';
//   //             data.sites.forEach(site => {
//   //               const tr = document.createElement('tr');
//   //               tr.innerHTML = `
//   //                 <td class="p-2">${site.name}</td>
//   //                 <td class="p-2">${site.count}</td>
//   //                 <td class="p-2">${site.keywords}</td>
//   //                 <td class="p-2">${site.clicks}</td>
//   //                 <td class="p-2">${site.zero_views}</td>
//   //                 <td class="p-2">${site.zero_keywords}</td>
//   //               `;
//   //               tbody.appendChild(tr);
//   //             });
//   //           }
//   //         }
//   //       });
//   //   });
//   // });

// });