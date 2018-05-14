=== WP Header & Meta Tags ===
Contributors: Infosatech
Tags: remove wp generator meta, header, rsd link, feed, wpmanifest, stylesheet version, xml-rpc, shotlinks, next previous posts link, disable json rest api
Requires at least: 3.5
Tested up to: 4.9
Stable tag: 3.0.3
Donate link: https://bit.ly/2I0Gj60
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

It is a very lightweight plugin for customizing WordPress header, add custom code and enable, disable or remove the unwanted meta tags and links from the source code.

== Description ==

It is a very lightweight plugin for customizing WordPress header, add custom code and enable, disable or remove the unwanted meta tags and links from the source code on a WordPress site running 3.5 and beyond.

#### What does this plugin do?

* Allows you to remove different wordpress meta tags from wp head.
* Allows you to disable JSON, Rest API, Feed functionality.
* Allows you to enable some security headers and disable user enumeration.
* Allows you to remove version number from scripts and css files.
* Allows you to add some custom code to wo header and footer.

== Installation ==

1. Visit 'Plugins > Add New'.
1. Search for 'WP Header & Meta Tags' and install it.
1. Or you can upload the `remove-wp-meta-tags` folder to the `/wp-content/plugins/` directory manually.
1. Activate WP Header & Meta Tags from your Plugins page.
1. After activation go to 'Settings > Header & Meta Tags'.
1. Enable options as per your need and save changes.

To go back to default state, just disable the plugin options located into 'Plugins > Header & Meta Tags' menu and save changes.

== Frequently Asked Questions ==

= How to use this plugin? =

Go to 'Settings > Header & Meta Tags' and check the options and hit 'save changes'.

= Is there an admin interface for this plugin? =

Yes. You can access this from 'Settings > Header & Meta Tags'

= How to check this is working? =

Open any page's source code of your website and you will see the change.

Use the plugin to test it.

== Screenshots ==

1. Meta Options.
2. Disable Options.
3. Security Options.
4. Other Options.
5. Header & Footer.

== Changelog ==

= 3.0.3 =
* Guide Improved.
* Bug Fixed.

= 3.0.2 =
* Added: HSTS header support.
* Added: Option to disable Yoast SEO Schema output.
* Disable Settings is noe renamed to Meta Options.
* UI Improvement.
* Bug Fixed.

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
* Added option to disable wp feed functionality.
* Added option to disable XML-RPC functionality.
* Added option to remove RSD links.
* Added option to remove short links.

= 1.0.3 =
* Screenshot Added

= 1.0.2 =
* Minor Tweeks

= 1.0.1 =
* Initial release