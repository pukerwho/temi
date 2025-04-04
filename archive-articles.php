<?php 
get_header(); 
$current_user_id = get_current_user_id();

?>

<?php if ($current_user_id === 1): ?>
  <div class="py-4 px-4">
    <div class="mx-auto max-w-7xl rounded-xl bg-white ">
      <!-- Header -->
      <div class="flex items-center justify-between border-b p-4">
        <div class="flex items-center gap-2">
          <span class="text-purple-600">📋</span>
          <h1 class="text-xl font-title font-semibold">Статті</h1>
        </div>
        <div>
          <div class="text-sm font-medium">Оновлено: <span class="font-bold"><?php echo carbon_get_theme_option('crb_last_update'); ?></span></div>
          <div class="hidden ml-auto items-center gap-2 rounded-md bg-blue-500 px-3 py-1.5 text-sm font-medium text-white cursor-pointer hover:bg-blue-600">Додати</div>
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
              <th class="border-r p-2">Показники</th>
              <th class="border-r p-2">Дата</th>
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
              <?php get_template_part('template-parts/article-item-table'); ?>
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
<?php endif; ?>
<?php get_footer(); ?>