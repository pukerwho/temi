<?php if (get_current_user_id() === 1): ?>
<div>
  <span class="flex items-center bg-gray-800 text-white rounded-lg uppercase font-medium text-sm px-3 py-1 cursor-pointer modal-open-js" data-modal-id="balance">💰 Баланси</span>
  <div class="modal" data-modal-id="balance">
    <div class="modal-content">
      <div class="modal-box w-full max-w-[640px] min-h-full text-base bg-white rounded-lg px-6 py-4">
        <div class="text-gray-800 text-center font-bold uppercase mb-2">Баланси</div>
        <table class="w-full text-sm">
          <thead class="border-b border-gray-200 bg-black/80 text-gray-200 text-left">
            <tr>
              <th class="p-2">Автор</th>
              <th class="p-2">Баланс</th>
              <th class="p-2">В роботі</th>
              <th class="p-2">Оплатити</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $args = array(
              'role'    => 'Subscriber',
              // 'orderby' => 'user_nicename',
              // 'order'   => 'ASC'
            );
            $authors = get_users( $args );
            foreach ($authors as $author): 
            ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b user-row" data-user-row="<?php echo $author->ID; ?>">
              <td class="border-r border-l p-2"><?php echo $author->display_name; ?></td>
              <td class="border-r p-2"><span class="user-row-balance"><?php echo carbon_get_user_meta($author->ID,"crb_user_balance"); ?></span> грн.</td>
              <td class="border-r p-2"><?php echo carbon_get_user_meta($author->ID,"crb_user_balance_work"); ?> грн.</td>
              <td class="border-r p-2">
                <div class="bg-gray-200 text-gray-600 rounded text-center px-2 py-1 cursor-pointer balance-refresh-js" data-user-id="<?php echo $author->ID; ?>">
                  🔄 Скинути
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<div>
  💰 Мій баланс: <span id="balance" class="text-red-500 font-semibold"><?php echo carbon_get_user_meta(get_current_user_id(),"crb_user_balance"); ?></span> грн.
</div>
<div class="text-gray-400">|</div>
<div>
  💸 <span class="text-gray-600">В роботі: <span id="balance-work" class="font-bold"><?php echo carbon_get_user_meta(get_current_user_id(),"crb_user_balance_work"); ?></span> грн.</span>
</div>
<?php endif; ?>