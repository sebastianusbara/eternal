<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

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

//1. Add a new form element...
add_action( 'register_form', 'myplugin_register_form' );
function myplugin_register_form() {

    $kodepos = ( ! empty( $_POST['kodepos'] ) ) ? trim( $_POST['kodepos'] ) : '';
        
        ?>
        <p>
            <label for="kodepos"><?php _e( 'Kode Pos', 'mydomain' ) ?><br />
                <input type="text" name="kodepos" id="kodepos" class="input" value="<?php echo esc_attr( wp_unslash( $kodepos ) ); ?>" size="25" /></label>
        </p>
        <?php
    }

    //2. Add validation. In this case, we make sure first_name is required.
    add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
    function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {
        
        if ( empty( $_POST['kodepos'] ) || ! empty( $_POST['kodepos'] ) && trim( $_POST['kodepos'] ) == '' ) {
            $errors->add( 'kodepos_error', __( '<strong>ERROR</strong>: You must include a kodepos.', 'mydomain' ) );
        }

        return $errors;
    }

    //3. Finally, save our extra registration user meta.
    add_action( 'user_register', 'myplugin_user_register' );
    function myplugin_user_register( $user_id ) {
        if ( ! empty( $_POST['kodepos'] ) ) {
            update_user_meta( $user_id, 'kodepos', trim( $_POST['kodepos'] ) );
        }
    }

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url("http://localhost/wordpress/wp-content/uploads/2016/08/problem1.png");
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

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
function numediaweb_custom_user_profile_fields($user) {
?>
<table class="form-table">
<tr>
    <th>
        <label for="tc_kodepos"><?php _e('Kode Pos'); ?></label>
    </th>
    <td>
        <input type="text" name="tc_kodepos" id="tc_kodepos" value="<?php echo esc_attr( get_the_author_meta( 'kodepos', $user->ID ) ); ?>" class="regular-text" />
        <br><span class="description"><?php _e('Your kodepos'); ?></span>
    </td>
</tr>
</table>
<?php
}
add_action('show_user_profile', 'numediaweb_custom_user_profile_fields');
add_action('edit_user_profile', 'numediaweb_custom_user_profile_fields');

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

function user_signin(){
    $current_user = wp_get_current_user();
    if(!isset($current_user->roles[0]))
    {
        return '<a href="wp-login.php">sign in</a>';
    }
    else
    {      
        return '<a href='.wp_logout_url().'>Logout</a>';
    }
}
?>