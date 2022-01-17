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
		$postdata = http_build_query(
			$params
		);
		$opts = array('http' =>
			array(
				'method'  => 'OPTION',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			)
		);
		$res = post($opts, 'https://corednacom.corewebdna.com/assessment-endpoint.php');
		var_dump($res);die;
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