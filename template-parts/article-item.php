<?php $keywords = carbon_get_the_post_meta('crb_article_keywords'); ?>
<div class="bg-white shadow-sm rounded-lg p-5 search_articles_line" data-metadata='{"name": "website","category": "site","tag": ["<?php echo get_the_title(); ?>", "<?php echo $keywords; ?>"]}'>
  <div class="flex space-x-5 mb-4">
    <div class="w-6/12">
      <div class="text-gray-600 text-sm font-subtitle font-bold mb-2">Назва статті</div>
      <div class="relative text-blue-500 text-ellipsis overflow-hidden whitespace-nowrap flex items-center">
        <a href="<?php echo carbon_get_the_post_meta('crb_article_link'); ?>" target="_blank" class="w-full h-full absolute top-0 left-0 z-1"></a>
        <div class="mr-1"><?php the_title(); ?></div>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg>
      </div>
    </div>
    <div class="w-2/12">
      <div class="text-gray-600 text-sm font-subtitle font-bold mb-2">Дата</div>
      <div><?php echo carbon_get_the_post_meta('crb_article_date'); ?></div>
    </div>
    <div class="w-2/12">
      <div class="text-gray-600 text-sm font-subtitle font-bold mb-2">Сайт</div>
      <div><?php echo carbon_get_the_post_meta('crb_article_site'); ?></div>
    </div>
    <div class="w-2/12">
      <div class="text-gray-600 text-sm font-subtitle font-bold mb-2">Автор</div>
      <div><?php echo carbon_get_the_post_meta('crb_article_author'); ?></div>
    </div>
  </div>
  <div>
    <div class="text-gray-600 text-sm font-subtitle font-bold mb-2">Ключові фрази</div>
    <div class="flex items-center relative text-ellipsis overflow-hidden whitespace-nowrap cursor-pointer copy-click" data-clipboard-text="<?php echo $keywords; ?>" data-copy-text="<?php echo $keywords; ?>">
      <div class="copy-tooltip hidden absolute -top-[4px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo $keywords; ?>">Скопійовано 🙂</div>
      <div class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg></div>  
      <div><?php echo $keywords; ?></div>
    </div>
  </div>
  
</div>