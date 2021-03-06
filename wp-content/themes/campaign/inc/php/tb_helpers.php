<?php

/**
Check value

@param var $val Variable that should be checked
@param string $index Specific index if $val is array. NULL otherwise
@param int $notempty If $notempty is 1, we will also check if $val is empty

 @return mixed|null
**/
if (!function_exists('tb_check_val')) :
	function tb_check_val($val, $index = NULL, $notempty = 1) {
		$return = false;
		$temp = '';

		if (!isset($val)) {
			return false;
		}

		if ($index && isset($val[$index])) {
			$temp = $val[$index];
			$return = true;
		}

		if (!$index && isset($val)) {
			$temp = $val;
			$return = true;
		}

		if ($notempty = 1 && empty($temp)) {
			$return = false;
		}

		return $return;

	}
endif; // tb_check_val



/**
Return default value if expected one is not set
@param $value - expected value.
@param $default - default value.
**/
if (!function_exists('tb_default')) :
function tb_default($value, $default) {
	if (isset($value)) {
		return $value;
	} else {
		return $default;
	}
}
endif;

/**
Return default value if expected element of an array is not set
@param $value - array name.
@param $key - key of an expected element of array
@param $default - default value.
**/
if (!function_exists('tb_default_array')) :
function tb_default_array($value, $key, $default) {
	if (isset($value[$key])) {
		return $value[$key];
	} else {
		return $default;
	}
}
endif;

/**
INCLUDE/USE FILES - include all (or specific extension) files from a folder
@param $folder - folder which contains desirable files
@param $extension - include only files of the appropriate file extension
**/
if (!function_exists('tb_include_files')) :
function tb_include_files($folder, $extension = 'php') {

	$folder = PARENT_DIR . $folder;
	
	if ($handle = opendir($folder)) {
		while (false !== ($file = readdir($handle))) {
			if ($extension != 'all') {
				if (strpos($file, $extension)) {
					$includeFile = $folder . $file;
					include $includeFile;
				}
			} else {
				$includeFile = $folder . $file;
				include $includeFile;
			}
		}
	
		closedir($handle);
		
		return TRUE;
	} else {
		return FALSE;
	}
}
endif;

/**
INCLUDE/USE FILES - use files from a folder
@param $folder - folder which contains desirable files

Returns an array [file name] => [file url]
**/
if (!function_exists('tb_use_files')) :
function tb_use_files($folder) {

	$folderURL = PARENT_URL . $folder;
	$folder = PARENT_DIR . $folder;
	

	if ($handle = opendir($folder)) {
		$tb_return = array();
	
		while (false !== ($file = readdir($handle))) {
			if (($file == ".") || ($file == "..")) continue;
		
			$fileNiceName = ucwords(str_replace(array('_', '-'), '-', substr($file, 0, strlen($file) - 4)));
			$fileName = substr($file, 0, strlen($file) - 4);
			$tb_return[] = array('alt' => $fileName, 'img' => $folderURL . $file);
		}
	
		closedir($handle);
		
		return $tb_return;
	} else {
		return FALSE;
	}
}
endif;

/**
POSTS/TAXONOMIES - returns taxonomy
@param $taxonomy - custom taxonomies can be used as well if defined. Categories otherwise.
**/

// get taxonomies
if (!function_exists('tb_taxonomy')) :
function tb_taxonomy($taxonomy = 'category', $zero = 0) {
	
	if (!taxonomy_exists($taxonomy)) {
		$taxonomy = 'category';
	}
	
	$help = array();
	
	$help = get_terms($taxonomy, array('orderby' => 'name', 'fields' => 'id=>name', 'hide_empty' => 0));

	if ($zero) {
		if ($zero == 1) {
			$help[0] = __('Choose one', 'themeblossom');
		} else {
			$help[0] = $zero;
		}
		
	}
	
	return $help;
}
endif;

/**
CUSTOM POST TYPE - get cpt
@param $type - default is post
@param $zero - prepend an string - used in dropdowns
Returns an array [post id] => [post title]
**/
if (!function_exists('tb_get_posts')) :
	function tb_get_posts($type = 'post', $zero = 0) {
		$args = array();
		$args['posts_per_page'] = -1;
		$args['post_type'] = $type;
		$args['orderby'] = 'title';
		$args['order'] = 'ASC';

		$query = new WP_Query($args);

		$return = array();

		if ($zero) {
			if ($zero == 1) {
				$return[0] = __('Choose one', 'themeblossom');
			} else {
				$return[0] = $zero;
			}
			
		}

		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			$return[get_the_id()] = get_the_title();
		endwhile; endif;

		wp_reset_postdata();

		return $return;
	}
endif;

if (!function_exists('themeblossom_get_posts_admin')) :
	function themeblossom_get_posts_admin($type = 'post', $zero = 0) {
		$args = array();
		$args['posts_per_page'] = -1;
		$args['post_type'] = $type;
		$args['orderby'] = 'title';
		$args['order'] = 'ASC';

		$return = array();

		if ($zero) {
			if ($zero == 1) {
				$return[0] = __('Choose one', 'themeblossom');
			} else {
				$return[0] = $zero;
			}
			
		}

		$get_posts = get_posts($args);

		foreach ($get_posts as $post) {
			$return[$post->ID] = $post->post_title;	
		}

		wp_reset_postdata();

		return $return;
	}
endif;

/**
Returns related posts query
@param $post_id
@param $number - number of posts to be shown
**/
if (!function_exists('tb_related_posts')) :
function tb_related_posts($post_id, $number = 4) {
	$query = new WP_Query();

    $args = '';

	if($number == 0) {
		return $query;
	}

	$default = array(
		'posts_per_page' => $number,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
        //'meta_key' => '_thumbnail_id',
        'category__in' => wp_get_post_categories($post_id)
	);

	$args = wp_parse_args($args, $default);

	$query = new WP_Query($args);

  	return $query;
}
endif;



/**
Returns related custom post type query
@param $post_id
@param $number - number of posts to be shown
@param $type
@param $taxonomy
**/
if (!function_exists('tb_related_cpt')) :
function tb_related_cpt($post_id, $number = 4, $type = 0, $taxonomy = 0) {
    $query = new WP_Query();

    $args = '';

	if($number == 0) {
		return $query;
	}

	if (!$type) {
		$query = tb_related_posts($post_id, $number);
		return $query;
	}

	if ($taxonomy) :
	    $item_cats = get_the_terms($post_id, $taxonomy);
	    if($item_cats):
	    foreach($item_cats as $item_cat) {
	        $item_array[] = $item_cat->term_id;
	    }
	    endif;
    endif;

    $default = array(
        'posts_per_page' => $number,
        'post__not_in' => array($post_id),
        'ignore_sticky_posts' => 0,
        'meta_key' => '_thumbnail_id'
    );

    if ($type) {
    	$default['post_type'] = $type;
    }

    if ($item_cats) {
    	$default['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $item_array
            )
        );
    }

    $args = wp_parse_args($args, $default);

    $query = new WP_Query($args);

    return $query;
}
endif;

/**
OTHER
**/

/**
Max words
@param $string
@param $number - expected number of words

Returns string
**/
if (!function_exists('tb_max_words')) :
function tb_max_words($string, $number) {  
	$text = strip_tags($string);  
	$words = preg_split("/\s+/", $text, $number + 1);  
	if (count($words) > $number) { unset($words[$number]); }  
	$output = join(' ', $words);  
	
	return $output;  
} 
endif;

/**
string explode
@param $string
@param $delimiter - default is minus sign

Returns an array.
**/
if (!function_exists('tb_string_explode')) :
function tb_string_explode($string, $delimiter = '-') {
	$returnArray = explode($delimiter, $string);
	
	return $returnArray;
}
endif;

/**
Generates Title

@param $object - title heading
@param $extra - subheading
@param $showLink
@param $postID
@param $echo - return or echo
**/
if (!function_exists('tb_post_title')) :
function tb_post_title($object = 'h1', $extra = '', $showLink = 1, $postID = NULL, $echo = 1) {
	if (!$postID) {
		$postID = intval( get_the_ID() );
	}
	
	$title = esc_attr(get_the_title($postID));
	$link = esc_url(get_permalink($postID));
	
	$return = '';
	$return .= '<' . $object . ' class="entry-title">';
	
	if ($showLink) {
		$return .= '<a href="' . $link . '" title="' . $title . '">' . $title . '</a>';
	} else {
		$return .= $title;
	}
	
	$return .= "</$object>";
	
	/*
	if ($object == 'h1' && trim($extra)) {
		$return .= '<h2 class="entry-title entry-subtitle">' . $extra . '</h2>';
	}
	*/
	
	if ($echo) {
		echo /* validated */ $return;
	} else {
		return $return;
	}
}
endif;

if ( ! function_exists( 'tb_theme_posted_on' ) ) :
/**
Prints HTML with meta information for the current post-date/time and author.

@param $author - show or hide
**/
function tb_theme_posted_on($author = 'hide') {

	$author = esc_attr($author);

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date(get_option('date_format')) )
	);
	
	if ($author == 'show') {
		printf( __( '<span class="byline"> by %2$s</span> <span class="posted-on">%1$s</span>', 'themeblossom' ),
			sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
				esc_url( get_permalink() ),
				$time_string
			),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span> | ',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);		
	} else {
		printf( __( '<span class="posted-on">%1$s</span>', 'themeblossom' ),
			sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
				esc_url( get_permalink() ),
				$time_string
			)
		);		
	}
}
endif;

/**
Returns post date in the specified date format (or system set as a default value)

@param $type - normal or day/month
*/
if (!function_exists('tb_date_of_post')) {
	function tb_date_of_post($type = 'normal', $postID = NULL) {
		$return = '';
		
		if ($type == 'normal') {
			$return .= get_the_date(get_option('date_format'), $postID);
		} else {
			$return .= get_the_date('j-M');
		}
		
		return $return;
	}
}

if ( ! function_exists('tb_show_date_box')) :
function tb_show_date_box($class = '', $type = 'normal') {

	$postType = get_post_type();

	// DATA VALIDATION
	$type = esc_attr( $type );
	$class = esc_attr( $class );
	// DATA VALIDATION ends

	$return = '<div class="date-box hidden-xs ' . $type . ' ' . $class . '">';

	if ($postType != 'tribe_events') :
	
		if ($type != 'wide') {
			$return .= '<div><span class="day">' . get_the_date('d') . '</span><span class="month">' . get_the_date('M') . '</span></div>';
		} else {
			$return .= '<span class="day">' . get_the_date('d') . '</span><span class="month">' . get_the_date('M') . '</span>';
		}

	else :
	
		if ($type != 'wide') {
			$return .= '<div><span class="day">' . tribe_get_start_date(NULL, false, 'd') . '</span><span class="month">' . tribe_get_start_date(NULL, false, 'M') . '</span></div>';
		} else {
			$return .= '<span class="day">' . tribe_get_start_date(NULL, false, 'd') . '</span><span class="month">' . tribe_get_start_date(NULL, false, 'M') . '</span>';
		}


	endif;

	$return .= '</div>';
	
	return $return;
}
endif;

if (!function_exists('tb_info_line')) :

function tb_info_line($date = 1, $comments = 1, $cats = 1, $author = 1, $separator = ' ', $postID = NULL) {
	$returnArray = array();

	// DATA VALIDATION
	$separator = esc_attr($separator);
	// DATA VALIDATION ends.

	if ($date) {
		$returnArray[] = '<time class="entry-date published"><a href="' . esc_url(get_permalink($postID)) . '">' . tb_date_of_post('normal', $postID) . '</a></time>';
	}
	
	if ($cats) {
		$categories_list = get_the_category_list(', ');
		$returnArray[] = __('In ', 'themeblossom') . $categories_list;
	}
	
	if ($author) {
		$returnArray[] = __('By ', 'themeblossom') . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a>';
	}
	
	$return = implode($separator, $returnArray);
	
	echo '<div class="info-line">' . $return;	

	if ($comments) {
		echo esc_attr($separator);
		comments_popup_link( __( 'Leave a comment', 'themeblossom' ), __( '1 Comment', 'themeblossom' ), __( '% Comments', 'themeblossom' ) );
	}
	
	echo '</div>';
}

endif;

if (!function_exists('tb_comments_popup_link')) :
function tb_comments_popup_link($zero = false, $one = false, $more = false) {
	
}
endif;

if ( ! function_exists('tb_show_author')) {
	function tb_show_author() {
		printf( __( '<span class="byline"> by %1$s</span> ', 'themeblossom' ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span> | ',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);		
		
	}
}

if ( !function_exists('tb_comments') ) :
function tb_comments($comment, $args, $depth) {
	?>
	<li <?php comment_class('tbWow fadeInUp'); ?> id="comment-<?php comment_ID() ?>">

		<div class="the-comment">
			<div class="avatar">
				<?php echo str_replace("class='", "class='img-circle ", get_avatar($comment, 54)); ?>
			</div>

			<div class="comment-box info-line">

				<div class="comment-author meta">
					<strong><?php echo get_comment_author_link() ?></strong>
					<?php printf(__('%1$s at %2$s', 'themeblossom'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('Edit', 'themeblossom'), ' - ','') ?><?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'themeblossom'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => ' - '))) ?>
				</div>

				<div class="comment-text">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php echo __('Your comment is awaiting moderation.', 'themeblossom') ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>

			</div>

		</div>
		
<?php
}
endif;

if ( !function_exists('tb_show_author_thumb')) :
function tb_show_author_thumb($class = '') {
	
	$authorMeta = get_the_author_meta( 'ID' );
	$authorLink = esc_url( get_author_posts_url( $authorMeta ) );
	$avatarImg = get_avatar($authorMeta, '80');
		
	$return = '';
	$return .= '<div class="author-thumbnail hidden-xs ' . $class . '">';
	
	$return .= '<a href="' . $authorLink . '">';
	$return .= $avatarImg;
	$return .= '<span></span>';

	$return .= '</a>';
	
	$return .= '</div>';
	
	return $return;
}
endif;

/**
Adjust brightnes based on provided code

@param $hex - color code ffffff i.e.
$param $step - Steps should be between -255 and 255. Negative = darker, positive = lighter
**/
if (!function_exists('adjustBrightness')) :

function adjustBrightness($hex, $steps) {
    // 
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}

endif;

/**
Retruns array with RGB model generated from color

@param $color - in hex mode
**/
if (!function_exists('tb_hex2rgb')) :

function tb_hex2rgb( $color ) {
        if ( $color[0] == '#' ) {
                $color = substr( $color, 1 );
        }
        if ( strlen( $color ) == 6 ) {
                list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

endif;

/**
Outputs proper rgba

@param $color - in hex mode
@param $opacity - if lte 1 skip, otherwise divide with 100
**/
if (!function_exists('tb_hex2rgb_output')) :

function tb_hex2rgb_output( $color, $opacity ) {
		if ($opacity > 1) {
			$opacity = intval($opacity)/100;
		}

        if ( $color[0] == '#' ) {
                $color = substr( $color, 1 );
        }
        if ( strlen( $color ) == 6 ) {
                list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );

        $rgba = "rgba($r, $g, $b, $opacity)";

        return $rgba;
}

endif;

?>