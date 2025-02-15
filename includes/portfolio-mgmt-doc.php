<?php
/*----------------------------------------------------------------------------*/
/* Portfolio Documentation Tabs
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Documentation Tabs
 *
 * Set up the documentation page tabs.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.8
 * @since 1.1.6 Fixed text domain inconsistency
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_doc_tabs( $current = 'home' ) {

	$tabs = array(
		'templates' => __( 'Optional Templates', 'portfolio-mgmt' ),
		'meta'      => __( 'Custom Meta', 'portfolio-mgmt' ),
		'tags'      => __( 'Template Tags', 'portfolio-mgmt' ),
		'customize' => __( 'Customization', 'portfolio-mgmt' ),
	);

	echo '<div id="icon-themes" class="icon32"><br></div>';

	echo '<h2 class="nav-tab-wrapper">';

	foreach ( $tabs as $tab => $name ) {
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab$class' href='?post_type=wap8-portfolio&page=wap8-portfolio-documentation&tab=$tab'>$name</a>";
	}

	echo '</h2>';

}

/*----------------------------------------------------------------------------*/
/* Portfolio Doc Page
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Doc Page
 *
 * The HTML content to be displayed on the Portfolio Manager Documentation page.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 2.0.0 added information and link to settings page
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_doc_page() {

	global $pagenow; ?>

	<div class="wrap wap8-portfolio-doc-wrap">
		<h2><?php _e( 'Portfolio Mgmt. Documentation', 'portfolio-mgmt' ); ?></h2>

        <div class="wap8-portfolio-box">
    		<p><?php printf( __( 'Thank you for downloading and installing our Portfolio Mgmt. plugin. This plugin was developed by <a href="%s" target="_blank">Heavy Heavy</a> as an out of the box solution for portfolio content management within a WordPress website.', 'portfolio-mgmt' ), esc_url( 'http://heavyheavy.com' ) ); ?></p>
    
    		<p><?php printf( __( 'This plugin registers a custom post type developed specifically for organizing and displaying your portfolio posts. Portfolio Manager will also register custom taxonomies for Services and Portfolio Tags, supports <code>post-thumbnails</code> and comes with a custom widget for displaying recent portfolio posts in <a href="%s">your widget ready areas</a>.', 'portfolio-mgmt' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
    
    		<?php if ( isset ( $_GET['tab'] ) ) wap8_portfolio_doc_tabs( $_GET['tab'] ); else wap8_portfolio_doc_tabs( 'templates' ); ?>
    
    		<div id="poststuff"><!-- begin #poststuff -->
    
    			<?php if ( $pagenow == 'edit.php' && $_GET['page'] == 'wap8-portfolio-documentation' ) {
    
    				if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
    
    				else $tab = 'templates';
    
    				switch( $tab ) {
    
    					case 'templates' : ?>
    
    						<h2><?php _e( 'Optional Templates', 'portfolio-mgmt' ); ?></h2>
    
    						<p><?php printf( __( 'If your currently active theme does not contain the following optional templates, the next available default template, in <a href="%s" target="_blank">the WordPress template hierarchy</a>, will be used.', 'portfolio-mgmt' ), esc_url( 'http://codex.wordpress.org/Template_Hierarchy' ) ); ?></p>
    
    						<table>
    							<tbody>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Single Portfolio', 'portfolio-mgmt' ); ?></th>
    									<td><code>single-wap8-portfolio.php</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Portfolio Archive', 'portfolio-mgmt' ); ?></th>
    									<td><code>archive-wap8-portfolio.php</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Services Archive', 'portfolio-mgmt' ); ?></th>
    									<td><code>taxonomy-wap8-services.php</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Portfolio Tags Archive', 'portfolio-mgmt' ); ?></th>
    									<td><code>taxonomy-wap8-portfolio-tags.php</code></td>
    								</tr>
    							</tbody>
    						</table>
    
    					<?php break;
    
    					case 'meta' : ?>
    
    						<h2><?php _e( 'Custom Meta Data', 'portfolio-mgmt' ); ?></h2>
    
    						<p><?php _e( 'Portfolio Mgmt. will add a custom meta box to the portfolio post editor titled, Case Study Information. The Case Study Information meta box contains optional fields for attaching post meta data to a post. If your currently active theme does not automatically support the display of this data, you will need to customized your templates accordingly, inside the loop, using <code>get_post_meta( $post_id, $key, $single )</code>.', 'portfolio-mgmt' ); ?></p>
    
    						<p><?php _e( 'The available custom meta keys are:', 'portfolio-mgmt' ); ?></p>
    
    						<table>
    							<tbody>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Featured Case Study', 'portfolio-mgmt' ); ?></th>
    									<td><code>_wap8_portfolio_feature</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Client Name', 'portfolio-mgmt' ); ?></th>
    									<td><code>_wap8_client_name</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Project URL', 'portfolio-mgmt' ); ?></th>
    									<td><code>_wap8_project_url</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Project URL Text', 'portfolio-mgmt' ); ?></th>
    									<td><code>_wap8_project_url_text</code></td>
    								</tr>
    							</tbody>
    						</table>
    
    						<p><?php printf( __( 'Please see the WordPress Codex for <a href="%s" target="_blank">detailed information</a> about the <code>get_post_meta()</code> function.', 'portfolio-mgmt' ), esc_url( 'http://codex.wordpress.org/Function_Reference/get_post_meta' ) ); ?></p>
    
    					<?php break;
    
    					case 'tags' : ?>
    
    						<h2><?php _e( 'Template Tags', 'portfolio-mgmt' ); ?></h2>
    
    						<p><?php _e( 'If you are a theme developer, or are comfortable developing for WordPress, we have added template tags for you to use anywhere within your theme inside of the loop. For safe measures, <strong>always</strong> wrap these template tags with the conditional statement, <code>&lt;?php if ( function_exists( &apos;wap8_portfolio&apos; ) ); ?&gt;</code>.', 'portfolio-mgmt' ); ?></p>
    
    						<table>
    							<tbody>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Services with Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_list_services( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Services without Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_list_services_nolink( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Services with Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_ul_services( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Services without Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_ul_services_nolink( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Portfolio Tags with Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_list_folio_tags( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Comma Separated Portfolio Tags without Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_list_folio_tags_nolink( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Portfolio Tags with Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_ul_folio_tags( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Unordered List of Portfolio Tags without Links', 'portfolio-mgmt' ); ?></th>
    									<td><code>&lt;?php wap8_ul_folio_tags_nolink( $post-&gt;ID ); ?&gt;</code></td>
    								</tr>
    							</tbody>
    						</table>
    
    						<p><?php _e( 'Comma separated template tags will return a list wrapped with a <code>&lt;p&gt;</code> tag. Unordered lists will be wrapped with the <code>&lt;ul&gt;</code> tag. When using a template tag with links, the links will point to an archive for that custom taxonomy. If your currently active theme does not contain the optional templates, the next available default template will be used. Please see <strong>Optional Templates</strong> for more information.', 'portfolio-mgmt' ); ?></p>
    
    					<?php break;
    
    					case 'customize' : ?>
    
    						<h2><?php _e( 'Plugin Customization', 'wap8theme-i18n' ); ?></h2>
    
    						<p><?php _e( 'By default, the plugin will create the following permalink link structure: <code>/portfolio</code>. It is possible for a theme or a plugin to change this structure, or any of the custom post type arguments, by filtering the data.', 'portfolio-mgmt' ); ?></p>
    
    						<p><?php _e( 'For example, you can change <strong>Portfolio</strong> to <strong>Work</strong> by doing the following:', 'portfolio-mgmt' ); ?></p>
    
    <pre style="background-color: #eaeaea; padding: 10px;"><code style="background-color: transparent;">
    add_filter( 'portfolio_mgmt_args', 'my_portfolio_mgmt_args' );
    
    function my_portfolio_mgmt_args( array &#36;args ) {
    
         &#36;labels = array(
           'name'          =&gt; __( 'Work', 'text-domain' ),
           'singular_name' =&gt; __( 'Work', 'text-domain' ), 
         );
         
         &#36;args['labels'] = &#36;labels;
         &#36;args['rewrite'] = array( 'slug' =&gt; 'work', 'with_front' =&gt; false );
         
         return &#36;args;
    
    }
    </code></pre>
    						<h2><?php _e( 'Available Filters', 'portfolio-mgmt' ); ?></h2>
    
    						<table>
    							<tbody>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Services', 'portfolio-mgmt' ); ?></th>
    									<td><code>portfolio_mgmt_services_args</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Portfolio Tags', 'portfolio-mgmt' ); ?></th>
    									<td><code>portfolio_mgmt_portfolio_tag_args</code></td>
    								</tr>
    								<tr valign="top">
    									<th scope="row" style="text-align: right;"><?php _e( 'Portfolio', 'portfolio-mgmt' ); ?></th>
    									<td><code>portfolio_mgmt_args</code></td>
    								</tr>
    							</tbody>
    						</table>
    
    						<h2><?php _e( 'Please Note', 'portfolio-mgmt' ); ?></h2>
    
    						<p><?php printf( __( 'If you decide to change the permalink structure using a filter, do not forget to visit the <a href="%s">Permalink Settings</a> and click the <strong>Save Changes</strong> button to flush your rewrite rules.', 'portfolio-mgmt' ), esc_url( admin_url( 'options-permalink.php' ) ) ); ?></p>
    
    						<p><?php printf( __( 'The above snippet of code is a simplified example. For the full scope of filterable arguments, please see the <a href="%s" target="_blank">WordPress Codex</a> page for registering a custom post type.', 'portfolio-mgmt' ), esc_url( 'http://codex.wordpress.org/Function_Reference/register_post_type' ) ); ?></p>
    
    						<p><?php _e( 'The same principle can be applied to modifying the custom taxonomy arguments.', 'portfolio-mgmt' ); ?></p>
    						
    						<h2><?php _e( 'Label Settings', 'portfolio-mgmt' ); ?></h2>
    
                            <p><?php printf( __( 'If you want to simply change the labels for the custom post type and its related taxonomies, you can do so on the <a href="%s">Settings</a> page. <strong>An existing filter will override these settings.</strong>.', 'portfolio-mgmt' ), esc_url( 'edit.php?post_type=wap8-portfolio&page=wap8-portfolio-settings' ) ); ?></p>
    
    					<?php break;
    
    				}
    
    			} ?>				
    		</div><!-- end #poststuff -->
        </div><!-- end .wap8-portfolio-box -->			
	</div><!-- end .wrap -->

	<?php

}

/*----------------------------------------------------------------------------*/
/* Add Portfolio Mgmt. Sub Menu Page
/*----------------------------------------------------------------------------*/

add_action( 'admin_menu', 'wap8_add_portfolio_mgmt_submenu_page', 10 );

/**
 * Add Portfolio Mgmt. Sub Menu Page
 *
 * Add a documentation page and link to the Portfolio sub menu.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.8
 * @since 1.0.8
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_add_portfolio_mgmt_submenu_page() {

	add_submenu_page(
		'edit.php?post_type=wap8-portfolio',                      // parent slug
		__( 'Portfolio Mgmt. Documentation', 'portfolio-mgmt' ), // page title
		__( 'Documentation', 'portfolio-mgmt' ),                 // menu title
		'edit_posts',                                             // only viewable by anyone who has edit-posts capabilities
		'wap8-portfolio-documentation',                           // unique slug
		'wap8_portfolio_doc_page'                                 // page content callback function
	);

}