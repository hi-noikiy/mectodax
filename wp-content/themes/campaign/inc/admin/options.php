<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "campaign_theme_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'        => $theme->get('Name') . ' ' . esc_html__('Options', 'campaign'),
        'page_title'        => $theme->get('Name') . ' ' . esc_html__('Options', 'campaign'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    /*
    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => esc_html__( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => esc_html__( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );
    */

    /*
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );
    */

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    /*
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );
    */

    /*
    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );
    */


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */
    // -> START Basic Fields

    // THEME OPTIONS   
            /**



            // GENERAL OPTIONS



            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-cogs',
                'title' => esc_html__('General Settings', 'campaign'),
                'fields' => array(
                    array(
                        'id' => 'main-logo',
                        'type' => 'media',
                        'title' => esc_html__('Logo', 'campaign'),
                        'subtitle' => esc_html__('Please use image file.', 'campaign'),
                        'desc' => esc_html__('More logo settings can be found in "Logo" section.', 'campaign'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => ""
                    ),
                    array(
                        'id' => 'logo-margins',
                        'type' => 'spacing',
                        'compiler' => array('#main-logo'), 
                        'mode' => 'margin',
                        'units' => 'px',
                        'title' => esc_html__('Logo Margins', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'default' => array('margin-top' => '20px', 'margin-right' => "0px", 'margin-bottom' => '20px', 'margin-left' => '0px')
                    ),
                    /*
                    array(
                        'id' => 'main-logo-transparent',
                        'type' => 'media',
                        'title' => esc_html__('Logo 2', 'campaign'),
                        'subtitle' => esc_html__('Please use image file.', 'campaign'),
                        'desc' => esc_html__('Leave blank if you want to use main logo.<br>It will be used in sticky navigation.', 'campaign'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => ""
                    ),
                    */
                    array(
                        'id' => 'logo-margins2',
                        'type' => 'spacing',
                        'compiler' => array('#site-branding.make-it-sticky #main-logo'), 
                        'mode' => 'margin',
                        'units' => 'px',
                        'title' => esc_html__('Sticky Navigation Logo Margins', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'default' => array('margin-top' => '20px', 'margin-right' => "0px", 'margin-bottom' => '20px', 'margin-left' => '0px')
                    ),
                    array(
                        'id' => 'text-logo',
                        'type' => 'text',
                        'title' => esc_html__('Site Slogan', 'campaign'),
                        'desc' => esc_html__('It wil be used if you didn\'t define graphic logo previously.', 'campaign'),
                        'default' => ''
                    ),

                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'title' => esc_html__('Favicon', 'campaign'),
                        'subtitle' => esc_html__('Please use 16x16 ICO or PNG file.', 'campaign'),
                        'url' => true,
                        'output' => false,
                        'default' => ""
                    ),
                    array(
                        'id' => 'apple_touch_icon',
                        'type' => 'media',
                        'title' => esc_html__('Apple Touch Icon', 'campaign'),
                        'subtitle' => esc_html__('Please use 57x57 PNG file.', 'campaign'),
                        'url' => true,
                        'output' => false,
                        'default' => ""
                    ),
                    array(
                        'id' => 'custom-css-code',
                        'type' => 'ace_editor',
                        'title' => esc_html__('CSS Code', 'campaign'),
                        'subtitle' => esc_html__('Paste your CSS code here.', 'campaign'),
                        'desc' => esc_html__('It will be in head of page.', 'campaign'),
                        'default' => "",
                        'mode' => 'css',
                    ),
                    array(
                        'id' => 'custom-js-code',
                        'type' => 'ace_editor',
                        'title' => esc_html__('JS Code', 'campaign'),
                        'subtitle' => esc_html__('Paste your JS code here.', 'campaign'),
                        'desc' => esc_html__('It will be processed in wp_footer.', 'campaign'),
                        'default' => "",
                        'mode' => 'javascript',
                        'theme' => 'chrome'
                    ),
                )
            ) );


    
            
            /**



            // STYLING OPTIONS



            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-brush',
                'title' => esc_html__('Styling Settings', 'campaign'),
                'id' => 'styling-section',
                'fields' => array(
                    array(
                        'id' => 'body-background',
                        'type' => 'background',
                        'compiler' => array('body'),
                        'title' => esc_html__('Body Background', 'campaign'),
                        'subtitle' => esc_html__('Body background with image, color, etc.', 'campaign'),
                        'default' => array('background-color' => '#FFFFFF'),
                    ),
                    array(
                        'id' => 'content-background',
                        'type' => 'background',
                        'compiler' => array('#main-content, #content, #main tbody, #breadcrumbs, .tribe-events-list-separator-month span'),
                        'title' => esc_html__('Content Background', 'campaign'),
                        'default' => array('background-color' => '#FFFFFF'),
                    ),              
                    array(
                        'id' => 'switch-use-animation',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to use animation effect?', 'campaign'),
                        'default' => 1,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'switch-use-prettyPhoto',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to use prettyPhoto lightbox effect?', 'campaign'),
                        'default' => true,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'link-color',
                        'type' => 'link_color',
                        'compiler' => array('a'),
                        'title' => esc_html__('Links Color Option', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#0d8ad9',
                            'hover' => '#0860ba',
                        )
                    ),
                    array(
                        'id' => 'heading-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#main h1 a', '#main h2 a', '#main h1 a', '#main h3 a', '#main h4 a', '#main h5 a', '#main h6 a'),
                        'title' => esc_html__('Title Links Color Option', 'campaign'),
                        'desc' => esc_html__('It will be used in the main content area.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#043174',
                            'hover' => '#1c498d',
                        )
                    ),
                )
            ) );      

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-brush',
                'title' => esc_html__('Styling Settings', 'campaign'),
                'id' => 'styling-section',
            ) );

            /**
            RELATED POSTS
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Buttons', 'campaign' ),
                'id'         => 'buttons-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'default-button-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Primary Button Link Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-tb-primary', '.woocommerce .button.btn-tb-primary'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ), 
                    array(
                        'id' => 'default-button-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Primary Button Background Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#D20921',
                            'hover' => '#F30A26',
                        )
                    ),
                    array(
                        'id' => 'secondary-button-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Secondary Button Link Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-tb-secondary', '.woocommerce .button.btn-tb-secondary'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ), 
                    array(
                        'id' => 'secondary-button-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Secondary Button Background Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#043174',
                            'hover' => '#053f95',
                        )
                    ),
                    array(
                        'id' => 'border-button1-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 1 Link Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-border1'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#D20921',
                        )
                    ), 
                    array(
                        'id' => 'border-button1-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 1 Background Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#D20921',
                            'hover' => '#FFFFFF',
                        )
                    ),  
                    array(
                        'id' => 'border-button1-border-color',
                        'type' => 'border',
                        'compiler' => array('.btn-border1'),
                        'title' => esc_html__('Border Button 1 Border', 'campaign'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#ffffff', 
                            'border-style'  => 'solid', 
                            'border-width'   => '2px'
                        ),
                    ),
                    array(
                        'id' => 'border-button2-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 2 Link Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-border2'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#043174',
                        )
                    ), 
                    array(
                        'id' => 'border-button2-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 2 Background Color', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#043174',
                            'hover' => '#FFFFFF',
                        )
                    ),  
                    array(
                        'id' => 'border-button2-border-color',
                        'type' => 'border',
                        'compiler' => array('.btn-border2'),
                        'title' => esc_html__('Border Button 2 Border', 'campaign'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#ffffff', 
                            'border-style'  => 'solid', 
                            'border-width'   => '2px'
                        ),
                    ),
                )
            ) );

            /**
            FORMS
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Forms', 'campaign' ),
                'id'         => 'forms-subsection',
                'subsection' => true,
                'fields'     => array(    
                    array(
                        'id' => 'default-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('input[type="button"]', 'input[type="reset"]', 'input[type="submit"]'),
                        'title' => esc_html__('Default - Submit Buttons Color', 'campaign'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'active' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),         
                    array(
                        'id' => 'default-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Default - Submit Buttons Background', 'campaign'),
                        'default' => array(
                            'regular' => '#D20921',
                            'active' => '#F30A26',
                            'hover' => '#F30A26',
                        )
                    ),   
                    array(
                        'id' => 'style1-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('.campaign_form_style1 input[type="button"]', '.campaign_form_style1 input[type="reset"]', '.campaign_form_style1 input[type="submit"]'),
                        'title' => esc_html__('Style 1 - Submit Buttons Color', 'campaign'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'active' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),                
                    array(
                        'id' => 'style1-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Style 1 - Submit Buttons Background', 'campaign'),
                        'default' => array(
                            'regular' => '#D20921',
                            'active' => '#F30A26',
                            'hover' => '#F30A26',
                        )
                    ),         
                    array(
                        'id' => 'style1-input-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Style 1 - Input fields color', 'campaign'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#2A2A2A',
                            'hover' => '#f9f9f9',
                        )
                    ),         
                    array(
                        'id' => 'style1-input-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Style 1 - Input fields Background', 'campaign'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#E0E5EB',
                            'hover' => '#043174',
                        )
                    ),   
                    array(
                        'id' => 'style1-input-border-color',
                        'type' => 'border',
                        'compiler' => array('.campaign_form_style1 .wrap-forms input[type="text"], .campaign_form_style1 .wrap-forms input[type="email"], .campaign_form_style1 .wrap-forms input[type="password"], .campaign_form_style1 .wrap-forms textarea, .campaign_form_style1 .wrap-forms select, .campaign_form_style1 .wrap-forms .selectize-input, .campaign_form_style1 .wrap-forms .selectize-dropdown'),
                        'title' => esc_html__('Style 1 - Border', 'campaign'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#e5e5e5', 
                            'border-style'  => 'solid', 
                            'border-width'   => '0px'
                        ),
                    ),                  
                )
            ) );

            /**
            NEWSLETTER
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Newsletter', 'campaign' ),
                'id'         => 'newsletter-subsection',
                'subsection' => true,
                'fields'     => array(    
                    array(
                        'id' => 'newsletter-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('.widget_newsletterwidget input[type="submit"].newsletter-submit'),
                        'title' => esc_html__('Default - Submit Buttons Color', 'campaign'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'active' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),         
                    array(
                        'id' => 'newsletter-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Newsletter - Submit Buttons Background', 'campaign'),
                        'default' => array(
                            'regular' => '#D20921',
                            'active' => '#F30A26',
                            'hover' => '#F30A26',
                        )
                    ), 
                    array(
                        'id' => 'newsletter-background',
                        'type' => 'background',
                        'compiler' => array('.widget_newsletterwidget, #secondary .widget_newsletterwidget h3.widget-title, .widget_newsletterwidget .widget-title'),
                        'title' => esc_html__('Body Background', 'campaign'),
                        'subtitle' => esc_html__('Body background with image, color, etc.', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-color' => '#02275D'),
                    ),         
                    array(
                        'id' => 'newsletter-color',
                        'type' => 'color',
                        'title' => esc_html__('Newsletter Text/Title Color', 'campaign'),
                        'compiler' => array('.widget_newsletterwidget p, #secondary .widget_newsletterwidget h3.widget-title, .widget_newsletterwidget .widget-title'),
                        'default' => "#FFFFFF"
                    ),                  
                )
            ) );

            /**
            DONATIONS
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Donations', 'campaign' ),
                'id'         => 'donations-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'donations-background',
                        'type' => 'background',
                        'compiler' => array('#dgx-donate-container .dgx-donate-form-section'),
                        'title' => esc_html__('Donation Section Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'transparent' => true,
                        'default' => array('background-color' => '#ffffff'),
                    ),     
                    array(
                        'id' => 'donations-border-color',
                        'type' => 'border',
                        'compiler' => array('#dgx-donate-container .dgx-donate-form-section'),
                        'title' => esc_html__('Donation Section - Border', 'campaign'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#CCCCCC', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ),          
                    array(
                        'id' => 'donations-color',
                        'type' => 'color',
                        'title' => esc_html__('Donation Section Text/Title Color', 'campaign'),
                        'compiler' => array('#dgx-donate-container .dgx-donate-form-section p, #dgx-donate-container .dgx-donate-form-section h2'),
                        'default' => "#282828"
                    ),                  
                )
            ) );

            /**
            BREADCRUMBS
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Breadcrumbs', 'campaign' ),
                'id'         => 'breadcrumbs-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id'       => 'show-breadcrumbs',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show Breadcrumbs?', 'campaign'),
                        'desc'    => esc_html__('WordPress SEO by Yoast must be installed.', 'campaign'),
                        'default'  => true,
                    ), 
                    array(
                        'id' => 'breadcrumbs-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Breadcrumbs Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#breadcrumbs, .info-line, .info-line a'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#959595",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '20px',
                            'text-transform' => 'none'
                        ),
                    ),   
                    array(
                        'id' => 'breadcrumbs-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#breadcrumbs a', '.info-line a'),
                        'title' => esc_html__('Breadcrumbs Links Color', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#959595',
                            'hover' => '#666666',
                        )
                    ),
                       
                    array(
                        'id'       => 'show-breadcrumbs-prevnext',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show Previous/Next Post Link?', 'campaign'),
                        'desc'    => esc_html__('It will be used on posts, events, projects, etc.', 'campaign'),
                        'default'  => true,
                    ),
                    
                )
            ) );

            /**
            LOADING SCREEN
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Loading Screen', 'campaign' ),
                'id'         => 'loading-screen-subsection',
                'subsection' => true,
                'fields'     => array(               
                    array(
                        'id' => 'show-loading-screen',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to use loading screen?', 'campaign'),
                        'default' => 1,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'loading-screen',
                        'type' => 'background',
                        'compiler' => array('.pace'),
                        'title' => esc_html__('Loading Screen Background', 'campaign'),
                        'transparent' => false,
                        'default' => array('background-color' => '#FFFFFF'),
                    ),
                    array(
                        'id' => 'ls-logo',
                        'type' => 'media',
                        'title' => esc_html__('Loading Screen Logo', 'campaign'),
                        'subtitle' => esc_html__('Please use square image file.', 'campaign'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => array(
                            'url' => PARENT_URL . "/images/ls-logo.png",
                            'width' => '117',
                            'height' => '116'
                        )   
                    ),
                    array(
                        'id' => 'loading-screen-activity',
                        'type' => 'border',
                        'compiler' => array('#themeblossom_loading_screen_logo .loader_ring'),
                        'title' => esc_html__('Loading Screen - Ring Color', 'campaign'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#999999', 
                            'border-style'  => 'solid', 
                            'border-width'   => '10px'
                        ),
                    ),
                )
            ) );

            /**
            ACTION MENU
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Action Menu', 'campaign' ),
                'id'         => 'action-menu-subsection',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id' => 'overlay-menu-trigger',
                        'type' => 'color',
                        'compiler' => array('#overlay-menu.active #overlay-menu-trigger'),
                        'title' => esc_html__('Action Menu Close Button', 'campaign'),
                        'transparent' => false,
                        'default' => '#dddddd',
                    ),
                    array(
                        'id' => 'overlay-menu-holder',
                        'type' => 'background',
                        'compiler' => array('#overlay-menu-holder'),
                        'title' => esc_html__('Action Menu Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'transparent' => true,
                        'default' => array('background-color' => '#F4F2EE'),
                    ),
                    array(
                        'id' => 'overlay-menu-holder-li',
                        'type' => 'background',
                        'compiler' => array('#overlay-menu-holder .overlay-menu li'),
                        'title' => esc_html__('Action Menu Item Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'transparent' => true,
                        'default' => array('background-color' => '#ffffff'),
                    ),     
                    array(
                        'id' => 'overlay-menu-holder-li-bckg',
                        'type' => 'border',
                        'compiler' => array('#overlay-menu-holder .overlay-menu li'),
                        'title' => esc_html__('Action Menu Item - Border', 'campaign'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#e8e6e2', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ),
                    array(
                        'id' => 'overlay-menu-holder-li-a-color',
                        'type' => 'color',
                        'title' => esc_html__('Action Menu Item Color', 'campaign'),
                        'desc' => esc_html__('Regular - Hover.', 'campaign'),
                        'compiler' => array('#overlay-menu-holder .overlay-menu li a', '#overlay-menu-holder .overlay-menu li a span'),
                        'default' => '#847B69'
                    ),
                    array(
                        'id' => 'overlay-menu-holder-li-a-color-hover',
                        'type' => 'color',
                        'title' => esc_html__('Action Menu Item Hover Color', 'campaign'),
                        'desc' => esc_html__('Regular - Hover.', 'campaign'),
                        'compiler' => array('#overlay-menu-holder .overlay-menu li a:hover', '#overlay-menu-holder .overlay-menu li a:hover span'),
                        'default' => '#aca596'
                    ),   
                )
            ) );

            /**
            RELATED POSTS
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Featured/Related Posts', 'campaign' ),
                'id'         => 'related-posts-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'related-posts-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Related Posts Color', 'campaign'),
                        'desc' => esc_html__('Regular - Hover.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#21477F',
                            'hover' => '#ffffff',
                        )
                    ),  
                    array(
                        'id' => 'related-posts-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Related Posts Link Color', 'campaign'),
                        'desc' => esc_html__('Regular - Hover.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#A02E2F',
                            'hover' => '#ffffff',
                        )
                    ), 
                    array(
                        'id' => 'related-posts-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Related Posts Background Color', 'campaign'),
                        'desc' => esc_html__('Regular - Hover.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#B60D21',
                        )
                    ), 
                    array(
                        'id' => 'related-posts-overlay-bckg-color',
                        'type' => 'color',
                        'title' => esc_html__('Related Posts Overlay Background Color', 'campaign'),
                        'default' => '#043174',
                    ), 
                )
            ) );

            /**
            Gallery and Issues
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Gallery/Issues', 'campaign' ),
                'id'         => 'gallery-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'portfolio-overlay-bckg-color',
                        'type' => 'color',
                        'title' => esc_html__('Portfolio Overlay Background Color', 'campaign'),
                        'default' => '#043174',
                    ), 
                    array(
                        'id' => 'portfolio-overlay-opacity',
                        'type' => 'slider',
                        'title' => esc_html__('Portfolio Overlay Background Opacity', 'campaign'),
                        "default" => .8,
                        "min" => 0,
                        "step" => .1,
                        "max" => 1,
                        'resolution' => 0.1,
                        'display_value' => 'text'
                    ),
                    array(
                        'id' => 'portfolio-color',
                        'type' => 'color',
                        'title' => esc_html__('Portfolio Title Color', 'campaign'),
                        'default' => '#ffffff',
                    ),  
                    array(
                        'id' => 'issues-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Issues Background Color', 'campaign'),
                        'desc' => esc_html__('Regular - Hover.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#022D6D',
                        )
                    ), 
                    array(
                        'id' => 'issues-title-color',
                        'type' => 'color',
                        'title' => esc_html__('Issues Title Color', 'campaign'),
                        'default' => '#ffffff',
                    ), 
                    array(
                        'id' => 'issues-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Issues Link Color', 'campaign'),
                        'desc' => esc_html__('Regular - Hover.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#A02E2F',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'issues-overlay-bckg-color',
                        'type' => 'color',
                        'title' => esc_html__('Issues Overlay Background Color', 'campaign'),
                        'default' => '#3D5E8F',
                    ), 

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'issues-featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Issues Featured Image', 'campaign'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'campaign'),
                        'url' => true,
                        'compiler' => array('#featured-image.onissues'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'issues-featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Issues Featured Image Height', 'campaign'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'campaign'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'campaign'),
                        'width' => false,
                        'compiler' => array('#featured-image.onissues'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),
                )
            ) );


            /**



            HEADER OPTIONS



            **/

            
            /**
            LOGO OPTIONS
            **/

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-picture',
                'title' => esc_html__('Header', 'campaign'),
                'id' => 'header-section',
                'fields' => array(

                    /**
                    SITE BRANDING
                    **/
                    array(
                        'id' => 'header-background',
                        'type' => 'background',
                        'compiler' => array('#site-branding'),
                        'title' => esc_html__('Header Background', 'campaign'),
                        'subtitle' => esc_html__('Header background with image, color, etc.', 'campaign'),
                        'default' => array(
                            'background-color' => '#022D6D',
                            'background-repeat' => 'no-repeat',
                            'background-position' => 'center top'
                        ),
                    ),

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Featured Image', 'campaign'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'campaign'),
                        'url' => true,
                        'compiler' => array('#featured-image'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Featured Image Height', 'campaign'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'campaign'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'campaign'),
                        'width' => false,
                        'compiler' => array('#featured-image'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),
                    array(
                        'id'          => 'featured-image-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Featured Image Title', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#featured-image h2'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#fff', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '27px', 
                            'line-height' => '38px'
                        ),
                    ),
                    array(
                        'id'          => 'featured-image-typography-sub',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Featured Image Subitle', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#featured-image h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#fff', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '27px'
                        ),
                    ),
                )
            ) );      

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-picture',
                'title' => esc_html__('Header', 'campaign'),
                'id' => 'header-section',
            ) );

            /**
            PROMO
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Promo', 'campaign' ),
                'id'         => 'promo-subsection',
                'subsection' => true,
                'fields'     => array( 

                    /**
                    PROMO LINE
                    **/
                    array(
                        'id' => 'switch-promo',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to show a header promo line?', 'campaign'),
                        "default" => 1,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                    ),
                    array(
                        'id' => 'header-promo-background',
                        'type' => 'background',
                        'transparent' => false,
                        'compiler' => array('#promo, .search-box'),
                        'title' => esc_html__('Header Promo Line Background', 'campaign'),
                        'default' => array('background-color' => '#02275D'),
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id' => 'header-promo-border',
                        'type' => 'border',
                        'compiler' => array('#promo, .search-box'),
                        'title' => esc_html__('Promo Line Border', 'campaign'),
                        'all' => true,
                        'default' => array('border-color' => '#04173B', 'border-style' => 'solid', 'border-all' => '1px'),
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id'          => 'header-promo-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Promo Line Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#promo'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#618b9c', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '10px', 
                            'line-height' => '33px',
                            'text-transform' => 'uppercase'
                        ),
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id' => 'header-promo-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#promo a'),
                        'title' => esc_html__('Promo Line Links', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#618b9c',
                            'hover' => '#ffffff',
                        ),
                        'required' => array('switch-promo', 'equals', '1')
                    ),


                    array(
                        'id'        => 'header-promo-left',
                        'type'      => 'select',
                        'title'     => esc_html__('Promo Line - Left Content', 'campaign'),
                        'options'   => array(
                            'menu' => 'Top Menu', 
                            'text' => 'Text',
                            'hide' => 'Hide'
                        ),
                        'default'   => 'menu',
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id' => 'header-promo-text',
                        'type' => 'text',
                        'title' => esc_html__('Header Promo Text', 'campaign'),
                        'subtitle' => esc_html__('It will be used only if you chose "text" previously.<br>You can use html elements: a, em, strong, i.', 'campaign'),
                        'validate' => 'html_custom',
                        'allowed_html' => array( 
                            'a' => array( 
                                'href' => array(), 
                                'title' => array(),
                                'class' => array()
                            ), 
                            'em' => array(), 
                            'strong' => array(),
                            'i' => array(
                                'class' => array()
                            )
                        ),
                        'required' => array(
                                array('switch-promo', 'equals', '1'),
                                array('header-promo-left', 'equals', 'text')
                        )
                    ),

                    array(
                        'id' => 'header-promo-right',
                        'type' => 'select',
                        'title' => esc_html__('Do you want to show social network icons and/or search form?', 'campaign'),
                        'options'   => array(
                            'icons' => 'Just Icons', 
                            'search' => 'Icons and Search',
                            'hide' => 'Hide'
                        ),
                        'default'   => 'icons',
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id'             => 'search-box-spacing',
                        'type'           => 'spacing',
                        'output'         => array('.search-box'),
                        'mode'           => 'padding',
                        'units'          => array('px'),
                        'units_extended' => 'false',
                        'title'          => esc_html__('Search Box Padding', 'campaign'),
                        'default'            => array(
                            'padding-top'     => '32px', 
                            'padding-right'   => '32px', 
                            'padding-bottom'  => '32px', 
                            'padding-left'    => '32px'
                        )
                    ),
                )
            ) );


            /**



            FOOTER OPTIONS



            **/



            $post_type = 'wpcf7_contact_form';
            
            $args = array (
                'post_type' => $post_type,
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            
            $contact_forms = get_posts($args);
            
            $form_ids = array();
            $form_ids[0] = esc_html__('Choose contact form', 'campaign');
            foreach( $contact_forms as $form) {
                $form_ids[$form->ID] = strip_tags($form->post_title);
            }

            
            /**
            FOOTER OPTIONS
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-cog',
                'title' => esc_html__('Footer', 'campaign'),
                'fields' => array(
                    /**
                    PROMO LINE
                    **/
                    array(
                        'id' => 'switch-promo-footer',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to show social networks icons in the footer?', 'campaign'),
                        "default" => 0,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                    ),
                    array(
                        'id' => 'footer-promo-background',
                        'type' => 'background',
                        'transparent' => false,
                        'compiler' => array('#footer-promo'),
                        'title' => esc_html__('Footer Promo Line Background', 'campaign'),
                        'default' => array('background-color' => '#043174')
                    ),
                    array(
                        'id' => 'footer-promo-border',
                        'type' => 'border',
                        'compiler' => array('#footer-promo'),
                        'title' => esc_html__('Footer Promo Line Border', 'campaign'),
                        'left' => false,
                        'right' => false,
                        'all' => false,
                        'default' => array('border-color' => '#021c43', 'border-style' => 'solid', 'border-top' => '0px', 'border-bottom' => '0px')
                    ),
                    array(
                        'id' => 'footer-promo-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#footer-promo a'),
                        'title' => esc_html__('Footer Social Networks Icons Color', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#9BADC7',
                            'hover' => '#E1E7EF',
                        )
                    ),

                    /**
                    FOOTER SOCIAL STREAM WIDGET
                    **/
                    array(
                        'id' => 'switch-footer-wide',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to show wide Twitter widget in the footer area?', 'campaign'),
                        "default" => 1,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                    ),
                    array(
                        'id' => 'footer-wide-background',
                        'type' => 'background',
                        'compiler' => array('#wide-footer'),
                        'title' => esc_html__('Footer Wide Widget Area Background', 'campaign'),
                        'default' => array('background-color' => '#205FA2'),
                    ),
                    array(
                        'id' => 'footer-wide-padding',
                        'type' => 'spacing',
                        'compiler' => array('#wide-footer'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'title' => esc_html__('Footer Wide Widget Area Padding', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'right' => false,
                        'left' => false,
                        'all' => false,
                        'default' => array('padding-top' => '50px', 'padding-bottom' => '50px')
                    ),
                    array(
                        'id' => 'footer-wide-border',
                        'type' => 'border',
                        'compiler' => array('#wide-footer'),
                        'title' => esc_html__('Footer Wide Widget Area Border', 'campaign'),
                        'left' => false,
                        'right' => false,
                        'all' => false,
                        'default' => array('border-color' => '#225E9D', 'border-style' => 'solid', 'border-top' => '0px', 'border-bottom' => '1px')
                    ),
                    array(
                        'id' => 'footer-wide-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#wide-footer a'),
                        'title' => esc_html__('Footer Wide Widget Area Links Color Option', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#CEF4FF',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'footer-wide-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Footer Wide Widget Area Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#wide-footer'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#FFFFFF",
                            'font-style' => '400',
                            'font-family' => 'Lato',
                            'font-size' => '24px',
                            'text-align' => 'left',
                            'line-height' => '32px',
                        ),
                    ),
                    array(
                        'id'          => 'footer-wide-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Footer Wide Widget Area Titles', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#wide-footer h2'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#fdfafa', 
                            'font-weight'  => '700',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '30px',
                            'text-transform' => 'uppercase'
                        ),
                    ),
                    array(
                        'id' => 'footer-wide-title-span',
                        'type' => 'background',
                        'compiler' => array('#wide-footer h2 span:before, #wide-footer h2 span:after'),
                        'title' => esc_html__('Footer Wide Title Lines', 'campaign'),
                        'transparent' => true,
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-color' => '#fdfafa'),
                    ),

                    /**
                    MAIN FOOTER
                    **/
                    // show footer
                    array(
                        'id' => 'footer-widgets',
                        'type' => 'radio',
                        'title' => esc_html__('Do you want to show footer widgets?', 'campaign'),
                        'default' => '4cols',
                        'options' => array(
                            'no' => esc_html__('No', 'campaign'),
                            '3cols' => esc_html__('3 Columns', 'campaign'),
                            '4cols' => esc_html__('4 Columns', 'campaign'),
                        )
                    ),
                    array(
                        'id' => 'footer-background',
                        'type' => 'background',
                        'compiler' => array('#main-footer'),
                        'title' => esc_html__('Footer Background', 'campaign'),
                        'default' => array('background-color' => '#043174'),
                    ),
                    array(
                        'id' => 'footer-border',
                        'type' => 'border',
                        'compiler' => array('#main-footer'),
                        'title' => esc_html__('Footer Border', 'campaign'),
                        'left' => false,
                        'right' => false,
                        'all' => false,
                        'default' => array('border-color' => '#1F5EA1', 'border-style' => 'solid', 'border-top' => '1px', 'border-bottom' => '0px')
                    ),
                    array(
                        'id' => 'footer-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#main-footer a'),
                        'title' => esc_html__('Footer Links Color Option', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#C5CCDA',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'footer-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Footer Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#main-footer'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#FFFFFF",
                            'font-style' => '400',
                            'font-family' => 'Lato',
                            'font-size' => '14px',
                            'text-align' => 'left',
                            'line-height' => '18px',
                        ),
                    ),
                    array(
                        'id'          => 'footer-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Footer Titles', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#main-footer h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#C5CCDA', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '30px',
                            'text-transform' => 'uppercase'
                        ),
                    ), 
                    /**
                    DISCLAIMER LINE
                    **/
                    array(
                        'id' => 'footer-text',
                        'type' => 'editor',
                        'title' => esc_html__('Footer Text', 'campaign'),
                        'default' => 'Copyright &copy; 2014. All Rights Reserved.',
                    ), 
                    array(
                        'id' => 'footer-disclaimer',
                        'type' => 'background',
                        'compiler' => array('#footer-navigation'),
                        'title' => esc_html__('Copyright Line Background', 'campaign'),
                        'default' => array('background-color' => '#022A65'),
                    ),
                    array(
                        'id' => 'disclaimer-border',
                        'type' => 'border',
                        'compiler' => array('#footer-navigation'),
                        'title' => esc_html__('Copyright Line Border', 'campaign'),
                        'left' => false,
                        'right' => false,
                        'bottom' => false,
                        'default' => array('border-color' => '#011533', 'border-style' => 'solid', 'border-top' => '0px')
                    ),
                    array(
                        'id' => 'footer-disclaimer-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#footer-navigation a'),
                        'title' => esc_html__('Copyright Line Links', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#7CA1CC',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'footer-disclaimer-padding',
                        'type' => 'spacing',
                        'compiler' => array('#footer-navigation .disclaimer-area'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'left' => false,
                        'right' => false,
                        'title' => esc_html__('Copyright Line Padding', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'default' => array('padding-top' => '10px', 'padding-bottom' => '10px')
                    ),   
                    array(
                        'id' => 'footer-disclaimer-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Copyright Line Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#footer-navigation'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#7CA1CC",
                            'font-style' => '400',
                            'font-family' => 'Lato',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '28px',
                            'text-transform' => 'normal'
                        ),
                    ),
                    array(
                        'id' => 'footer-logo',
                        'type' => 'media',
                        'title' => esc_html__('Footer Logo', 'campaign'),
                        'subtitle' => esc_html__('Please use image file.', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => ""
                    ),
                    array(
                        'id' => 'footer-logo-margins',
                        'type' => 'spacing',
                        'compiler' => array('#footer-logo'), 
                        'mode' => 'margin',
                        'units' => 'px',
                        'title' => esc_html__('Footer Logo Margins', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'default' => array('margin-top' => '10px', 'margin-right' => "0px", 'margin-bottom' => '10px', 'margin-left' => '0px')
                    ),
                )
            ) );


            /**



            NAVIGATION



            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-th-list',
                'title' => esc_html__('Main Navigation and Breadcrumbs', 'campaign'),
                'fields' => array( 
                    array(
                        'id' => 'navigation-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Main Navigation Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#primary-navigation > div > ul > li > a, #overlay-menu-holder span'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#3ebcd8",
                            'font-style' => '700',
                            'font-family' => 'Lato',
                            'font-size' => '12px',
                            'text-align' => 'center',
                            'line-height' => '100px',
                            'text-transform' => 'uppercase'
                        ),
                    ),
                    array(
                        'id' => 'navigation-link-color-level1',
                        'type' => 'link_color',
                        'compiler' => array('#primary-navigation > div > ul > li > a'),
                        'title' => esc_html__('Main Navigation Links Color', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#3ebcd8',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'navigation-link-bckg1',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation > div > ul > li > a'),
                        'title' => esc_html__('Main Navigation Link Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => 'transparent'),
                    ),
                    array(
                        'id' => 'navigation-link-bckg2',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation > div > ul > li:hover > a, #primary-navigation > div > ul > li.current-menu-item > a, #primary-navigation > div > ul > li.current-menu-ancestor > a'),
                        'title' => esc_html__('Main Navigation Link Background Hover State', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#02275D'),
                    ),  
                    array(
                        'id' => 'navigation-link-padding-level1',
                        'type' => 'spacing',
                        'output' => array('#primary-navigation > div > ul > li > a'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'top' => false,
                        'bottom' => false,
                        'title' => esc_html__('Main Navigation Links Padding', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'default' => array('padding-left' => '23px', 'padding-right' => "23px")
                    ), 

                    /**
                    SPECIAL BUTTON
                    **/

                    array(
                        'id' => 'navigation-link-color-special',
                        'type' => 'link_color',
                        'compiler' => array('#primary-navigation div > ul > li.special > a'),
                        'title' => esc_html__('Special Button Link Colors', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'navigation-link-bckg1-special',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div > ul > li.special > a'),
                        'title' => esc_html__('Special Button Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#D10B20'),
                    ),
                    array(
                        'id' => 'navigation-link-bckg2-special',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div > ul > li.special:hover > a'),
                        'title' => esc_html__('Special Button Hover State', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#b1091b'),
                    ),  
                    array(
                        'id' => 'navigation-link-margin-special',
                        'type' => 'spacing',
                        'output' => array('#primary-navigation div > ul > li.special'), 
                        'mode' => 'margin',
                        'units' => 'px',
                        'top' => false,
                        'bottom' => false,
                        'title' => esc_html__('Special Button Margins', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'default' => array('margin-left' => '50px', 'margin-right' => "0")
                    ),

                    /**
                    DROPDOWN
                    **/
                    array(
                        'id' => 'navigation-typography-dd',
                        'type' => 'typography',
                        'title' => esc_html__('Dropdown Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#primary-navigation div div li > a, #primary-navigation ul ul a'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#3ebcd8",
                            'font-style' => '700',
                            'font-family' => 'Lato',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '22px',
                            'text-transform' => 'none'
                        ),
                    ),
                    array(
                        'id' => 'navigation-link-color-level2',
                        'type' => 'link_color',
                        'output' => array('#primary-navigation div div li > a', '#primary-navigation ul ul a'),
                        'title' => esc_html__('Dropdown Links Color', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#FFFFFF',
                            'hover' => '#3ebcd8',
                        )
                    ),
                    array(
                        'id' => 'navigation-link-padding-level2',
                        'type' => 'spacing',
                        'output' => array('#primary-navigation div div li > a, #primary-navigation ul ul a'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'title' => esc_html__('Dropdown Links Padding', 'campaign'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'campaign'),
                        'default' => array('padding-top' => '9px', 'padding-left' => '24px', 'padding-bottom' => '9px', 'padding-right' => "24px")
                    ),
                    array(
                        'id' => 'navigation-link-level2-bckg',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div div li > a, #primary-navigation ul ul a, #primary-navigation div > ul ul'),
                        'title' => esc_html__('Dropdown Link Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#02275D'),
                    ),
                    array(
                        'id' => 'navigation-link-level2-bckg-hover',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div > ul ul li > a:hover, #primary-navigation div > ul ul li.current_page_item > a, #primary-navigation div > ul ul li.current_page_ancestor > a, #primary-navigation div > ul ul li.current-menu-item > a, #primary-navigation div > ul ul li.current-menu-ancestor > a'),
                        'title' => esc_html__('Dropdown Hover Link Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#022D6D'),
                    ),
                    array(
                        'id' => 'navigation-link-level2-mm-bckg-hover',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div.mega-menu a:hover, #primary-navigation div.mega-menu li.current_page_item > a, #primary-navigation div.mega-menu li.current_page_ancestor > a, #primary-navigation div.mega-menu li.current-menu-item > a, #primary-navigation div.mega-menu li.current-menu-ancestor > a'),
                        'title' => esc_html__('Mega Menu Hover Link Background', 'campaign'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#022D6D'),
                    ), 


                    /**
                    STICKY NAVIGATION
                    **/
                    array(
                        'id'       => 'sticky-navigation',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Sticky Navigation', 'campaign'),
                        'default'  => true,
                    ),
                )
            ) );   

  

            
            /**



            BLOG OPTIONS


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-book',
                'title' => esc_html__('Blog/Post/Page Settings', 'campaign'),
                'id'    => 'blog-section',
                'fields' => array(
                    array(
                        'id'       => 'archive-date-box',
                        'type'     => 'select', 
                        'title'    => esc_html__('Post - Date Box', 'campaign'),
                        'subtitle'    => esc_html__('It will be shown on top of image thumbnail.', 'campaign'),
                        'default'  => 'no',
                        'options' => array(
                            'no' => esc_html__('Don\'t show date box', 'campaign'),
                            'normal' => esc_html__('Normal Date Box', 'campaign'),
                            //'wide' => esc_html__('Wide Date Box', 'campaign')
                        )
                    ),               
                    array(
                        'id'       => 'date-box-bckg',
                        'type'     => 'color',
                        'title'    => esc_html__('Date Box Background', 'campaign'), 
                        'subtitle' => esc_html__('It will be used for date box background.', 'campaign'),
                        'default'  => '#00BFF3',
                    ),  
                    array(
                        'id'       => 'archive-author',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Author Thumbnail', 'campaign'),
                        'subtitle'    => esc_html__('It will be shown on top of image thumbnail.', 'campaign'),
                        'default'  => false,
                    ),
                
                    //pagination
                    
                    /* Uncomment this if you want to have uynstyled older/newer page links instead of number pagination
                    array(
                        'id' => 'blog-navigation-type',
                        'type' => 'radio',
                        'title' => esc_html__('Type of pagination', 'campaign'),
                        'default' => 'paged',
                        'options' => array(
                            'paged' => esc_html__('Show page numbers', 'campaign'),
                            'linked' => esc_html__('Show "older/newer posts" links', 'campaign'),
                        )
                    ),
                    */
                                        
                    // paged navigation
                    array(
                        'id' => 'blog-navigation-paginated-prevnext',
                        'type' => 'switch',
                        'title' => esc_html__('Show Prev/Next button', 'campaign'),
                        'subtitle' => esc_html__('It will be used in blog pagination.', 'campaign'),
                        'default' => true,
                        'on' => 'Yes',
                        'off' => 'No',
                    ),  
                )
            ) );   

            Redux::setSection( $opt_name, array(
                'title' => esc_html__('Blog/Post/Page Settings', 'campaign'),
                'id'    => 'blog-section',
                'icon'  => 'el-icon-book'
            ) );

            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( '404', 'campaign' ),
                'id'         => '404-subsection',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id' => '404-title',
                        'type' => 'text',
                        'title' => esc_html__('404 Title', 'campaign'),
                        'subtitle' => esc_html__('This title will be used on 404 page.', 'campaign'),
                        'default' => esc_html__('Page not found', 'campaign')
                    ),
                    array(
                        'id' => '404-message',
                        'type' => 'editor',
                        'title' => esc_html__('404 Message', 'campaign'),
                        'default' => esc_html__("The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.", 'campaign')
                    ),
                    array(
                        'id'        => '404-extra',
                        'type'      => 'select',
                        'title'     => esc_html__('404 Extra Content', 'campaign'),
                        'options'   => array(
                            'search' => esc_html__('Search Form', 'campaign'), 
                            'latest' => esc_html__('Latest Posts', 'campaign'),
                            'random' => esc_html__('Random Posts', 'campaign'),
                            'none' => esc_html__('none', 'campaign'),
                        ),
                        'default'   => 'search'
                    ), 
                )
            ) );

            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Special Pages', 'campaign' ),
                'id'         => 'special-pages-subsection',
                'subsection' => true,
                'fields'     => array(
                    // Projects listing page
                    array(
                        'id' => 'issues-page',
                        'type' => 'select',
                        'title' => esc_html__('Issues Page', 'campaign'),
                        'desc' => esc_html__('It will be used for breadcrumbs.', 'campaign'),
                        'data' => 'pages',
                    ), 
                    // Members listing page
                    array(
                        'id' => 'projects-page',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Page', 'campaign'),
                        'desc' => esc_html__('It will be used for breadcrumbs.', 'campaign'),
                        'data' => 'pages',
                    ), 
                )
            ) );



        
            
            /**



            SIDEBAR OPTIONS


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-pause',
                'title' => esc_html__('Sidebar', 'campaign'),
                'fields' => array(
                    array(
                        'id' => 'switch-sticky-sidebar',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to have a sticky sidebar?', 'campaign'),
                        'default' => false,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'sidebar-link-color1',
                        'type' => 'link_color',
                        'compiler' => array('#secondary a:not(.btn)', '.custom-sidebar-widget a:not(.btn)'),
                        'title' => esc_html__('Sidebar Links Color - Option 1', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#18734A',
                            'hover' => '#138AD7',
                        )
                    ),
                    array(
                        'id' => 'sidebar-link-color2',
                        'type' => 'link_color',
                        'compiler' => array('#secondary li a', '.custom-sidebar-widget li a'),
                        'title' => esc_html__('Sidebar Links Color - Option 1', 'campaign'),
                        'subtitle' => esc_html__('It will be used in lists.', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#138AD7',
                            'hover' => '#18734A',
                        )
                    ),
                    array(
                        'id' => 'sidebar-link-color3',
                        'type' => 'link_color',
                        'compiler' => array('#secondary h3 a', '#secondary h4 a', '#secondary h5 a', '.custom-sidebar-widget h3 a', '.custom-sidebar-widget h4 a', '.custom-sidebar-widget h5 a'),
                        'title' => esc_html__('Sidebar Links Color - Option 3', 'campaign'),
                        'subtitle' => esc_html__('It will be used in titles.', 'campaign'),
                        'desc' => esc_html__('Please choose link colors.', 'campaign'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#1C424B',
                            'hover' => '#398699',
                        )
                    ),
                    array(
                        'id' => 'sidebar-widget-separator',
                        'type' => 'border',
                        'compiler' => array('#secondary aside.widget, .custom-sidebar-widget aside.widget'),
                        'all' => false,
                        'top' => false,
                        'right' => false,
                        'left' => false,
                        'title' => esc_html__('Sidebar Widget Separator', 'campaign'),
                        'default' => array(
                            'border-color' => '#e6e6e8',
                            'border-style' => 'solid',
                            'border-width' => '1px'
                        ),
                    ),
                    array(
                        'id' => 'sidebar-list-separator',
                        'type' => 'border',
                        'compiler' => array('#secondary aside.widget li, #secondary .upw-posts.tb article, .custom-sidebar-widget aside.widget li, .custom-sidebar-widget .upw-posts.tb article'),
                        'all' => false,
                        'top' => false,
                        'right' => false,
                        'left' => false,
                        'title' => esc_html__('Sidebar List Item Separator', 'campaign'),
                        'default' => array(
                            'border-color' => '#f1f1f2',
                            'border-style' => 'solid',
                            'border-width' => '1px'
                        ),
                    ),  
                )
            ) );    



            /**



            // PROMO LINE


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-group',
                'title' => esc_html__('Social Networks Settings', 'campaign'),
                'fields' => array(
                    array(
                        'id' => 'promo-text-email',
                        'type' => 'text',
                        'title' => esc_html__('Email', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'email',
                        'msg' => 'Please use valide email address.'
                    ),
                    array(
                        'id' => 'promo-text-facebook',
                        'type' => 'text',
                        'title' => esc_html__('Facebook URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-twitter',
                        'type' => 'text',
                        'title' => esc_html__('Twitter URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-instagram',
                        'type' => 'text',
                        'title' => esc_html__('Instagram URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-linkedin',
                        'type' => 'text',
                        'title' => esc_html__('LinkedIn URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),

                    array(
                        'id' => 'promo-text-googleplus',
                        'type' => 'text',
                        'title' => esc_html__('Google+ URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-pinterest',
                        'type' => 'text',
                        'title' => esc_html__('Pinterest URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled.', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-flickr',
                        'type' => 'text',
                        'title' => esc_html__('Flickr URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-youtube',
                        'type' => 'text',
                        'title' => esc_html__('YouTube URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-vimeo',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo URL', 'campaign'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'campaign'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
                        'validate' => 'no_html',
                    ),
                )
            ) );



            
            /**



            // TYPOGRAPHY OPTIONS


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-pencil',
                'title' => esc_html__('Typography', 'campaign'),
                'fields' => array(
                    array(
                        'id'          => 'tb-body-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Body Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => true,
                        'compiler'    => array('body'),
                        'units'       => 'px',
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '16px', 
                            'line-height' => '23px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h1-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H1 Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h1'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#1d434c', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '42px', 
                            'line-height' => '65px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h1-small-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H1 Typography (smaller)', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h1.smaller'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#1d434c', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '27px', 
                            'line-height' => '45px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h2-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H2 Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h2'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '24px', 
                            'line-height' => '40px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H3 Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828',
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '21px', 
                            'line-height' => '35px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h4-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H4 Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h4'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '30px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h5-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H5 Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h5'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '16px', 
                            'line-height' => '30px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h6-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H6 Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h6'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '15px', 
                            'line-height' => '30px'
                        ),
                    ),  
                    array(
                        'id' => 'date-box-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Date Box Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.featured-image-holder.show-date .date-box'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#ffffff",
                            'font-style' => '300',
                            'font-family' => 'Oswald',
                            'font-size' => '34px',
                            'text-align' => 'center',
                            'line-height' => '36px',
                            'text-transform' => 'uppercase')
                    ),
                    array(
                        'id'          => 'sidebar-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Sidebar Title Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#secondary h3, .custom-sidebar-widget h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828',
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '30px',
                            'text-transform' => 'uppercase',
                        ),
                    ),  
                    array(
                        'id'          => 'sidebar-h4-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Sidebar Subtitle Typography', 'campaign'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#secondary h4, .custom-sidebar-widget h4'),
                        'units'       => 'px',
                        'default'     => array(
                            'color'       => '#1C424B',
                            'font-weight'  => '400',
                            'font-family' => 'PT Sans', 
                            'text-align'  => 'left',
                            'font-size'   => '16px', 
                            'line-height' => '25px'
                        ),
                    ),
                    array(
                        'id' => 'sidebar-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Sidebar Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#secondary, .custom-sidebar-widget'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#777",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '14px',
                            'text-align' => 'left',
                            'line-height' => '20px',
                        ),
                    ),
                    array(
                        'id' => 'primary-font',
                        'type' => 'typography',
                        'title' => esc_html__('Replacement Font 1', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.tb-primary-font'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#282828",
                            'font-style' => '400',
                            'font-family' => 'Lora',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '21px',
                        ),
                    ),
                    array(
                        'id' => 'secondary-font',
                        'type' => 'typography',
                        'title' => esc_html__('Replacement Font 2', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.tb-secondary-font'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#282828",
                            'font-style' => '400',
                            'font-family' => 'Oswald',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '21px',
                        ),
                    ),
                )
            ) );   


       
            /**



            WooCommerce OPTIONS


            
            **/

            if (class_exists('WooCommerce')) :

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-shopping-cart',
                'title' => esc_html__('WooCommerce', 'campaign'),
                'fields' => array(
                    array(
                        'id' => 'woocommerce-price-tg',
                        'type' => 'typography',
                        'title' => esc_html__('WooCommerce Price Typography', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#tb-product-catalogue span.price, .woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#0D8AD9",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '18px',
                            'text-align' => 'left',
                            'line-height' => '24px',
                            'text-transform' => 'uppercase')
                    ),       
                    array(
                        'id' => 'woocommerce-price-single-product',
                        'type' => 'typography',
                        'title' => esc_html__('WooCommerce Price Typography - Single Product', 'campaign'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('body div.product div#single-product-summary p.price, body div.product div#single-product-summary p.price span.amount'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#c9002d",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '36px',
                            'text-align' => 'left',
                            'line-height' => '44px',
                            'text-transform' => 'uppercase')
                    ), 
                    array(
                        'id' => 'product-onsale-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale'),
                        'title' => esc_html__('On Sale Ribbon', 'campaign'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'campaign'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_sale.png'),
                    ), 
                    array(
                        'id' => 'product-featured-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale.featured'),
                        'title' => esc_html__('Featured Ribbon', 'campaign'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'campaign'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_featured.png'),
                    ), 
                    array(
                        'id' => 'product-free-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale.free'),
                        'title' => esc_html__('Free Product Ribbon', 'campaign'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'campaign'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_free.png'),
                    ), 
                    array(
                        'id' => 'product-new-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale.new'),
                        'title' => esc_html__('New Product Ribbon', 'campaign'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'campaign'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_new.png'),
                    ),

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'woocommerce-featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Shop Pages Featured Image', 'campaign'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'campaign'),
                        'url' => true,
                        'compiler' => array('#featured-image.onshop'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'woocommerce-featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Shop Pages Featured Image Height', 'campaign'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'campaign'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'campaign'),
                        'width' => false,
                        'compiler' => array('#featured-image.onshop'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),

                )
            ) );

            endif;

  
            
            /**



            The Events Calendar OPTIONS



            **/

            if (class_exists('Tribe__Events__Main')) :
            
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-calendar',
                'title' => esc_html__('The Events Calendar', 'campaign'),
                'fields' => array(
                    // show bar
                    array(
                        'id' => 'tec-show-bar',
                        'type' => 'radio',
                        'title' => esc_html__('Do you want to show Events Calendar navigation bar?', 'campaign'),
                        'desc' => esc_html__('It will be shown across events view pages...', 'campaign'),
                        'default' => 'no',
                        'options' => array(
                            'no' => esc_html__('No', 'campaign'),
                            'yes' => esc_html__('Yes', 'campaign'),
                        )
                    ),                                 
                    array(
                        'id' => 'tec-archive-title-position',
                        'type' => 'select',
                        'title' => esc_html__('Title Position', 'campaign'),
                        'default' => 'below',
                        'options' => array(
                            'above' => esc_html__('Above featured image', 'campaign'),
                            'below' => esc_html__('Below featured image', 'campaign')
                        )
                    ),  
                    array(
                        'id'       => 'tec-archive-date-box',
                        'type'     => 'select', 
                        'title'    => esc_html__('Post - Date Box', 'campaign'),
                        'subtitle'    => esc_html__('It will be shown on top of image thumbnail.', 'campaign'),
                        'default'  => 'no',
                        'options' => array(
                            'no' => esc_html__('Don\'t show date box', 'campaign'),
                            'normal' => esc_html__('Normal Date Box', 'campaign'),
                            //'wide' => esc_html__('Wide Date Box', 'campaign')
                        )
                    ), 
                    array(
                        'id'       => 'tec-archive-remove-export',
                        'type'     => 'radio', 
                        'title'    => esc_html__('Export Button?', 'campaign'),
                        'default'  => 'no',
                        'options' => array(
                            'no' => esc_html__('Remove it', 'campaign'),
                            'yes' => esc_html__('Keep it', 'campaign'),
                        )
                    ),
                    array(
                        'id' => 'events-calendar-background-image',
                        'type' => 'background',
                        'title' => esc_html__('Month View - Header Background', 'campaign'),
                        'url' => true,
                        'compiler' => array('.tribe-events-calendar thead th'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#022D6D'
                        )
                    ),

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'events-featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Events Featured Image', 'campaign'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'campaign'),
                        'url' => true,
                        'compiler' => array('#featured-image.onevents'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'events-featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Events Featured Image Height', 'campaign'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'campaign'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'campaign'),
                        'width' => false,
                        'compiler' => array('#featured-image.onevents'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),

                )
            ) );

            endif;
       

    /*
     * <--- END SECTIONS
     */


    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {

            if (is_multisite()) :
                $blog_details = get_blog_details();
                $blog_pref = 'site' . $blog_details->blog_id . '-';
            else:
                $blog_pref = '';
            endif;

            $filename = PARENT_DIR . "/inc/admin/" . $blog_pref . "options.css";

            
            global $wp_filesystem;
         
            if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
                WP_Filesystem();
            }
         
            if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
            }
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }