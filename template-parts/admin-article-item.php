<?php
$keywords = carbon_get_the_post_meta('crb_article_keywords');
$title = get_the_title();
?>
<tr class="border-b search_articles_line" data-metadata="<?php echo htmlspecialchars(
    json_encode([
        'name' => 'website',
        'category' => 'site',
        'tag' => [$title, $keywords],
    ]),
    ENT_QUOTES,
    'UTF-8'
); ?>">
  <!-- Назва статті -->
  <td class="max-w-[500px] border-r p-2">
    <div class="whitespace-nowrap text-ellipsis overflow-hidden gap-y-2">
      <div class="relative text-blue-500 text-ellipsis overflow-hidden whitespace-nowrap flex items-center">
        <a class="article_link" href="<?php echo carbon_get_the_post_meta(
            'crb_article_link'
        ); ?>" target="_blank" class="w-full h-full absolute top-0 left-0 z-1"></a>
        <div class="mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="14px" fill="currentColor"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg>
        </div>
        <div class="article_title"><?php the_title(); ?></div>
      </div>
      <div class="article_date text-gray-600 text-xs">
        <?php
        $date = carbon_get_the_post_meta('crb_article_date');

        if ($date) {
            // Якщо збережено як рядок дати - конвертуємо в timestamp
            $timestamp = is_numeric($date) ? (int) $date : strtotime($date);

            if ($timestamp) {
                $date = date('d.m.Y', $timestamp);
            } else {
                // на випадок, якщо strtotime не зміг розпарсити
                $date = '';
            }
        }

        echo $date;
        ?>

      </div>
    </div>
  </td>
  <!-- END Назва статті -->
  <!-- Автор -->
  <td class="border-r whitespace-nowrap p-2">
    <span class=""><?php echo carbon_get_the_post_meta(
        'crb_article_author'
    ); ?></span>
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
      <?php echo get_site($host); ?>
    </span>
  </td>
  <!-- END Сайт -->
  <!-- Ahrefs -->
  <td class="max-w-[165px] border-r whitespace-nowrap p-2">
    <div class="gap-y-2">
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-orange-300 rounded-full mr-1"></div>
        <div class="article_ahrefs_keywords text-xs mr-2"><?php echo carbon_get_the_post_meta(
            'crb_article_ahrefs'
        ); ?></div>
      </div>
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-yellow-300 rounded-full mr-1"></div>
        <div class="article_ahrefs_traffic text-xs"><?php echo carbon_get_the_post_meta(
            'crb_article_ahrefs_traffic'
        ); ?></div>
      </div>
    </div>
  </td>
  <!-- END Ahrefs -->
  <!-- GSC -->
  <td class="max-w-[165px] border-r whitespace-nowrap p-2">
    <div class="gap-y-2">
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-sky-300 rounded-full mr-1"></div>
        <div class="article_google_click text-xs mr-2"><?php echo carbon_get_the_post_meta(
            'crb_article_google_click'
        ); ?></div>
      </div>
      <div class="flex items-center">
        <div class="w-[9px] h-[9px] bg-purple-300 rounded-full mr-1"></div>
        <div class="article_google_views text-xs"><?php echo carbon_get_the_post_meta(
            'crb_article_google_views'
        ); ?></div>
      </div>
    </div>
  </td>
  <!-- END GSC -->
  <!-- Keywords -->
  <td class="p-2">
    <div class="max-w-[200px] flex items-center relative text-ellipsis overflow-hidden whitespace-nowrap cursor-pointer copy-click" data-clipboard-text="<?php echo $keywords; ?>" data-copy-text="<?php echo $keywords; ?>">
      <div class="copy-tooltip hidden absolute -top-[4px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo $keywords; ?>">Скопійовано 🙂</div>
      <div class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg></div>  
      <div class="article_keywords"><?php echo $keywords; ?></div>
    </div>
  </td>
  <!-- END Keywords -->
</tr>