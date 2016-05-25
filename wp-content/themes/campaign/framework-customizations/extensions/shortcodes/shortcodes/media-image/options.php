<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$options = array(

    'img_settings' => array(
        'type' => 'group',
        'options' => array(
            'upload_img' => array(
                'label' => esc_html__('Image', 'campaign'),
                'desc'  => esc_html__('Upload image', 'campaign'),
                'type'  => 'upload',
            ),
        )
    ),

    'img_size' => array(
        'label' => '',
        'desc'  => esc_html__( 'Select image size', 'campaign' ),
        'type'  => 'radio',
        'value' => 'full',
        'choices' => array(
            'full' => esc_html__('Full', 'campaign'),
            'wide' => esc_html__('Wide (600x300)', 'campaign'),
            'square' => esc_html__('Square (600x600)', 'campaign'),
        ),
    ),

    'position' => array(
        'label' => '',
        'desc'  => esc_html__( 'Select image position', 'campaign' ),
        'type'  => 'radio',
        'value' => 'textaligncenter',
        'choices' => array(
            'textalignleft' => esc_html__('Left', 'campaign'),
            'textaligncenter' => esc_html__('Center', 'campaign'),
            'textalignright' => esc_html__('Right', 'campaign'),
        ),
    ),
    'open_img' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'icon-box-img' => array(
                'label' => esc_html__( 'On Click', 'campaign' ),
                'desc'  =>  esc_html__( 'What happens when you click the image?', 'campaign' ),
                'type'  => 'radio',
                'value' => 'nothing',
                'choices' => array(
                    'nothing' => esc_html__( 'Nothing happens', 'campaign' ),
                    'popup' => esc_html__( 'Open in pop-up', 'campaign' ),
                    'link' => esc_html__( 'Open custom Link', 'campaign' )
                ),
            ),
        ),
        'choices' => array(
            'popup' => array(
                'image_popup' => array(
                    'type'  => 'multi-picker',
                    'label' => false,
                    'desc'  => false,
                    'picker' => array(
                        'icon-box-img' => array(
                            'label' => '',
                            'desc'  => '',
                            'type'  => 'radio',
                            'value' => 'img',
                            'choices' => array(
                                'img' => esc_html__( 'Original image', 'campaign' ),
                                'tb-single-image-icon' => esc_html__( 'Video', 'campaign' )
                            ),
                        ),
                    ),
                    'choices' => array(
                        'tb-single-image-icon' => array(
                            'upload_video' => array(
                                'label' => '',
                                'desc'  => esc_html__('Enter Youtube or Vimeo video URL', 'campaign'),
                                'type'  => 'text',
                            ),
                        ),
                    )
                )
            ),
            'link' => array(
                'custom_link' => array(
                    'label' => '',
                    'desc'  => esc_html__('Enter your custom URL link', 'campaign'),
                    'type'  => 'text'
                ),
                'open' => array(
                    'type'  => 'switch',
                    'value' => '',
                    'label' => '',
                    'desc'  => esc_html__('Open link in new window', 'campaign'),
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
        )
    ),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),


);