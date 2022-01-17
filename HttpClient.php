<?php
$errors = [];
$fields = ['url', 'headers', 'params', 'method'];
$optionalFields = [];
$values = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($fields as $field) {
        if (empty($_POST[$field]) && !in_array($field, $optionalFields)) {
            $errors[] = $field;
        } else {
            $values[$field] = $_POST[$field];
        }
    }
	if(count($errors)){
		echo "error";
	}else{
		$params = json_decode($values['params'], null);
		$headerArr = json_decode($values['headers'], null);
		$header = '';
		foreach($headerArr as $key => $val){
			$header .= $key . ": " .$val . " \r\n";
		}
		$postdata = http_build_query(
			$params
		);
		$opts = array('http' =>
			array(
				'method'  => $values['method'],
				'header'  => $header,
				'content' => $postdata
			)
		);
		$res = post($opts, $values['url']);
		echo "Result : " . $res;
	}
}
	
function post($options, $url){
	try {
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		return $result;
	}catch(Exception $e) {
		echo 'Message: ' .$e->getMessage();
	}
}