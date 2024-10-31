<?php
/*----------------------------------------------------------------------------*/
/* Actions & Hooks
/*----------------------------------------------------------------------------*/

add_action( 'admin_menu', 'wap8_add_settings_menu' );
add_action( 'admin_init', 'wap8_portfolio_add_settings' );
add_filter( 'update_option_wap8-cpt-plural', 'wap8_generate_cpt_slug', 10, 2 );
add_filter( 'update_option_wap8-hct-plural', 'wap8_generate_hct_slug', 10, 2 );
add_filter( 'update_option_wap8-nhct-plural', 'wap8_generate_nhct_slug', 10, 2 );

/**
 * Portfolio Settings
 *
 * Adds a settings page to set the slugs
 *
 * @package Portfolio Mgmt.
 * @version 2.0.0
 * @since 2.0.0
 * @author Chris Hardee <shazzner@gmail.com>
 *
 */

function wap8_add_settings_menu() {
    
    add_submenu_page(
        'edit.php?post_type=wap8-portfolio',
        __( 'Portfolio Mgmt. Settings', 'portfolio-mgmt' ),
        __( 'Settings', 'portfolio-mgmt' ),
        'manage_options',
        'wap8-portfolio-settings',
        'wap8_portfolio_settings_page',
        'dashicons-editor-help',
        111
    );
    
}

function wap8_portfolio_add_settings() {

    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-cpt-slug', 'wap8_cpt_sanitize_slug' );
    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-cpt-singular' );
    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-cpt-plural' );

    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-hct-slug', 'wap8_hct_sanitize_slug' );
    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-hct-singular' );
    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-hct-plural' );

    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-nhct-slug', 'wap8_nhct_sanitize_slug' );
    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-nhct-singular' );
    register_setting( 'wap8-portfoliomgmt-settings', 'wap8-nhct-plural' );
    
    add_settings_section(
        'wap8-portfoliomgmt-cpt-section',
        __( 'Custom Post Type Labels', 'portfolio-mgmt' ),
        'wap8_portfoliomgmt_cpt_section',
        'edit_page_wap8-portfolio-settings'
    );
    add_settings_section(
        'wap8-portfoliomgmt-hct-section',
        __( 'Custom Taxonomy Labels (Hierarchical)', 'portfolio-mgmt' ),
        'wap8_portfoliomgmt_hct_section',
        'edit_page_wap8-portfolio-settings'
    );
    add_settings_section(
        'wap8-portfoliomgmt-nhct-section',
        __( 'Custom Taxonomy Labels (Non-hierarchical)', 'portfolio-mgmt' ),
        'wap8_portfoliomgmt_nhct_section',
        'edit_page_wap8-portfolio-settings'
    );   

    add_settings_field( 'wap8-portfoliomgmt-cpt-slug',
                        __( 'Permalink', 'portfolio-mgmt' ),
                        'wap8_portfoliomgmt_cpt_slug',
                        'edit_page_wap8-portfolio-settings',
                        'wap8-portfoliomgmt-cpt-section'
    );
    add_settings_field( 'wap8-portfoliomgmt-cpt-singular',
                        __( 'Singular Label', 'portfolio-mgmt' ),
                        'wap8_portfoliomgmt_cpt_singular',
                        'edit_page_wap8-portfolio-settings',
                        'wap8-portfoliomgmt-cpt-section'
    );
    add_settings_field( 'wap8-portfoliomgmt-cpt-plural',
                        __( 'Plural Label', 'portfolio-mgmt' ),
                        'wap8_portfoliomgmt_cpt_plural',
                        'edit_page_wap8-portfolio-settings',
                        'wap8-portfoliomgmt-cpt-section'
    );

    add_settings_field( 'wap8-portfoliomgmt-hct-singular',
                        __( 'Singular Label', 'portfolio-mgmt' ),
                        'wap8_portfoliomgmt_hct_singular',
                        'edit_page_wap8-portfolio-settings',
                        'wap8-portfoliomgmt-hct-section'
    );
    add_settings_field( 'wap8-portfoliomgmt-hct-plural',
                        __( 'Plural Label', 'portfolio-mgmt' ),
                        'wap8_portfoliomgmt_hct_plural',
                        'edit_page_wap8-portfolio-settings',
                        'wap8-portfoliomgmt-hct-section'
    );

    add_settings_field( 'wap8-portfoliomgmt-nhct-singular',
                        __( 'Singular Label', 'portfolio-mgmt' ),
                        'wap8_portfoliomgmt_nhct_singular',
                        'edit_page_wap8-portfolio-settings',
                        'wap8-portfoliomgmt-nhct-section'
    );
    add_settings_field( 'wap8-portfoliomgmt-nhct-plural',
                        __( 'Plural Label', 'portfolio-mgmt' ),
                        'wap8_portfoliomgmt_nhct_plural',
                        'edit_page_wap8-portfolio-settings',
                        'wap8-portfoliomgmt-nhct-section'
    );
    
}

function wap8_portfolio_settings_page() {
?>
    <div class="wrap">
        <h1><?php _e( 'Portfolio Mgmt. Settings' ); ?></h1>        
        <?php settings_errors(); ?>
        <div class="wap8-portfolio-box">
            <form class="wap8-portfolio-settings-form" method="post" action="options.php">
            <?php settings_fields( 'wap8-portfoliomgmt-settings' ); ?>    
            <?php do_settings_sections( 'edit_page_wap8-portfolio-settings' ); ?>
            <?php submit_button(); ?>
            </form>
        </div>
    </div>
<?php
}

function wap8_portfoliomgmt_cpt_section() {
    echo '<p class="wap8-portfolio-description">' . __( 'The following allows you to change the singular and plural labels for the custom post type. The labels default to <strong>Portfolio Project</strong> and <strong>Portfolio Projects</strong>.', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_hct_section() {
    echo '<p class="wap8-portfolio-description">' . __( 'The following allows you to change the singular and plural labels for the hierarchical custom taxonomy associated with this custom post type. The labels default to <strong>Service</strong> and <strong>Services</strong> respectively.', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_nhct_section() {
    echo '<p class="wap8-portfolio-description">' . __( 'The following allows you to change the singular and plural labels for the non-hierarchical custom taxonomy associated with this custom post type. The labels default to <strong>Portfolio Tag</strong> and <strong>Portfolio Tags</strong> respectively.', 'portfolio-mgmt'  ) . '</p>';
}

function wap8_portfoliomgmt_cpt_slug() {
    $slug = esc_attr( get_option( 'wap8-cpt-slug' ) ) ? esc_attr( get_option( 'wap8-cpt-slug' ) ) : 'portfolio';
    $url = get_post_type_archive_link( 'wap8-portfolio' );
    echo '<input type="hidden" name="wap8-cpt-slug" value="' . $slug . '"><a href="' . esc_url( $url ) . '" target="_blank">' . $url . '</a><p class="description">' . __( 'Current Permalink', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_cpt_singular() {
    $name = esc_attr( get_option( 'wap8-cpt-singular' ) );
    echo '<p><input type="text" name="wap8-cpt-singular" id="wap8-cpt-singular" value="' . $name . '" placeholder="' . __( '(e.g. Movie)', 'portfolio-mgmt' ) . '" /><p class="description">' . __( 'Used when a singular label is needed.', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_hct_singular() {
    $name = esc_attr( get_option( 'wap8-hct-singular' ) );
    echo '<p><input type="text" name="wap8-hct-singular" id="wap8-hct-singular" value="' . $name . '" placeholder="' . __( '(e.g. Genre)', 'portfolio-mgmt'  ) . '" /><p class="description">' . __( 'Used when a singular label is needed.', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_nhct_singular() {
    $name = esc_attr( get_option( 'wap8-nhct-singular' ) );
    echo '<p><input type="text" name="wap8-nhct-singular" id="wap8-nhct-singular" value="' . $name . '" placeholder="' . __( '(e.g. Actor)', 'portfolio-mgmt' ) . '" /><p class="description">' . __( 'Used when a singular label is needed.', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_cpt_plural() {
    $name = esc_attr( get_option( 'wap8-cpt-plural' ) );
    echo '<p><input type="text" name="wap8-cpt-plural" id="wap8-cpt-plural" value="' . $name . '" placeholder="' . __( '(e.g. Movies)', 'portfolio-mgmt'  ) . '" /><p class="description">' . __( 'Used when a plural label is needed.', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_hct_plural() {
    $name = esc_attr( get_option( 'wap8-hct-plural' ) );
    echo '<p><input type="text" name="wap8-hct-plural" id="wap8-hct-plural" value="' . $name . '" placeholder="' . __( '(e.g. Genres)', 'portfolio-mgmt'  ) . '" /><p class="description">' . __( 'Used when a plural label is needed.', 'portfolio-mgmt' ) . '</p>';
}

function wap8_portfoliomgmt_nhct_plural() {
    $name = esc_attr( get_option( 'wap8-nhct-plural' ) );
    echo '<p><input type="text" name="wap8-nhct-plural" id="wap8-nhct-plural" value="' . $name . '" placeholder="' . __( '(e.g. Actors)', 'portfolio-mgmt' ) . '" /><p class="description">' . __( 'Used when a plural label is needed.', '' ) . '</p>';
}

function wap8_cpt_sanitize_slug( $input ) {
    return sanitize_title( esc_attr( $input ) );
}
function wap8_hct_sanitize_slug( $input ) {
    return sanitize_title( esc_attr( $input ) );
}
function wap8_nhct_sanitize_slug( $input ) {
    return sanitize_title( esc_attr( $input ) );
}

function wap8_generate_cpt_slug( $oldvalue, $value ) {

    $slug = sanitize_title( $value );
    
    update_option( 'wap8-cpt-slug', $slug );

}

function wap8_generate_hct_slug( $oldvalue, $value ) {

    $slug = sanitize_title( $value );
    
    update_option( 'wap8-hct-slug', $slug );
    
}

function wap8_generate_nhct_slug( $oldvalue, $value ) {

    $slug = sanitize_title( $value );
    
    update_option( 'wap8-nhct-slug', $slug );
    
}
