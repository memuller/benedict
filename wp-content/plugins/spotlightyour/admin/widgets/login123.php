<?php
// =============================== Login Widget ======================================
function widget_register_new_user( $user_login, $user_email ) {
	$errors = new WP_Error();

	$sanitized_user_login = sanitize_user( $user_login );
	$user_email = apply_filters( 'user_registration_email', $user_email );

	// Check the username
	if ( $sanitized_user_login == '' ) {
		$errors->add( 'empty_username', __( '<strong>ERROR</strong>: Please enter a username.' ,'ddb_wp') );
	} elseif ( ! validate_username( $user_login ) ) {
		$errors->add( 'invalid_username', __( '<strong>ERROR</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.' ,'ddb_wp') );
		$sanitized_user_login = '';
	} elseif ( username_exists( $sanitized_user_login ) ) {
		$errors->add( 'username_exists', __( '<strong>ERROR</strong>: This username is already registered, please choose another one.','ddb_wp' ) );
	}

	// Check the e-mail address
	if ( $user_email == '' ) {
		$errors->add( 'empty_email', __( '<strong>ERROR</strong>: Please type your e-mail address.' ,'ddb_wp') );
	} elseif ( ! is_email( $user_email ) ) {
		$errors->add( 'invalid_email', __( '<strong>ERROR</strong>: The email address isn&#8217;t correct.' ,'ddb_wp') );
		$user_email = '';
	} elseif ( email_exists( $user_email ) ) {
		$errors->add( 'email_exists', __( '<strong>ERROR</strong>: This email is already registered, please choose another one.' ,'ddb_wp') );
	}

	do_action( 'register_post', $sanitized_user_login, $user_email, $errors );

	$errors = apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email );

	if ( $errors->get_error_code() )
		return $errors;

	$user_pass = wp_generate_password();
	$user_id = wp_create_user( $sanitized_user_login, $user_pass, $user_email );
	if ( ! $user_id ) {
		$errors->add( 'registerfail', sprintf( __( '<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !' ,'ddb_wp'), get_option( 'admin_email' ) ) );
		return $errors;
	}

	update_user_option( $user_id, 'default_password_nag', true, true ); //Set up the Password change nag.

	wp_new_user_notification( $user_id, $user_pass );
	if($user_id>0)
	{
		$subject = stripslashes(get_option('registration_success_email_subject'));
		$client_message = stripslashes(get_option('registration_success_email_content'));
		if($subject=="" && $client_message=="")
		{
			$client_message = __('[SUBJECT-STR]Registration Email[SUBJECT-END]<p>Dear [#user_name#],</p>
			<p>Your login information:</p>
			<p>Username: [#user_login#]</p>
			<p>Password: [#user_password#]</p>
			<p>You can login from [#site_login_url#] or the URL is : [#site_login_url_link#].</p>
			<p>We hope you enjoy. Thanks!</p>
			<p>[#site_name#]</p>','ddb_wp');
			$filecontent_arr1 = explode('[SUBJECT-STR]',$client_message);
			$filecontent_arr2 = explode('[SUBJECT-END]',$filecontent_arr1[1]);
			$subject = $filecontent_arr2[0];
			if($subject == '')
			{
				$subject = __("Registration Email",'ddb_wp');
			}
			
			$client_message = $filecontent_arr2[1];
		}
		$store_login = sprintf(__('<a href="%s/?dwtype=login">Click Login</a>','ddb_wp'),site_url());
		$store_login_link = site_url().'/?dwtype=login';
		/////////////customer email//////////////
		$search_array = array('[#user_name#]','[#user_login#]','[#user_password#]','[#site_name#]','[#site_login_url#]','[#site_login_url_link#]');
		$replace_array = array($user_login,$user_login,$user_pass,$store_name,$store_login,$store_login_link);
		$client_message = str_replace($search_array,$replace_array,$client_message);	
		DDBWP_sendEmail($fromEmail,$fromEmailName,$user_email,$userName,$subject,$client_message,$extra='');///To clidne email
	}

	return $user_id;
}
function widget_retrieve_password() {
	global $wpdb;

	$errors = new WP_Error();
	if ( empty( $_POST['user_login'] ) && empty( $_POST['user_email'] ) )
		$errors->add('empty_username', __('<strong>ERROR</strong>: Enter a username or e-mail address.','ddb_wp'));

	if ( strpos($_POST['user_login'], '@') ) {
		$user_data = get_user_by_email(trim($_POST['user_login']));
		if ( empty($user_data) )
			$errors->add('invalid_email', __('<strong>ERROR</strong>: There is no user registered with that email address.','ddb_wp'));
	} else {
		$login = trim($_POST['user_login']);
		$user_data = get_userdatabylogin($login);
	}

	do_action('lostpassword_post');

	if ( $errors->get_error_code() )
		return $errors;

	if ( !$user_data ) {
		$errors->add('invalidcombo', __('<strong>ERROR</strong>: Invalid username or e-mail.','ddb_wp'));
		return $errors;
	}

	// redefining user_login ensures we return the right case in the email
	$user_login = $user_data->user_login;
	$user_email = $user_data->user_email;

	do_action('retreive_password', $user_login);  // Misspelled and deprecated
	do_action('retrieve_password', $user_login);

	////////////////////////////////////
	$user_email = $_POST['user_email'];
	$user_login = $_POST['user_login'];
	
	$user = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE user_login like \"$user_login\" or user_email like \"$user_login\"");
	if ( empty( $user ) )
		return new WP_Error('invalid_key', __('Invalid key','ddb_wp'));
		
	$new_pass = wp_generate_password(12,false);

	do_action('password_reset', $user, $new_pass);

	wp_set_password($new_pass, $user->ID);
	update_usermeta($user->ID, 'default_password_nag', true); //Set up the Password change nag.
	$message  = '<p><b>'.__('Your login Information :','ddb_wp').'</b></p>';
	$message  .= '<p>'.sprintf(__('Username: %s','ddb_wp'), $user->user_login) . "</p>";
	$message .= '<p>'.sprintf(__('Password: %s','ddb_wp'), $new_pass) . "</p>";
	$message .= '<p>You can login to : <a href="'.get_option( 'siteurl' ).'/' . "\">Login</a> or the URL is :  ".get_option( 'siteurl' )."/?dwtype=login</p>";
	$message .= '<p>Thank You,<br> '.get_option('blogname').'</p>';
	$user_email = $user_data->user_email;
	$user_name = $user_data->user_nicename;
	$fromEmail = get_site_emailId();
	$fromEmailName = get_site_emailName();
	$title = sprintf(__('[%s] Your new password','ddb_wp'), get_option('blogname'));
	$title = apply_filters('password_reset_title', $title);
	$message = apply_filters('password_reset_message', $message, $new_pass);
	DDBWP_sendEmail($fromEmail,$fromEmailName,$user_email,$user_name,$title,$message,$extra='');///forgot password email
	return true;
}

if($_REQUEST['widgetdwtype'] == 'login')
{
	$secure_cookie = '';

	if ( !empty($_POST['log']) && !force_ssl_admin() ) {
	
		$user_name = sanitize_user($_POST['log']);
		if ( $user = get_userdatabylogin($user_name) ) {

			if ( get_user_option('use_ssl', $user->ID) ) {
			
				$secure_cookie = true;
				force_ssl_admin(true);
			}
			
			if($_REQUEST['redirect_to'] !="")
			{
					$redirect_to = site_url()."/?dwtype=".$_REQUEST['redirect_to'];
			}else{

				$errors = new WP_Error();
			}
				$redirect_to = apply_filters('DDBWP_login_redirect_filter',$redirect_to);
				wp_redirect($redirect_to);
				exit();
				$errors = new WP_Error();
		}
	}
	///////////////////////////
	
	if($_REQUEST['redirect_to']=='')
	{
	
		$_REQUEST['redirect_to']=get_author_link($echo = false, $user->ID);
	}
	if ( isset( $_REQUEST['redirect_to'] ) ) {
	
		$redirect_to = $_REQUEST['redirect_to'];
		// Redirect to https if user wants ssl
		if ( $secure_cookie && false !== strpos($redirect_to, 'wp-admin') )
			$redirect_to = preg_replace('|^http://|', 'https://', $redirect_to);
	} else {
	
		$redirect_to = admin_url();
	}

	if ( !$secure_cookie && is_ssl() && force_ssl_login() && !force_ssl_admin() && ( 0 !== strpos($redirect_to, 'https') ) && ( 0 === strpos($redirect_to, 'http') ) )
		$secure_cookie = false;

	$user = wp_signon('', $secure_cookie);

	$redirect_to = apply_filters('login_redirect', $redirect_to, isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '', $user);

	
	if ( !is_wp_error($user) ) {
		// If the user can't edit posts, send them to their profile.
		if ( !$user->has_cap('edit_posts') && ( empty( $redirect_to ) || $redirect_to == 'wp-admin/' || $redirect_to == admin_url() ) )
			$redirect_to = admin_url('profile.php');
		wp_safe_redirect($redirect_to);
		exit();
	}

	$errors = $user;
	
	// If cookies are disabled we can't log in even with a valid user+pass
	if ( isset($_POST['testcookie']) && empty($_COOKIE[TEST_COOKIE]) )
		$errors->add('test_cookie', __("<strong>ERROR</strong>: Cookies are blocked or not supported by your browser. You must <a href='http://www.google.com/cookies.html'>enable cookies</a> to use WordPress.",'ddb_wp'));

	
			if ( !is_wp_error($user) ) 
			{
				wp_safe_redirect($redirect_to);
				exit();
			}
		
	
}
if($_REQUEST['widgetdwtype'] == 'register')
{
	if ( !get_option('users_can_register') ) {
		$reg_msg = __('User registration is currently not allowed.','ddb_wp');
	}else{
	$user_login = '';
	$user_email = '';
		require_once( ABSPATH . WPINC . '/registration.php');
		

		$user_login = $_POST['user_login'];
		$user_email = $_POST['user_email'];
		$errors = widget_register_new_user($user_login, $user_email);
		if ( !is_wp_error($errors) ) {
			$reg_msg = __('Registration complete. Please check your e-mail.','ddb_wp');
		}
	}
	

	
}
if($_REQUEST['widgetdwtype'] == 'forgetpass')
{
		$errors = widget_retrieve_password();
		if ( !is_wp_error($errors) ) {
			$for_msg = __('Check your e-mail for the new password.','ddb_wp');
		}
}

class loginwidget extends WP_Widget {
	function loginwidget() {
	//Constructor
		$widget_ops = array('classname' => 'Loginbox', 'description' => apply_filters('DDBWP_login_widget_desc_filter','Loginbox Widget') );		
		$this->WP_Widget('widget_login', apply_filters('DDBWP_login_widget_title_filter','T &rarr; Loginbox'), $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$desc1 = empty($instance['desc1']) ? '&nbsp;' : apply_filters('widget_desc1', $instance['desc1']);
		 ?>						
			<script  type="text/javascript" >
        function showhide_forgetpw()
        {
			if(document.getElementById('lostpassword_form').style.display=='none')
			{
				document.getElementById('lostpassword_form').style.display = ''
				document.getElementById('register_form').style.display = 'none'
			}else
			{
				document.getElementById('lostpassword_form').style.display = 'none';
				document.getElementById('register_form').style.display = 'none'
			}	
        }
		 function showhide_register()
        {
			if(document.getElementById('register_form').style.display=='none')
			{
				document.getElementById('register_form').style.display = ''
				document.getElementById('lostpassword_form').style.display = 'none'
			}else
			{
				document.getElementById('register_form').style.display = 'none';
				document.getElementById('lostpassword_form').style.display = 'none'
			}	
        }
        </script>
            <div class="widget login_widget" id="login_widget">
          <?php
			global $current_user;
			if($current_user->ID)
			{
			?>
			<h3><?php echo apply_filters('DDBWP_login_widget_myaccount_text_filter',__('Dashboard','ddb_wp'));?></h3>
			<ul class="xoxo blogroll">
            	<?php 
				$authorlink = get_author_link($echo = false, $current_user->data->ID);
				echo apply_filters('DDBWP_login_widget_dashboardlink_filter','<li><a href="'.$authorlink.'">'.__('My Account','ddb_wp').'</a></li>');
				echo apply_filters('DDBWP_login_widget_editprofilelink_filter','<li><a href="'.site_url('/?dwtype=profile').'">'.__('Edit Profile','ddb_wp').'</a></li>');
				echo apply_filters('DDBWP_login_widget_logoutlink_filter','<li><a href="'.wp_logout_url(get_option('siteurl')).'">'.__('Logout','ddb_wp').'</a></li>');
				?>
			</ul>
			<?php
			}else
			{
			?>
			<?php if($title){?><h3><?php echo $title; ?></h3><?php }?>
            <?php 
			global $errors,$reg_msg ;
			if($_REQUEST['widgetdwtype'] == 'login')
			{	
				if(is_object($errors))
				{
					foreach($errors as $errorsObj)
					{
						foreach($errorsObj as $key=>$val)
						{
							for($i=0;$i<count($val);$i++)
							{
							echo "<p class=\"error_msg\">".$val[$i].'</p>';	
							}
						} 
					}
				}
			}
			?>
		    <form name="loginform" id="loginwidgetform" action="#login_widget" method="post" >
            <input type="hidden" name="widgetdwtype" value="login" />
           		<div class="form_row"><label><?php _e('Username','ddb_wp');?>  <span>*</span></label>  <input name="log" id="widget_user_login" type="text" class="textfield" /> <span id="user_loginInfo"></span> </div>
                <div class="form_row"><label><?php _e('Password','ddb_wp');?>  <span>*</span></label>  <input name="pwd" id="widget_user_pass" type="password" class="textfield" /><span id="user_passInfo"></span>  </div>
                
               	<input type="hidden" name="redirect_to" value="<?php echo $_REQUEST['dwtype']; ?>" />
				<input type="hidden" name="testcookie" value="1" />
                
				<div class="form_row clearfix">
                <input type="submit" name="submit" value="<?php _e('Sign In','ddb_wp');?>" class="b_signin" /> 
				</div>
				<?php if((get_option('ptttheme_fb_opt')=='Enable' && file_exists(ABSPATH.'wp-content/plugins//wp-facebook-connect/fb-connect.php')) ||( plugin_is_active('facebook-connect') ) ){ ?>
				<div class="form_row clearfix">
						<?php echo do_shortcode("[fb_login size='large' login_text='Login with facebook account' logout_text='Logout']"); ?>
				</div>
				<?php } ?>
             </form> 
            <p class="forgot_link">
            <a href="javascript:void(0);showhide_register();" class="lw_new_reg_lnk"><?php _e('New User? Register Now','ddb_wp');?> </a>  <br /> 
            <a href="javascript:void(0);showhide_forgetpw();" class="lw_fpw_lnk"><?php _e('Forgot Password?','ddb_wp');?></a> </p>            
           
            <?php 
			
			if($_REQUEST['widgetdwtype'] == 'login')
			{ 
				if($reg_msg )
			    echo "<p class=\"error_msg\">".$reg_msg.'</p>';	
				if(is_object($errors))
				{ echo "1"; exit;
					foreach($errors as $errorsObj)
					{
						foreach($errorsObj as $key=>$val)
						{
							for($i=0;$i<count($val);$i++)
							{
							echo "<p class=\"error_msg\">".$val[$i].'</p>';	
							}
						} 
					}
				}
			}
			?>
            <!--  registerartion form -->
            <div id="register_form" <?php if($_REQUEST['widgetdwtype'] == 'register'){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
            
             <?php
			
			if($_REQUEST['widgetdwtype'] == 'register')
			{
				 if($reg_msg )
			     echo "<p class=\"error_msg\">".$reg_msg.'</p>';	
				if(is_object($errors))
				{
					foreach($errors as $errorsObj)
					{
						foreach($errorsObj as $key=>$val)
						{
							for($i=0;$i<count($val);$i++)
							{
							echo "<p class=\"error_msg\">".$val[$i].'</p>';	
							}
						} 
					}
				}
				$errors = new WP_Error();
			}
			?>
            <h4> <?php _e('New User Register Here','ddb_wp');?> </h4> 
            <form name="registerform" id="registerform" method="post" action="#login_widget">
            <input type="hidden" name="reg_redirect_link" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />	 
             <input type="hidden" name="widgetdwtype" value="register" />
            
            <div class="form_row clearfix">
            <label><?php _e('Username','ddb_wp');?> <span class="indicates">*</span></label>
            <input type="text" name="user_login" id="user_login" class="textfield" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" />
          
            </div>
            <div class="row_spacer_registration clearfix" >
            <div class="form_row clearfix">
            <label>
            <?php _e('Email','ddb_wp');?>
            <span class="indicates">*</span></label>
            <input type="text" name="user_email" id="user_email" class="textfield" value="<?php echo esc_attr(stripslashes($user_fname)); ?>" size="25"  />
            </div>
            </div> 
            <input type="submit" name="wp-submit"  id="wp-submit" value="<?php _e('Register','ddb_wp');?>" class="b_signin" />
            </form>
            </div>
            <!--  registerartion #end  -->
            
            
             <div id="lostpassword_form" <?php if($_REQUEST['widgetdwtype'] == 'forgetpass'){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
            <?php 
			
			if($_REQUEST['widgetdwtype'] == 'forgetpass')
			{
				if($for_msg )
			    echo "<p class=\"error_msg\">".$for_msg.'</p>';	
				if(is_object($errors))
				{
					foreach($errors as $errorsObj)
					{
						foreach($errorsObj as $key=>$val)
						{
							for($i=0;$i<count($val);$i++)
							{
							echo "<p class=\"error_msg\">".$val[$i].'</p>';	
							}
						} 
					}
				}
				$errors = new WP_Error();
			}
			?>
            <!--  forgot password   -->
            <h4><?php _e('Forgot Password','ddb_wp');?> </h4> 
            <form name="lostpasswordform" id="lostpasswordform" method="post" action="<?php echo get_settings('home').'/index.php?dwtype=login&amp;dwtype1='.$_REQUEST['dwtype']; ?>">
            <div class="form_row clearfix"> <label>
            <input type="hidden" name="widgetdwtype" value="forgetpass" />
           <?php _e('Email','ddb_wp');?>: </label>
            <input type="text" name="user_login" id="user_login1" value="<?php echo esc_attr($user_login); ?>" size="20" class="textfield" />
            <?php do_action('lostpassword_form'); ?>
            </div>
            <input type="submit" name="wp-submit"   value="<?php _e('Get New Password','ddb_wp');?>" class="b_forgotpass " />
            </form>   
            </div>     
            <!--  forgot password #end  -->      
             <?php }?>
            </div>
 	<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['desc1'] = ($new_instance['desc1']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );		
		$title = strip_tags($instance['title']);
		$desc1 = ($instance['desc1']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title','ddb_wp');?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
	}}

?>