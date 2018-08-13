<?php

function exibeCampo($arr, $campo, $out = true) {
	$ret = '';
	if( isset($arr[$campo]) ) {
		$ret = $arr[$campo];
	} elseif(isset($arr[0]) && isset($arr[0][$campo])) {
		$ret = $arr[0][$campo];
	}

	if($out) {
		echo $ret;
	} else {
		return $ret;
	}
}

function debug($var) {
	echo '<pre>';
	echo var_dump($var);
	exit;
}

function validaUpload($campo) {
	$CI =& get_instance();
    $config = [
        'upload_path' => './uploads/',
        'allowed_types' => 'gif|jpg|png',
        'max_size' => 100,
        'max_width' => 100,
        'max_height' => 100
    ];

    $CI->load->library('upload', $config);

    // Faz o upload para a pasta "uploads"
    if (! $CI->upload->do_upload($campo)) {
        $data = $CI->upload->display_errors();
    } else {
        $data = $CI->upload->data();
    }

    return $data;
}