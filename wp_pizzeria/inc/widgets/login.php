<?php
/*
Plugin Name:Login
*/


class CMS_Login_Widget extends WP_Widget{
	
	function __construct(){
		 parent::__construct(
            'cms_login_widget',
            esc_html__('Login Widget', 'wp_pizzeria'),
            array('description' => esc_html__('Widget Login ', 'wp_pizzeria'),)
        );
	
	}
	
	/*This method is responsible for updating the widget option form*/	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cms_show_avatar'] = strip_tags($new_instance['cms_show_avatar']);
		$instance['cms_show_user'] = strip_tags($new_instance['cms_show_user']);
		$instance['cms_show_remember'] = strip_tags($new_instance['cms_show_remember']);
		$instance['cms_show_register'] = strip_tags($new_instance['cms_show_register']);
		$instance['cms_show_forgot'] = strip_tags($new_instance['cms_show_forgot']);
		$instance['cms_show_dash'] = strip_tags($new_instance['cms_show_dash']);
		$instance['cms_show_profile'] = strip_tags($new_instance['cms_show_profile']);
		$instance['cms_show_postcount'] = strip_tags($new_instance['cms_show_postcount']);
		$instance['redirect'] = ($new_instance['redirect']);
		$instance['login_redirect'] = ($new_instance['login_redirect']);
		return $instance;
	}

	/*
	 * This function is responsible for displaying forms
	 * This method accepts a parameter which is an array
	 */

	public function form($instance){
		
		/*An array containing default values when the widget will be used first time*/
		$defaults = array(
				  'title' => 'Login',
				  'cms_show_avatar' => 'on',
				  'cms_show_user' => 'on',
				  'cms_show_register' => 'on',
				  'cms_show_forgot' => 'on',
				  'cms_show_profile' => 'on',
				  'redirect' => esc_url(home_url('/')),
				  'login_redirect' => esc_url(home_url('/')),
				  );
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		extract($instance, EXTR_SKIP);
		$pages = get_pages();
		?>
		<!-- Text field for Title -->
		<p>
			<label for="<?php echo ''.$this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'wp_pizzeria'); ?></label>
			<input 
				class="widefat"
				type="text"
				id="<?php echo ''.$this->get_field_id('title'); ?>"
				name="<?php echo ''.$this->get_field_name('title'); ?>"
				value="<?php if(isset($title)) echo esc_attr($title); ?>"
			/>
		</p>
		<!-- Checkbox to turn on/off the option to display avatar -->
		<p>
			<input
				type="checkbox"
				<?php checked("$cms_show_avatar", 'on' );?>			
				class="checkbox"
				id="<?php echo ''.$this->get_field_id('cms_show_avatar'); ?>"
				name="<?php echo ''.$this->get_field_name('cms_show_avatar'); ?>"
			/>
			<label for="<?php echo ''.$this->get_field_id('cms_show_avatar'); ?>"><?php esc_html_e('Show Avatar', 'wp_pizzeria'); ?></label>
		        	
		</p>
		
		<!-- Checkbox to turn on/off the option to display Logged in user name -->
		<p>
			<input
				type="checkbox"
				<?php checked("$cms_show_user", 'on' );?>			
				class="checkbox"
				id="<?php echo ''.$this->get_field_id('cms_show_user'); ?>"
				name="<?php echo ''.$this->get_field_name('cms_show_user'); ?>"
			/>
			<label for="<?php echo ''.$this->get_field_id('cms_show_user'); ?>"><?php esc_html_e('Show Logged in User name', 'wp_pizzeria'); ?></label>
		        	
		</p>
		
		<!-- Checkbox to turn on/off the option to display Register link on login form -->
		<p>
			<input
				type="checkbox"
				<?php checked("$cms_show_register", 'on' ); ?>			
				class="checkbox"
				id="<?php echo ''.$this->get_field_id('cms_show_register'); ?>"
				name="<?php echo ''.$this->get_field_name('cms_show_register'); ?>"
			/>
			<label for="<?php echo ''.$this->get_field_id('cms_show_register'); ?>"> <?php esc_html_e('Show Register Link', 'wp_pizzeria'); ?> </label>
		        	
		</p>
		
		<!-- Checkbox to turn on/off the option to display Forgot Password link on login form -->
		<p>
			<input
				type="checkbox"
				<?php checked("$cms_show_forgot", 'on' ); ?>			
				class="checkbox"
				id="<?php echo ''.$this->get_field_id('cms_show_forgot'); ?>"
				name="<?php echo ''.$this->get_field_name('cms_show_forgot'); ?>"
			/>
			<label for="<?php echo ''.$this->get_field_id('cms_show_forgot'); ?>"> <?php esc_html_e('Show Forgotten Password Link', 'wp_pizzeria'); ?> </label>
		        	
		</p>
		<p>
			<label for="<?php echo ''.$this->get_field_id('login_redirect'); ?>"> <?php esc_html_e('Select page login redirect', 'wp_pizzeria'); ?> </label>
			<select
				id="<?php echo ''.$this->get_field_id('login_redirect'); ?>"
				name="<?php echo ''.$this->get_field_name('login_redirect'); ?>"
			>
				<option value="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Default','wp_pizzeria'); ?></option>
				<?php foreach ($pages as  $page) { ?>
					<option value="<?php echo esc_url(get_page_link( $page->ID )); ?>" <?php checked("$login_redirect", esc_url(get_page_link( $page->ID ) )); ?>	><?php echo esc_attr($page->post_title); ?></option>
				<?php } ?>
			</select>
			
		        	
		</p>
		<p>
		<label for="<?php echo ''.$this->get_field_id('redirect'); ?>"> <?php esc_html_e('Select page logout redirect', 'wp_pizzeria'); ?> </label>
			<select
				id="<?php echo ''.$this->get_field_id('redirect'); ?>"
				name="<?php echo ''.$this->get_field_name('redirect'); ?>"
			>
				<option value="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Default','wp_pizzeria'); ?></option>
				<?php foreach ($pages as  $page) { ?>
					<option value="<?php echo esc_url(get_page_link( $page->ID )); ?>" <?php checked("$redirect", esc_url(get_page_link( $page->ID ) ) ); ?>	><?php echo esc_attr($page->post_title); ?></option>
				<?php } ?>
			</select>
			
		        	
		</p>
		<?php
	}
	
	/*
	 *This method is responsible for displaying the outputs in the widgetized area
	 */
	
	public function widget($args, $instance){
		extract($args);
		extract($instance);
	
		global $user_login;
		
		// Setting default title when nothing is set from widget option
		if(empty($title)){
			$title ='';
		}
		else{
			$title = apply_filters('widget_title', $title );
		}
		
				
		if(is_user_logged_in()){
			$user_info = get_user_by('login', $user_login);

			$title = (!empty($user_info->first_name) || !empty($user_info->last_name))? esc_html__('Welcome','wp_pizzeria')." ".$user_info->first_name." ".$user_info->last_name : esc_html__('Welcome','wp_pizzeria')." ".$user_login;
		}
		
		echo ''.$before_widget;
		if(!empty($title)){
			echo ''.$before_title;
				echo ''.$title;
			echo ''.$after_title;
		}	
			if (isset($_GET['login'])) {
				
				$login = $_GET['login']; // This variable is used when login failure occurs
				$current_error = $_GET['errcode']; // This variable is used to display the type of error during login
				
				if ($login == 'failed'){
					
					if ($current_error == "empty_username" || $current_error == "empty_password"){
						$error_msg = esc_html__('Enter both Username and Password', 'wp_pizzeria');
					}
					elseif($current_error == 'invalid_username'){
						$error_msg = esc_html__('Username is not registered', 'wp_pizzeria');
					}
					elseif($current_error == 'incorrect_password'){
						$error_msg = esc_html__('Incorrect Password', 'wp_pizzeria');
					}
						
					echo "<div id='message' class='error fade'><p><strong>".$error_msg."</strong></p></div>";
				
				}
			
			}
			/*Check if user is logged in then show user information and logout,dashboardand profile link*/
			if (is_user_logged_in()) {
				
					?>
					<div class="sidebar-login-info">
					<?php
					
					if ($cms_show_avatar == "on"){
						$show_avatar = isset( $show_avatar ) ? $show_avatar : 1;
						if ( $show_avatar == 1 )
							echo '<div class="avatar_container">' . get_avatar( $user_info->ID, apply_filters( 'sidebar_login_widget_avatar_size', 45 ) ) . '</div>';
					}
					?>
					</div>		
		
					<ul id="<?php if($cms_show_avatar=='on') echo 'sidebar-login-links';else echo 'sidebar-login-links-left'; ?>">
						<li><a href="<?php echo wp_logout_url($redirect); ?>"><?php esc_html_e( 'Logout' , 'wp_pizzeria' ) ?> </a></li>
												
					</ul>
					
					<?php
			}
			/*If user is not logged in then show login form*/
			else{
				$remember_val = ($cms_show_remember == 'on') ? true : false; 
				
				
				?>
				<form  method="post" id="login-form" class="login-form" action="<?php echo wp_login_url(); ?>" enctype="multipart/form-data">
                    <div class="row onscroll-animate fadeIn" data-animate="fadeInUp">
	                    <div class="col-md-3 col-sm-6 col-md-offset-3">
	                        <input type="text" class="form-control" id="user_login" name="log" placeholder="<?php esc_html_e('Name', 'wp_pizzeria');?>">
	                    </div>
	                    <!--end .form-group-->
	                    <div class="col-md-3 col-sm-6">
	                        <input type="password" class="form-control" id="user_pass" name="pwd" placeholder="<?php esc_html_e('Password', 'wp_pizzeria');?>">
	                    </div>
	                    <!--end .form-group-->
	                </div>
                    <div class="onscroll-animate text-center" data-animation="flipInY">
                        <input type="hidden" name="redirect_to" value="<?php echo ''.$login_redirect ; ?>" />
                        <input type="hidden" name="testcookie" value="1" />
                        <input type="submit" name="submit" value="<?php esc_html_e('Sign in','wp_pizzeria');?>" class="button-yellow button-long" /> 
                        
                    </div>
                    <!--end .form-group-->
                </form>
				<p id="reglost" class="text-center">
					<?php
					if ($cms_show_register == 'on') echo '<a href="' . wp_registration_url() . '" title="Register"><em>'.esc_html__('Register', 'wp_pizzeria').'</em></a>';
					if ($cms_show_register == 'on' and $cms_show_forgot == 'on')echo "|  ";
					if ($cms_show_forgot == 'on') {
						$lostpassword_url=wp_lostpassword_url($redirect);
						echo '<a href="' .esc_url($lostpassword_url) . '?sli=lost" rel="nofollow" title="'.esc_html__('Forgot your Password?','wp_pizzeria').'"><em>' . esc_html__('Forgot your Password?','wp_pizzeria') . '</em></a>';
					}
					?>
				</p>
				<?php
			}			
		echo ''.$after_widget;		
	}
}

/* */

add_action('widgets_init','cms_register_widget_login');
function cms_register_widget_login(){
	//Register a widget. 1 parameter: name of the class
	register_widget('CMS_Login_Widget');

}


add_action('wp_login_failed', 'handle_login_failure');
/*
 * This method will handle the login failure process. 
 */
function handle_login_failure($username){
	// check what page the login attempt is coming from
  	global $current_error;
	$referrer = $_SERVER['HTTP_REFERER'];
	 
	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
		wp_redirect(home_url('/') . '/?login=failed&amp;errcode='.$current_error );
		exit;
	}
}

if ( !function_exists('wp_authenticate') ) {
	function wp_authenticate($username, $password) {
		global $current_error;
		$username = sanitize_user($username);
		$password = trim($password);
		$user = apply_filters('authenticate', null, $username, $password);
		if ( $user == null ) {
			// TODO what should the error message be? (Or would these even happen?)
			// Only needed if all authentication handlers fail to return anything.
			$user = new WP_Error('authentication_failed', '<strong>'.esc_html__('ERROR','wp_pizzeria').'</strong>'.esc_html__(': Invalid username or incorrect password.','wp_pizzeria'));
		}
		$ignore_codes = array('empty_username', 'empty_password', 'invalid_username', 'incorrect_password');
		
		if (is_wp_error($user) && in_array($user->get_error_code(), $ignore_codes) ) {
			$current_error = $user->get_error_code();
			do_action('wp_login_failed', $username);
		}
		
		return $user;
	}
}

add_action( 'init', 'cms_plugin_init' );
function cms_plugin_init() {
	load_plugin_textdomain( 'wp_pizzeria', false, get_template_directory(). '/languages' );
}


?>