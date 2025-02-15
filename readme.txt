=== Portfolio Mgmt. ===
Contributors: heavyheavy, wearepixel8
Tags: custom post type, portfolio, post type, widget
Requires at least: 3.5
Compatible up to: 5.0.1
Tested up to: 5.0.1
Stable tag: 2.0.2
License: GPLv2

Add the power of portfolio content management to your WordPress website with Portfolio Mgmt.

== Description ==

With Portfolio Mgmt., you can bring the power of portfolio content management to your WordPress website. This plugin registers a custom post type developed specifically for organizing and displaying your portfolio posts. Portfolio Mgmt. will also register custom taxonomies for Services and Portfolio Tags, supports `post-thumbnails` and comes with a custom widget for displaying recent portfolio posts in your widget ready areas.

**Please note that Portfolio Mgmt. will not alter the appearance of your theme when displaying portfolio posts or archives.** If your currently active theme does not contain the following optional templates, the next available default template, in the WordPress template hierarchy, will be will be used.

* `single-wap8-portfolio.php` - This template should be used for customized single portfolio posts.
* `archive-wap8-portfolio.php` - This template should be used for customized portfolio archive view.
* `taxonomy-wap8-services.php` - This template should be used for customized Services taxonomy view.
* `taxonomy-wap8-portfolio-tags.php` - This template should be used for customized Portfolio Tags taxonomy view.
	
Please see the WordPress Codex for detailed information about template hierarchies at http://codex.wordpress.org/Template_Hierarchy.

For more information about installation and usage, please read this [blog post](http://erikford.me/plugins/portfolio-mgmt-plugin/).

== Installation ==

You can install Portfolio Mgmt. either via the WordPress Dashboard or by uploading the extracted `portfolio-mgmt` folder to your `/wp-content/plugins/` directory. Once the plugin has been successfully installed, simply activate the plugin through the Plugins menu in your WordPress Dashboard.

If you get a 404 error after publishing a portfolio post, click on Permalinks in your Settings menu and click Save Changes.

As of version 2.0.0, you can now set the labels for the custom post type and its custom taxonomies. Changing the custom post type label will change the permalink for you custom post type archive.

== Frequently Asked Questions ==

= My portfolio posts look like my blog posts. How can I change that? =
If your currently active theme does not contain the optional templates needed for customized display, the next available default templates, in the WordPress template hierarchy, will be used. If you would like to have a customized single post display, add single-wap8-portfolio.php to your currently active theme and customize that template to fit your design direction.

= Does Portfolio Mgmt. support post-thumbnails? =
Yes. Please note that Portfolio Mgmt. will only add theme support for this feature if your currently active theme does not already.

= Can I change the permalink structure to something custom? =
Yes. The custom post type and custom taxonomy arguments are filterable allowing themes and other plugins the ability to change the permalink structure.

= Does Portfolio Mgmt. come with any widgets? =
Yes. Portfolio Mgmt. comes with 1 widget for displaying up to 10 of your most recently published portfolio posts in any widget ready area.

= Is the plugin translatable? =
Yes. If you have translated the plugin into your language, please send the translation files to [hello@heavyheavy.com](hello@heavyheavy.com) for inclusion in future releases.

== Screenshots ==

1. A custom portfolio edit screen which can be sorted by client name and filtered by Services or Portfolio Tags.
2. A custom meta box will be added to your editor screen to enter optional meta data.
3. Custom Meta Data Help Tab can be accessed on your editor screen at any time.
4. Template Tags Help Tab can be accessed on your editor screen at any time.
5. Portfolio Mgmt. Documentation is available in the admin.
6. Recent Portfolio Posts widget

== Changelog ==

= 1.0.0 =
* Initial release

= 1.0.1 =
* Improved PHP DocBlock Documentation
* Lowered priority of wap8_portfolio_add_menu_page() function to 11
* Lowered priority of wap8_portfolio_help_tabs() function to 11

= 1.0.2 =
* All functions now have a priority of 10
* Fixed widget issue where all posts were returning instead of set number
* Fixed an issue where the custom taxonomy links on the edit screen were not working as intended

= 1.0.3 =
* Updated WordPress compatibility version to 3.5

= 1.0.4 =
* Improved nonce verification for custom meta box
* Fixed incorrect text domains

= 1.0.5 =
* Change admin menu icon
* Fixed syntax error

= 1.0.6 =
* Added featured image column to post type edit.php screen

= 1.0.7 =
* Added a checkbox to the custom meta box for setting a case study as featured
* Added an option to the widget for displaying featured case studies only
* Updated the Admin Documentation Page to include meta key for featured case studies
* Updated the Help Tab to include meta key for featured case studies
* Updated screenshots

= 1.0.8 =
* Allow the custom post type and custom taxonomy arguments to be filtered by a theme or plugin
* Improved data sanitization for custom meta box
* Plugin documentation is now a tabbed submenu item

= 1.0.9 =
* Fixed a WP_DEBUG error occurring in custom meta box

= 1.1.0 =
* Fixed an issue with the Unordered List of Services with Links returning incorrect markup.

== Upgrade Notice ==

= 1.0.8 =
Added filters so themes and other plugins can amend the custom post type and custom taxonomy arguments.

= 1.0.9 =
* Fixed a WP_DEBUG error occurring in custom meta box

= 1.1.0 =
* Fixed an issue with the Unordered List of Services with Links returning incorrect markup.

= 1.1.1 =
* Updated the menu icon.

= 1.1.2 =
* Added Serbo-Croatian translation.

= 1.1.3 =
* Fixed form text inputs in custom meta box so they are now responsive
* Updated the feature column star graphic

= 1.1.4 =
* Fixed undefined index errors in widget

= 1.1.5 =
* Properly escaping text being output in the admin
* Accounting for filtered post type arguments throughout the admin
* Updated language file

= 1.1.6 =
* Fixed an issue that prevented the Clients column from being sortable in the dashboard
* Fixed inconsistencies in text domain name space

= 1.1.7 =
* Added filter for custom column arguments for post edit screen

= 1.1.8 =
* Updated widget to be compatible with WordPress 4.3

= 1.1.9 =
* Compatibility release with WordPress 4.5

= 1.2.0 =
* Fixed issue with incorrect output from a template tag

= 2.0.0 =
* Added settings page for custom post type and taxonomy labels