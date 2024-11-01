<?php
/*
    Plugin Name: ThreatPoint Email Validator
    Plugin URI: https://threatpoint.co.uk
    Description: Provides email validation for contact forms. The email validation uses the ThreatPoint email verification restAPI. A real time check is performed on the email address.
    Version: 1.4
    Author: ThreatPoint
    Author URI: https://threatpoint.co.uk
    License: GPL-2.0+
    ThreatPoint Email Validator is distributed 
	WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.
    License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

defined( 'ABSPATH' ) or die( 'Unauthorised Access!' );


add_action( 'admin_menu', 'tp_email_add_admin_menu' );
add_action( 'admin_init', 'tp_email_settings_init' );

function tp_email_add_admin_menu(  ) {
    add_options_page( 'ThreatPoint Email Validator', 'ThreatPoint Email Validator', 'manage_options', 'ThreatPoint-email-page', 'tp_email_options_page' );
}

function tp_email_settings_init(  ) {
    register_setting( 'tpemPlugin', 'tp_email_settings' );
    add_settings_section(
        'tp_email_tpemPlugin_section',
        __( '', 'wordpress' ),
        'tp_email_settings_section_callback',
        'tpemPlugin'
    );

    add_settings_field(
        'tp_email_text_field_0',
        __( 'API Key', 'wordpress' ),
        'tp_email_text_field_0_render',
        'tpemPlugin',
        'tp_email_tpemPlugin_section'
    );
    
     add_settings_field(
        'tp_email_text_field_5',
        __( 'Email Field Name', 'wordpress' ),
        'tp_email_text_field_5_render',
        'tpemPlugin',
        'tp_email_tpemPlugin_section'
    );
    
     add_settings_field(
        'tp_email_select_field_2',
        __( 'Allow Free Email Addresses?', 'wordpress' ),
        'tp_email_select_field_2_render',
        'tpemPlugin',
        'tp_email_tpemPlugin_section'
    );
    
      add_settings_field(
        'tp_email_select_field_3',
        __( 'Allow Disposable Email Addresses?', 'wordpress' ),
        'tp_email_select_field_3_render',
        'tpemPlugin',
        'tp_email_tpemPlugin_section'
    );
    
    add_settings_field(
        'tp_email_select_field_4',
        __( 'Allow Role/Group Email Addresses?', 'wordpress' ),
        'tp_email_select_field_4_render',
        'tpemPlugin',
        'tp_email_tpemPlugin_section'
    );

	add_settings_field(
        'tp_email_text_field_6',
        __( 'Admin URL', 'wordpress' ),
        'tp_email_text_field_6_render',
        'tpemPlugin',
        'tp_email_tpemPlugin_section'
    );
   
}

function tp_email_text_field_0_render(  ) {
    $options = get_option( 'tp_email_settings' );
    ?>
    <input type='text' name='tp_email_settings[tp_email_text_field_0]' value='<?php echo $options['tp_email_text_field_0']; ?>'>
    <?php echo '<b>&#8505 An API key is required - contact api@threatpoint.co.uk</b>'; ?>
    <?php
}

function tp_email_text_field_5_render(  ) {
    $options = get_option( 'tp_email_settings' );
    ?>
    <input type='text' name='tp_email_settings[tp_email_text_field_5]' value='<?php echo $options['tp_email_text_field_5']; ?>'>
     <?php echo '<b>&#8505 Form field name that contains the email address - For Contact Forms 7 this is "your-email" which is the default if left blank.</b>'; ?>
    <?php
}

function tp_email_select_field_2_render(  ) {
    $options = get_option( 'tp_email_settings' );
    ?>
    <select name='tp_email_settings[tp_email_select_field_2]'>
        <option value='1' <?php selected( $options['tp_email_select_field_2'], 1 ); ?>>Yes</option>
        <option value='2' <?php selected( $options['tp_email_select_field_2'], 2 ); ?>>No</option>
    </select>
    <?php echo '<b>&#8505 Allow email addresses from free domains.</b>'; ?>
    <?php
}

function tp_email_select_field_3_render(  ) {
    $options = get_option( 'tp_email_settings' );
    ?>
    <select name='tp_email_settings[tp_email_select_field_3]'>
        <option value='1' <?php selected( $options['tp_email_select_field_3'], 1 ); ?>>Yes</option>
        <option value='2' <?php selected( $options['tp_email_select_field_3'], 2 ); ?>>No</option>
    </select>
    <?php echo '<b>&#8505 Allow disposable (one time use) email addresses.</b>'; ?>
    <?php
}

function tp_email_select_field_4_render(  ) {
    $options = get_option( 'tp_email_settings' );
    ?>
    <select name='tp_email_settings[tp_email_select_field_4]'>
        <option value='1' <?php selected( $options['tp_email_select_field_4'], 1 ); ?>>Yes</option>
        <option value='2' <?php selected( $options['tp_email_select_field_4'], 2 ); ?>>No</option>
    </select>
    <?php echo '<b>&#8505 Allow group/roles addresses such as sales@company.com.</b>'; ?>
    <?php
}

function tp_email_text_field_6_render(  ) {
    $options = get_option( 'tp_email_settings' );
    ?>
    <input type='text' name='tp_email_settings[tp_email_text_field_6]' value='<?php echo $options['tp_email_text_field_6']; ?>'>
     <?php echo '<b>&#8505 Thhe URL for wp-admin - by default this is wp-admin</b>'; ?>
    <?php
}

function tp_email_settings_section_callback(  ) {
    echo __( '<img src="https://threatpoint.co.uk/wp-content/uploads/2020/09/cropped-ThreatPoint_Logo-12.png" alt="ThreatPoint Cyber Security" style="margin-left:3%">', 'wordpress' ); 
    echo __( '<p></>', 'wordpress' ); 
    echo __( '<li><b>Enter the information in the sections below to complete the API configuration</b></li><br>', 'wordpress' );
    echo __( '<li><i><b>Email api@threatpoint.co.uk for an API key</b></i></li><br>', 'wordpress' );
    echo __( '<li><i><b>We will respond with an API key valid for 30 day trial use. No credit cards or signup required.</b></i></li><br>', 'wordpress' );
    echo __( '<li><i><b>Documentation:- <a href="https://threatpoint.co.uk/documentation">ThreatPoint Documentation</a></b></i></li>', 'wordpress' );
}

function tp_email_options_page(  ) {
$options = get_option( 'tp_email_settings' );
$key = esc_attr( get_option('tp_email_settings')['tp_email_text_field_0']);
$ipa = "notset";
$url = 'https://verify.threatpoint.co.uk:443/api/v1/resources/emailstats';
$arguments = array ('sslverify' => false,
                            'headers' => array('X-Api-Key' => $key));
$response = wp_remote_get( $url, $arguments);
                                if (is_wp_error( $response ) ) {
						
                                        echo 'Errors detected!';

                                }
				if (empty($key)){
					
					echo "Api key not set";

				}
					else {
                                                $body = wp_remote_retrieve_body( $response );
                                                $data = json_decode( $body );
						$output = '<table>';
						$output .= '<table border ="2" style="background-color:#FFFFFF">';
						$output .= '<tr><th>Date</th><th>Detail</th><th>Email</th><th>Total</th></tr>';	
						foreach( $data as $datapoint => $var) {
							$output .= '<tr>';
							foreach($var as $k => $v){
									$output .= '<td>' . $v . '</td>';
								
								   
									
							}
							$output .= '</tr>';
						}
						$output .= '</tr>';
					 }

				if ($key){
					 $output .= '</table>';
				}
    ?>
   <div class='wrap'>
    <form action='options.php' method='post'>

        <h2>ThreatPoint Email Validation Configuration</h2>

        <?php
        settings_fields( 'tpemPlugin' );
        do_settings_sections( 'tpemPlugin' );
        submit_button();
        ?>
    <?php if ($key){echo "Top 10 Email Validations on this site"; echo $output;} ?>
    </form>
   </div>
    <?php
}
add_filter( 'wpcf7_validate_configuration', '__return_false' );
$request_uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
$adminurl = esc_attr( get_option('tp_email_settings')['tp_email_text_field_6']);
$is_admin = strpos( $request_uri, '/'.$adminurl.'/' );

if( false === $is_admin ){

add_filter( 'is_email', 'threatpoint_email_risk');
}
function threatpoint_email_risk($emailtovalidate) {


	$key = esc_attr( get_option('tp_email_settings')['tp_email_text_field_0']);
	$allowFree = esc_attr( get_option('tp_email_settings')['tp_email_select_field_2']);
	$allowDisposable = esc_attr( get_option('tp_email_settings')['tp_email_select_field_3']);
	$allowRole = esc_attr( get_option('tp_email_settings')['tp_email_select_field_4']);
    $emailField = esc_attr( get_option('tp_email_settings')['tp_email_text_field_5']);	
	$url = 'https://verify.threatpoint.co.uk:443/api/v1/resources/email?name=';
	$arguments = array ('sslverify' => false, 
			    'headers' => array('X-Api-Key' => $key));
	
	if ($emailField === ''){
	$emailtovalidate = $_POST['your-email'];
	}
	
	if ($emailField !== ''){
	$emailtovalidate = $_POST[$emailField];
	}
	if ($emailtovalidate !== ''){	
	$url2 = $url . $emailtovalidate;
	}
	if ($emailtovalidate === ''){
	$url2 = $url . 'invalidemail';
	}
	$response = wp_remote_get($url2, $arguments);
	if (is_wp_error( $response ) ) {
      
		echo 'Errors detected!';
		
	} else {
		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body );
		foreach( $data as $datapoint) {
			$risk  = $datapoint->Risk;
			$validdom = $datapoint->ValidDomain;
			$validemail = $datapoint->ValidEmail;
			$isFree = $datapoint->isFree;
			$isDisposable = $datapoint->isDisposable;
			$isRole = $datapoint->isRole;
		}
	if ($validemail == "True" and $isRole == "True" and $allowRole =="1"){
		return $validemail;
	}
	if ($validemail == "True" and $isRole == "True" and $allowRole =="2"){
		return false;
	}
	if ($validemail == "True" and $isDisposable == "True" and $allowDisposable =="1"){
		return $validemail;
	}
	if ($validemail == "True" and $isDisposable == "True" and $allowDisposable =="2"){
		return false;
	}
	if ($validemail == "True" and $isFree == "True" and $allowFree =="1"){
		return $validemail;
	}
	if ($validemail == "True" and $isFree == "True" and $allowFree =="2"){
		return false;
	}
	if ($validemail == "True" and $isFree != "True" and $allowFree =="2"){
		return $validemail;
	}
	if ($validemail == "True" and $isFree != "True"){
		return $validemail;
	}
	if ($validemail != "True"){
		return false;
		}

	
	}
	
   
	
}


