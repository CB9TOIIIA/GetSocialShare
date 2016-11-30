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

$mysiteurl = array('http://joomla.ru/','http://jbzoo.ru/','http://joomla-support.ru/','http://acme-digital.ru/','http://joomla.org/','http://habrahabr.ru/');

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <style media="screen">
button,hr,input{overflow:visible}legend,table{max-width:100%}table{background-color:transparent;border-collapse:collapse;border-spacing:0}.table{width:100%;margin-bottom:18px}.table td,.table th{padding:8px;line-height:18px;text-align:left;vertical-align:top;border-top:1px solid #ddd}.table th{font-weight:700}.table thead th{vertical-align:bottom}progress,sub,sup{vertical-align:baseline}.table caption+thead tr:first-child td,.table caption+thead tr:first-child th,.table colgroup+thead tr:first-child td,.table colgroup+thead tr:first-child th,.table thead:first-child tr:first-child td,.table thead:first-child tr:first-child th{border-top:0}.table tbody+tbody{border-top:2px solid #ddd}.table .table{background-color:#fff}.table-condensed td,.table-condensed th{padding:4px 5px}[type=checkbox],[type=radio],legend{box-sizing:border-box;padding:0}.table-bordered{border:1px solid #ddd;border-collapse:separate;border-left:0;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.table-bordered td,.table-bordered th{border-left:1px solid #ddd}.table-bordered caption+tbody tr:first-child td,.table-bordered caption+tbody tr:first-child th,.table-bordered caption+thead tr:first-child th,.table-bordered colgroup+tbody tr:first-child td,.table-bordered colgroup+tbody tr:first-child th,.table-bordered colgroup+thead tr:first-child th,.table-bordered tbody:first-child tr:first-child td,.table-bordered tbody:first-child tr:first-child th,.table-bordered thead:first-child tr:first-child th{border-top:0}.table-bordered tbody:first-child tr:first-child>td:first-child,.table-bordered tbody:first-child tr:first-child>th:first-child,.table-bordered thead:first-child tr:first-child>th:first-child{-webkit-border-top-left-radius:4px;-moz-border-radius-topleft:4px;border-top-left-radius:4px}.table-bordered tbody:first-child tr:first-child>td:last-child,.table-bordered tbody:first-child tr:first-child>th:last-child,.table-bordered thead:first-child tr:first-child>th:last-child{-webkit-border-top-right-radius:4px;-moz-border-radius-topright:4px;border-top-right-radius:4px}.table-bordered tbody:last-child tr:last-child>td:first-child,.table-bordered tbody:last-child tr:last-child>th:first-child,.table-bordered tfoot:last-child tr:last-child>td:first-child,.table-bordered tfoot:last-child tr:last-child>th:first-child,.table-bordered thead:last-child tr:last-child>th:first-child{-webkit-border-bottom-left-radius:4px;-moz-border-radius-bottomleft:4px;border-bottom-left-radius:4px}.table-bordered tbody:last-child tr:last-child>td:last-child,.table-bordered tbody:last-child tr:last-child>th:last-child,.table-bordered tfoot:last-child tr:last-child>td:last-child,.table-bordered tfoot:last-child tr:last-child>th:last-child,.table-bordered thead:last-child tr:last-child>th:last-child{-webkit-border-bottom-right-radius:4px;-moz-border-radius-bottomright:4px;border-bottom-right-radius:4px}.table-bordered tfoot+tbody:last-child tr:last-child td:first-child{-webkit-border-bottom-left-radius:0;-moz-border-radius-bottomleft:0;border-bottom-left-radius:0}.table-bordered tfoot+tbody:last-child tr:last-child td:last-child{-webkit-border-bottom-right-radius:0;-moz-border-radius-bottomright:0;border-bottom-right-radius:0}.table-bordered caption+tbody tr:first-child td:first-child,.table-bordered caption+thead tr:first-child th:first-child,.table-bordered colgroup+tbody tr:first-child td:first-child,.table-bordered colgroup+thead tr:first-child th:first-child{-webkit-border-top-left-radius:4px;-moz-border-radius-topleft:4px;border-top-left-radius:4px}.table-bordered caption+tbody tr:first-child td:last-child,.table-bordered caption+thead tr:first-child th:last-child,.table-bordered colgroup+tbody tr:first-child td:last-child,.table-bordered colgroup+thead tr:first-child th:last-child{-webkit-border-top-right-radius:4px;-moz-border-radius-topright:4px;border-top-right-radius:4px}.table-striped tbody>tr:nth-child(odd)>td,.table-striped tbody>tr:nth-child(odd)>th{background-color:#f9f9f9}.table-hover tbody tr:hover>td,.table-hover tbody tr:hover>th{background-color:#f5f5f5}.row-fluid table td[class*=span],.row-fluid table th[class*=span],table td[class*=span],table th[class*=span]{display:table-cell;float:none;margin-left:0}audio,canvas,progress,video{display:inline-block}.table td.span1,.table th.span1{float:none;width:44px;margin-left:0}.table td.span2,.table th.span2{float:none;width:124px;margin-left:0}.table td.span3,.table th.span3{float:none;width:204px;margin-left:0}.table td.span4,.table th.span4{float:none;width:284px;margin-left:0}.table td.span5,.table th.span5{float:none;width:364px;margin-left:0}.table td.span6,.table th.span6{float:none;width:444px;margin-left:0}.table td.span7,.table th.span7{float:none;width:524px;margin-left:0}.table td.span8,.table th.span8{float:none;width:604px;margin-left:0}.table td.span9,.table th.span9{float:none;width:684px;margin-left:0}.table td.span10,.table th.span10{float:none;width:764px;margin-left:0}.table td.span11,.table th.span11{float:none;width:844px;margin-left:0}.table td.span12,.table th.span12{float:none;width:924px;margin-left:0}.table tbody tr.success>td{background-color:#dff0d8}.table tbody tr.error>td{background-color:#f2dede}.table tbody tr.warning>td{background-color:#fcf8e3}.table tbody tr.info>td{background-color:#d9edf7}.table-hover tbody tr.success:hover>td{background-color:#d0e9c6}.table-hover tbody tr.error:hover>td{background-color:#ebcccc}.table-hover tbody tr.warning:hover>td{background-color:#faf2cc}.table-hover tbody tr.info:hover>td{background-color:#c4e3f3}/*! normalize.css v5.0.0 | MIT License | github.com/necolas/normalize.css */html{font-family:sans-serif;line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,main,menu,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}dfn{font-style:italic}mark{background-color:#ff0;color:#000}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{color:inherit;display:table;white-space:normal}textarea{overflow:auto}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}small,table,td,tr{font-family:Helvetica}summary{display:list-item}[hidden],template{display:none}table,td,tr,p,b{font-size:13px}small{font-size:10.5px}
    </style>
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

      <?php

      list($msec,$sec)=explode(chr(32),microtime());
      $headtime=$sec+$msec;


      $badurls = array();

      foreach ($mysiteurl as $mysiteurlone) {

        sleep(1); // maybe

        $fbresponse = $httpClient->request(FB_URL, [
          'id' => $mysiteurlone,
          'access_token' => FB_URL_ACCESS_TOKEN
        ], 'get');

        $jsonfb = $fbresponse->getJSON();
        if (empty($jsonfb->find('share.share_count'))) {
          $fbcountar[] = '0';
        }
        else {
          $fbcountar[] = $jsonfb->find('share.share_count');
        }
        $fbcount= $jsonfb->find('share.share_count');
        $FB_value_title = $jsonfb->find('og_object.title');
        $FB_value_updated_time = $jsonfb->find('og_object.updated_time');
        $FB_value_url= $jsonfb->get('id');
        $FB_value_urlar[] = $jsonfb->get('id');

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

        if ($date == '01.01.70') {
          stream_context_set_default(
            array(
              'http' => array(
                'method' => 'HEAD'
              )
            )
          );
          $get_headersurl = get_headers($mysiteurlone);
          $TestDate = str_replace('Date: ','',$get_headersurl[2]);
          $datenotformat = strtotime($TestDate);
          $date = date("d.m.Y", $datenotformat);
        }
        $datear[] = $date;

        if (empty($FB_value_title)) {

          $options = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n" .
                        "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
            )
          );

          $context = stream_context_create($options);
          $page_content = file_get_contents($mysiteurlone, false, $context);
          preg_match_all( "|<title>(.*)</title>|sUSi", $page_content, $titles);
          if (empty($titles[1][0])) {
            $FB_value_titles[] = 'Неизвестно';
          }
          else {
            $FB_value_titles[] = $titles[1][0];
          }
        }
        else {
          $FB_value_titles[] = $FB_value_title;
        }

        $total = $fbcount + $vkcount + $okcount;
        $totalall[] = $fbcount + $vkcount + $okcount;

      }

      if ($date == '01.01.70' || $fbcount == '0') {

        $badurls[] = $mysiteurlone;

      }


      ?>

    </tbody>
  </table>

  <?php

  $fbar = array_sum($fbcountar);
  $vkar = array_sum($vkcountar);
  $okar = array_sum($okcountar);
  $totalalls = array_sum($totalall);

  array_multisort($totalall, $datear, $FB_value_urlar, $fbcountar, $vkcountar, $okcountar, $FB_value_titles, SORT_DESC, SORT_NUMERIC);

  $globalsoc = [$totalall, $datear, $FB_value_urlar, $fbcountar, $vkcountar, $okcountar, $FB_value_titles];

  array_multisort($globalsoc[0], SORT_DESC, SORT_NUMERIC,  $globalsoc[1], SORT_STRING, SORT_DESC,  $globalsoc[2], SORT_NUMERIC, SORT_DESC,  $globalsoc[3], SORT_NUMERIC, SORT_DESC,  $globalsoc[4], SORT_NUMERIC, SORT_DESC,  $globalsoc[5], SORT_NUMERIC, SORT_DESC,  $globalsoc[6], SORT_STRING, SORT_DESC);

?>

<table style="width: 600px; border: 1px solid #000; font-family: Helvetica;">
  <thead>
    <tr style='border: 1px solid #000'>
      <td style='border: 1px solid #000; width: 30px; text-align:center; font-weight: bold;  '></td>
      <td style='border: 1px solid #000; width: 80px; text-align:center;font-weight: bold;  '>Дата</td>
      <td style='border: 1px solid #000; text-align:center;font-weight: bold;  '>Адрес страницы</td>
      <td style='border: 1px solid #000; width: 30px; text-align:center;font-weight: bold;  '>FB</td>
      <td style='border: 1px solid #000; width: 30px; text-align:center;font-weight: bold;  '>VK</td>
      <td style='border: 1px solid #000; width: 30px; text-align:center;font-weight: bold;  '>OK</td>
      <td style='border: 1px solid #000; width: 80px; text-align:center;font-weight: bold;  '>Всего</td>
    </tr>
  </thead>
  <tbody>

<?php

$Gtotals = $globalsoc[0];
$Gdates = $globalsoc[1];
$GUrls = $globalsoc[2];
$GFBs = $globalsoc[3];
$GVKs = $globalsoc[4];
$GOKs = $globalsoc[5];
$Titles = $globalsoc[6];
$numtable = 0;

foreach($Gtotals as $key => $value){
  $numtable++;
  echo '<tr style="border: 1px solid #000"><td style=" border: 1px solid #000;  text-align:center; ">' . $numtable .'</td><td style=" border: 1px solid #000;  text-align:center; ">' . $Gdates[$key] .'</td><td style=" border: 1px solid #000;  text-align:left;  padding: 0px 5px; "><a target="_blank" href="'.$GUrls[$key].'">' . $Titles[$key] .'</a><br><small>'.$GUrls[$key].'</small></td><td style=" border: 1px solid #000;text-align:center; ">' . $GFBs[$key] .'</td><td style=" border: 1px solid #000;  text-align:center; ">' . $GVKs[$key] .'</td><td style=" border: 1px solid #000;  text-align:center; ">' . $GOKs[$key] .'</td><td style="font-size: 10px; border: 1px solid #000;  text-align:center;">' . $Gtotals[$key] .'</td></tr>';
}

echo "</tbody>";
echo "</table>";

?>


  <?
  echo "<div style='clear:both'></div>";
  echo "<br>";
  echo "<b>Итого: FB {$fbar} / VK {$vkar} / OK {$okar} </b>";
  echo "<br>";
  $allsoc = $fbar+$vkar+$okar;
  echo "<b>Общее кол-во share: {$allsoc} </b>";
  // echo "<br>";
  // echo "<b>Общее total: {$totalall} </b>";
  echo "<hr>";

  if (!empty($badurls)) {
      echo "<br>";
    echo "Плохие url: ";
  echo "<br>";
  foreach ($badurls as $badurl) {
    echo $badurl;
    echo "<br>";
  }
}
  list($msec,$sec)=explode(chr(32),microtime());

  echo "<b>Страница сгенерировалась за ".round(($sec+$msec)-$headtime,4)." сек.</b>";

  ?>

</body>
</html>
