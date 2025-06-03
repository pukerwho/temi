<?php 
  $keywords = carbon_get_the_post_meta('crb_article_keywords'); 
  $title = get_the_title();
?>
<tr class="border-b search_articles_line whitespace-nowrap" data-metadata="<?php echo htmlspecialchars(json_encode([
  'name' => 'website',
  'category' => 'site',
  'tag' => [$title, $keywords]
]), ENT_QUOTES, 'UTF-8'); ?>">
  <!-- Назва статті -->
  <td class="max-w-[500px] border-r p-2">
    <div class="whitespace-nowrap text-ellipsis overflow-hidden gap-y-2">
      <div class="relative text-ellipsis overflow-hidden whitespace-nowrap flex items-center">
        <div><?php the_title(); ?></div>
      </div>
    </div>
  </td>
  <!-- END Назва статті -->
  <!-- Keywords -->
  <td class="border-r whitespace-nowrap p-2">
    <?php echo carbon_get_the_post_meta('crb_article_ahrefs'); ?>
  </td>
  <!-- END Keywords -->
  <!-- Ahrefs Traffic -->
  <td class="border-r whitespace-nowrap p-2">
    <?php echo carbon_get_the_post_meta('crb_article_ahrefs_traffic'); ?>
  </td>
  <!-- END Ahrefs Traffic -->
  <!-- Кліки -->
  <td class="border-r whitespace-nowrap p-2">
    <?php echo carbon_get_the_post_meta('crb_article_google_click'); ?>
  </td>
  <!-- END Кліки -->
  <!-- Покази -->
  <td class="border-r whitespace-nowrap p-2">
    <?php echo carbon_get_the_post_meta('crb_article_google_views'); ?>
  </td>
  <!-- END Покази -->
  <!-- Keywords -->
  <td class="p-2">
    <div class="flex items-center relative text-ellipsis overflow-hidden whitespace-nowrap cursor-pointer copy-click" data-clipboard-text="<?php echo $keywords; ?>" data-copy-text="<?php echo $keywords; ?>">
      <div class="copy-tooltip hidden absolute -top-[4px] left-0 bg-black/80 text-white rounded text-center px-2 py-1" data-copy-text="<?php echo $keywords; ?>">Скопійовано 🙂</div>
      <div class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/></svg></div>  
      <div><?php echo $keywords; ?></div>
    </div>
  </td>
  <!-- END Keywords -->
</tr>