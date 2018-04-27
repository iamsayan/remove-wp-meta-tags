=== WP Header & Meta Tags ===
Contributors: Infosatech
Tags: remove wp generator meta, header, rsd link, feed, wpmanifest, stylesheet version, xml-rpc, shotlinks, next previous posts link, disable json rest api
Requires at least: 3.5
Tested up to: 4.9
Stable tag: 3.0.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

It is a very lightweight plugin for customize wordpress header, add custom code and enable, disable or remove the unwanted meta tags and links from the source code.

== Description ==

It is a very lightweight plugin for customize wordpress header, add custom code and enable, disable or remove the unwanted meta tags and links from the source code on a WordPress site running 3.5 and beyond.

This plugin helps to remove and disable WP Generator Meta, RSD Link, XML-RPC Link, Feed Link, Shortlinks, WP Json Rest API from source code. This plugin also supports some security headers and you can add any code snippets in header and footer easily.

== Installation ==

=== From within WordPress ===
1. Visit 'Plugins > Add New'.
1. Search for 'WP Header & Meta Tags'.
1. Activate WP Header & Meta Tags from your Plugins page.
1. Go to "after activation" below.

=== Manually ===
1. Upload the `remove-wp-meta-tags` folder to the `/wp-content/plugins/` directory.
1. Activate the WP Header & Meta Tags plugin through the 'Plugins' menu in WordPress.
1. Go to "after activation" below.

=== After activation ===
1. After activation go to 'Settings > Header & Meta Tags'.
1. Select or deselect your options and save changes.

To go back to default state, just disable the plugin options located into 'Plugins > WP Header & Meta Tags' menu and save changes.

== Frequently Asked Questions ==

= How to use this plugin? =

Go to 'Settings > WP Header & Meta Tags' and check the options and hit 'save changes'.

= Is there an admin interface for this plugin? =

Yes. You can access this from 'Settings > WP Header & Meta Tags'

= How to check this is working? =

Open any page's source code of your website and you will see the change.

Use the plugin to test it.

== Screenshots ==

1. Remove Settings.
2. Disable Settings.
3. Security Settings.
4. Extra Setting.
5. Header & Footer.

== Changelog ==

= 3.0.1 =
* Bug Fixed.

= 3.0.0 =
* Compatibility with WordPress 4.9.
* Complete redesign.
* Code rewrite.
* Security headers added.
* Added a field to add any custom code to wp head or footer.
* Bug Fixed.

= 2.0.5 =
* Compatibility with WordPress 4.8.
* Improved hook filtering.
* Bug Fixed.

= 2.0.0 =
* Added option for Disable WP Json and Rest API.
* Bug Fixed.

= 1.0.6 =
* Added option to remove previous and next article links.
* Change activation redirect hook to rwmt_plugin_activate()

= 1.0.5 =
* Added option to remove all feed links.
* Added option to disable wp feed fuctionality.
* Added option to disable XML-RPC fuctionality.
* Added option to remove RSD links.
* Added option to remove short links.

= 1.0.3 =
* Screenshot Added

= 1.0.2 =
* Minor Tweeks

= 1.0.1 =
* Initial release