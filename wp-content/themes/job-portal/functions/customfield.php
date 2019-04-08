<?php 
add_action('add_meta_boxes', 'register_meta_box');
add_action('save_post', 'save_meta_box');

function register_meta_box(){
 add_meta_box( 'link', __( 'Link', 'Link' ), 'link_display_callback', array('slider','work') );
 add_meta_box( 'designation', __( 'Designation', 'Designation' ), 'designation_display_callback', array('team') );
  add_meta_box( 'facebooklink', __( 'Facebook link', 'Facebook link' ), 'facebooklink_display_callback', array('team') );
  add_meta_box( 'twitterlink', __( 'Twitter link', 'Twitter link' ), 'twitterlink_display_callback', array('team') );
  add_meta_box( 'googlepluslink', __( 'Googleplus link', 'Googleplus link' ), 'googlepluslink_display_callback', array('team') );
 add_meta_box( 'country', __( 'Country', 'Country' ), 'country_display_callback', 'testimonial' );

//add_meta_box( 'facts', __( 'Facts', 'Facts' ), 'facts_display_callback', 'page' );


$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
if ($post_id == '21')
{
   //adding welcome message customfield for about page
   add_meta_box(
                'About-content', // $id
                'About Page Content', // $title
                'about_page_content_callback', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority



}

if ($post_id == '14')
{
   //adding welcome message customfield for about page
   add_meta_box(
                'trip-overview', // $id
                'Trip Overview', // $title
                'trip_overview_content_callback', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority


   add_meta_box("itenary", "Itenary", "build_itenary", "page", "normal", "high");

   add_meta_box("trip-info", "Trip Info", "trip_info_callback", "page", "normal", "high");

   add_meta_box("what-included", "What Included", "what_included_callback", "page", "normal", "high");
    add_meta_box("what-excluded", "What Excluded", "what_excluded_callback", "page", "normal", "high");
    add_meta_box("trip-facts", "Trip Facts", "trip_facts_callback", "page", "normal", "high");



}
    }


     function link_display_callback( $post ) 
    {

        $link = get_post_meta( $post->ID, 'link', true );

        $outline = '';

        $outline .= '<label for="link">'. __('Link', 'wp') .'</label>';
        $outline .= '<input type="text" name="link" id="link" value="'. esc_attr($link) .'" />';
     
        echo $outline;

    }

     function designation_display_callback( $post ) 
    {

        $designation = get_post_meta( $post->ID, 'designation', true );

        $outline = '';

        $outline .= '<label for="designation">'. __('Designation', 'wp') .'</label>';
        $outline .= '<input type="text" name="designation" id="designation" value="'. esc_attr($designation) .'" />';
     
        echo $outline;

    }

    function facebooklink_display_callback( $post ) 
    {

        $facebooklink = get_post_meta( $post->ID, 'facebooklink', true );

        $outline = '';

        $outline .= '<label for="facebooklink">'. __('Facebook Link', 'wp') .'</label>';
        $outline .= '<input type="text" name="facebooklink" id="facebooklink" value="'. esc_attr($facebooklink) .'" />';
     
        echo $outline;

    }

    function twitterlink_display_callback( $post ) 
    {

        $twitterlink = get_post_meta( $post->ID, 'twitterlink', true );

        $outline = '';

        $outline .= '<label for="twitterlink">'. __('Twitter Link', 'wp') .'</label>';
        $outline .= '<input type="text" name="twitterlink" id="twitterlink" value="'. esc_attr($twitterlink) .'" />';
     
        echo $outline;

    }

    function googlepluslink_display_callback( $post ) 
    {

        $googlepluslink = get_post_meta( $post->ID, 'googlepluslink', true );

        $outline = '';

        $outline .= '<label for="googlepluslink">'. __('Googleplus Link', 'wp') .'</label>';
        $outline .= '<input type="text" name="googlepluslink" id="googlepluslink" value="'. esc_attr($googlepluslink) .'" />';
     
        echo $outline;

    }




    function country_display_callback( $post ) 
    {

        $country = get_post_meta( $post->ID, 'country', true );

        $outline = '';

        $outline .= '<label for="country">'. __('Country', 'wp') .'</label>';
        $outline .= '<input type="text" name="country" id="country" value="'. esc_attr($country) .'" />';
     
        echo $outline;

    }

    function about_page_content_callback($post) 
    {
        $about = htmlspecialchars_decode(get_post_meta( $post->ID, 'about', true ));
        wp_editor($about, 'txtabout', $settings = array('textarea_name'=>'txtabout')); 
    }

    //where txtfacts is id and txtfacts is text area name in tinymce editor


    function trip_overview_content_callback( $post ) 
    {

        $overview = get_post_meta( $post->ID, 'overview', true );

        $outline = '';
        $outline .= '<textarea name="overview" rows="8" cols="80">'.esc_attr($overview).'</textarea>';
     
        echo $outline;

    }

    function build_itenary( $post )  {
    
    $itenary = get_post_meta( $post->ID, 'itenary', true );

        $outline = '';
        $outline .= '<textarea name="itenary" rows="16" cols="100">'.esc_attr($itenary).'</textarea>';
     
        echo $outline;
}

 function trip_info_callback( $post ) 
    {

        $tripinfo = get_post_meta( $post->ID, 'tripinfo', true );

        $outline = '';
        $outline .= '<textarea name="tripinfo" rows="8" cols="80">'.esc_attr($tripinfo).'</textarea>';
     
        echo $outline;

    }

function what_included_callback( $post ) 
    {

        $included = get_post_meta( $post->ID, 'included', true );

        $outline = '';
        $outline .= '<textarea name="included" rows="8" cols="80">'.esc_attr($included).'</textarea>';
     
        echo $outline;

    }

function what_excluded_callback( $post ) 
    {

        $excluded = get_post_meta( $post->ID, 'excluded', true );

        $outline = '';
        $outline .= '<textarea name="excluded" rows="8" cols="80">'.esc_attr($excluded).'</textarea>';
     
        echo $outline;

    }

    function trip_facts_callback( $post ) 
    {

        $tripcountry = get_post_meta( $post->ID, 'tripcountry', true );

        $tripdestination = get_post_meta( $post->ID, 'tripdestination', true );

        $tripduration= get_post_meta( $post->ID, 'tripduration', true );

        $tripactivity= get_post_meta( $post->ID, 'tripactivity', true );

        $tripgrade= get_post_meta( $post->ID, 'tripgrade', true );

        $tripgrademore= get_post_meta( $post->ID, 'tripgrademore', true );

        $bestseason= get_post_meta( $post->ID, 'bestseason', true );

        $groupsize= get_post_meta( $post->ID, 'groupsize', true );

        $altitude= get_post_meta( $post->ID, 'altitude', true );

        $startend= get_post_meta( $post->ID, 'startend', true );

        $accommodation= get_post_meta( $post->ID, 'accommodation', true );

        $meal= get_post_meta( $post->ID, 'meal', true );

        $transportation= get_post_meta( $post->ID, 'transportation', true );


        $outline = '';

        $outline .= '<label for="tripcountry">'. __('Country', 'wp') .'</label>';

        $outline .= '<input type="text" name="tripcountry" id="tripcountry" value="'. esc_attr($tripcountry) .'" /> <br/><br/>';
       


        $outline .= '<label for="tripdestination">'. __('Destination', 'wp') .'</label>';

        $outline .= '<input type="text" name="tripdestination" id="tripdestination" value="'. esc_attr($tripdestination) .'" /><br/><br/>';


        $outline .= '<label for="tripduration">'. __('Duration', 'wp') .'</label>';

        $outline .= '<input type="text" name="tripduration" id="tripduration" value="'. esc_attr($tripduration) .'" /><br/><br/>';


        $outline .= '<label for="tripactivity">'. __('Activities', 'wp') .'</label>';

        $outline .= '<input type="text" name="tripactivity" id="tripactivity" value="'. esc_attr($tripactivity) .'" /><br/><br/>';

        $outline .= '<label for="tripgrade">'. __('Grade', 'wp') .'</label>';

        $outline .= '<input type="text" name="tripgrade" id="tripgrade" value="'. esc_attr($tripgrade) .'" /><br/><br/>';


        $outline .= '<label for="tripgrademore">'. __('Grade Information', 'wp') .'</label>';

        $outline .= '<textarea name="tripgrademore" rows="8" cols="80">'.esc_attr($tripgrademore).'</textarea><br/><br/>';


         $outline .= '<label for="bestseason">'. __('Best Season', 'wp') .'</label>';

        $outline .= '<input type="text" name="bestseason" id="bestseason" value="'. esc_attr($bestseason) .'" /><br/><br/>';

         $outline .= '<label for="groupsize">'. __('Group Size', 'wp') .'</label>';

        $outline .= '<input type="text" name="groupsize" id="groupsize" value="'. esc_attr($groupsize) .'" /><br/><br/>';

        $outline .= '<label for="altitude">'. __('Altitude', 'wp') .'</label>';

        $outline .= '<input type="text" name="altitude" id="altitude" value="'. esc_attr($altitude) .'" /><br/><br/>';


        $outline .= '<label for="startend">'. __('Starts/Ends', 'wp') .'</label>';

        $outline .= '<input type="text" name="startend" id="startend" value="'. esc_attr($startend) .'" /><br/><br/>';


        $outline .= '<label for="accommodation">'. __('Accommodation', 'wp') .'</label>';

        $outline .= '<textarea name="accommodation" rows="8" cols="80">'.esc_attr($accommodation).'</textarea><br/><br/>';

        $outline .= '<label for="meal">'. __('Meals included', 'wp') .'</label>';

        $outline .= '<textarea name="meal" rows="8" cols="80">'.esc_attr($meal).'</textarea><br/><br/>';

         $outline .= '<label for="transportation">'. __('Transportation', 'wp') .'</label>';

        $outline .= '<textarea name="transportation" rows="8" cols="80">'.esc_attr($transportation).'</textarea><br/><br/>';
       
     
        echo $outline;

    }



  
    function save_meta_box( $post_id)
    {

        $link   = isset( $_POST['link'] ) ? $_POST['link'] : '';
        update_post_meta($post_id,'link',$link);

        $designation   = isset( $_POST['designation'] ) ? $_POST['designation'] : '';
        update_post_meta($post_id,'designation',$designation);

        $facebooklink   = isset( $_POST['facebooklink'] ) ? $_POST['facebooklink'] : '';
        update_post_meta($post_id,'facebooklink',$facebooklink);

        $googlepluslink   = isset( $_POST['googlepluslink'] ) ? $_POST['googlepluslink'] : '';
        update_post_meta($post_id,'googlepluslink',$googlepluslink);

        $twitterlink   = isset( $_POST['twitterlink'] ) ? $_POST['twitterlink'] : '';
        update_post_meta($post_id,'twitterlink',$twitterlink);

         $about   = isset( $_POST['txtabout'] ) ? $_POST['txtabout'] : '';
        update_post_meta($post_id,'about',$about);

         $country   = isset( $_POST['country'] ) ? $_POST['country'] : '';
        update_post_meta($post_id,'country',$country);

         $itenary   = isset( $_POST['itenary'] ) ? $_POST['itenary'] : '';
        update_post_meta($post_id,'itenary',$itenary);

        $overview   = isset( $_POST['overview'] ) ? $_POST['overview'] : '';
        update_post_meta($post_id,'overview',$overview);

        $tripinfo   = isset( $_POST['tripinfo'] ) ? $_POST['tripinfo'] : '';
        update_post_meta($post_id,'tripinfo',$tripinfo);

        $included   = isset( $_POST['included'] ) ? $_POST['included'] : '';
        update_post_meta($post_id,'included',$included);

        $excluded   = isset( $_POST['excluded'] ) ? $_POST['excluded'] : '';
        update_post_meta($post_id,'excluded',$excluded);

        $trip_country  = isset( $_POST['tripcountry'] ) ? $_POST['tripcountry'] : '';
        update_post_meta($post_id,'tripcountry',$trip_country);

        $tripdestination  = isset( $_POST['tripdestination'] ) ? $_POST['tripdestination'] : '';
        update_post_meta($post_id,'tripdestination',$tripdestination);

        $tripduration  = isset( $_POST['tripduration'] ) ? $_POST['tripduration'] : '';
        update_post_meta($post_id,'tripduration',$tripduration);

        $tripactivity  = isset( $_POST['tripactivity'] ) ? $_POST['tripactivity'] : '';
        update_post_meta($post_id,'tripactivity',$tripactivity);

         $tripgrade  = isset( $_POST['tripgrade'] ) ? $_POST['tripgrade'] : '';
        update_post_meta($post_id,'tripgrade',$tripgrade);

         $tripgrademore  = isset( $_POST['tripgrademore'] ) ? $_POST['tripgrademore'] : '';
        update_post_meta($post_id,'tripgrademore',$tripgrademore);

         $bestseason  = isset( $_POST['bestseason'] ) ? $_POST['bestseason'] : '';
        update_post_meta($post_id,'bestseason',$bestseason);

        $groupsize  = isset( $_POST['groupsize'] ) ? $_POST['groupsize'] : '';
        update_post_meta($post_id,'groupsize',$groupsize);

        $altitude  = isset( $_POST['altitude'] ) ? $_POST['altitude'] : '';
        update_post_meta($post_id,'altitude',$altitude);

        $startend  = isset( $_POST['startend'] ) ? $_POST['startend'] : '';
        update_post_meta($post_id,'startend',$startend);

        $accommodation  = isset( $_POST['accommodation'] ) ? $_POST['accommodation'] : '';
        update_post_meta($post_id,'accommodation',$accommodation);

        $transportation  = isset( $_POST['transportation'] ) ? $_POST['transportation'] : '';
        update_post_meta($post_id,'transportation',$transportation);


    }