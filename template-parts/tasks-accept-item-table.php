<?php 
  $keywords = carbon_get_the_post_meta('crb_tasks_keywords'); 
  $title = get_the_title();
?>
<tr class="odd:bg-white even:bg-gray-100 border-b search_articles_line" data-metadata='{"name": "website","category": "site","tag": ["<?php echo htmlspecialchars($title,ENT_QUOTES); ?>", "<?php echo htmlspecialchars($keywords, ENT_QUOTES); ?>"]}'>
  <!-- Назва статті -->
  <td class="border-r border-l p-2">
    <div class="max-w-[450px] flex items-center whitespace-nowrap text-ellipsis overflow-hidden gap-2">
      <div class="relative text-ellipsis overflow-hidden whitespace-nowrap flex items-center">
        <div><a href="<?php echo carbon_get_the_post_meta("crb_tasks_url"); ?>" target="_blank"><?php the_title(); ?></a></div>
      </div>
    </div>
  </td>
  <!-- END Назва статті -->
  <!-- Сайт -->
  <td class="border-r whitespace-nowrap p-2">
    <?php echo carbon_get_the_post_meta('crb_tasks_site');  ?>
  </td>
  <!-- END Сайт -->

  <?php if (get_current_user_id() === 1): ?>
  <!-- Автор -->
  <td class="border-r whitespace-nowrap p-2">
    <?php 
      $author_id = carbon_get_the_post_meta("crb_tasks_author"); 
      echo get_the_author_meta('display_name', $author_id);  
    ?>
  </td>
  <!-- END Автор -->
  <?php endif; ?>
  <!-- Ціна -->
  <td class="border-r whitespace-nowrap p-2">
    <div class="">
      <?php echo carbon_get_the_post_meta('crb_tasks_price'); ?> грн.
    </div>
  </td>
  <!-- END Ціна -->
  <!-- Статус -->
  <td class="border-r whitespace-nowrap p-2">
    <div class="text-green-500">Виконано</div>
  </td>
  <!-- END Ціна -->
  <!-- Keywords -->
  <td class="border-r whitespace-nowrap p-2">
    <?php $count_keywords = carbon_get_the_post_meta("crb_tasks_ahrefs"); ?>
    <div>
      <span class="<?php echo ($count_keywords > 10) ? "text-green-500" : ''; ?>"><?php echo ($count_keywords) ? $count_keywords : 'Немає даних'; ?></span>
    </div>
  </td>
  <!-- END Keywords -->
  <!-- Деталі -->
  <td class="border-r whitespace-nowrap p-2">
    
    <div class="bg-blue-500 text-white text-center rounded cursor-pointer px-4 py-1 detail-click-js" data-detail-id="<?php echo get_the_ID(); ?>">
      Деталі
    </div>
    <div class="detail-modal px-8 py-6 " data-detail-modal="<?php echo get_the_ID(); ?>">
      <div class="modal-content">
        <div class="modal-box w-full max-w-[640px] min-h-full text-base bg-white rounded-lg px-6 py-4">
          <!-- Назва статті -->
          <div class="mb-4">
            <div class="text-gray-800 font-bold uppercase mb-2">Назва статті</div>
            <div class="flex items-center relative">
              <div class="copy-tooltip hidden absolute -top-[4px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo get_the_title(); ?>">Скопійовано 🙂</div>
              <div class="copy-click mr-1" data-clipboard-text="<?php echo get_the_title(); ?>" data-copy-text="<?php echo get_the_title(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="20px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg>
              </div>
              <div class=""><?php the_title(); ?></div>
            </div>
          </div>
          <!-- END Назва статті -->
          
          <!-- Сайт -->
          <div class="mb-4">
            <div class="text-gray-800 font-bold uppercase mb-2">Сайт</div>
            <div class=""><a href="https://<?php echo carbon_get_the_post_meta('crb_tasks_site');  ?>" target="_blank"><?php echo carbon_get_the_post_meta('crb_tasks_site');  ?></a></div>
          </div>
          <!-- END Сайт -->
          
          <!-- Ціна -->
          <div class="mb-4">
            <div class="text-gray-800 font-bold uppercase mb-2">Ціна</div>
            <div class=""><?php echo carbon_get_the_post_meta('crb_tasks_price');  ?> грн.</div>
          </div>
          <!-- END Ціна -->
          
          <!-- Keywords -->
          <div class="mb-4">
            <div class="text-gray-800 font-bold uppercase mb-2">Ключові слова</div>
            <div class="flex relative">
              <div class="copy-tooltip hidden absolute -top-[4px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo $keywords; ?>">Скопійовано 🙂</div>
              <div class="copy-click mr-1" data-clipboard-text="<?php echo $keywords; ?>" data-copy-text="<?php echo $keywords; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="20px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg>
              </div>
              <div class="text-wrap"><?php echo $keywords; ?></div>
            </div>
          </div>
          <!-- END Keywords -->
          <div>
            <div class="text-gray-800 font-bold uppercase mb-2">Посилання на статтю</div>
            <div><a href="<?php echo carbon_get_the_post_meta("crb_tasks_url"); ?>" target="_blank">Відкрити</a></div>
          </div>
        </div>
      </div>
    </div>      
  </td>
  <!-- END Деталі -->
</tr>