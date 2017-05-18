<?php
# Database Configuration
define( 'DB_NAME', 'wp_stevedixongit' );
define( 'DB_USER', 'stevedixongit' );
define( 'DB_PASSWORD', 'OOF24MpBITXjvbgUEkyp' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '#2l56D%+|EbgQt-%lpL-&;C2C-oNCC=) u_s+*mPas29JaP:cnb D6r?r|2qm$Ie');
define('SECURE_AUTH_KEY',  '8,&~/TE4=]$GX|)+AYc:Hl)%lPM9/BQ{e!nLp:cIu[[<7[|4[xw,R[<;;uR7aN]s');
define('LOGGED_IN_KEY',    '0Vq^a`[SO1k6:R7xg^Qc|c/DF_k&&UW{(zA.<hR-0&I)*-Cr,pWb_lAtk- 7W*C-');
define('NONCE_KEY',        'fzp^f ^hw9(uWAAy6QPxp+|gouG90xC/jEL?h+;a4WhqiUkFu{A9VjsBHy{<G>+8');
define('AUTH_SALT',        'X+/!C$kNN:$W!UC4`I)=/C?brV$drSpv;E*%yb6-<g8NnNc$<3O;p>Q)=X+&BC.v');
define('SECURE_AUTH_SALT', 'x}A-2T=#PD`yMKkYC+_ V.WHQ8L0jf$nD::>? XgZV1,Yo+Su?h)p^mSM/a5~lj7');
define('LOGGED_IN_SALT',   'S!)R=b$,p`yfjv({+K@.+.8.Lt9Zqn21hYDAH-_7eX)46Ejs$E-kfrskOnJLR|A;');
define('NONCE_SALT',       '-xZ$?j ||i)EC88G{n&V+.qVzJns^Q_dJoG-Wgu#A!Xm_%6#5-jQ.h%[EiJ3$Ca4');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'stevedixongit' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '9e3cf939bc295133b207b3e912f9fd72e4a1a9ba' );

define( 'WPE_CLUSTER_ID', '113008' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'stevedixongit.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-113008', );

$wpe_special_ips=array ( 0 => '104.199.114.128', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
