<?php
$tim = $_GET['key'];
$lam = json_decode(auto('http://ac.mp3.zing.vn/complete/desktop?type=song&query='.urlencode($tim)),true);
$id = $lam[data][0][song][0][id];

$mp3 = json_decode(auto('http://api.mp3.zing.vn/api/mobile/song/getsonginfo?requestdata=%7B"id":"'.$id.'"%7D'),true);
echo '{ "messages": [ { "attachment": { "type": "audio", "payload": { "url": "';
echo $mp3[source][128];
echo '" } } } ] }';
echo $id2;
function auto($url){
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl);
return $ch;
}
?>
