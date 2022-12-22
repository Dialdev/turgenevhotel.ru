<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

function typical_title() { // функция вывода тайтла
	global $page, $paged; // переменные пагинации должны быть глобыльными
	wp_title('', true, 'right'); // вывод стандартного заголовка без разделителя
	$site_description = get_bloginfo('description', 'display'); // получаем описание сайта
	if ($site_description && (is_home() || is_front_page())) //если описание сайта есть и мы на главной
		echo " | $site_description"; // выводим описание сайта с "|" разделителем
	if ($paged >= 2 || $page >= 2) // если пагинация была использована
		echo ' | '.sprintf(__( 'Страница %s'), max($paged, $page)); // покажем номер страницы с "|" разделителем
}

register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'left' => 'Левое' // Слева
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Сайдбар', // Название в админке
	'id' => "sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
	public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
		$output .= '<ul class="children">' . "\n";
	}
	public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
		$output .= "</ul><!-- .children -->\n";
	}
    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
        echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n"; // родительский тэг комментария с классами выше и уникальным якорным id
    	echo '<div class="media-left">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'media-object'))."</div>\n"; // покажем аватар с размером 64х64
    	echo '<div class="media-body">';
    	echo '<span class="meta media-heading">Автор: '.get_comment_author()."\n"; // имя автора коммента
    	//echo ' '.get_comment_author_email(); // email автора коммента, плохой тон выводить почту
    	echo ' '.get_comment_author_url(); // url автора коммента
    	echo ' Добавлено '.get_comment_date('F j, Y в H:i')."\n"; // дата и время комментирования
    	if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
    	echo "</span>";
        comment_text()."\n"; // текст коммента
        $reply_link_args = array( // опции ссылки "ответить"
        	'depth' => $depth, // текущая вложенность
        	'reply_text' => 'Ответить', // текст
			'login_text' => 'Вы должны быть залогинены' // текст если юзер должен залогинеться
        );
        echo get_comment_reply_link(array_merge($args, $reply_link_args)); // выводим ссылку ответить
        echo '</div>'."\n"; // закрываем див
    }
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
		$output .= "</li><!-- #comment-## -->\n";
	}
}

function pagination() { // функция вывода пагинации
	global $wp_query; // текущая выборка должна быть глобальной
	$big = 999999999; // число для замены
	$links = paginate_links(array( // вывод пагинации с опциями ниже
		'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
		'format' => '?paged=%#%', // формат, %#% будет заменено
		'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
		'type' => 'array', // нам надо получить массив
		'prev_text'    => 'Назад', // текст назад
    	'next_text'    => 'Вперед', // текст вперед
		'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
		'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
		'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
		'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
		'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
		'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
		'before_page_number' => '', // строка перед цифрой
		'after_page_number' => '' // строка после цифры
	));
 	if( is_array( $links ) ) { // если пагинация есть
	    echo '<ul class="pagination">';
	    foreach ( $links as $link ) {
	    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>"; // если это активная страница
	        else echo "<li>$link</li>"; 
	    }
	   	echo '</ul>';
	 }
}

add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
function add_scripts() { // добавление скриптов
    if(is_admin()) return false; // если мы в админке - ничего не делаем
    wp_deregister_script('jquery'); // выключаем стандартный jquery
    wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true); // добавляем свой
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js','','',true); // бутстрап
    wp_enqueue_script('mask', get_template_directory_uri().'/js/jquery.maskedinput.min.js','','',true); // маска телефона
    wp_enqueue_script('ui', get_template_directory_uri().'/js/jquery-ui.min.js','','',true); // эффекты JQ
    wp_enqueue_script('placeholder', get_template_directory_uri().'/js/placeholder.js','','',true); // placeholder
    wp_enqueue_script('migrate', 'https://code.jquery.com/jquery-migrate-1.2.1.min.js','','',true);
    wp_enqueue_script('slick', get_template_directory_uri().'/slick/slick.min.js','','',true);
    wp_enqueue_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js','','',true);
    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js','','',true); // script
    wp_enqueue_script('scrollme', get_template_directory_uri().'/js/jquery.scrollme.js','','',true); // jquery.scrollme
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
function add_styles() { // добавление стилей
    if(is_admin()) return false; // если мы в админке - ничего не делаем
    wp_enqueue_style( 'bs', get_template_directory_uri().'/css/bootstrap.min.css' ); // бутстрап
    wp_enqueue_style( 'main', get_template_directory_uri().'/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css' );
	wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' ); // основные стили шаблона
	wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css' ); // шаблон
	wp_enqueue_style( 'uicss', get_template_directory_uri().'/css/ui.css' ); // ui
	wp_enqueue_style( 'screen', get_template_directory_uri().'/css/screen.css' ); // Стили ресторана
}

class bootstrap_menu extends Walker_Nav_Menu { // внутри вывод 
	private $open_submenu_on_hover; // параметр который будет определять раскрывать субменю при наведении или оставить по клику как в стандартном бутстрапе

	function __construct($open_submenu_on_hover = true) { // в конструкторе
        $this->open_submenu_on_hover = $open_submenu_on_hover; // запишем параметр раскрывания субменю
    }

	function start_lvl(&$output, $depth = 0, $args = array()) { // старт вывода подменюшек
		$output .= "\n<ul class=\"dropdown-menu\">\n"; // ул с классом
	}
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // старт вывода элементов
		$item_html = ''; // то что будет добавлять
		parent::start_el($item_html, $item, $depth, $args); // вызываем стандартный метод родителя
		if ( $item->is_dropdown && $depth === 0 ) { // если элемент содержит подменю и это элемент первого уровня
		   if (!$this->open_submenu_on_hover) $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"', $item_html); // если подменю не будет раскрывать при наведении надо добавить стандартные атрибуты бутстрапа для раскрытия по клику
		   $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html); // ну это стрелочка вниз
		}
		$output .= $item_html; // приклеиваем теперь
	}
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) { // вывод элемента
		if ( $element->current ) $element->classes[] = 'active'; // если элемент активный надо добавить бутстрап класс для подсветки
		$element->is_dropdown = !empty( $children_elements[$element->ID] ); // если у элемента подменю
		if ( $element->is_dropdown ) { // если да
		    if ( $depth === 0 ) { // если li содержит субменю 1 уровня
		        $element->classes[] = 'dropdown'; // то добавим этот класс
		        if ($this->open_submenu_on_hover) $element->classes[] = 'show-on-hover'; // если нужно показывать субменю по хуверу
		    } elseif ( $depth === 1 ) { // если li содержит субменю 2 уровня
		        $element->classes[] = 'dropdown-submenu'; // то добавим этот класс, стандартный бутстрап не поддерживает подменю больше 2 уровня по этому эту ситуацию надо будет разрешать отдельно
		    }
		}
		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); // вызываем стандартный метод родителя
	}
}

function content_class_by_sidebar() { // функция для вывода класса в зависимости от существования виджетов в сайдбаре
	if (is_active_sidebar( 'sidebar' )) { // если есть
		echo 'col-sm-9'; // пишем класс на 80% ширины
	} else { // если нет
		echo 'col-sm-12'; // контент на всю ширину
	}
}

remove_filter('pre_term_description', 'wp_filter_kses');
remove_filter('pre_term_description', 'wp_kses_data');

//вывод записей только родительской рубрики start
function wph_only_parent_category($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_category())
        $query->set('category__in', array(get_queried_object_id()));
}
add_action('pre_get_posts', 'wph_only_parent_category');
//вывод записей только родительской рубрики end

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'admin-bar-css' );

add_filter( "the_excerpt", "add_class_excerpt" );
function add_class_excerpt( $excerpt ) {
	return str_replace( '<p>', '<p class="news_text">', $excerpt );
}

/* Добавление скрытого поля в CF7 */
// Register new shortcode for getting pages where contact form was send
function hidden($tag) {
    if ( ! is_array( $tag ) )
        return '';
 
if($tag['name'] == "referer"){
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    $html = '<input type="'.$tag['basetype'].'" name="' . $tag['name'] . '" class="'.$tag['options'][0].'" value="" />';
}else{
    $html = '<input type="'.$tag['basetype'].'" name="' . $tag['name'] . '" class="'.$tag['options'][0].'" value="" />';
}
    return $html;
}
if(function_exists("wpcf7_add_form_tag")){
    wpcf7_add_form_tag('hidden', 'hidden', true);
}

/* Меняем ... у цитат на ссылку*/
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '">Читать далее &rarr;</a>';
}

//Поддержка вывода логотипа из админ-панели
add_theme_support( 'custom-logo', array(
		'width'      => 224,
		'height'     => 119,
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => array(
			'site-title',
			'site-description'
		)
	) );

/* Регистрация настроек темы */

add_action('customize_register', function($customizer) {
	$customizer->add_section(
		'section_one', array(
			'title' => 'Настройки сайта',
			'description' => '',
			'priority' => 11,
		)
	);
	$customizer->add_setting('phone', 
		array('default' => '<span>+7(4832)</span> 25 97 25')
	);
 
	$customizer->add_control('phone', array(
		'label' => 'Телефон',
		'section' => 'section_one',
		'type' => 'text'
		)
	);
	
	$customizer->add_setting('email_adm', 
		array('default' => 'book@turgenev-tula.ru')
	);
 
	$customizer->add_control('email_adm', array(
		'label' => 'Email администратора',
		'section' => 'section_one',
		'type' => 'text'
		)
	);
	
	$customizer->add_setting('email_buch', 
		array('default' => 'buh@turgenev-tula.ru')
	);
 
	$customizer->add_control('email_buch', array(
		'label' => 'Email бухгалтерии',
		'section' => 'section_one',
		'type' => 'text'
		)
	);
	
	$customizer->add_setting('email_rest', 
		array('default' => 'resto@turgenev-tula.ru')
	);
 
	$customizer->add_control('email_rest', array(
		'label' => 'Email ресторана',
		'section' => 'section_one',
		'type' => 'text'
		)
	);
	
	$customizer->add_setting('adress', 
		array('default' => '300024, г. Тула, ул. Тургеневская, д. 13.')
	);
 
	$customizer->add_control('adress', array(
		'label' => 'Адрес',
		'section' => 'section_one',
		'type' => 'text'
		)
	);
	
	$customizer->add_setting('live', 
		array('default' => 'none')
	);
 
	$customizer->add_control('live', array(
		'label' => 'Счетчик посещений',
		'section' => 'section_one',
		'type' => 'textarea'
		)
	);
});

function pre_get_posts_more( $query ) 
{
	if ( !is_admin() && $query->is_main_query() && is_search() ) 
	{
		$query->set( 'posts_per_page', 30 );
	}
}
add_action( 'pre_get_posts', 'pre_get_posts_more' );

function wcs_defer_javascripts ( $url ) {
  if( is_admin() ) return $url;
            if ( FALSE === strpos( $url, '.js' ) ) return $url;
            if ( strpos( $url, 'jquery.js' ) ) return $url;
            return "$url' defer='defer";
}	
add_filter( 'clean_url', 'wcs_defer_javascripts', 11, 1 );





/*****************************************************************/
// Добавляем дополнительное поле
function my_meta_box() {  
    add_meta_box(  
        'my_meta_box', // Идентификатор(id)
        'My Meta Box', // Заголовок области с мета-полями(title)
        'show_my_metabox', // Вызов(callback)
        'post', // Где будет отображаться наше поле, в нашем случае в Записях
        'normal', 
        'high');
}  
add_action('add_meta_boxes', 'my_meta_box'); // Запускаем функцию


$meta_fields = array(  
    array(  
        'label' => 'Дата',  
        'desc'  => 'Описание для поля.',  
        'id'    => 'mytextinput', // даем идентификатор.
        'type'  => 'text'  // Указываем тип поля.
    )
);
// Вызов метаполей  
function show_my_metabox() {  
global $meta_fields; // Обозначим наш массив с полями глобальным
global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
 
    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';  
    foreach ($meta_fields as $field) {  
        // Получаем значение если оно есть для этого поля 
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // Начинаем выводить таблицу
        echo '<tr> 
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                <td>';  
                switch($field['type']) {  
                    // Выводить поля будем здесь, как это сделать читайте ниже!
                    // Текстовое поле
					case 'text':  
					    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
					        <br /><span class="description">'.$field['desc'].'</span>';  
					break;
					                }
        echo '</td></tr>';  
    }  
    echo '</table>'; 
}
// Пишем функцию для сохранения
function save_my_meta_fields($post_id) {  
    global $meta_fields;  // Массив с нашими полями
 
    // проверяем наш проверочный код 
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))   
        return $post_id;  
    // Проверяем авто-сохранение 
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // Проверяем права доступа  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
 
    // Если все отлично, прогоняем массив через foreach
    foreach ($meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }  
    } // end foreach  
}  
add_action('save_post', 'save_my_meta_fields'); // Запускаем функцию сохранения



?>
