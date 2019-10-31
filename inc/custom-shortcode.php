<?php
add_shortcode( 'star_rating', 'star_rating' );
function star_rating( $atts ) {
	$atts = shortcode_atts(
      array(
        'rating' => get_field('star_rating')
      ), 
    $atts, 'star_rating' );
    $rating = $atts['rating'];

    $rating_round = round($rating * 2) / 2;

    if ($rating_round <= 0.5 && $rating_round > 0) {
        return '<i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }

    if ($rating_round <= 1 && $rating_round > 0.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }

    if ($rating_round <= 1.5 && $rating_round > 1) {
        return '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }

    if ($rating_round <= 2 && $rating_round > 1.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }

    if ($rating_round <= 2.5 && $rating_round > 2) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }

    if ($rating_round <= 3 && $rating_round > 2.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 3.5 && $rating_round > 3) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 4 && $rating_round > 3.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 4.5 && $rating_round > 4) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>';
    }
    if ($rating_round <= 5 && $rating_round > 4.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    }
    
}

add_shortcode( 'custom_btn', 'custom_btn' );
function custom_btn( $atts ) {
	$atts = shortcode_atts(
      array(
        'url' => 'tel:8668721888',
        'label' => 'Call to get tested today'
      ), 
    $atts, 'custom_btn' );
    $url = $atts['url'];
    $label = $atts['label'];
    ob_start();
    	echo '<a href="'.$url.'" class="custom-btn">'.$label.'</a>';
    return ob_get_clean();
}

add_shortcode( 'zip_search', 'zip_search' );
function zip_search( $atts ) {
    ob_start();
        ?>
        <form action="/find-a-lab/" method="get" class="zip-search-form">
            <input type="text" name="zip_search" placeholder="Enter Your Zip Code">
            <input type="submit" value="Search">
        </form>
        <?php
    return ob_get_clean();
}

?>