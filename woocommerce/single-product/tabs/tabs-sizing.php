
<?php 
    $default_sizing_guide = get_field( 'sizing_guide', 'option' );
    $selected_size_guide = get_field('predefined_size_guide');

    $size_guide = get_field( 'size_guide' );
    $default_size_guide = '';
    
    if($selected_size_guide) :
        $selected_size_guide_array = explode('-', $selected_size_guide);
        $row_number = $selected_size_guide_array[1];

        if(!empty($default_sizing_guide) && $default_sizing_guide[$row_number]) {
            $default_size_guide = $default_sizing_guide[$row_number]['size_guide'];
        }       
    endif;

    if(!$size_guide) {
        $size_guide = $default_size_guide;
    }

    echo $size_guide;
?>