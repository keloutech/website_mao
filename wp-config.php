<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'db_mao');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~q5<@nq?0M3+,XWpL6Vby+d<kzdxqSip>+A&PMisK3.IJ&,Am)gb__M@Yza3pWVF');
define('SECURE_AUTH_KEY',  'Z.y+iGc@%:aBR+8[.@JT<O(]2&0g]KR47=~vTfxLuW9<4vd6KLJMg{NSK=eE|te~');
define('LOGGED_IN_KEY',    'J3tyFL0AAzd5Ou,_]cwFMG>PziA2K>Ygzq75+zJ&|aGx6ng~Qa>X_[[!*+nb4!zv');
define('NONCE_KEY',        '7fTP|A`/H@%C33[)N%*Cf5bQx!WziRvt6s`U=Uk2gQl6(},-u.7t1EGB]X$%S/t?');
define('AUTH_SALT',        'EN}Yb/Ymzw/)2*`en@I85$S~ydbXo75`S<,`e|8z1sWLa=Lg%qMTaAKc?Aeil8PG');
define('SECURE_AUTH_SALT', '3B*=g*r3D:Ou@B0L`-z60[IDcn z!p:hup.]x1#e}-C6!7EOTck@:vox)&^k-xGc');
define('LOGGED_IN_SALT',   'k*!)j~FRh}dH(w%j/(u~2=_4u|E+y4Cg^+qJ3~m&dz`CH]4=[CNhlm]q?HK`9| h');
define('NONCE_SALT',       'U7+kiY1(UC}a[_t7N[!X73nL9d2ae!HD1J}M[L4calyd|B?mieJna[hz0qnXI7n+');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');