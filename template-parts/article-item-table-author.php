<?php 
$current_id = get_the_ID();
$keywords = carbon_get_the_post_meta('crb_article_keywords'); 
?>
<tr class="border-b search_articles_line" data-metadata='{"name": "website","category": "site","tag": ["<?php echo get_the_title(); ?>", "<?php echo $keywords; ?>"]}'>
  <!-- Назва статті -->
  <td class="border-r p-4">
    <div class="flex items-center whitespace-nowrap text-ellipsis overflow-hidden gap-2">
      <div class="w-[8px] min-w-[8px] h-[8px] min-h-[8px] bg-yellow-500 rounded-full"></div>
      <div class="relative text-ellipsis overflow-hidden whitespace-nowrap flex items-center">
        <div><?php the_title(); ?></div>
      </div>
    </div>
  </td>
  <!-- END Назва статті -->
  <!-- Сайт -->
  <td class="border-r whitespace-nowrap p-4">
    <?php  
      $article_site = carbon_get_the_post_meta('crb_article_site');
      $site_text_color = site_text_color($article_site);
      $site_bg_color = site_bg_color($article_site);
    ?>
    <span class="">
      <?php  echo get_site($article_site);  ?>
    </span>
  </td>
  <!-- END Сайт -->
  <!-- Дата -->
  <td class="border-r whitespace-nowrap p-4">
    <div class="">
      <?php echo carbon_get_the_post_meta('crb_article_date'); ?>
    </div>
  </td>
  <!-- END Дата -->
  <!-- Деталі -->
  <td class="border-r p-4">
    <div class="text-center rounded-md border border-purple-500 px-3 py-1.5 text-sm font-medium cursor-pointer hover:bg-purple-500 hover:text-white detail-click-js" data-detail-id="<?php echo $current_id; ?>">Детальніше</div>
    <div class="detail-modal px-8 py-6 " data-detail-modal="<?php echo $current_id; ?>">
      <div class="modal-content">
        <div class="modal-box w-full max-w-[640px] min-h-full bg-white rounded-lg px-6 py-4">
          <div class="font-title text-2xl text-center mb-6">Деталі завдання</div>
          <!-- Name -->
          <div class="mb-6">
            <?php $title = get_the_title(); ?>
            <div class="text-lg font-bold uppercase mb-2">Тема</div>
            <div class="flex items-center relative cursor-pointer copy-click" data-clipboard-text="<?php echo $title; ?>" data-copy-text="<?php echo $title; ?>">
              <div class="copy-tooltip hidden absolute top-[0px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo $title; ?>">Скопійовано 🙂</div>
              <div class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg></div>
              <div class="text-lg"><?php echo $title; ?></div>
            </div>
          </div>
          <!-- Site --> 
          <div class="mb-6">
            <div class="text-lg font-bold uppercase mb-2">Сайт</div>
            <div class="flex items-center text-blue-500 relative">
              <a href="<?php echo carbon_get_the_post_meta('crb_article_site'); ?>" target="_blank" class="w-full h-full absolute top-0 left-0 z-1"></a>
              <div class="text-lg"><?php echo carbon_get_the_post_meta('crb_article_site'); ?></div>
              <div class="ml-1">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" width="18px" fill="currentColor"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg>
              </div>
            </div>
          </div>
          <!-- Date --> 
          <div class="mb-6">
            <div class="text-lg font-bold uppercase mb-2">Дата</div>
            <div class="flex items-center">
              <div class="text-lg"><?php echo carbon_get_the_post_meta('crb_article_date'); ?></div>
            </div>
          </div>
          <!-- Keywords --> 
          <div class="mb-6">
            <div class="text-lg font-bold uppercase mb-2">Ключові фрази</div>
            <div class="flex relative cursor-pointer copy-click" data-clipboard-text="<?php echo $keywords; ?>" data-copy-text="<?php echo $keywords; ?>">
              <div class="copy-tooltip hidden absolute -top-[4px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo $keywords; ?>">Скопійовано 🙂</div>
              <div class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg></div>  
              <div class="text-lg"><?php echo $keywords; ?></div>
            </div>
          </div>
          <!-- Link -->
          <div class="text-lg font-bold uppercase mb-2">Посилання на статтю</div>
          <div class="mb-2"><input type="text" class="task-link w-full border border-gray-200 bg-gray-100 rounded px-4 py-2" data-inputlink-id="<?php echo $current_id; ?>"></div>
          <div class="task-link-js" data-post-id="<?php echo $current_id; ?>">
            <div class="bg-blue-500 text-lg text-white text-center rounded cursor-pointer px-4 py-2">Відправити</div>
          </div>
        </div>
      </div>
    </div>
  </td>
  <!-- END Деталі -->
</tr>