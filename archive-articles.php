<?php
get_header();
$current_user_id = get_current_user_id();
$is_admin = $current_user_id == '1';
$is_quest = $current_user_id == '15';

// $is_quest = ($current_user_id == '2');
?>

<?php if ($is_admin || $is_quest): ?>
  <div class="py-4 px-4">
    <div class="mx-auto max-w-7xl rounded-xl bg-white ">
      <!-- Header -->
      <div class="flex items-center justify-between border-b p-4">
        <div class="flex items-center gap-x-2">
          <div>
            <div class="text-sm font-medium">Оновлено: <span class="font-bold"><?php echo carbon_get_theme_option(
                'crb_last_update'
            ); ?></span></div>
            <div class="hidden ml-auto items-center gap-2 rounded-md bg-blue-500 px-3 py-1.5 text-sm font-medium text-white cursor-pointer hover:bg-blue-600">Додати</div>
          </div>
        </div>
        <?php if ($is_admin): ?>
        <div class="flex items-center gap-x-2">
          <div class="bg-gray-200 rounded-md text-sm font-medium cursor-pointer px-3 py-1.5 modal-open-js" data-modal-id="modal-pay">
            Статистика
          </div>
          <div class="еxport_button bg-gray-200 rounded-md text-sm font-medium cursor-pointer px-3 py-1.5">
            Експорт
          </div>
        </div>
        <?php endif; ?>
        <div class="hidden gap-2">
          <button class="rounded-md p-2 hover:bg-gray-100">
            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </button>
          <button class="rounded-md p-2 hover:bg-gray-100">
            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
          <button class="rounded-md p-2 hover:bg-gray-100">
            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Toolbar -->
      <form  name="filter_tours" method="get">
        <div class="w-full flex items-center justify-between py-2 px-2 space-x-4">
          <div class="flex items-center">
            <div>
              <input type="text" id="" name="s" value="<?php echo isset(
                  $_GET['s']
              )
                  ? esc_attr($_GET['s'])
                  : ''; ?>" placeholder="Пошук" class="w-full border border-gray-300 rounded-lg px-2 py-1" />
            </div>
            <div class="flex items-center justify-between gap-2">
              <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <select id="site-select" class="site-select" name="article_site">
                  <option value="All" >Оберіть сайт</option>
                  <?php
                  $article_site = !empty($_GET['article_site'])
                      ? $_GET['article_site']
                      : '';
                  $all_sites = [
                      'treba-solutions.com',
                      'webgolovolomki.com',
                      'icatalog.pro',
                      'tarakan.org.ua',
                      'sdamkvartiry.com',
                      'priazovka.com',
                      'bepretty.in.ua',
                      'bfb.org.ua',
                      'd-art.org.ua',
                      'wunder2.com.ua',
                      'armadio.net.ua',
                      'book-cook.net',
                      'odysseus.com.ua',
                      'freeapp.com.ua',
                      'santmat.net.ua',
                      'merkury.com.ua',
                      'sviato.top',
                      'alekseev.com.ua',
                      'tsystem.com.ua',
                      'ortstom.in.ua',
                      'mikst.org.ua',
                      'kryazh.com.ua',
                      'marisam.com.ua',
                      'stp-press.info',
                      'investif.in.ua',
                      'vrudenko.org.ua',
                      'quarium.org.ua',
                      'wcdt.com.ua',
                      'm-cg.com.ua',
                      'rahlina.com.ua',
                      'usap.org.ua',
                      'izn.com.ua',
                      'diagtor.com.ua',
                      'pref.org.ua',
                      'beeforum.org.ua',
                      'internet-marketing.in.ua',
                      'wp.org.ua',
                      'infotrust.com.ua',
                      'dky.org.ua',
                      'faktologiya.com.ua',
                      'faktyhub.org.ua',
                      'inw.com.ua',
                      'newsdoc.com.ua',
                      'instruktorium.org.ua',
                      'ukq.com.ua',
                      'yakzrobyty.com.ua',
                  ];
                  foreach ($all_sites as $site): ?>
                    <option value="<?php echo $site; ?>" <?php echo $article_site ==
$site
    ? 'selected'
    : ''; ?>><?php echo $site; ?></option>
                  <?php endforeach;
                  ?>
                </select>
              </div>
              <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <select id="author-select" class="author-select" name="article_author" data-select-id="<?php echo $current_id; ?>">
                  <option value="All">Оберіть автора</option>
                  <?php
                  $article_author = !empty($_GET['article_author'])
                      ? $_GET['article_author']
                      : '';
                  $all_authors = [
                      'Ана-Катаріна Кузмицька',
                      'Каріна Туленіна',
                      'Анастасія Можаровська',
                      'Єлизавета Будас',
                      'Валерія Ліпська',
                      'Єсенія Буксіна',
                      'Віталій Татьянко',
                      'Марія Мигаль',
                      'Тетяна Ковальчук',
                      'Альона Громова',
                      'Ольга Славіковська',
                  ];
                  foreach ($all_authors as $author): ?>
                    <option value="<?php echo $author; ?>" <?php echo $article_author ==
$author
    ? 'selected'
    : ''; ?>><?php echo $author; ?></option>
                  <?php endforeach;
                  ?>
                </select>
              </div>
                
              <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" /></svg>  
                <select id="orderby-select" class="orderby-select" name="article_orderby" data-select-id="<?php echo $current_id; ?>">
                  <option value="All">Відсортувати по</option>
                  <?php
                  $article_orderby = !empty($_GET['article_orderby'])
                      ? $_GET['article_orderby']
                      : '';
                  $all_orderby = [
                      [
                          'name' => 'По keywords',
                          'key' => '_crb_article_ahrefs',
                      ],
                      [
                          'name' => 'По traffic',
                          'key' => '_crb_article_ahrefs_traffic',
                      ],
                      [
                          'name' => 'По клікам',
                          'key' => '_crb_article_google_click',
                      ],
                      [
                          'name' => 'По показам',
                          'key' => '_crb_article_google_views',
                      ],
                  ];
                  foreach ($all_orderby as $orderby): ?>
                    <option value="<?php echo $orderby[
                        'key'
                    ]; ?>" <?php echo $article_orderby == $orderby['key']
    ? 'selected'
    : ''; ?>><?php echo $orderby['name']; ?></option>
                  <?php endforeach;
                  ?>
                </select>
              </div>
              <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" /></svg>
                <select id="perpage-select" class="perpage-select" name="article_perpage" data-select-id="<?php echo $current_id; ?>">
                  <option value="20">Відображати</option>
                  <?php
                  $article_perpage = !empty($_GET['article_perpage'])
                      ? $_GET['article_perpage']
                      : '';
                  $all_perpage = [
                      [
                          'name' => 'По 20 на сторінку',
                          'key' => 20,
                      ],
                      [
                          'name' => 'По 50 на сторінку',
                          'key' => 50,
                      ],
                      [
                          'name' => 'По 100 на сторінку',
                          'key' => 100,
                      ],
                      [
                          'name' => 'Всі статті',
                          'key' => -1,
                      ],
                  ];
                  foreach ($all_perpage as $perpage): ?>
                    <option value="<?php echo $perpage[
                        'key'
                    ]; ?>" <?php echo $article_perpage == $perpage['key']
    ? 'selected'
    : ''; ?>><?php echo $perpage['name']; ?></option>
                  <?php endforeach;
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="flex">
            <input type="submit" class="ml-auto flex items-center gap-2 rounded-md bg-purple-600 px-3 py-1.5 text-sm font-medium text-white cursor-pointer hover:bg-purple-700"  value="Застосувати">
          </div>
        </div>        
      </form>
      <!-- Table -->
      <?php get_template_part('template-parts/admin-table'); ?>
    </div>
  </div>
<div class="modal px-8 py-6" data-modal-id="modal-pay">
  <div class="modal-content">
    <div class="modal-box w-5/6 bg-white min-h-full rounded-lg p-4">
      <div class="flex flex-wrap bg-gray-200 rounded-lg p-1 mb-2">
        <div class="tab w-1/2 active" data-tab="authors">Автори</div>
        <div class="tab w-1/2" data-tab="sites">Сайти</div>
      </div>
      <div class="tab-content" data-content="authors">
        <table class="prott-table w-full text-sm">
          <thead class="border-b border-gray-200 bg-black/80 text-gray-200 text-left">
            <tr>
              <th class="p-2 prott-sort-js" data-sort-type="text" data-sort-id="1">Автор</th>
              <th class="p-2 prott-sort-js" data-sort-id="2">Кількість статей</th>
              <th class="p-2 prott-sort-js" data-sort-id="4">Keywords</th>
              <th class="p-2 prott-sort-js" data-sort-id="5">Кліків</th>
              <th class="p-2 prott-sort-js" data-sort-id="6">Сторінок без показів</th>
              <th class="p-2 prott-sort-js" data-sort-id="7">Сторінок без keywords</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-300 border-b" id="stats-authors-tbody">
            <?php
            $data = get_option('article_stats_cache', ['authors' => []]);
            foreach ($data['authors'] as $author): ?>
            <?php
            $author_zero_views_percentage =
                ($author['zero_views'] / $author['count']) * 100;
            $author_zero_keywords_percentage =
                ($author['zero_keywords'] / $author['count']) * 100;
            ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b">
              <td class="border-r border-l p-2"><span class="data-sort-prott"><?php echo $author[
                  'name'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $author[
                  'count'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $author[
                  'keywords'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $author[
                  'clicks'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $author[
                  'zero_views'
              ]; ?></span> або <?php echo intval(
    $author_zero_views_percentage
); ?>%</td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $author[
                  'zero_keywords'
              ]; ?></span> або <?php echo intval(
    $author_zero_keywords_percentage
); ?>%</td>
            </tr>
            <?php endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-content hidden" data-content="sites">
        <table class="prott-table w-full text-sm">
          <thead class="border-b border-gray-200 bg-black/80 text-gray-200 text-left">
            <tr>
              <th class="p-2 prott-sort-js" data-sort-type="text" data-sort-id="7">Сайт</th>
              <th class="p-2 prott-sort-js" data-sort-id="8">Кількість статей</th>
              <th class="p-2 prott-sort-js" data-sort-id="9">Keywords</th>
              <th class="p-2 prott-sort-js" data-sort-id="10">Кліків</th>
              <th class="p-2 prott-sort-js" data-sort-id="11">Сторінок без показів</th>
              <th class="p-2 prott-sort-js" data-sort-id="12">Сторінок без keywords</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-300 border-b" id="stats-sites-tbody">
            <?php
            $data = get_option('article_stats_cache', ['sites' => []]);
            foreach ($data['sites'] as $site): ?>
            <?php
            $site_zero_views_percentage =
                ($site['zero_views'] / $site['count']) * 100;
            $site_zero_keywords_percentage =
                ($site['zero_keywords'] / $site['count']) * 100;
            ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b">
              <td class="border-r border-l p-2"><span class="data-sort-prott"><?php echo $site[
                  'name'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $site[
                  'count'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $site[
                  'keywords'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $site[
                  'clicks'
              ]; ?></span></td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $site[
                  'zero_views'
              ]; ?></span> або <?php echo intval(
    $site_zero_views_percentage
); ?>%</td>
              <td class="border-r p-2"><span class="data-sort-prott"><?php echo $site[
                  'zero_keywords'
              ]; ?></span> або <?php echo intval(
    $site_zero_keywords_percentage
); ?>%</td>
            </tr>
            <?php endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <div class="flex items-center justify-between gap-x-2 mt-4">
        <div id="stats-last-update" class="text-sm text-right text-gray-500">
          <?php
          $date_update = get_option('update_article_stats_date');
          if ($date_update) {
              $update_d = date('d.m.Y', $date_update);
              echo $update_d;
          }
          ?>
        </div>
        <div>
          <div id="update-stats-btn" class="bg-emerald-500 rounded-md text-sm font-medium text-white cursor-pointer px-3 py-1.5">
            Оновити дані
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<script>
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
</script>
<?php get_footer(); ?>
