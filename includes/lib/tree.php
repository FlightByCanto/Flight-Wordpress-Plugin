<?php
if(isset($_REQUEST['ablumid'])){
    $url = 'https://'. $_REQUEST['subdomain'] .'.cantoflight.com/api/v1/tree/'. $_REQUEST['ablumid'] .'?sortBy=name&sortDirection=ascending';
}else{
    $url = 'https://'. $_REQUEST['subdomain'] .'.cantoflight.com/api/v1/tree?sortBy=name&sortDirection=ascending&layer=1';
    // $url = 'https://'. $_REQUEST['subdomain'] .'.cantoflight.com/api/v1/tree?sortBy=name&sortDirection=ascending';
}


$header = array( 'Authorization: Bearer '. $_REQUEST['token']);

$ch = curl_init();

$options = array(
    CURLOPT_URL            => $url,
    CURLOPT_REFERER        => 'Wordpress Plugin',
    CURLOPT_USERAGENT      => 'Wordpress Plugin',
    CURLOPT_HTTPHEADER     => $header,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HEADER         => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TIMEOUT        => 60,
    CURLOPT_ENCODING       => ''
);

curl_setopt_array( $ch, $options );
$data = curl_exec( $ch );
curl_close( $ch );

$out = json_decode($data);


header('Content-Type: application/json;charset=utf-8');
echo json_encode($out -> results);

?>
