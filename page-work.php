<?php
/*
Template Name: WORK
*/
?>

<?php 
get_header(); 
$current_user = wp_get_current_user();
$current_user_id = get_current_user_id();
if ($current_user_id != '1') {
  $meta_value = array('key' => '_crb_tasks_author', 'value' => $current_user_id,'compare' => '=');
}
$quotes = [
  "Навіть равлик доходить до фінішу, якщо не здається",
  "Помилки – це просто автокорекція життя",
  "Якщо щось не виходить, зроби вигляд, що так і було задумано",
  "Головне – почати, решта якось закрутиться (як рулет із корицею)",
  "У кожного є талант – хтось прокидається рано, а хтось красиво запізнюється",
  "Ніхто не знає, що ти робиш, якщо виглядаєш зайнятим",
  "Всі дороги ведуть до холодильника після 23:00",
  "Більшість проблем вирішується чарівною фразою «А, якось буде»",
  "Віра в себе – це коли замовляєш велику піцу на одного",
  "Великий шлях починається з маленького кроку в зручних капцях",
  "Не варто хвилюватися про дрібниці – вони самі якось розберуться",
  "Хто рано встає, той… може ще трохи поспати",
  "Роби, що можеш, а що не можеш – гугли",
  "Справжнє доросле життя – це коли ти сам собі купуєш тортик",
  "Якщо не знаєш, що робити – усміхнись і візьми ще один шматочок піци",
  "Успіх – це коли ти все ще не розумієш, що робиш, але вже виходить непогано",
  "Ніхто не ідеальний – навіть шоколад ламається у найнезручніший момент",
  "Якщо не знаєш, що робити, просто почни – потім можна буде сказати, що це експеримент",
  "Інтуїція – це коли ти випадково натискаєш не ту кнопку, але саме це й рятує ситуацію",
  "Усе йде за планом, просто план знаєш не ти",
  "Якби прокидатися рано було так легко, півні не кричали б із такою відчайдушністю",
  "Якщо щось не працює, просто скажи «цікаво» і зроби вигляд, що так і треба",
  "Справжня гармонія – це коли твої амбіції та лінь домовилися про компроміс",
  "Ніколи не здавайся! Якщо тільки це не спроба акуратно відкрити пакет з чипсами",
];

$all_tasks = new WP_Query( array(
  'post_type' => 'tasks', 
  'posts_per_page' => -1,
  'meta_key' => '_crb_tasks_status',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'fields' => 'ids',
  'meta_query' => array(
    'relation' => 'AND',
    $meta_value,
    array(
      'key' => '_crb_tasks_status',
      'value' => ["work", "reject"],
      'compare' => 'IN'
    ),
  )
));

?>

<?php if (is_user_logged_in() ): ?>
  <div class="bg-[#eeeeee] py-4">
    <h1 class="text-3xl font-title text-center mb-4">Раді бачити тебе тут, <?php echo esc_html( $current_user->user_firstname ); ?>!</h1>
    <div class="text-center italic">
      <?php echo $quotes[array_rand($quotes)]; ?>
    </div>
  </div>

  <div class="font-inter py-4">
    <div class="container mb-12">
      <div class="bg-white rounded mb-4">
        <div class="flex items-center justify-between py-3">
          <div class="top-nav flex items-center gap-x-4 px-4">
            <div><a href="/" class="flex items-center bg-gray-200 rounded-lg text-gray-600 uppercase font-medium text-sm px-3 py-1">Теми</a></div>
            <div><a href="<?php echo get_page_url("page-work"); ?>" class="flex items-center bg-red-500 rounded-lg text-gray-100 uppercase font-medium text-sm px-3 py-1">В роботі</a></div>
            <div><a href="<?php echo get_page_url("page-check"); ?>" class="flex items-center bg-gray-200 rounded-lg text-gray-600 uppercase font-medium text-sm px-3 py-1">Очікує перевірки</a></div>
            <div><a href="<?php echo get_page_url("page-accept"); ?>" class="flex items-center bg-gray-200 rounded-lg text-gray-600 uppercase font-medium text-sm px-3 py-1">Виконано</a></div>
          </div>
          <div class="flex items-center gap-x-2 px-4">
            <?php echo get_template_part("template-parts/balance"); ?>
          </div>
        </div>
      </div>
      <div class="bg-white rounded mb-8">
        <div class="py-3 px-4">
          <?php if ($all_tasks->have_posts()): ?>
          <table class="tasks w-full text-sm">
            <thead class="text-sm border-b border-gray-200 bg-black/80 text-gray-200">
              <tr>
                <th id="resizable-column" class="p-2">📋 Назва
                  <div class="resizer"></div>
                </th>
                <th class="p-2">🌐 Сайт</th>
                <?php if (get_current_user_id() === 1): ?>
                  <th class="p-2">👤 Автор</th>
                <?php endif; ?>
                <th class="p-2">🏷️ Ціна</th>
                <th class="p-2">☑️ Статус</th>
                <th class="p-2">⌛ Таймер</th>
                <th class="p-2">ℹ️ Завдання</th>
                <th class="p-2">🗑️ Відмовитися</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if ($all_tasks->have_posts()) : while ($all_tasks->have_posts()) : $all_tasks->the_post(); 
              ?>
                <?php get_template_part('template-parts/tasks-work-item-table'); ?>
              <?php endwhile; endif; wp_reset_postdata(); ?>
            </tbody>
          </table>
          <?php else: ?>
            <div class="text-center py-4">
              <div class="text-2xl mb-4">Поки тут нічого немає</div>
              <div class="text-lg font-light mb-6">Рекомендуємо перейти в розділ ТЕМИ та обрати собі щось 😉</div>
              <div class="mx-auto"><a href="/" class="bg-gray-800 text-white text-lg text-center rounded cursor-pointer px-6 py-2">Теми</a></div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>