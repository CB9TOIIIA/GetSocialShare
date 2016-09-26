<?php
require_once './vendor/autoload.php'; // composer autoload.php
set_time_limit(0);
define('FB_URL','https://graph.facebook.com/');
define('VK_URL','https://vk.com/share.php');
define('OK_URL','https://connect.ok.ru/dk');
define('FB_URL_ACCESS_TOKEN','000000000111111|-yyyyyyyyyyyyyyazzzzzzzzzzz');

// Get needed classes
use JBZoo\HttpClient\HttpClient;

// Configure client (no options required!)
$httpClient = new HttpClient([
    'driver'          => 'Auto',    // (Auto|Guzzle5|Guzzle6|Rmccue)
    'timeout'         => 30,        // Wait in seconds
    'verify'          => false,     // Check cert for SSL
    'exceptions'      => false,     // Show exceptions for statuses 4xx and 5xx
    'allow_redirects' => true,      // Show real 3xx-header or result?
    'max_redirects'   => 10,        // How much to reirect?
    'user_agent'      => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.70 Safari/537.36', // Custom UA
]);

$mysiteurl = array('http://mysite.ru/test','http://mysite.ru/test2','http://mysite.ru/test3');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Получаем SMM метрики с социальных сетей</title>

  <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" media="screen" title="no title">
  <script type="text/javascript">
  jQuery(document).ready(function($) {
    $("#myTable").DataTable({language:{url:"/assets/Russian.json"}});
  });
  </script> -->

</head>
<body>
<table id="myTable" class="zebratable tablesorter tablesorter-default" role="grid">
<thead>
<tr>
  <td>Дата</td>
  <td>Title + URL</td>
  <td>FB</td>
  <td>VK</td>
  <td>OK</td>
</tr>
</thead>
<tbody>

<?php
$badurls = array();

foreach ($mysiteurl as $mysiteurlone) {

sleep(3); // maybe

  $fbresponse = $httpClient->request(FB_URL, [
      'id' => $mysiteurlone,
      'access_token' => FB_URL_ACCESS_TOKEN
  ], 'get');

  $jsonfb = $fbresponse->getJSON();
  $fbcountar[]= $jsonfb->find('share.share_count');
  $fbcount= $jsonfb->find('share.share_count');
  $FB_value_title = $jsonfb->find('og_object.title');
  $FB_value_updated_time = $jsonfb->find('og_object.updated_time');
  $FB_value_url= $jsonfb->get('id');

  $date = date('d.m.y',strtotime($FB_value_updated_time));

  $vkresponse = $httpClient->request(VK_URL, [
    'act' => 'count',
    'index' => '1',
    'url' => $mysiteurlone,
  ], 'get');

  $jsonvk = $vkresponse->body;
  preg_match('#VK.Share.count\(1, ([0-9]+)\);#', $jsonvk, $vkmatch);
  $vkcountar[] = $vkmatch[1];
  $vkcount = $vkmatch[1];


  $okresponse = $httpClient->request(OK_URL, [
    'st.cmd' => 'extLike',
    'uid' => 'odklcnt0',
    'ref' => $mysiteurlone,
  ], 'get');

  $jsonok = $okresponse->body;
  preg_match("#ODKL\.updateCount\('odklcnt0'\,'([0-9]+)'\);#", $jsonok, $okmatch);
  $okcountar[] = $okmatch[1];
  $okcount = $okmatch[1];

  if (empty($fbcount)) {
    $fbcount = 0;
  }

  // if (empty($fbcount) || empty($vkcount) || empty($okcount)) {
  //   $okcount = 0;
  //   $vkcount = 0;
  //   $fbcount = 0;
  // }

  // if ($date != '01.01.70') {
  //
  //   if ($fbcount != 0 && $vkcount != 0 && $okcount != 0) {

    echo "<tr>
    <td>{$date}</td>";


    if (empty($FB_value_title && $FB_value_url)) {
      echo "<td>{$mysiteurlone}</td>";
    }
    else {
      echo "<td><a target='_blank' href='{$FB_value_url}'>{$FB_value_title}</a></td>";
    }

    echo "
    <td>{$fbcount}</td>
    <td>{$vkcount}</td>
    <td>{$okcount}</td>

    </tr>";

  }

  if ($date == '01.01.70' || $fbcount == '0') {

    $badurls[] = $mysiteurlone;

}



// }

// }

?>

</tbody>
</table>

<?php
$fbar = array_sum($fbcountar);
$vkar = array_sum($vkcountar);
$okar = array_sum($okcountar);

echo "<div style='clear:both'></div>";
echo "<br>";
echo "<b>Итого: FB {$fbar} / VK {$vkar} / OK {$okar} </b>";
echo "<hr>";
echo "<br>";
echo "Плохие url: ";
echo "<br>";
foreach ($badurls as $badurl) {
  echo $badurl;
  echo "<br>";
}
?>

</body>
</html>
