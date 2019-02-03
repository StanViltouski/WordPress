<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wpress');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xpvR?[,p*Cq44a&Cii7(v*Y OVP$+c<)odLqS3h-_{r+DpyJt/{|<Hk9LNZr2sjQ');
define('SECURE_AUTH_KEY',  'zmz}B:hj|[v%)SR:hp>+o,!OB +tUE9UVW-w<ho>UAb13n_Si,K5PT9bHi-Lu3PN');
define('LOGGED_IN_KEY',    'U-X:^c[.RK:pl/h-?Pok3$d{*-G-OZeqxQCXn(c>FpdH~*Nt Q7zsGpaY*8rJ`V_');
define('NONCE_KEY',        '9mH%hSx4P;J<>Z+f26LI-hoy+:f|UC+e7G|HEgG-#k KPuz[ZC[)jK|]j-SO!G[x');
define('AUTH_SALT',        'n~}hI[xs1@?x-Sy}P|p8a)a]:I9FL,n-lHzu5%XDB8[WjgXH@R>#^/V~M<t4K+9!');
define('SECURE_AUTH_SALT', ':_-rs.5]cH=TG>BS(3`M)xPG:$A5L^b5,`H1MdT_ZcV|d-#AK]MU:-q,PG[c[8Ft');
define('LOGGED_IN_SALT',   '5rG5:s,U0[z}UKLM.{z ana1?dvQdfq3cb6jv97{d|G+Dp&VZDi4YXip3+O_8JC&');
define('NONCE_SALT',       'D@c38ktD&}o|?iSR<,>rs[l8(2$xj7upR2kq=r2w#J.A1BMQUn7+e$|#KKTCOYX@');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
