<?php 
/*
Plugin Name: One click logout barless
Plugin URI: https://wordpress.org/plugins/one-click-logout-barless/
Description: After completely removes the gray Admin Tool Bar with sLaNGjIs <a href="https://wordpress.org/plugins/wp-admin-bar-removal/">Admin Bar Removal</a> plugin, this works in conjunction with it to restore a 3.2-like header to Logging Out from WordPress DashBoard with a Single One Click Logout Barless (Build 2014-06-16)
Author: sLaNGjIs
Author URI: https://slangji.wordpress.com/plugins/
Requires at least: 3.3
Tested up to: 4.5
Version: 1.2.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Network: true
 *
 * Approved 2011-11-23
 * Build 2014-06-16
 * Tested up to 4.5
 * Donate link https://slangji.wordpress.com/donate/
 * Indentation GNU style coding standard
 * Indentation URI https://www.gnu.org/prep/standards/standards.html
 * Humans We are the humans behind
 * Humans URI https://humanstxt.org/Standard.html
 *
 * Plugin Owner  <a title="Visit author homepage" href="https://slangji.wordpress.com/">sLaNGjIs</a>
 * Plugin Master <a title="Visit plugin-master-author homepage" href="https://www.rackofpower.com/">olyma</a>
 *
 * LICENSING (license.txt)
 *
 * [One Click Logout Barless](https://wordpress.org/plugins/one-click-logout-barless/)
 *
 * Restores a 3.2-like header to Logging Out from WordPress DashBoard with a Single Onle Click Logout Barless
 *
 * Copyright (C) 2010-2016 [sLaNGjIs](https://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](https://wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](https://wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](https://www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * DISCLAIMER
 *
 * This program is distributed "AS IS" in the hope that it will be useful, but:
 * without any warranty of function, without any warranty of merchantability,
 * without any fitness for a particular or specific purpose, without any type
 * of future assistance from your own author or other authors.
 *
 * The license under which the WordPress software is released is the GPLv2 (or later) from the
 * Free Software Foundation. A copy of the license is included with every copy of WordPress.
 *
 * Part of this license outlines requirements for derivative works, such as plugins or themes.
 * Derivatives of WordPress code inherit the GPL license.
 *
 * There is some legal grey area regarding what is considered a derivative work, but we feel
 * strongly that plugins and themes are derivative work and thus inherit the GPL license.
 *
 * The license for this software can be found on [Free Software Foundation](https://www.gnu.org/licenses/gpl-2.0.html) and as license.txt into this plugin package.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THERMS
 *
 * According to the Terms of the GNU General Public License version 2 (or later) part of Copyright belongs to your own author and part belongs to their respective others authors:
 *
 * Copyright (C) 2010-2014 [sLaNGjIs](https://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 * Copyright (C) 2011-2014 [olyma](https://www.rackofpower.com/) (email: <olyma [at] rackofpower [dot] com>)
 *
 * VIOLATIONS
 *
 * [Violations of the GNU Licenses](https://www.gnu.org/licenses/gpl-violation.en.html)
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * GUIDELINES
 *
 * This software meet [Detailed Plugin Guidelines](https://wordpress.org/plugins/about/guidelines/)
 * paragraphs 1,4,10,12,13,16,17 quality requirements.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * CODING
 *
 * This software implement [GNU style](https://www.gnu.org/prep/standards/standards.html) coding standard indentation.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * VALIDATION
 *
 * This readme.txt rocks. Seriously. Flying colors. It meet the specifications according to
 * WordPress [Readme Validator](https://wordpress.org/plugins/about/validator/) directives.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * HUMANS (humans.txt)
 *
 * We are the Humans behind this project [humanstxt.org](https://humanstxt.org/Standard.html)
 *
 * This software meet detailed humans rights belongs to your own author and to their respective other authors.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THANKS
 *
 * To olyma @ www.rackofpower.com for this plugin!
 *
 * TODOLIST
 *
 * [to-do list and changelog](https://wordpress.org/plugins/one-click-logout-barless/changelog/)
 *
 * Planned for Version 1.3.0 - Maintenance Refresh Release
 * Planned for Version 1.3.0 - Code Cleanup and Optimization
 * Planned for Version 1.3.0 - Class Isolation and Functions Redesigned
 *
 */

	if ( ! function_exists( 'add_action' ) )

		{

			header( 'HTTP/0.9 403 Forbidden' );
			header( 'HTTP/1.0 403 Forbidden' );
			header( 'HTTP/1.1 403 Forbidden' );
			header( 'Status: 403 Forbidden' );
			header( 'Connection: Close' );

				exit;

		}

	if ( ! defined( 'ABSPATH' ) ) exit;

	if ( ! defined( 'WPINC' ) ) exit;

	global $wp_version;

	if ( $wp_version < 3.3 )

		{

			wp_die( __( 'This Plugin Requires WordPress 3.3+ or Greater: Activation Stopped!' ) );

		}

	add_action( 'activated_plugin' , 'oclb_1st' , 0 );

	function oclb_1st()

		{

			$wp_path_to_this_file = preg_replace( '/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR . "/$2", __FILE__ );
			$this_plugin          = plugin_basename( trim( $wp_path_to_this_file ) );
			$active_plugins       = get_option( 'active_plugins' );
			$this_plugin_key      = array_search( $this_plugin, $active_plugins );

			if ( $this_plugin_key )

				{

					array_splice( $active_plugins, $this_plugin_key, 1 );
					array_unshift( $active_plugins, $this_plugin );
					update_option( 'active_plugins', $active_plugins );

				}

		}

	add_action( 'in_admin_header' , 'oclb_newloginheader' );

	function oclb_newloginheader()

		{

?>
<style type="text/css">
table#one-click-logout-barless td#title-ltrg a:link,
table#one-click-logout-barless td#title-ltrg a:visited{
	color:#464646;
	text-decoration:none
}
table#one-click-logout-barless td#title-ltrg a:active,
table#one-click-logout-barless td#title-ltrg a:focus, 
table#one-click-logout-barless td#title-ltrg a:hover{
	color:#464646;
	text-decoration:underline
}
table#one-click-logout-barless td#title-ltrg{
	font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;
	font-size:16px
}
table#one-click-logout-barless td#logout-ltrg,
table#one-click-logout-barless td#logout-ltrg a{
	font-family:Arial,"Bitstream Vera Sans",Helvetica,Verdana,sans-serif;
	font-size:12px;
	text-decoration:none
}
body.admin-bar,
body.admin-bar #adminmenu,
body.admin-bar #wpcontent,
body.wp-toolbar,
body.wp-toolbar #adminmenu,
body.wp-toolbar #wpcontent,
html.admin-bar,
html.wp-toolbar{
	padding-top:0
}
html.wp-toolbar body div#wpwrap div#wpcontent div#wpadminbar div.quicklinks ul,
html.wp-toolbar body div#wpwrap div#wpcontent div#wpadminbar div.quicklinks ul li{
	display:none
}
ul#adminmenu {
	margin-top:0
}
#adminmenushadow,
#adminmenuback{
	background-image:none !important
}
#adminmenu li.wp-menu-separator{
	height:0;
	border-style:none
}
.icon32{
	display:none
}
</style>
<table id="one-click-logout-barless" style="margin-left:0;float:left;z-index:1;position:relative;left:0;top:0;background:none;padding:0;border:0;border-bottom:1px solid #DFDFDF" border="0" cols="4" width="97%" height="33px">
<tr>
<td align="left" valign="center" width="20px" style="padding:0">
<?php

			global $wp_version;

			if ( $wp_version > 3.8 )

				{

					?>
<img id="header-logo" width="16px" height="16px" alt="" src="../wp-content/plugins/one-click-logout-barless/sml-wp-logo1.jpg" align="left" border="0"/>
					<?php

				}

			if ( $wp_version < 3.8 )

				{

					?>
<img id="header-logo" width="16px" height="16px" alt="" src="../wp-content/plugins/one-click-logout-barless/sml-wp-logo2.jpg" align="left" border="0"/>
					<?php

				}

?>
</td>
<td align="left" valign="center" id="title-ltrg">
<?php

			echo '<a title="' . home_url() . '" href="' . home_url() . '">' . __( get_bloginfo( 'name' ) ) . '</a>';

?>
</td>
<td align="right" valign="center" id="logout-ltrg">
<div style="padding-top:2px">
<?php

			echo date_i18n( get_option( 'date_format' ) );

			echo ' @ ' . date_i18n( get_option( 'time_format' ) );

 			wp_get_current_user();

			$current_user = wp_get_current_user();

			if ( ! ( $current_user instanceof WP_User ) ) return;

			echo ' | ' . $current_user->display_name . '';

			if ( is_multisite() && is_super_admin() )

				{

					if ( ! is_network_admin() )

						{

							echo ' | <a title="' . $current_user->display_name . '" href="' . network_admin_url() . '">' . __( 'Network Admin' ) . '</a>';

						}

					else

						{

							echo ' | <a title="' . $current_user->display_name . '" href="' . admin_url() . '">' . __( 'Site Admin' ) . '</a>';

						}

				}

			echo ' | <a title="' . $current_user->display_name . '" href="' . wp_logout_url() . '">' . __('Log Out') . '</a>';

?>
</div>
</td>
<td width="8px">
</td>
</tr>
</table>
<?php 

		}

	add_filter( 'in_admin_header', 'oclb_remove_wpabr_ablh', 1 );

	function oclb_remove_wpabr_ablh()

		{

			if ( has_filter( 'in_admin_header', 'wpabr_ablh' ) )

				{

					remove_filter( 'in_admin_header', 'wpabr_ablh' );

				}

		}

	add_filter( 'in_admin_header', 'oclb_remove_wptbr_abtlh', 1 );

	function oclb_remove_wptbr_abtlh()

		{

			if ( has_filter( 'in_admin_header', 'wptbr_abtlh' ) )

				{

					remove_filter( 'in_admin_header', 'wptbr_abtlh' );

				}

		}

	add_filter( 'in_admin_header', 'oclb_remove_wptrcd_atblh', 1 );

	function oclb_remove_wptrcd_atblh()

		{

			if ( has_filter( 'in_admin_header', 'wptrcd_atblh' ) )

				{

					remove_filter( 'in_admin_header', 'wptrcd_atblh' );

				}

		}

	add_filter( 'in_admin_header', 'oclb_remove_ghatb_bfp_login_header', 1 );

	function oclb_remove_ghatb_bfp_login_header()

		{

			if ( has_filter( 'in_admin_header', 'ghatb_bfp_login_header' ) )

				{

					remove_filter( 'in_admin_header', 'ghatb_bfp_login_header' );

				}

		}

	add_filter( 'in_admin_header', 'oclb_remove_logout_header', 1 );

	function oclb_remove_logout_header()

		{

			if ( has_filter( 'in_admin_header', 'logout_header' ) )

				{

					remove_filter( 'in_admin_header', 'logout_header' );

				}

		}

	add_filter( 'in_admin_header', 'oclb_remove_ghatb_0006', 1 );

	function oclb_remove_ghatb_0006()

		{

			if ( has_filter( 'in_admin_header', 'ghatb_0006' ) )

				{

					remove_filter( 'in_admin_header', 'ghatb_0006' );

				}

		}

	add_filter( 'plugin_row_meta' , 'oclb_prml' , 10 , 2 );

	function oclb_prml( $links , $file )

		{

			if ( $file == plugin_basename( __FILE__ ) )

				{

					$links[] = '<a href="https://slangji.wordpress.com/donate/">Donate</a>';

					$links[] = '<a href="https://slangji.wordpress.com/contact/">Contact</a>';

				}

			return $links;

		}

	add_action( 'wp_head' , 'oclb_shfl' );
	add_action( 'wp_footer' , 'oclb_shfl' );

	function oclb_shfl()

		{

			echo "\n<!--Plugin One Click Logout Barless Active-->\n";

		}
?>