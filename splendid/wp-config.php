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
define( 'DB_NAME', 'splendid' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'PGG%EyTNaa1jM-i5q9!<?<2F]WaGx{CyIGIV$6jZZm=m{<@mA4Qc+TwDKpA(zd+S' );
define( 'SECURE_AUTH_KEY',  'IRMnQ[4Vt?4}oi057!wQkBrYctz,A; zmblKmRmpa7FoD[+:|Qel`2I1_kS(%NOO' );
define( 'LOGGED_IN_KEY',    'F!(=ui6;F] iFylu*3CDw&0Y{K]s`rM|Hd>3-px_-tUu6sTF }U<bzq9db(+_sA@' );
define( 'NONCE_KEY',        'p97&!YnEcGJO/&,6,*fnVjuG[fe}y+n-roPi%tCgq||VvK.W3MMCP,t? w:Jh~;&' );
define( 'AUTH_SALT',        '{T^T-8rMH;FT4.`3%cP$iu^3(fqm2`^lN8E3G&&X0)BYsJ3waXg@yaz-0p;|Bo(8' );
define( 'SECURE_AUTH_SALT', '[0|8zm;lF}rW4<iX%@0W5G~AcV?h%|fNtGI_#i9kQ7JXNeGH_2o={3!QsQQj0-r|' );
define( 'LOGGED_IN_SALT',   'f6K * k8!WFqkgl=SJ.SLkzWkD]jED|ez:q3O~.~K:s. yTnp..#)*`N;mtH wx[' );
define( 'NONCE_SALT',       'hsVOpLzfk_ymwl?iCA(l[Z  g,`m~BoYl_id?*Aw..vaq0%Akb2H~^shQ9U. ac/' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
