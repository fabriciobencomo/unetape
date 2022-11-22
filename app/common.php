<?php

if (!function_exists("__utf8_encode_mod")) {
	function __utf8_encode_mod($data)
	{
		if (is_array($data)) {
			$data_array = $data;

			foreach ($data_array as $key => $val) {
				$data[$key] = __utf8_encode_mod($val);
			}

			return $data;
		}

		if (is_object($data)) {
			$data_array = get_object_vars($data);

			foreach ($data_array as $k => $v) {
				$data->$k = __utf8_encode_mod($v);
			}

			return $data;
		}

		$coding = mb_detect_encoding($data, 'UTF-8, ISO-8859-1');
		$data = ($coding == 'ISO-8859-1') ? utf8_encode($data) : $data;

		return $data;
	}
}

//Sanitize Values in Inputs

function s($html){
    $s = htmlspecialchars($html);
    return $s;
}