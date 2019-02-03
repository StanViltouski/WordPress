<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'stanki');

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
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8nMP:*;+X/sFlKLDTICC+)/ id/Q9xGP=VcUj]tYUb)01#G3Et*/-C<gn{DQkd2$');
define('SECURE_AUTH_KEY',  'KwZ4&feZg.$q*U-812WG_hM/@b/{xbM$r1TpyWny]cMC{G[3&KZ!adYt}jrJvkfX');
define('LOGGED_IN_KEY',    'w6VNGPs!@UEgTYF,9K`d.PKra:5^r@}mEH21jK][fE`QC2-_HRb0n%G~qY{fu* ]');
define('NONCE_KEY',        'nAdFHC8&2eBq>@>=tKyip&,eT]RIWpnAs7dWAI#9]f]f3<j=<B9*cAS7L3n_iepK');
define('AUTH_SALT',        '/yj!pNmKQUFjJ!kT|%+d<R_{<^^*Lil+7~[E}3KutR;6XgJc`aRif7:]o$PCzm`@');
define('SECURE_AUTH_SALT', 'vwZMf R9;}Ibr!O3Yf<EOWfRSpWBe/C0KknKz`tB~6C/[L@X-vq3&+}Qrz^,ix b');
define('LOGGED_IN_SALT',   'YB.f[9@;5,#^&X*fX78754r/?Cf^E<ra-ESsy2GMz}THhsmg9=`<l/}t?#K%6=R)');
define('NONCE_SALT',       '*%AZOj$t7 Y5g1HnfJ:/_ELB7YT>CFA4xLh8I#5I`k%)~`J ^%&tUAb1.,Fm@OB?');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');