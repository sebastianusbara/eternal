<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
//================================================================================================================
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
//================================================================================================================
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


/**
 * Register our sidebars and widgetized areas.
 *
 */
//================================================================================================================
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'footbar',
		'id'            => 'footbar1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//================================================================================================================
/**
 * Add additional custom field
 */

add_action ( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action ( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields ( $user )
{
?>
    <h3>Extra profile information</h3>
    <table class="form-table">
        <tr>
            <th><label for="alamat">Alamat</label></th>
            <td>
                <input type="text" name="alamat" id="alamat" value="<?php echo esc_attr( get_the_author_meta( 'alamat', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">your Alamat.</span>
            </td>
        </tr>
        <tr>
            <th><label for="notelp">notelp</label></th>
            <td>
                <input type="text" name="notelp" id="notelp" value="<?php echo esc_attr( get_the_author_meta( 'notelp', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">your notelp.</span>
            </td>
        </tr>
        <tr>
            <th><label for="eternalpoint">eternal point</label></th>
            <td>
                <input type="number" name="eternalpoint" id="eternalpoint" value="<?php echo esc_attr( get_the_author_meta( 'eternalpoint', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">your eternalpoint.</span>
            </td>
        </tr>
    </table>
<?php
}

add_action ( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action ( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    /* Copy and paste this line for additional fields. Make sure to change 'alamat' to the field ID. */
    update_usermeta( $user_id, 'alamat', $_POST['alamat'] );
    update_usermeta( $user_id, 'notelp', $_POST['notelp'] );
    update_usermeta( $user_id, 'eternalpoint', $_POST['eternalpoint'] );
}

/**
 * Add cutom field to registration form
 */

add_action('register_form','show_first_name_field');
add_action('register_post','check_fields',10,3);
add_action('user_register', 'register_extra_fields');

function show_first_name_field()
{
?>
    <p>
    <label>Alamat<br/>
    <input id="alamat" type="text" tabindex="30" size="25" value="<?php echo $_POST['alamat']; ?>" name="alamat" />
    </label>
    <label>No Telepon<br/>
    <input id="notelp" type="text" tabindex="30" size="25" value="<?php echo $_POST['notelp']; ?>" name="notelp" />
    </label>
    </p>
<?php
}

function check_fields ( $login, $email, $errors )
{
    global $alamat;
    if ( $_POST['alamat'] == '' )
    {
        $errors->add( 'empty_realname', "<strong>ERROR</strong>: Please Enter your alamat handle" );
    }
    else
    {
        $alamat = $_POST['alamat'];
    }

    global $notelp;
    if ( $_POST['notelp'] == '' )
    {
        $errors->add( 'empty_realname', "<strong>ERROR</strong>: Please Enter your notelp handle" );
    }
    else
    {
        $notelp = $_POST['notelp'];
    }
}

function register_extra_fields ( $user_id, $password = "", $meta = array() )
{
    update_user_meta( $user_id, 'alamat', $_POST['alamat'] );
    update_user_meta( $user_id, 'notelp', $_POST['notelp'] );
    update_user_meta( $user_id, 'eternalpoint', 100 );
}

//================================================================================================================
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url("http://localhost/wordpress/wp-content/uploads/2016/08/problem1.png");
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
//================================================================================================================
function my_login_background() { ?>
    <style type="text/css">
        body {
            background-color: black !important; 
            padding-bottom: 30px;
            background-repeat: repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_background' );

/**
 * Show custom user profile fields
 * @param  obj $user The user object.
 * @return void
 */
//================================================================================================================
$defaults = array(
    'default-image'          => '',
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => true,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
//================================================================================================================
function user_signin(){
    $current_user = wp_get_current_user();
    if(!isset($current_user->roles[0]))
    {
        return '<a href="wp-login.php">sign in</a>';
    }
    else
    {      
        return 
            '<a href='.get_permalink(get_page_by_title('User')).'?ID='.wp_get_current_user()->ID.'>Hi,'.wp_get_current_user()->display_name.'</a>'.'<a href='.wp_logout_url().'>|Logout</a>';
    }
}
//================================================================================================================
function show_admin(){
    $current_user = wp_get_current_user();
    if(($current_user->roles[0]) == "administrator")
    {
        show_admin_bar(true);
    }
    else
    {
        show_admin_bar(false);
    }
}
//================================================================================================================
add_action('admin_init', 'no_mo_dashboard');
function no_mo_dashboard() {
  if (!current_user_can('manage_options') && $_SERVER['DOING_AJAX'] != '/wp-admin/admin-ajax.php') {
  wp_redirect(home_url()); exit;
  }
}
//================================================================================================================
function user_information($id){
    $user_info = get_userdata($id);
    ?>
    <ul>
        <li>Username: <?php echo $user_info->user_login ?></li>
        <li>User roles: <?php echo implode(', ', $user_info->roles) ?></li>
        <li>E-mail: <?php echo $user_info->user_email  ?></li>
        <li>Nomor telepon: <?php echo $user_info->notelp  ?></li>
        <li>Alamat: <?php echo $user_info->alamat  ?></li>
        <li>Eternal Point: <?php echo $user_info->eternalpoint  ?></li>
    <ul>
    <?php
}
?>