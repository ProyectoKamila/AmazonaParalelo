<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'prismava_amzona');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'prismava_pkadmin');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Pr4y2ct4');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

define('WPLANG', 'es_ES');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'N<y=m>Au}Xu-/8Or3O4ZrDbLTol1iEaW%nFO>{h`Ju+eCO#s:?Qb|vX0tc^,q;2-');
define('SECURE_AUTH_KEY', '6mV%1g.Jz*S)?KAhXXFNM P)CA<gei=Xj!$gt&RG,G}Z`pi%N%[0a;tea.:!GK+Z');
define('LOGGED_IN_KEY', 'nhIJ?)[iUWll0pNaq=e8. )5lvz`|Z48`u($_C1)WOlPl74L-!.~U8vvt*6bg!hy');
define('NONCE_KEY', 'u-0`h0iODCi1[YMu-$xJE2|0NeN+r S^sRsTA@LSV2-[9_s{cA=lns4e6IpwI`,t');
define('AUTH_SALT', 'BM+FL->M!]?9?:9TAR^3)@WY}h(p++sidE-|228-!;-&|Nbzss;^5BcxTwb0[Q} ');
define('SECURE_AUTH_SALT', '8~eBghXas9+F(tx(J~7 :GL.QN{lot*>t+:[R~#]Ci]87z?sV5h)sA7A2Z+HK2:1');
define('LOGGED_IN_SALT', 'L+Cz&j<V-{I?6^pK]!q-|i!>]IYi943jj$n!W#Y`nAD(ml?#oX:-eb-fh!abZYiD');
define('NONCE_SALT', '^&<5I|fhmeb?7a)L`=]wj9]2rWnF+ly@|;kj[_R| ? 8kw.cOHUBx*GA%gl.II`8');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

