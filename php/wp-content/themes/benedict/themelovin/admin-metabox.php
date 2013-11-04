<?php
	
function glg_add_meta_box($meta_box) {
    if(!is_array($meta_box)) return false;
    
    // Create a callback function
    $callback = create_function('$post, $meta_box', 'glg_create_meta_box( $post, $meta_box["args"] );');
	
	foreach ($meta_box['pages'] as $page) {
    	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $page, $meta_box['context'], $meta_box['priority'], $meta_box );
	}
}

function glg_create_meta_box($post, $meta_box) {
	if(!is_array($meta_box)) return false;
	
	//Add box description
	if(isset($meta_box['description']) && $meta_box['description'] != ''){
    	echo '<p>'. $meta_box['description'] .'</p>';
    }
    
    wp_nonce_field( basename(__FILE__), 'glg_meta_box_nonce' );
    echo '<table class="form-table glg-metabox-table">';
    
    foreach($meta_box['fields'] as $field){
    	$meta = get_post_meta($post->ID, $field['id'], true);
    	
    	echo '<tr><th><label for="'. $field['id'] .'"><strong>'. $field['name'] .'</strong>';
		if(isset($field['desc'])) {	  
			echo '<span>'. $field['desc'] .'</span></label></th>';
		}
			  
		switch( $field['type'] ){	
			case 'text':
				echo '<td><input type="text" name="glg_meta['. $field['id'] .']" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['std']) .'" size="30" /></td>';
			break;	
				
			case 'textarea':
				echo '<td><textarea name="glg_meta['. $field['id'] .']" id="'. $field['id'] .'">'. ($meta ? $meta : $field['std']) .'</textarea></td>';
			break;
			
			case 'file':
				echo '<td><input type="text" name="glg_meta['. $field['id'] .']" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['std']) .'" size="30" class="file" /> <input type="button" class="button" name="'. $field['id'] .'_button" id="'. $field['id'] .'_button" value="Upload" /></td>';
			break;
				
			case 'select':
				echo'<td><select name="glg_meta['. $field['id'] .']" id="'. $field['id'] .'">';
				foreach( $field['options'] as $option ){
					echo'<option';
					if( $meta ){ 
						if( $meta == $option ) echo ' selected="selected"'; 
					} else {
						if( $field['std'] == $option ) echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				}
				echo'</select></td>';
			break;
				
			case 'radio':
				echo '<td>';
				foreach( $field['options'] as $option ){
					if(isset($option['id']))
					echo '<input type="radio" name="glg_meta['. $field['id'] .']" value="'. $option['value']. '" id="'.$option['id'].'"';
					else
					echo '<input type="radio" name="glg_meta['. $field['id'] .']" value="'. $option['value']. '"';					
					if($meta) {
						if($meta == $option['value']) echo ' checked="checked"';
					}
					else {
						if($field['std'] == $option['value']) echo ' checked="checked"';
					}
					 echo ' />&nbsp;', $option['name'].'&nbsp;&nbsp;';
				
				}
				echo '</td>';
			break;
				
			case 'checkbox':
			    echo '<td>';
			    $val = '';
                if( $meta ) {
                    if( $meta == 'on' ) $val = ' checked="yes"';
                } else {
                    if( $field['std'] == 'on' ) $val = ' checked="yes"';
                }

                echo '<input type="hidden" name="glg_meta['. $field['id'] .']" value="off" />
                <input type="checkbox" id="'. $field['id'] .'" name="glg_meta['. $field['id'] .']" value="on"'. $val .' /> ';
			    echo '</td>';
			break;
		}
		
		echo '</tr>';
	}
 
	echo '</table>';
}

function glg_save_meta_box($post_id) {
	//check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
		return;
		
	//verify nonce	
	if (!isset($_POST['glg_meta']) || !isset($_POST['glg_meta_box_nonce']) || !wp_verify_nonce($_POST['glg_meta_box_nonce'], basename( __FILE__ )))
		return;
		
	//check user permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) return;
	} else {
		if (!current_user_can('edit_post', $post_id)) return;
	}
	
	foreach($_POST['glg_meta'] as $key=>$val){
		update_post_meta($post_id, $key, stripslashes(htmlspecialchars($val)));
	}
}
add_action('save_post', 'glg_save_meta_box');

/*-----------------------------------------------------------------------------------*/
/*	Register related Scripts and Styles
/*-----------------------------------------------------------------------------------*/

function glg_metabox_portfolio_scripts() {
	wp_enqueue_media();
	wp_register_script('glg-upload', GLG_URL .'/include/upload-button.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('glg-upload');
}

add_action('admin_enqueue_scripts', 'glg_metabox_portfolio_scripts');

?>