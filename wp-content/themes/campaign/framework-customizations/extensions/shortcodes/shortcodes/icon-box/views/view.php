<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$title = $atts['box_title'];
$heading_type = $atts['heading_type'];
$subtitle = $atts['box_subtitle'];
$subheading_type = $atts['subheading_type'];
$desc = $atts['box_desc'];

$i_color = $i_class = $extra_class = $image_holder_class = $icon_bg = $icon_bg_color = '';


$icon_type_picker = $atts['icon_type_picker']['icon-box-type']; // above or inline

$icon_position = $icon_type_picker == 'inline' ? $atts['icon_type_picker']['inline']['icon-position'] : '' ; // alignleft or alignright
$icon_type = $atts['icon_type']; // icon-class (FA) or upload-icon (custom image)
$icon_img_class = $icon_type['icon-box-img'] == 'icon-class' ? '' : 'iconbox-image-type';
$icon_img_type = isset($icon_type['icon-box-img']) ? $icon_type['icon-box-img'] : 'iconbox-image-type'; 

if ($icon_type_picker == 'inline') {
    $extra_class .= ' absolutecenter-top ';
    $image_holder_class = $icon_position;
}

$extra_class .= ' ' . $atts['box_alignment'];

if(($icon_img_class == 'iconbox-image-type')){
    $icon_bg_circle = $icon_type['upload-icon']['rounded']; // icon-rounded or icon-circle
    $icon_bg_color = ' background: none !important; ';
}
else{
    $icon_bg = $icon_type['icon-class']['icon-bg-type']['icon-box-img'];
    $icon_bg_circle = $icon_type['icon-class']['icon-bg-type']['icon-box-img'];
    $icon_bg_color = isset($icon_type['icon-class']['icon-bg-type'][$icon_bg_circle]) ? $icon_type['icon-class']['icon-bg-type'][$icon_bg_circle]['bg-color'] : '';
    if (!empty($icon_bg_color)) {
        $icon_bg_color = "background: $icon_bg_color;";
    }
}

$title_link = $atts['link'];
$title_target = $atts['target'];

$full_link = $atts['full_link'];

$animationClass = $animationDelay = '';

if (isset($atts['animation_effect']) && !empty($atts['animation_effect']) && $atts['animation_effect'] != 'none') {
    $animationClass = ' tbWow ' . $atts['animation_effect'] . ' ';

    if (isset($atts['animation_delay']) && !empty($atts['animation_delay']) && $atts['animation_delay'] != '0') {
        $animationDelay = $atts['animation_delay'];
    }
}

?>

<div class="<?php echo "link-type-$full_link"; ?> tb-icon-box <?php echo esc_attr($extra_class) . ' ' . esc_attr($atts['class']); ?>  <?php echo esc_attr($animationClass); ?>" <?php if ($animationDelay) { echo ' data-wow-delay="' . esc_attr($animationDelay) . '"'; } ?> >
    <?php
    if (!empty($title_link) && $full_link == 'absolute100' ) {
    ?>
    <a class="absolute100" href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>"><?php echo esc_html__('Read More', 'campaign'); ?></a>
    <?php
    }
    ?>
    <?php if ($icon_img_type != 'skip' && ( $icon_type_picker == 'above' || ($icon_type_picker == 'inline' && $icon_position == 'alignleft') )) : ?>
        <div class="tb-icon-box-image <?php echo esc_attr($icon_img_class . ' ' . $icon_bg_circle . ' ' . $image_holder_class); ?>" style="<?php echo esc_attr($icon_bg_color); ?>">
            <?php if($icon_img_class == 'iconbox-image-type'):?>
                <?php if(!empty($icon_type['upload-icon']['upload-custom-img'])):?>
                    <?php if (!empty($title_link)) : ?>
                    <a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>">
                    <?php endif; ?>
                    <img src="<?php echo esc_url($icon_type['upload-icon']['upload-custom-img']['url']); ?>" class="<?php echo esc_attr($icon_bg_circle); ?>" alt=""/>
                    <?php if (!empty($title_link)) : ?>
                    </a>
                    <?php endif; ?>
                <?php endif;?>

            <?php else:


            if (!empty($icon_type['icon-class']['icon-color'])){
                $i_color = 'color:'.$icon_type['icon-class']['icon-color'];
            }

            ?>
                <?php if (!empty($title_link)) : ?>
                <a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>">
                <?php endif; ?>
                <i class="<?php echo esc_attr($icon_type['icon-class']['icon_class']); echo esc_attr($i_class); ?>" style="<?php echo esc_attr($i_color); ?>"></i>
                <?php if (!empty($title_link)) : ?>
                </a>
                <?php endif; ?>
            <?php endif;?>
        </div>

    <?php endif; ?>
    <div class="tb-icon-box-description">

        <?php if (!empty($title)) : ?>
            <<?php echo esc_attr($heading_type); ?>>
            <?php if (!empty($title_link)) : ?>
            <a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>">
            <?php endif; ?>
            <?php echo esc_attr($title); ?>
            <?php if (!empty($title_link)) : ?>
            </a>
            <?php endif; ?>
            </<?php echo esc_attr($heading_type); ?>>
        <?php endif; ?>
        <?php if (!empty($subtitle)) : ?>
            <<?php echo esc_attr($subheading_type); ?>>
            <?php if (!empty($title_link)) : ?>
            <a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>">
            <?php endif; ?>
            <?php echo esc_attr($subtitle); ?>
            <?php if (!empty($title_link)) : ?>
            </a>
            <?php endif; ?>
            </<?php echo esc_attr($subheading_type); ?>>
        <?php endif; ?>

        <?php if(!empty($desc)):?>
            <div class="tb-icon-box-text">
                <?php echo apply_filters('the_content', $desc ); ?>
            </div>
        <?php endif;?>

        <?php
        $btn = $atts['icon_box_btn'];
        if($btn['show_btn'] == 'yes'):?>
            <div class="iconbox-btn <?php echo esc_attr($btn['yes']['btn_alignment']); ?>">
                <a href="<?php echo esc_url($btn['yes']['link']); ?>"
                    target="<?php echo esc_attr($btn['yes']['target']); ?>"
                    class="btn <?php echo esc_attr($btn['yes']['btn_size']); ?> <?php echo esc_attr($btn['yes']['btn_style']); ?>">
                    <span><?php echo esc_attr($btn['yes']['label']); ?></span>
                </a>
            </div>
        <?php endif;?>

    </div>
    <?php if ($icon_img_type != 'skip' && $icon_type_picker == 'inline' && $icon_position == 'alignright') : ?>
        <div class="tb-icon-box-image <?php echo esc_attr($icon_bg_circle . ' ' . $image_holder_class); ?>" style="<?php echo esc_attr($icon_bg_color); ?>">
            <?php if($icon_img_class == 'iconbox-image-type'):?>
                <?php if(!empty($icon_type['upload-icon']['upload-custom-img'])):?>
                    <?php if (!empty($title_link)) : ?>
                    <a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>">
                    <?php endif; ?>
                    <img src="<?php echo esc_url($icon_type['upload-icon']['upload-custom-img']['url']); ?>" class="<?php echo esc_attr($icon_bg_circle); ?>" alt=""/>
                    <?php if (!empty($title_link)) : ?>
                    </a>
                    <?php endif; ?>
                <?php endif;?>

            <?php else:


            if (!empty($icon_type['icon-class']['icon-color'])){
                $i_color = 'color:'.$icon_type['icon-class']['icon-color'];
            }

            ?>
                <?php if (!empty($title_link)) : ?>
                <a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>">
                <?php endif; ?>
                <i class="<?php echo esc_attr($icon_type['icon-class']['icon_class']); echo esc_attr($i_class); ?>" style="<?php echo esc_attr($i_color); ?>"></i>
                <?php if (!empty($title_link)) : ?>
                </a>
                <?php endif; ?>
            <?php endif;?>
        </div>
    <?php endif; ?>
</div>