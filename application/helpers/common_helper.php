<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

use Hashids\Hashids;

function uid(){
	$hashids = new Hashids('ots_ho');
	return $hashids->encodeHex(time() . mt_rand(1,10000000000000));
}

function hashed($val, $encode = true, $seed_rand = false){
	$hashids = new Hashids('ots_ho');
	$seed = $seed_rand ? mt_rand(1,10000000000000) : '';
	if($encode){
		return $hashids->encodeHex($val.$seed);
	}else{
		return $hashids->decodeHex($val);
	}
}

function return_error($msg, $goto = ''){
	$ci =& get_instance();
	if($ci->input->is_ajax_request()){
		$out = array(
			'notify' => array(
				'message' => $msg,
				'type' => 'danger'
			)
		);
		if($goto) $out['redirect'] = $goto;
		json_false($out);
	}else{
		Template::set_message($msg, 'danger');
		Template::redirect($goto);
	}
	die();
}

function test($x, $exit = 0)
{
    $env = (ENVIRONMENT == 'production') ? 'none' : 'block';
    $echo = "<div style='display:$env'><pre>\r\n";
    if (is_array($x) || is_object($x)) {
        $echo .= print_r($x, true);
    } else if (is_string($x)) {
        $echo .= $x;
    } else {
        $echo .= var_export($x, true);
    }
    $echo .= "\r\n</pre><hr /></div>\r\n";
    echo $echo;
    if ($exit == 1) {
        die();
    }
}

function tes()
{
    $env = (ENVIRONMENT == 'production') ? 'none' : 'block';
	$args = func_get_args();
	if(is_for($args)){ foreach($args as $x){
		$echo = "<div style='display:$env'><pre>";
		if(is_array($x) || is_object($x)){
			$echo .= print_r($x, true);
		}else{
			$echo .= var_export($x, true);
		}
		$echo .= "</pre><hr /></div>";
		echo $echo;
	}}
}

function tesx()
{
	$env = (ENVIRONMENT == 'production') ? 'none' : 'block';
	$args = func_get_args();
	if(is_for($args)){ foreach($args as $x){
		$echo = "<div style='display:$env'><pre>";
		if(is_array($x) || is_object($x)){
			$echo .= print_r($x, true);
		}else{
			$echo .= var_export($x, true);
		}
		$echo .= "</pre><hr /></div>";
		echo $echo;
	}}
    die();
}

function last_update($file){
	if(file_exists(FCPATH.'/'.$file)){
		return filemtime(FCPATH.'/'.$file);
	}else{
		return 0;
	}
}

function body_class(){
	$seq = false;
	$add = Template::get('body_class');
	if($add){
		$seq = $add;
	}else{
		$ci =& get_instance();
		$seg = $ci->uri->segment_array();
		if(is_for($seg)){
			$seq = isset($seg[1]) ? $seg[1].' ' : '';
			$seq .= isset($seg[1]) && isset($seg[2]) ? $seg[1].'-'.$seg[2].' ' : '';
			$seq .= isset($seg[1]) && isset($seg[2]) && isset($seg[3]) ? $seg[1].'-'.$seg[2].'-'.$seg[3] : '';
		}
	}
	return $seq ? trim($seq) : 'app';
}

function page_class(){
    $ci =& get_instance();
    $seg = $ci->uri->segment_array();
    $name = '';

    if(is_for($seg)) {
        $name = implode('.', $seg);
    }

	return $name ? trim($name) : 'home';
}

// check and echoing a string variable
function _s($var = null, $default = ' - ', $echo=false){
	$str = isset($var) && !empty(trim($var)) ? $var : $default;
	if(! $echo) return $str;
	echo $str;
}

// check and echoing an object property variable
function _o($obj, $prop, $default = ' - ', $echo=false){
	$str = is_object($obj) && property_exists($obj,$prop) && !empty(trim($obj->$prop)) ? $obj->$prop : $default;
	if(! $echo) return $str;
	echo $str;
}

function _e($string, $echo = true, $empty = '-')
{
	$tmp = isset($string) && !empty($string) ? $string : $empty;
    if ($echo) {
        echo $tmp;
    } else {
        return $tmp;
    }
}

function keyval($arr, $keyname = 'id', $valname = 'name', $switch = false, $retain = false)
{
	$new_arr = false;
	if(is_array($arr) && count($arr))
	{
		foreach ($arr as $key => $value) {
			if(isset($value->$keyname))
			{
				if(! $switch)
				{
					$new_arr[$value->$keyname] = $retain ? $value : trim($value->$valname);
				}else{
					$new_arr[$value->$valname] = $retain ? $value : trim($value->$keyname);
				}
			}else{
				if(! $switch)
				{
					$new_arr[$value[$keyname]] = isset($value[$valname]) ? $retain ? $value : trim($value[$valname]) : false;
				}else{
					$new_arr[$value[$valname]] = isset($value[$keyname]) ? $retain ? $value : trim($value[$keyname]) : false;
				}
			}
		}
	}
	return $new_arr;
}

function is_for(&$recs){
	return (bool) isset($recs) && (is_array($recs) && count($recs));
}

function jsout($param = false)
{
	$ci =& get_instance();
	header('Content-type: application/json');

	$param['success'] = ($param===false) ? false : (isset($param['success']) ? $param['success'] : true);
	$param['csrf'] = array(
		'name'=>$ci->security->get_csrf_token_name(),
		'csrftoken'=>$ci->security->get_csrf_hash(),
		'sess' => session_id()
	);
	$param['benchmark'] = "Executed in ".$ci->benchmark->elapsed_time('total_execution_time_start', 'total_execution_time_end')." seconds, using ".(round(memory_get_usage() / 1024 / 1024, 2).'MB');
	die( json_encode( $param ) );
}

function json_false($param = false){
	$tmp = array(
		'success' => false,
	);
	if(is_string($param)) $tmp['message'] = $param;
	if(is_array($param)) $tmp = array_merge($tmp, $param);
	if(!isset($param['data'])) $tmp['data'] = false;
	jsout($tmp);
}

function json_true($param = false){
	$tmp = array(
		'success' => true
	);
	if(is_string($param)) $tmp['message'] = $param;
	if(is_array($param)) $tmp = array_merge($tmp, $param);
	if(!isset($param['data'])) $tmp['data'] = false;
	jsout($tmp);
}

function dbnow($show_time = true)
{
	$format = 'Y-m-d';
	if($show_time) $format .= ' H:i:s';

    $ci =& get_instance();
    if(isset($ci->current_user) && isset($ci->current_user->timezone)){
        $timezone = time() + (60 * 60 * (int) $ci->current_user->timezone);
        $now = gmdate($format, $timezone);
        return $now;
    }

	return date($format, time());
}

function timestamp(){
    $ci =& get_instance();
    if(isset($ci->current_user) && isset($ci->current_user->timezone)){
        $timezone = time() + (60 * 60 * (int) $ci->current_user->timezone);
        return $timezone;
    }
    return time(); 
}

function money($num = 0)
{
    $number = number_format($num, 0, ',', '.');
    return ($num < 0) ? '('.abs($num).')' : $number;
}

function numbered($num = 0)
{
    return number_format($num, 0, ',', '.');
}

function in_application(){
	$ci =& get_instance();
	$conf = config_item('application_modules');
	$module = $ci->uri->segment(1);
	if(!$module) return false;
	foreach($conf as $key => $val){
		foreach($val as $mod){
			if($mod == $module){
				return $val;
			}
		}
	}
	return false;
}

function string_type($value){
	// remove spaces
	$value = str_replace(array(' ','-','_','.',','),'',$value);
	//
  $check = filter_var($value,FILTER_VALIDATE_EMAIL);
  if($check) return 'email';
  $check = ctype_digit($value);
  if($check) return 'number';
	$check = ctype_alpha($value);
	if($check) return 'char';
	return 'varchar';
}


/*
// $module & $type from config_item('email_settings');
$res = pos_send_email('nota_kontan', 'thank_you', array(
    'to' => 'alamat@email.com',
    'bcc' => 'alamat@email_lain.com'
));
*/ 
function pos_send_email($module, $type, $data, $internal = false){ // $use_ssl = true, 

    // enabling on testing
	// if(ENVIRONMENT != 'production') return true;

    $use_ssl = true;   
    
    // $email_template_folder = !isset($data['template']) ? 'pos/' : $data['template'].'/';
    $email_template_folder = $internal ? 'pos_ho/' : 'pos/';

	$ci =& get_instance();
 
	$ci->load->library('emailer/emailer');
    $ci->emailer->enable_debug(true);
    $ci->emailer->email_template_folder = $email_template_folder;

    $config_email = config_item('email_settings');
	if(!array_key_exists($module, $config_email)) {
        return;
    }else{
        $config_email = $config_email[$module];
        if(!array_key_exists($type, $config_email)){
            exit('invalid email_settings config - type');
        }else{
            $config_email = $config_email[$type];
        }
    }

    $ci->load->library('parser');

    if(isset($config_email['message']) && $config_email['message']){
        $email_view = $ci->parser->parse_string($config_email['message'], $data, true);
    }else{
        if(isset($data['message'])){
            $email_view = $ci->parser->parse_string($data['message'], $data);
        }else{
            // message value not exist .. so use template
            if(file_exists(APPPATH.'modules/emailer/views/email/'.$email_template_folder.$module.'_'.$type.'.php')){
                $email_view = $ci->parser->parse('emailer/email/'.$email_template_folder.$module.'_'.$type, $data, true);
            }else{
                exit('invalid type email template');
            }
        }
    }

    // test($email_view,1);

	if(!isset($data['to']) || empty($data['to'])){
        if(isset($config_email['to'])) {
            $data['to'] = $config_email['to'];
        }else{
            exit('invalid email recipient (to)');
        }
    }

    $ci->load->helper('email');
    if(!valid_email($data['to'])) return;

	$data_email = array(
        'to' => $data['to'],
        // 'from' => array('no-reply@optiktunggal.com','Optik Tunggal'),
	    'reply_to' => array('no-reply@optiktunggal.com','Optik Tunggal'),
	    'subject' => isset($data['subject']) ? $data['subject'] : $config_email['subject'],
	    'message' => $email_view,
        // 'attachments' => array($file_attach)
    );

    if (isset($data['attachments'])) $data_email['attachments'] = $data['attachments'];
    if (isset($data['no_dokumen'])) $data_email['no_dokumen'] = $data['no_dokumen'];

    $cc = [];
    if(isset($data['cc'])) $cc = is_for($data['cc']) ? $data['cc'] : [$data['cc']];
    if(isset($config_email['cc'])) $cc = array_merge($cc, $config_email['cc']);
    if(is_for($cc)) $data_email['cc'] = $cc;

    $bcc = [];
    if(isset($data['bcc'])) $bcc = is_for($data['bcc']) ? $data['bcc'] : [$data['bcc']];
    if(isset($config_email['bcc'])) $bcc = array_merge($bcc, $config_email['bcc']);
    if(is_for($bcc)) $data_email['bcc'] = $bcc;

    $success = $ci->emailer->send($data_email, null, $use_ssl);

    if(!$success) log_error($ci->current_user->id, $ci->emailer->debug_message, 'pos_send_email', 'php');

	return $success;
}

function ots_send_sms($data) {

    $gammu = array(
        'DestinationNumber' => $data['phone'], // using 0 for first number
        'TextDecoded'       => $data['text'],
        'CreatorID'         => 'OTAPPS' // static constant OTAPPS
    );

    $phone = $gammu['DestinationNumber'];
    
    $CI =& get_instance();
    $CI->load->model('master_model');

    $limit_sms = 3;
    $total_sms = $CI->master_model->count_sent_sms_today($phone);

    $res = array('success'=> false);

    if ((int)$total_sms >= (int)$limit_sms) {
        $res['msg'] = 'This Number '.$phone.' has been received '.$total_sms.' in last 24 hour';
        return $res;
    }

    $res = $CI->master_model->insert_sms_gammu($gammu);
    if (!$res['success']) $res['msg'] = 'fail sending sms to '.$phone.' - '.$res['msg'];
    
    return $res;
}

function terbilang($x) {
  $angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
  if ($x < 12)
    return " " . $angka[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . " Belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " Puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return "Seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " Ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return "Seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " Ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " Juta" . terbilang($x % 1000000);
}

function randomstring($len){
	$string = "";
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for($i=0;$i<$len;$i++)
	$string.=substr($chars,rand(0,strlen($chars)),1);
	return $string;
}

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

function generate_number($strength = 16) {
	$input = '09876543211234567890';
    $input_length = strlen($input);
    $random_number = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_number .= $random_character;
    }
 
    return $random_number;
}

//Fungsi filter array
function filter_by_value($array, $index, $value){ 
    if(is_array($array) && count($array)>0)  
    { 
        if (is_for($value)) {
            foreach ($value as $key => $values) {
                foreach(array_keys($array) as $key){ 
                    $temp[$key] = $array[$key][$index]; 
                     
                    if ($temp[$key] == $values){ 
                        $newarray[$key] = $array[$key]; 
                    } 
                }
            }
        }
        else{
            foreach(array_keys($array) as $key){ 
                $temp[$key] = $array[$key][$index]; 
                 
                if ($temp[$key] == $value){ 
                    $newarray[$key] = $array[$key]; 
                } 
            }
        }             
    } 
    return $newarray;
}

// sort array object by column name
function array_object_multi_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
	if (empty($col) || ! is_array($arr)) return false;

	$sortCol = array();
	foreach ($arr as $key => $row) {
		$sortCol[$key] = $row->$col;
	}

	array_multisort($sortCol, $dir, $arr);
}

/**
 * Check if a given ip is in a network
 * @param  string $ip    IP to check in IPV4 format eg. 127.0.0.1
 * @param  string $range IP/CIDR netmask eg. 127.0.0.0/24, also 127.0.0.1 is accepted and /32 assumed
 * @return boolean true if the ip is in this range / false if not.
 */
function ip_in_range($ip, $range)
{
    if (strpos($range, '/') == false) {
        $range .= '/32';
    }
    // $range is in IP/CIDR format eg 127.0.0.1/24
    list($range, $netmask) = explode('/', $range, 2);
    $range_decimal = ip2long($range);
    $ip_decimal = ip2long($ip);
    $wildcard_decimal = pow(2, (32 - $netmask)) - 1;
    $netmask_decimal = ~$wildcard_decimal;
    return (($ip_decimal & $netmask_decimal) == ($range_decimal & $netmask_decimal));
}

/*

function log_message($level, $message)
{
    static $_log;

    // add more info on db error 
    $url = @get_instance()->uri->segment_array();
    $method = @get_instance()->router->fetch_method();
    $class = @get_instance()->router->fetch_class();
    $additional_message = '';
    if(is_array($url)) $additional_message .= ' - URL: '.implode('/', $url);
    if($class) $additional_message .= ' - Class: '.$class;
    if($method) $additional_message .= ' - Function: '.$method;    

    if ($_log === NULL)
    {
        // references cannot be directly assigned to static variables, so we use an array
        $_log[0] =& load_class('Log', 'core');
    }

    $_log[0]->write_log($level, $message);
}

*/