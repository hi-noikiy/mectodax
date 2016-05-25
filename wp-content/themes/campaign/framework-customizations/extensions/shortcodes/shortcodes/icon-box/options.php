<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$admin_url = admin_url();
$template_directory = get_template_directory_uri();

$options = array(

    'box-alignment' => array(
        'label' => esc_html__('Box Alignment', 'campaign'),
        'type'  => 'select',
        'value' => 'textalignleft',
        'choices' => array(
            'textalignleft' => esc_html__('Left', 'campaign'),
            'textaligncenter' => esc_html__('Center', 'campaign'),
            'textalignright' => esc_html__('Right', 'campaign'),
        ),
    ),
    'box-title' => array(
        'label' => esc_html__('Title', 'campaign'),
        'desc'  => esc_html__('Enter the icon box title', 'campaign'),
        'type'  => 'text',
    ),
    'heading-type' => array(
        'label' => esc_html__('Title Heading', 'campaign'),
        'type'  => 'select',
        'value' => 'h1',
        'choices' => array(
            'h1' => esc_html__('H1', 'campaign'),
            'h2' => esc_html__('H2', 'campaign'),
            'h3' => esc_html__('H3', 'campaign'),
            'h4' => esc_html__('H4', 'campaign'),
            'h5' => esc_html__('H5', 'campaign'),
            'h6' => esc_html__('H6', 'campaign'),
        ),
    ),

    'box-subtitle' => array(
        'label' => esc_html__('Subtitle', 'campaign'),
        'desc'  => esc_html__('Enter the icon box subtitle', 'campaign'),
        'type'  => 'text',
    ),
    'subheading-type' => array(
        'label' => esc_html__('Subitle Heading', 'campaign'),
        'type'  => 'select',
        'value' => 'h3',
        'choices' => array(
            'h1' => esc_html__('H1', 'campaign'),
            'h2' => esc_html__('H2', 'campaign'),
            'h3' => esc_html__('H3', 'campaign'),
            'h4' => esc_html__('H4', 'campaign'),
            'h5' => esc_html__('H5', 'campaign'),
            'h6' => esc_html__('H6', 'campaign'),
        ),
    ),
    'box-desc' => array(
        'label' => esc_html__('Description', 'campaign'),
        'desc'  => esc_html__('Enter the icon box description', 'campaign'),
        'type'    => 'wp-editor',
        'tinymce' => true,
        'reinit'  => true,
        'wpautop' => false,
    ),
    'link'   => array(
        'label' => esc_html__( 'Link', 'campaign' ),
        'desc'  => esc_html__( 'Please add link if you want to link titles and icons?', 'campaign' ),
        'type'  => 'text',
        'value' => '#'
    ),
    'full_link' => array(
        'type'  => 'switch',
        'label'   => esc_html__( '', 'campaign' ),
        'desc'    => esc_html__( 'Make complete box clickable?', 'campaign' ),
        'value' => 'no',
        'right-choice' => array(
            'value' => 'absolute100',
            'label' => esc_html__('Yes', 'campaign'),
        ),
        'left-choice' => array(
            'value' => 'no',
            'label' => esc_html__('No', 'campaign'),
        ),
    ),
    'target' => array(
        'type'  => 'switch',
        'label'   => esc_html__( '', 'campaign' ),
        'desc'    => esc_html__( 'Open link in new window?', 'campaign' ),
        'value' => '_self',
        'right-choice' => array(
            'value' => '_blank',
            'label' => esc_html__('Yes', 'campaign'),
        ),
        'left-choice' => array(
            'value' => '_self',
            'label' => esc_html__('No', 'campaign'),
        ),
    ),
    'icon-type-picker' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'icon-box-type' => array(
                'label' => esc_html__('Style', 'campaign'),
                'type'  => 'select',
                'value' => 'above',
                'desc'  => esc_html__('Choose the icon box style', 'campaign'),
                'choices' => array(
                    'above' => esc_html__('Above', 'campaign'),
                    'inline' => esc_html__('Inline', 'campaign'),
                ),
            ),
        ),
        'choices' => array(
            'inline' => array(
                'icon-position' => array(
                    'type'  => 'switch',
                    'value' => '',
                    'label' => esc_html__('Icon Position', 'campaign'),
                    'desc'  => esc_html__('Select your prefered icon position', 'campaign'),
                    'left-choice' => array(
                        'value' => 'alignleft',
                        'label' => esc_html__('Left', 'campaign'),
                    ),
                    'right-choice' => array(
                        'value' => 'alignright',
                        'label' => esc_html__('Right', 'campaign'),
                    )
                ),
            )
        )
    ),

    'icon-type' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'icon-box-img' => array(
                'label' => esc_html__( 'Icon', 'campaign' ),
                'desc'  => esc_html__('Select icon type','campaign'),
                'type'  => 'radio',
                'value' => 'icon-class',
                'choices' => array(
                    'icon-class' => esc_html__( 'Font Awesome', 'campaign' ),
                    'upload-icon' => esc_html__( 'Custom Upload', 'campaign' ),
                    'skip' => esc_html__( 'No Icon', 'campaign' ),
                ),
            ),
        ),
        'choices' => array(
            'icon-class' => array(
                'icon_class' => array(
                    'type' => 'icon',
                    'value' => '',
                    'label' => '',
                ),
                'icon-color' => array(
                    'label' => esc_html__('Icon Color','campaign'),
                    'desc' => esc_html__('Select icon color','campaign'),
                    'value'   => '',
                    'type'    => 'color-picker'
                ),
                'icon-bg-type' => array(
                    'type'  => 'multi-picker',
                    'label' => false,
                    'desc'  => false,
                    'picker' => array(
                        'icon-box-img' => array(
                            'label' => esc_html__( 'Background', 'campaign' ),
                            'desc'  => esc_html__( 'Select the background type', 'campaign' ),
                            'type'  => 'radio',
                            'value' => 'bg-none',
                            'choices' => array(
                                'bg-none' => esc_html__( 'None', 'campaign' ),
                                'icon-rounded' => esc_html__( 'Square', 'campaign' ),
                                'icon-circle' => esc_html__( 'Circle', 'campaign' )
                            ),
                        ),
                    ),
                    'choices' => array(
                        'icon-rounded' => array(
                            'bg-color' => array(
                                'label'   => esc_html__('', 'campaign'),
                                'desc' => esc_html__('Select icon background color','campaign'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            )
                        ),
                        'icon-circle' => array(
                            'bg-color' => array(
                                'label'   => esc_html__('', 'campaign'),
                                'desc' => esc_html__('Select icon background color','campaign'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            )
                        )
                    )
                )
            ),
            'upload-icon' => array(
                'upload-custom-img' => array(
                    'label' => '',
                    'type'  => 'upload',
                ),
                'rounded' => array(
                    'type'  => 'switch',
                    'value' => 'img-rounded',
                    'label' => '',
                    'desc'  => esc_html__('Make the image circle?', 'campaign'),
                    'left-choice' => array(
                        'value' => 'img-rounded',
                        'label' => esc_html__('No', 'campaign'),
                    ),
                    'right-choice' => array(
                        'value' => 'img-circle',
                        'label' => esc_html__('Yes', 'campaign'),
                    )
                ),
            ),
        )
    ),

    'icon-box-btn' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'show_btn' => array(
                'type'  => 'switch',
                'value' => 'no',
                'label' => esc_html__('Button', 'campaign'),
                'desc'  => esc_html__('Show button?', 'campaign'),
                'left-choice' => array(
                    'value' => 'no',
                    'label' => esc_html__('No', 'campaign'),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'campaign'),
                )
            ),
        ),
        'choices' => array(
            'yes' => array(
                'label'  => array(
                    'label' => esc_html__( 'Label', 'campaign' ),
                    'desc'  => esc_html__( 'This is the text that appears on your button', 'campaign' ),
                    'type'  => 'text',
                    'value' => 'Submit'
                ),
                'link'   => array(
                    'label' => esc_html__( 'Link', 'campaign' ),
                    'desc'  => esc_html__( 'Where should your button link to ?', 'campaign' ),
                    'type'  => 'text',
                    'value' => '#'
                ),
                'target' => array(
                    'type'  => 'switch',
                    'label'   => esc_html__( '', 'campaign' ),
                    'desc'    => esc_html__( 'Open link in new window?', 'campaign' ),
                    'value' => '_self',
                    'right-choice' => array(
                        'value' => '_blank',
                        'label' => esc_html__('Yes', 'campaign'),
                    ),
                    'left-choice' => array(
                        'value' => '_self',
                        'label' => esc_html__('No', 'campaign'),
                    ),
                ),
                'btn_size'  => array(
                    'label' => esc_html__( 'Size', 'campaign' ),
                    'desc'  => esc_html__( 'Choose button size', 'campaign' ),
                    'type'  => 'radio',
                    'value' => 'btn-default-size',
                    'choices' => $GLOBALS['button_size']
                ),
                'btn_style'  => array(
                    'label' => esc_html__( 'Style', 'campaign' ),
                    'desc'  => esc_html__( 'Choose button style', 'campaign' ),
                    'type'  => 'radio',
                    'value' => 'btn-tb-primary',
                    'choices' => $GLOBALS['button_type']
                ),
                'btn_alignment' => array(
                    'label' => esc_html__( 'Alignment', 'campaign' ),
                    'desc'  => esc_html__( 'Choose button alignment', 'campaign' ),
                    'type'  => 'radio',
                    'value' => 'textalignleft',
                    'choices' => array(
                        'textalignleft' => esc_html__( 'Left', 'campaign' ),
                        'textaligncenter' => esc_html__( 'Center', 'campaign' ),
                        'textalignright' => esc_html__( 'Right', 'campaign' ),
                    ),
                ),
            )
        )
    ),


    'animation_group' => array(
        'type' => 'group',
        'options' => array(
            'animation_effect'  => array(
                'type'  => 'select',
                'value' => 'none',
                'label' => esc_html__('Animation Effect', 'campaign'),
                'choices' => $GLOBALS['animation_select']
            ),
            'animation_delay'  => array(
                'type'  => 'select',
                'value' => '0',
                'label' => esc_html__('Animation Delay', 'campaign'),
                'choices' => $GLOBALS['animation_delay']
            )
        )
    ),

    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),

);