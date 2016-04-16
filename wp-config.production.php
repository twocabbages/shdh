<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wordpress');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** 本地安装插件 */
define('FS_METHOD', 'direct');

/** MySQL数据库密码 */
define('DB_PASSWORD', '!@#$%^&*()');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1!A%YJSh8[{M<Pmjs_9CgW#6k?kJ JSV;M~kO(@!)kOlMFDy*ap&($RpRKfE;>93');
define('SECURE_AUTH_KEY',  'oh&5)d 7/]t~x{pHnOz]I33sZcL+3(N^,F:Ll5OxO[VB)Q4sZr#7J)u,rtv~8r:d');
define('LOGGED_IN_KEY',    'n0%o=x;|@-.VaB|1gI3[4+-Eax#c0k_8>6=-%&o_Z]B/R2=5/0{=zVlDsRZro~GP');
define('NONCE_KEY',        ']@iY2%{!E#LLl-Fv_67b5WI}L1bZeWm)cGd)o9MWSd:p[=]Z4?hMtF90m6I`9OWn');
define('AUTH_SALT',        'p8jwwO:5Iz^u7|`+{Pa8k`[34;}MQ0;3<A6MhBmj|%}/g{ikvKG`OXS^{xO6Wm--');
define('SECURE_AUTH_SALT', 'oV3-=6hwu-pE`BXI@.rvfGV4.-t<`**cwEhU2RJaT^ DwU(5vlF.y=4^=akRy[k7');
define('LOGGED_IN_SALT',   '3n>HkMB1::@6d7Xar2vbT38vk8rkP/%c%M7gp_:rhS#W5JhMl9(Z9MOlhyt9o`z]');
define('NONCE_SALT',       'jm;+Q$l/p,w$-g+Ncn^3jiIv;D;mrcXy(A(LQwx4>?%!]%CmS0rU#hJ)}SCL7&O!');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', true);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
