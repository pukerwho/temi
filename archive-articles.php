<?php 
get_header(); 
$current_user_id = get_current_user_id();

?>

<?php if ($current_user_id === 1 || $current_user_id === 2): ?>

<div class="py-12">
  <div class="mx-auto max-w-7xl rounded-xl bg-white shadow-xl">
    <!-- Header -->
    <div class="flex items-center justify-between border-b p-4">
      <div class="flex items-center gap-2">
        <span class="text-purple-600">📋</span>
        <h1 class="text-xl font-title font-semibold">Статті</h1>
      </div>
      <div>
        <div class="ml-auto flex items-center gap-2 rounded-md bg-blue-500 px-3 py-1.5 text-sm font-medium text-white cursor-pointer hover:bg-blue-600">Додати</div>
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
        <div class="flex items-center gap-2">
          <div class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium border-r">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <select id="site-select" class="site-select" name="article_site">
              <option value="All" >Оберіть сайт</option>
              <?php 
              $article_site = !empty( $_GET['article_site'] ) ? $_GET['article_site'] : '';
              $all_sites = ["treba-solutions.com","webgolovolomki.com","icatalog.pro","tarakan.org.ua","sdamkvartiry.com","priazovka.com","d-art.org.ua","armadio.net.ua","book-cook.net", "bfb.org.ua", "odysseus.com.ua", "santmat.net.ua", "freeapp.com.ua", "sviato.top", "alekseev.com.ua", "bepretty.in.ua", "ortstom.in.ua", "merkury.com.ua", "stp-press.info", "vrudenko.org.ua", "tsystem.com.ua", "mikst.org.ua", "kryazh.com.ua", "howlonglive.com", "nikeairmaxltdus.com"];
              foreach ($all_sites as $site):
              ?>
                <option value="<?php echo $site; ?>" <?php echo $article_site == $site ? 'selected' : ''; ?>><?php echo $site; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium ">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <select id="author-select" class="author-select" name="article_author" data-select-id="<?php echo $current_id; ?>">
              <option value="All">Оберіть автора</option>
              <?php 
              $article_author = !empty( $_GET['article_author'] ) ? $_GET['article_author'] : '';
              $all_authors = ["Ана-Катаріна Кузмицька","Каріна Туленіна","Анастасія Можаровська","Єлизавета Будас","Валерія Ліпська","Єсенія Буксіна"];
              foreach ($all_authors as $author):
              ?>
                <option value="<?php echo $author; ?>" <?php echo $article_author == $author ? 'selected' : ''; ?>><?php echo $author; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <input type="submit" class="ml-auto flex items-center gap-2 rounded-md bg-purple-600 px-3 py-1.5 text-sm font-medium text-white cursor-pointer hover:bg-purple-700"  value="Застосувати">
      </form>
    </div>
    <div><input id="search_articles_box" placeholder="Пошук" class="w-full bg-gray-50 text-lg shadow-sm border border-gray-100 rounded-lg outline-none p-4" /></div>
    <!-- Table -->
    <table class="w-full text-sm">
      <thead>
        <tr class="border-b text-left font-medium text-gray-500">
          <th class="border-r p-4">
            <div class="flex items-center font-title gap-2">
              Назва статті
              <button class="rounded p-1 hover:bg-gray-100">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
              </button>
            </div>
          </th>
          <th class="border-r font-title p-4">Автор</th>
          <th class="border-r font-title p-4">Сайт</th>
          <th class="border-r font-title p-4">Дата</th>
          <th class="font-title p-4">Ключові фрази</th>
        </tr>
      </thead>
      <tbody id="response" class="text-sm">
        <?php $new_posts = new WP_Query( array( 
          'post_type' => 'articles', 
          'posts_per_page' => -1,
          'meta_key' => '_crb_article_date',
          'orderby' => 'meta_value',
          'order' => 'DESC'
        ));
          if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
        ?>
          <?php get_template_part('template-parts/article-item-table'); ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </tbody>
    </table>
  </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>