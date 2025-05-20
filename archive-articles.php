<?php 
get_header(); 
$current_user_id = get_current_user_id();

?>

<?php if ($current_user_id === 1): ?>
  <div class="py-4 px-4">
    <div class="mx-auto max-w-7xl rounded-xl bg-white ">
      <!-- Header -->
      <div class="flex items-center justify-between border-b p-4">
        <div class="flex items-center gap-x-2">
          <div>
            <div class="text-sm font-medium">Оновлено: <span class="font-bold"><?php echo carbon_get_theme_option('crb_last_update'); ?></span></div>
            <div class="hidden ml-auto items-center gap-2 rounded-md bg-blue-500 px-3 py-1.5 text-sm font-medium text-white cursor-pointer hover:bg-blue-600">Додати</div>
          </div>
        </div>
        
        <div class="flex items-center gap-x-2">
          <div class="bg-gray-200 rounded-md text-sm font-medium cursor-pointer px-3 py-1.5 modal-open-js" data-modal-id="modal-pay">
            Статистика
          </div>
          <div class="еxport_button bg-gray-200 rounded-md text-sm font-medium cursor-pointer px-3 py-1.5">
            Експорт
          </div>
        </div>
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
      <div class="flex border-b">
        <form  name="filter_tours" class="w-full flex items-center py-2 pl-2 pr-4">
          <div class="flex items-center justify-between gap-2">
            <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
              <select id="site-select" class="site-select" name="article_site">
                <option value="All" >Оберіть сайт</option>
                <?php 
                $article_site = !empty( $_GET['article_site'] ) ? $_GET['article_site'] : '';
                $all_sites = ["treba-solutions.com","webgolovolomki.com","icatalog.pro","tarakan.org.ua","sdamkvartiry.com","priazovka.com","d-art.org.ua","armadio.net.ua","book-cook.net", "bfb.org.ua", "odysseus.com.ua", "santmat.net.ua", "freeapp.com.ua", "sviato.top", "alekseev.com.ua", "bepretty.in.ua", "ortstom.in.ua", "merkury.com.ua", "stp-press.info", "vrudenko.org.ua", "tsystem.com.ua", "mikst.org.ua", "kryazh.com.ua", "howlonglive.com", "nikeairmaxltdus.com", "marisam.com.ua", "wunder2.com.ua", "wcdt.com.ua", "investif.in.ua", "m-cg.com.ua", "rahlina.com.ua", "quarium.org.ua"];
                foreach ($all_sites as $site):
                ?>
                  <option value="<?php echo $site; ?>" <?php echo $article_site == $site ? 'selected' : ''; ?>><?php echo $site; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <select id="author-select" class="author-select" name="article_author" data-select-id="<?php echo $current_id; ?>">
                <option value="All">Оберіть автора</option>
                <?php 
                $article_author = !empty( $_GET['article_author'] ) ? $_GET['article_author'] : '';
                $all_authors = ["Ана-Катаріна Кузмицька","Каріна Туленіна","Анастасія Можаровська","Єлизавета Будас","Валерія Ліпська","Єсенія Буксіна","Віталій Татьянко"];
                foreach ($all_authors as $author):
                ?>
                  <option value="<?php echo $author; ?>" <?php echo $article_author == $author ? 'selected' : ''; ?>><?php echo $author; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" /></svg>  
              <select id="orderby-select" class="orderby-select" name="article_orderby" data-select-id="<?php echo $current_id; ?>">
                <option value="All">Відсортувати по</option>
                <?php 
                $article_orderby = !empty( $_GET['article_orderby'] ) ? $_GET['article_orderby'] : '';
                $all_orderby = [
                  [
                    "name" => "По keywords",
                    "key" => "_crb_article_ahrefs",
                  ],
                  [
                    "name" => "По traffic",
                    "key" => "_crb_article_ahrefs_traffic",
                  ],
                  [
                    "name" => "По клікам",
                    "key" => "_crb_article_google_click",
                  ],
                  [
                    "name" => "По показам",
                    "key" => "_crb_article_google_views",
                  ]
                ];
                foreach ($all_orderby as $orderby):
                ?>
                  <option value="<?php echo $orderby["key"]; ?>" <?php echo $article_orderby == $orderby["key"] ? 'selected' : ''; ?>><?php echo $orderby["name"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="min-w-[25%] flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" /></svg>
              <select id="perpage-select" class="perpage-select" name="article_perpage" data-select-id="<?php echo $current_id; ?>">
                <option value="20">Відображати</option>
                <?php 
                $article_perpage = !empty( $_GET['article_perpage'] ) ? $_GET['article_perpage'] : '';
                $all_perpage = [
                  [
                    "name" => "По 20 на сторінку",
                    "key" => 20,
                  ],
                  [
                    "name" => "По 50 на сторінку",
                    "key" => 50,
                  ],
                  [
                    "name" => "По 100 на сторінку",
                    "key" => 100,
                  ],
                  [
                    "name" => "Всі статті",
                    "key" => -1,
                  ]
                ];
                foreach ($all_perpage as $perpage):
                ?>
                  <option value="<?php echo $perpage["key"]; ?>" <?php echo $article_perpage == $perpage["key"] ? 'selected' : ''; ?>><?php echo $perpage["name"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <input type="submit" class="ml-auto flex items-center gap-2 rounded-md bg-purple-600 px-3 py-1.5 text-sm font-medium text-white cursor-pointer hover:bg-purple-700"  value="Застосувати">
        </form>
      </div>
      <div><input id="search_articles_box" placeholder="Пошук" class="w-full bg-white text-lg outline-none px-4 py-2" /></div>
      <div class="overflow-x-auto">
        <!-- Table -->
        <table class="articles w-full table-auto overflow-scroll text-sm mb-6">
          <thead>
            <tr class="border-b border-gray-200 text-left font-medium  bg-black/80 text-gray-200">
              <th id="resizable-column" class="border-r p-2">Назва статті
                <div class="resizer"></div>
              </th>
              <th class="border-r p-2">Автор</th>
              <th class="border-r p-2">Сайт</th>
              <th class="border-r p-2">Ahrefs</th>
              <th class="border-r p-2">GSC</th>
              <th class="p-2">Ключові фрази</th>
            </tr>
          </thead>
          <tbody id="response" class="text-sm">
            <?php 
              // $new_posts = get_cached_articles();
              global $wp_query, $wp_rewrite;  
              $wp_query->query_vars['page'] > 1 ? $current = $wp_query->query_vars['page'] : $current = 1;
              $new_posts = new WP_Query( array(
                'post_type' => 'articles', 
                'posts_per_page' => 20,
                // 'meta_key' => '_crb_article_date',
                // 'orderby' => 'meta_value',
                'order' => 'DESC',
                'fields' => 'ids',
                'paged' => $current, 
              ));
              if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
            ?>
              <?php 
  $keywords = carbon_get_the_post_meta('crb_article_keywords'); 
  $title = get_the_title();
?>
<tr class="border-b search_articles_line" data-metadata="<?php echo htmlspecialchars(json_encode([
  'name' => 'website',
  'category' => 'site',
  'tag' => [$title, $keywords]
]), ENT_QUOTES, 'UTF-8'); ?>">
  <!-- Назва статті -->
  <td class="max-w-[500px] border-r p-2">
    <div class="whitespace-nowrap text-ellipsis overflow-hidden gap-y-2">
      <div class="relative text-blue-500 text-ellipsis overflow-hidden whitespace-nowrap flex items-center">
        <a href="<?php echo carbon_get_the_post_meta('crb_article_link'); ?>" target="_blank" class="w-full h-full absolute top-0 left-0 z-1"></a>
        <div class="mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="14px" fill="currentColor"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg>
        </div>
        <div><?php the_title(); ?></div>
      </div>
      <div class="text-gray-600 text-xs">
        <?php 
        $date = carbon_get_the_post_meta('crb_article_date'); 
        
        if ($date) {
          // $date = strtotime($date);
          $date = date("d.m.Y", $date);
        }
        echo $date;
        ?>
      </div>
    </div>
  </td>
  <!-- END Назва статті -->
  <!-- Автор -->
  <td class="border-r whitespace-nowrap p-2">
    <span class=""><?php echo carbon_get_the_post_meta('crb_article_author'); ?></span>
  </td>
  <!-- END Автор -->
  <!-- Сайт -->
  <td class="border-r whitespace-nowrap p-2">
    <?php  
      $article_link = carbon_get_the_post_meta('crb_article_link');
      $parse_link = parse_url($article_link);
      $host = $parse_link['host'];
    ?>
    <span class="">
      <?php  echo get_site($host);  ?>
    </span>
  </td>
  <!-- END Сайт -->
  <!-- Ahrefs -->
  <td class="max-w-[165px] border-r whitespace-nowrap p-2">
    <div class="gap-y-2">
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-orange-300 rounded-full mr-1"></div>
        <div class="text-xs mr-2"><?php echo carbon_get_the_post_meta('crb_article_ahrefs'); ?></div>
      </div>
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-yellow-300 rounded-full mr-1"></div>
        <div class="text-xs"><?php echo carbon_get_the_post_meta('crb_article_ahrefs_traffic'); ?></div>
      </div>
    </div>
  </td>
  <!-- END Ahrefs -->
  <!-- GSC -->
  <td class="max-w-[165px] border-r whitespace-nowrap p-2">
    <div class="gap-y-2">
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-sky-300 rounded-full mr-1"></div>
        <div class="text-xs mr-2"><?php echo carbon_get_the_post_meta('crb_article_google_click'); ?></div>
      </div>
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-purple-300 rounded-full mr-1"></div>
        <div class="text-xs"><?php echo carbon_get_the_post_meta('crb_article_google_views'); ?></div>
      </div>
    </div>
  </td>
  <!-- END GSC -->
  <!-- Keywords -->
  <td class="p-2">
    <div class="max-w-[200px] flex items-center relative text-ellipsis overflow-hidden whitespace-nowrap cursor-pointer copy-click" data-clipboard-text="<?php echo $keywords; ?>" data-copy-text="<?php echo $keywords; ?>">
      <div class="copy-tooltip hidden absolute -top-[4px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo $keywords; ?>">Скопійовано 🙂</div>
      <div class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg></div>  
      <div><?php echo $keywords; ?></div>
    </div>
  </td>
  <!-- END Keywords -->
</tr>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </tbody>
        </table>
      </div>
      
      <div class="b_pagination text-center mb-12">
        <?php 
              $big = 9999999991; // уникальное число
              echo paginate_links( array(
                'format' => '?page=%#%',
                'total' => $new_posts->max_num_pages,
                'current' => $current,
                'prev_next' => true,
                'next_text' => (''),
                'prev_text' => (''),
              )); 
            ?>
      </div>
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
        <table class="w-full text-sm">
          <thead class="border-b border-gray-200 bg-black/80 text-gray-200 text-left">
            <tr>
              <th class="p-2">Автор</th>
              <th class="p-2">Кількість статей</th>
              <th class="p-2">Keywords</th>
              <th class="p-2">Кліків</th>
              <th class="p-2">Сторінок без показів</th>
              <th class="p-2">Сторінок без keywords</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-300 border-b" id="stats-authors-tbody">
            <?php $data = get_option('article_stats_cache', ['authors' => []]);
            foreach ($data['authors'] as $author): ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b">
              <td class="border-r border-l p-2"><?php echo $author['name']; ?></td>
              <td class="border-r p-2"><?php echo $author['count']; ?></td>
              <td class="border-r p-2"><?php echo $author['clicks']; ?></td>
              <td class="border-r p-2"><?php echo $author['keywords']; ?></td>
              <td class="border-r p-2"><?php echo $author['zero_views']; ?></td>
              <td class="border-r p-2"><?php echo $author['zero_keywords']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="tab-content hidden" data-content="sites">
        <table class="w-full text-sm">
          <thead class="border-b border-gray-200 bg-black/80 text-gray-200 text-left">
            <tr>
              <th class="p-2">Сайт</th>
              <th class="p-2">Кількість статей</th>
              <th class="p-2">Keywords</th>
              <th class="p-2">Кліків</th>
              <th class="p-2">Сторінок без показів</th>
              <th class="p-2">Сторінок без keywords</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-300 border-b" id="stats-sites-tbody">
            <?php $data = get_option('article_stats_cache', ['sites' => []]);
            foreach ($data['sites'] as $site): ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b">
              <td class="border-r border-l p-2"><?php echo $site['name']; ?></td>
              <td class="border-r p-2"><?php echo $site['count']; ?></td>
              <td class="border-r p-2"><?php echo $site['clicks']; ?></td>
              <td class="border-r p-2"><?php echo $site['keywords']; ?></td>
              <td class="border-r p-2"><?php echo $site['zero_views']; ?></td>
              <td class="border-r p-2"><?php echo $site['zero_keywords']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="flex items-center justify-between gap-x-2 mt-4">
        <div id="stats-last-update" class="text-sm text-right text-gray-500">
          <?php 
            $date_update = get_option("update_article_stats_date"); 
            if ($date_update) { $update_d = date("d.m.Y", $date_update); echo $update_d; }
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
<?php get_footer(); ?>