<?php if (get_current_user_id() === 1): ?>
<div>
  <span class="flex items-center bg-gray-800 text-white rounded-lg uppercase font-medium text-sm px-3 py-1 cursor-pointer modal-open-js" data-modal-id="balance">💰 Баланси</span>
  
    
  <div class="modal" data-modal-id="balance">
    <div class="modal-content">
      <div class="modal-box w-full max-w-[640px] min-h-full text-base bg-white rounded-lg px-6 py-4">
        <div class="text-gray-800 text-center font-bold uppercase mb-2">Баланси</div>
        <div class="flex flex-wrap border border-gray-200 mb-2">
          <div class="tab active" data-tab="authors">Автори</div>
          <div class="tab" data-tab="sites">Сайти</div>
        </div>
        <div class="tab-content" data-content="authors">
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
              $all_users_balance = 0;
              $all_users_balance_work = 0;
              $args = array(
                'role'    => 'Subscriber',
                // 'orderby' => 'user_nicename',
                // 'order'   => 'ASC'
              );
              $authors = get_users( $args );
              foreach ($authors as $author): 
              ?>
              <?php 
                $user_balance = carbon_get_user_meta($author->ID,"crb_user_balance");
                $user_work_balance = carbon_get_user_meta($author->ID,"crb_user_balance_work");
                $all_users_balance = $all_users_balance + $user_balance;
                $all_users_balance_work = $all_users_balance_work + $user_work_balance;
              ?>
              <tr class="odd:bg-white even:bg-gray-100 border-b user-row" data-user-row="<?php echo $author->ID; ?>">
                <td class="border-r border-l p-2"><?php echo $author->display_name; ?></td>
                <td class="border-r p-2"><span class="user-row-balance"><?php echo $user_balance; ?></span> грн.</td>
                <td class="border-r p-2"><?php echo $user_work_balance; ?> грн.</td>
                <td class="border-r p-2">
                  <div class="bg-gray-200 text-gray-600 rounded text-center px-2 py-1 cursor-pointer balance-refresh-js" data-user-id="<?php echo $author->ID; ?>">
                    🔄 Скинути
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr class="border-b border-gray-200 bg-green-100 text-left">
                <td class="font-bold border-r border-l p-2">Загалом:</td>
                <td class="border-r border-l p-2"><span id="all-balance"><?php echo $all_users_balance; ?></span> грн.</td>
                <td class="border-r border-l p-2"><span id="all-work"><?php echo $all_users_balance_work; ?></span> грн.</td>
                <td class="crossed"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="tab-content hidden" data-content="sites">
          <table class="w-full text-sm">
            <thead class="border-b border-gray-200 bg-black/80 text-gray-200 text-left">
              <tr>
                <th class="p-2">Сайт</th>
                <th class="p-2">Витрачено</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b">
                <td class="border-r border-l p-2">wunder2.com.ua</td>
                <td class="border-r p-2"><?php echo get_option('_crb_website_wunder2_com_ua'); ?> грн.</td>
              </tr>
              <tr class="bg-gray-100 border-b">
                <td class="border-r border-l p-2">wcdt.com.ua</td>
                <td class="border-r p-2"><?php echo get_option('_crb_website_wcdt_com_ua'); ?> грн.</td>
              </tr>
              <tr class="bg-white border-b">
                <td class="border-r border-l p-2">investif.in.ua</td>
                <td class="border-r p-2"><?php echo get_option('_crb_website_investif_in_ua'); ?> грн.</td>
              </tr>
              <tr class="bg-gray-100 border-b">
                <td class="border-r border-l p-2">rahlina.com.ua</td>
                <td class="border-r p-2"><?php echo get_option('_crb_website_rahlina_com_ua'); ?> грн.</td>
              </tr>
              <tr class="bg-white border-b">
                <td class="border-r border-l p-2">m-cg.com.ua</td>
                <td class="border-r p-2"><?php echo get_option('_crb_website_m-cg_com_ua'); ?> грн.</td>
              </tr>
              <tr class="border-b bg-green-100 text-left">
                <td class="font-bold border-r border-l p-2">Загалом:</td>
                <td class="border-r p-2">
                  <?php 
                    $total = get_option('_crb_website_wunder2_com_ua') + get_option('_crb_website_wcdt_com_ua') + get_option('_crb_website_investif_in_ua') + get_option('_crb_website_rahlina_com_ua') + get_option('_crb_website_m-cg_com_ua'); 
                    echo $total;
                  ?> грн.</td>
              </tr>
            </tbody>
          </table>
        </div>
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