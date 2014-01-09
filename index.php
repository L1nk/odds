<?

const OPEN_DNS = 'location.replace("http://block.a.id.opendns.com';

$url = "xvideos.com";

$response = array();
exec('host ' . $url . ' 208.67.222.123', $response);

$line = explode(" ", $response[5]);
$ip = $line[3];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$ip);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$out = curl_exec($ch);
curl_close($ch);

var_dump(strpos($out, OPEN_DNS) === false);

if(strpos($out, OPEN_DNS) == false) {

	echo "Not Blocked";

}
