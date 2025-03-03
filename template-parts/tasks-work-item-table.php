<?php 
  $keywords = carbon_get_the_post_meta('crb_tasks_keywords'); 
  $title = get_the_title();
?>
<tr class="odd:bg-white even:bg-gray-100 border-b search_articles_line" data-metadata='{"name": "website","category": "site","tag": ["<?php echo htmlspecialchars($title,ENT_QUOTES); ?>", "<?php echo htmlspecialchars($keywords, ENT_QUOTES); ?>"]}'>
  <!-- Назва статті -->
  <td class="border-r border-l p-2">
    <div class="max-w-[380px] flex items-center whitespace-nowrap text-ellipsis overflow-hidden gap-2">
      <div class="relative text-ellipsis overflow-hidden whitespace-nowrap flex items-center">
        <div><?php the_title(); ?></div>
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
    <?php if (carbon_get_the_post_meta("crb_tasks_status") === "reject"): ?>
      <div class="text-red-500">
        Потребує правок
      </div>
    <?php else: ?>
      <div>
        В роботі
      </div>
    <?php endif; ?>
  </td>
  <!-- END Ціна -->
  <!-- Таймер -->
  <td class="border-r whitespace-nowrap p-2">
    <div class="">
      <?php 
        $get_time_task = carbon_get_the_post_meta('crb_tasks_author_date'); 
        $get_complete_date_task = carbon_get_the_post_meta('crb_tasks_complete_date'); 
        if ($get_complete_date_task != '') {
          $time = taskFinishDate($get_time_task, $get_complete_date_task);
        } else {
          $time = taskContinueDate($get_time_task);
        }
      ?> 
      <span class="font-bold <?php echo ($time > 20) ? 'text-red-500' : 'text-green-500'; ?>"><?php echo $time; ?></span> г.
    </div>
  </td>
  <!-- END Таймер -->
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
          <?php if (carbon_get_the_post_meta("crb_tasks_reject")): ?>
          <!-- Правкі -->
          <div class="mb-4">
            <div class="text-gray-800 font-bold uppercase mb-2">Зауваження</div>
            <div class="bg-yellow-50 border-2 border-dashed rounded-lg p-4">
              <?php echo nl2br(carbon_get_the_post_meta("crb_tasks_reject")); ?>
            </div>
          </div>
          <!-- END Правкі -->
          <?php endif; ?>
          <div>
            <div class="text-gray-800 font-bold uppercase mb-2">Посилання на статтю</div>
            <div class="task-link-error hidden text-red-500 mb-2" data-task-id="<?php echo get_the_ID(); ?>"></div>
            <div class="mb-2"><input type="text" class="task-link w-full border border-gray-200 bg-gray-100 rounded px-4 py-2" data-inputlink-id="<?php echo get_the_ID(); ?>"></div>
            <div class="task-link-js" data-post-id="<?php echo get_the_ID(); ?>" data-site-url="<?php echo carbon_get_the_post_meta('crb_tasks_site');  ?>"><div class="bg-blue-500 text-white text-center rounded cursor-pointer px-4 py-2">Відправити</div></div>
          </div>
        </div>
      </div>
    </div>      
  </td>
  <!-- END Деталі -->
  <!-- Відмовитися -->
  <td class="border-r whitespace-nowrap p-2">
    <?php if ($time < 6 && carbon_get_the_post_meta("crb_tasks_status") != "reject" ): ?>
    <div class="flex items-center justify-center bg-red-500 text-white rounded cursor-pointer p-1 remove-task-click-js" data-post-id="<?php echo get_the_ID(); ?>">
      <div class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
      </div>
      <div>Видалити</div>
    </div>
    <?php else: ?>
      <div class="flex items-center justify-center bg-gray-600 text-white rounded p-1 ">
        <div>Не можна</div>
      </div>
    <?php endif; ?>
  </td>
  <!-- END Відмовитися -->
</tr>