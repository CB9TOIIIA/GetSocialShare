<?php 
ignore_user_abort(false);
set_time_limit(0);

$UrlFileName = 'urltest.log'; // название файла с ссылками
$UrlOneFileLimit = 50; // разбивать большой файл на маленькие файлы по этому кол-ву.
$ResultTable = 25; // отсортировать и обрезать массив до этого числа
$OkMainDomain = 'site.com'; // поиск домена для замены в ОК
$OkReplaceDomain = 'site.online'; // заменять для ОК домен на этот
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <style media="screen">
button,hr,input{overflow:visible}legend,table{max-width:100%}table{background-color:transparent;border-collapse:collapse;border-spacing:0}.table{width:100%;margin-bottom:18px}.table td,.table th{padding:8px;line-height:18px;text-align:left;vertical-align:top;border-top:1px solid #ddd}.table th{font-weight:700}.table thead th{vertical-align:bottom}progress,sub,sup{vertical-align:baseline}.table caption+thead tr:first-child td,.table caption+thead tr:first-child th,.table colgroup+thead tr:first-child td,.table colgroup+thead tr:first-child th,.table thead:first-child tr:first-child td,.table thead:first-child tr:first-child th{border-top:0}.table tbody+tbody{border-top:2px solid #ddd}.table .table{background-color:#fff}.table-condensed td,.table-condensed th{padding:4px 5px}[type=checkbox],[type=radio],legend{box-sizing:border-box;padding:0}.table-bordered{border:1px solid #ddd;border-collapse:separate;border-left:0;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.table-bordered td,.table-bordered th{border-left:1px solid #ddd}.table-bordered caption+tbody tr:first-child td,.table-bordered caption+tbody tr:first-child th,.table-bordered caption+thead tr:first-child th,.table-bordered colgroup+tbody tr:first-child td,.table-bordered colgroup+tbody tr:first-child th,.table-bordered colgroup+thead tr:first-child th,.table-bordered tbody:first-child tr:first-child td,.table-bordered tbody:first-child tr:first-child th,.table-bordered thead:first-child tr:first-child th{border-top:0}.table-bordered tbody:first-child tr:first-child>td:first-child,.table-bordered tbody:first-child tr:first-child>th:first-child,.table-bordered thead:first-child tr:first-child>th:first-child{-webkit-border-top-left-radius:4px;-moz-border-radius-topleft:4px;border-top-left-radius:4px}.table-bordered tbody:first-child tr:first-child>td:last-child,.table-bordered tbody:first-child tr:first-child>th:last-child,.table-bordered thead:first-child tr:first-child>th:last-child{-webkit-border-top-right-radius:4px;-moz-border-radius-topright:4px;border-top-right-radius:4px}.table-bordered tbody:last-child tr:last-child>td:first-child,.table-bordered tbody:last-child tr:last-child>th:first-child,.table-bordered tfoot:last-child tr:last-child>td:first-child,.table-bordered tfoot:last-child tr:last-child>th:first-child,.table-bordered thead:last-child tr:last-child>th:first-child{-webkit-border-bottom-left-radius:4px;-moz-border-radius-bottomleft:4px;border-bottom-left-radius:4px}.table-bordered tbody:last-child tr:last-child>td:last-child,.table-bordered tbody:last-child tr:last-child>th:last-child,.table-bordered tfoot:last-child tr:last-child>td:last-child,.table-bordered tfoot:last-child tr:last-child>th:last-child,.table-bordered thead:last-child tr:last-child>th:last-child{-webkit-border-bottom-right-radius:4px;-moz-border-radius-bottomright:4px;border-bottom-right-radius:4px}.table-bordered tfoot+tbody:last-child tr:last-child td:first-child{-webkit-border-bottom-left-radius:0;-moz-border-radius-bottomleft:0;border-bottom-left-radius:0}.table-bordered tfoot+tbody:last-child tr:last-child td:last-child{-webkit-border-bottom-right-radius:0;-moz-border-radius-bottomright:0;border-bottom-right-radius:0}.table-bordered caption+tbody tr:first-child td:first-child,.table-bordered caption+thead tr:first-child th:first-child,.table-bordered colgroup+tbody tr:first-child td:first-child,.table-bordered colgroup+thead tr:first-child th:first-child{-webkit-border-top-left-radius:4px;-moz-border-radius-topleft:4px;border-top-left-radius:4px}.table-bordered caption+tbody tr:first-child td:last-child,.table-bordered caption+thead tr:first-child th:last-child,.table-bordered colgroup+tbody tr:first-child td:last-child,.table-bordered colgroup+thead tr:first-child th:last-child{-webkit-border-top-right-radius:4px;-moz-border-radius-topright:4px;border-top-right-radius:4px}.table-striped tbody>tr:nth-child(odd)>td,.table-striped tbody>tr:nth-child(odd)>th{background-color:#f9f9f9}.table-hover tbody tr:hover>td,.table-hover tbody tr:hover>th{background-color:#f5f5f5}.row-fluid table td[class*=span],.row-fluid table th[class*=span],table td[class*=span],table th[class*=span]{display:table-cell;float:none;margin-left:0}audio,canvas,progress,video{display:inline-block}.table td.span1,.table th.span1{float:none;width:44px;margin-left:0}.table td.span2,.table th.span2{float:none;width:124px;margin-left:0}.table td.span3,.table th.span3{float:none;width:204px;margin-left:0}.table td.span4,.table th.span4{float:none;width:284px;margin-left:0}.table td.span5,.table th.span5{float:none;width:364px;margin-left:0}.table td.span6,.table th.span6{float:none;width:444px;margin-left:0}.table td.span7,.table th.span7{float:none;width:524px;margin-left:0}.table td.span8,.table th.span8{float:none;width:604px;margin-left:0}.table td.span9,.table th.span9{float:none;width:684px;margin-left:0}.table td.span10,.table th.span10{float:none;width:764px;margin-left:0}.table td.span11,.table th.span11{float:none;width:844px;margin-left:0}.table td.span12,.table th.span12{float:none;width:924px;margin-left:0}.table tbody tr.success>td{background-color:#dff0d8}.table tbody tr.error>td{background-color:#f2dede}.table tbody tr.warning>td{background-color:#fcf8e3}.table tbody tr.info>td{background-color:#d9edf7}.table-hover tbody tr.success:hover>td{background-color:#d0e9c6}.table-hover tbody tr.error:hover>td{background-color:#ebcccc}.table-hover tbody tr.warning:hover>td{background-color:#faf2cc}.table-hover tbody tr.info:hover>td{background-color:#c4e3f3}/*! normalize.css v5.0.0 | MIT License | github.com/necolas/normalize.css */html{font-family:sans-serif;line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,main,menu,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}dfn{font-style:italic}mark{background-color:#ff0;color:#000}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{color:inherit;display:table;white-space:normal}textarea{overflow:auto}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}small,table,td,tr{font-family:Helvetica}summary{display:list-item}[hidden],template{display:none}table,td,tr,p,b{font-size:13px}small{font-size:10.5px}html,body,.loader-container{margin:0;height:100%;width:100%}.loader-container{position:relative;background-color:#212526}.structure,.smoke{position:absolute;z-index:1000;top:calc(50% - 65px);left:calc(50% - 100px);width:200px;height:130px}.smoke{z-index:999}.structure{transform:translate3d(0,0,0);perspective:1000px;animation:shake .42s cubic-bezier(.36,.07,.19,.97) both infinite}.text-container{position:absolute;top:calc(50% + 100px);left:calc(50% - 100px);width:200px}.text-container h2{width:100%;text-align:center;font-family:"Roboto Condensed",sans-serif;font-weight:700;text-transform:uppercase;color:#fff}#rocket-svg{position:absolute;top:-112px;transform:rotate(90deg)}#right-wing,#left-wing,#nose,#window-stroke,#middle-wing{fill:#f44336}#rocket-main-part{fill:gold}#window-inner{fill:#212526}.smoke span{position:absolute;width:50px;border-bottom:2px solid #fff}.meteors-container{position:absolute;z-index:998;width:100%;height:100%;overflow:hidden}.meteors-container span{position:absolute;width:75px;border-bottom:2px solid #fff}.smoke span:nth-child(1){top:28px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-0 ease-out .6s infinite}@keyframes smokeAnim-0{0%{left:-50px;opacity:1}to{left:-270px;opacity:0}}.smoke span:nth-child(2){top:36px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-1 ease-out .2s infinite}@keyframes smokeAnim-1{0%{left:-50px;opacity:1}to{left:-131px;opacity:0}}.smoke span:nth-child(3){top:44px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-2 ease-out .55s infinite}@keyframes smokeAnim-2{0%{left:-50px;opacity:1}to{left:-262px;opacity:0}}.smoke span:nth-child(4){top:52px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-3 ease-out .35s infinite}@keyframes smokeAnim-3{0%{left:-50px;opacity:1}to{left:-289px;opacity:0}}.smoke span:nth-child(5){top:60px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-4 ease-out .5s infinite}@keyframes smokeAnim-4{0%{left:-50px;opacity:1}to{left:-211px;opacity:0}}.smoke span:nth-child(6){top:68px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-5 ease-out .6s infinite}@keyframes smokeAnim-5{0%{left:-50px;opacity:1}to{left:-221px;opacity:0}}.smoke span:nth-child(7){top:76px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-6 ease-out .55s infinite}@keyframes smokeAnim-6{0%{left:-50px;opacity:1}to{left:-67px;opacity:0}}.smoke span:nth-child(8){top:84px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-7 ease-out .5s infinite}@keyframes smokeAnim-7{0%{left:-50px;opacity:1}to{left:-212px;opacity:0}}.smoke span:nth-child(9){top:92px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-8 ease-out .4s infinite}@keyframes smokeAnim-8{0%{left:-50px;opacity:1}to{left:-238px;opacity:0}}.smoke span:nth-child(10){top:100px;left:-50px;box-shadow:0 0 5px #fff;animation:smokeAnim-9 ease-out .55s infinite}@keyframes smokeAnim-9{0%{left:-50px;opacity:1}to{left:-225px;opacity:0}}.meteors-container span:nth-child(1){top:16.6666666667%;left:100%;box-shadow:0 0 5px #fff;animation:meterosAnim-0 linear .7s infinite}@keyframes meterosAnim-0{0%{left:100%}75%{left:calc(0 - 75px)}to{left:calc(0 - 75px)}}.meteors-container span:nth-child(2){top:33.3333333333%;left:100%;box-shadow:0 0 5px #fff;animation:meterosAnim-1 linear .55s infinite}@keyframes meterosAnim-1{0%{left:100%}75%{left:calc(0 - 75px)}to{left:calc(0 - 75px)}}.meteors-container span:nth-child(3){top:50%;left:100%;box-shadow:0 0 5px #fff;animation:meterosAnim-2 linear .65s infinite}@keyframes meterosAnim-2{0%{left:100%}75%{left:calc(0 - 75px)}to{left:calc(0 - 75px)}}.meteors-container span:nth-child(4){top:66.6666666667%;left:100%;box-shadow:0 0 5px #fff;animation:meterosAnim-3 linear .45s infinite}@keyframes meterosAnim-3{0%{left:100%}75%{left:calc(0 - 75px)}to{left:calc(0 - 75px)}}.meteors-container span:nth-child(5){top:83.3333333333%;left:100%;box-shadow:0 0 5px #fff;animation:meterosAnim-4 linear .65s infinite}@keyframes meterosAnim-4{0%{left:100%}75%{left:calc(0 - 75px)}to{left:calc(0 - 75px)}}.meteors-container span:nth-child(6){top:100%;left:100%;box-shadow:0 0 5px #fff;animation:meterosAnim-5 linear .65s infinite}@keyframes meterosAnim-5{0%{left:100%}75%{left:calc(0 - 75px)}to{left:calc(0 - 75px)}}@keyframes shake{10%,90%{transform:translate3d(-1px,1px,0)}20%,80%{transform:translate3d(2px,2px,0)}30%,50%,70%{transform:translate3d(-2px,-2px,0)}40%,60%{transform:translate3d(2px,2px,0)}}
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
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script>$(window).on('load', function () {
$(".loader-container").fadeOut(2500);
});</script> -->

<script>
window.addEventListener('load', function () {
      var myDiv = document.getElementById("loader-container"),

    show = function(){
      myDiv.style.display = "block";
      setTimeout(hide, 1000); // 5 seconds
    },

    hide = function(){
      myDiv.style.display = "none";
    };

    hide();
}, false);

</script>
</head>
<body>
<div id="loader-container" class='loader-container' style="display:block">
  <div class='rocket-container'>
    <div class='structure'>
      <svg height='352' id='rocket-svg' version='1.1' viewbox='0 0 59.266662 93.133333' width='224' xmlns='http://www.w3.org/2000/svg'>
        <g id='layer2' transform='translate(-33.866666,-33.866666)'>
          <path d='m 296,336 a 8.0000078,8.0000078 0 0 0 -8,8 v 80 a 8.0000078,7.9999501 0 0 0 1.16406,4.14062 l -0.22461,0.11329 49.32227,49.32031 0.0781,0.0801 0.004,-0.004 A 7.9999934,8.0000655 0 0 0 344,480 a 7.9999934,8.0000655 0 0 0 8,-8 v -80 a 7.9999934,7.9998924 0 0 0 -2.34961,-5.65625 l 0.004,-0.004 -48.00391,-48.00195 -0.004,0.002 A 8.0000078,8.0000078 0 0 0 296,336 Z' id='right-wing' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
          <path d='m 184,336 a 8.0000006,8.0000078 0 0 0 -5.65234,2.3457 l -0.004,-0.002 -47.91797,47.91797 -0.082,0.082 0.004,0.002 A 8.0000078,7.9998924 0 0 0 128,392 v 80 a 8.0000078,8.0000655 0 0 0 8,8 8.0000078,8.0000655 0 0 0 5.65625,-2.34961 l 0.004,0.004 49.40039,-49.40039 -0.22657,-0.11329 A 8.0000006,7.9999501 0 0 0 192,424 v -80 a 8.0000006,8.0000078 0 0 0 -8,-8 z' id='left-wing' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
          <path d='M 239.96875,128 A 111.99996,124.13082 0 0 0 176,240 l 16,200 a 8.0000006,8.0000655 0 0 0 8,8 h 80 a 8.0000078,8.0000655 0 0 0 8,-8 L 304,240 A 111.99996,124.13082 0 0 0 239.96875,128 Z' id='rocket-main-part' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
          <path d='m 239.96875,128 a 111.99996,124.13082 0 0 0 -47.77344,48 h 95.51953 a 111.99996,124.13082 0 0 0 -47.74609,-48 z' id='nose' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
          <ellipse cx='63.5' cy='59.266663' id='window-stroke' rx='7.4083333' ry='7.4083328' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.26458332;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1'></ellipse>
          <ellipse cx='63.499996' cy='59.266666' id='window-inner' rx='6.3499975' ry='6.3500061' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.26458332;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1'></ellipse>
          <path d='m 240,336 a 7.9999898,8.0000078 0 0 0 -8,8 v 128 a 7.9999898,8.0000078 0 0 0 8,8 7.9999898,8.0000078 0 0 0 8,-8 V 344 a 7.9999898,8.0000078 0 0 0 -8,-8 z' id='middle-wing' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
          <path d='M 239.96875,128 A 111.99996,124.13082 0 0 0 176,240 l 7.68164,96.01562 a 8.0000006,8.0000078 0 0 0 -5.33398,2.33008 l -0.004,-0.002 -47.91797,47.91797 -0.082,0.082 0.004,0.002 A 8.0000078,7.9998924 0 0 0 128,392 v 80 a 8.0000078,8.0000655 0 0 0 8,8 8.0000078,8.0000655 0 0 0 5.65625,-2.34961 l 0.004,0.004 49.40039,-49.40039 -0.22657,-0.11329 a 8.0000006,7.9999501 0 0 0 0.18946,-0.3496 l 0.0371,0.46289 L 192,440 a 8.0000006,8.0000655 0 0 0 8,8 h 32 v 24 a 7.9999898,8.0000078 0 0 0 8,8 V 336 252 196 128.01758 A 111.99996,124.13082 0 0 0 239.96875,128 Z' id='shadow-layer' style='opacity:0.2;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
        </g>
      </svg>
    </div>
    <div class='text-container'>
      <h2>Loading</h2>
    </div>
    <div class='smoke'>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class='meteors-container'>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>

<?php

function cleanDir() {
    $files = glob('filelist/*'); // get all file names
    foreach($files as $file){ // iterate files
      if(is_file($file))
        unlink($file); // delete file
    }
}


function createporcii($filename,$sizeporcii,$mask)
{
    $file=file($filename);
    $countporcii=ceil(count($file)/$sizeporcii);
    for ($i=0;$i<$countporcii;$i++)
        {
            $checkdir = 'filelist';

            if (file_exists($checkdir)) {
                file_put_contents('filelist/'.$mask.($i+1).'.log',array_merge(array_slice($file,$sizeporcii*$i,($sizeporcii-1)),array(trim($file[($i+1)*$sizeporcii-1]))));
            } else {
                mkdir('filelist', 0700, true);
                file_put_contents('filelist/'.$mask.($i+1).'.log',array_merge(array_slice($file,$sizeporcii*$i,($sizeporcii-1)),array(trim($file[($i+1)*$sizeporcii-1]))));
            }

           
        }
}

               
cleanDir();

createporcii($UrlFileName,$UrlOneFileLimit,'list');

$dir    = 'filelist';
$scanned_directory = array_diff(scandir($dir), array('..', '.'));
$scanned_directory_count = count($scanned_directory);

require_once './vendor/autoload.php'; // composer autoload.php
define('FB_URL','https://graph.facebook.com/');
define('VK_URL','https://vk.com/share.php');
define('OK_URL','https://connect.ok.ru/dk');
define('FB_URL_ACCESS_TOKEN','0000000000011111|ccccccccccqqqqqqqqqqrrrrasss');

// Get needed classes
use JBZoo\HttpClient\HttpClient;

// Configure client (no options required!)
$httpClient = new HttpClient([
  'driver'          => 'Auto',    // (Auto|Guzzle5|Guzzle6|Rmccue)
  'timeout'         => 10,        // Wait in seconds
  'verify'          => false,     // Check cert for SSL
  'exceptions'      => false,     // Show exceptions for statuses 4xx and 5xx
  'allow_redirects' => true,      // Show real 3xx-header or result?
  'max_redirects'   => 10,        // How much to reirect?
  'user_agent'      => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.70 Safari/537.36', // Custom UA
]);


list($msec,$sec)=explode(chr(32),microtime());
$headtime=$sec+$msec;


for ($i=1; $i <= $scanned_directory_count; $i++) { 

$urlOtchet = file_get_contents("filelist/list{$i}.log");
$urlar = explode("\r\n",$urlOtchet);
$urls = implode(',',$urlar);


$fbresponse = $httpClient->request(FB_URL, [
    "ids" => $urls,
    "access_token" => $FB_URL_ACCESS_TOKEN
  ], "get");
      
$jsonfb = $fbresponse->getJSON();
// dump($jsonfb,0,'jsonfb');
if (empty($jsonfb) || strlen($jsonfb) < 10 || !empty($jsonfb['error']['message'])) {
    echo "Пустой ответ сервера FB или ошибка";
    echo @$jsonfb['error']['message'];
    die;
}

foreach ($jsonfb as $FBitem) {
      
      if (empty($FBitem['share']['share_count'])) {
        $fbcountar[] = '0';
      }
      else {
        $fbcountar[] = $FBitem['share']['share_count'];
      }

      $fbcount = $FBitem['share']['share_count'];
      $FB_value_title[] = $FBitem['og_object']['title'];
      $FB_value_updated_time = $FBitem['og_object']['updated_time'];
      $FB_value_url = $FBitem['id'];
      $FB_value_urlar[] = $FBitem['id'];

      $date = date('d.m.y',strtotime($FB_value_updated_time));
      $mysiteurlone = $FB_value_url;

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
        'ref' => str_replace($OkMainDomain,$OkReplaceDomain,$mysiteurlone),
      ], 'get');

      $jsonok = $okresponse->body;
      preg_match("#ODKL\.updateCount\('odklcnt0'\,'([0-9]+)'\);#", $jsonok, $okmatch);
      $okcountar[] = $okmatch[1];
      $okcount = $okmatch[1];

     if (empty($okcount)) {
       $okcount = 0;
     }
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
       $FB_value_titles[] = (!empty($FB_value_title)) ? $FB_value_title : $mysiteurlone;
     }

     $total = $fbcount + $vkcount + $okcount;
     $totalall[] = $fbcount + $vkcount + $okcount;


}

    
}
 
$mysiteurl = array();

  ?>

      <?php

     


      $badurls = array();


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

  array_multisort($totalall, $datear, $FB_value_urlar, $fbcountar, $vkcountar, $okcountar,  SORT_DESC, SORT_NUMERIC);

  $globalsoc = [$totalall, $datear, $FB_value_urlar, $fbcountar, $vkcountar, $okcountar, $FB_value_title];

  array_multisort($globalsoc[0], SORT_DESC, SORT_NUMERIC,  $globalsoc[1], SORT_STRING, SORT_DESC,  $globalsoc[2], SORT_NUMERIC, SORT_DESC,  $globalsoc[3], SORT_NUMERIC, SORT_DESC,  $globalsoc[4], SORT_NUMERIC, SORT_DESC,  $globalsoc[5], SORT_NUMERIC, SORT_DESC);

?>
<?php
// Start the buffering //
ob_start();
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
  $finalear[] =  '<tr style="border: 1px solid #000"><td style=" border: 1px solid #000;  text-align:center; ">' . $numtable .'</td><td style=" border: 1px solid #000;  text-align:center; ">' . $Gdates[$key] .'</td><td style=" border: 1px solid #000;  text-align:left;  padding: 0px 5px; "><a target="_blank" href="'.$GUrls[$key].'">' . $Titles[$key] .'</a><br><small>'.$GUrls[$key].'</small></td><td style=" border: 1px solid #000;text-align:center; ">' . $GFBs[$key] .'</td><td style=" border: 1px solid #000;  text-align:center; ">' . $GVKs[$key] .'</td><td style=" border: 1px solid #000;  text-align:center; ">' . $GOKs[$key] .'</td><td style="font-size: 13px; border: 1px solid #000;  text-align:center;">' . $Gtotals[$key] .'</td></tr>';

}

$output = array_slice($finalear, 0, $ResultTable); 
echo implode($output);

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
  echo "<br>";
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
  $timegen = round(round(($sec+$msec)-$headtime,4)/60,2);
  echo "<b>Страница сгенерировалась за ".$timegen." мин.</b>";

  ?>

</body>
</html>
<?php
$nowdate = date('d-m-y-H-i-s');
file_put_contents("stat/otchet-$nowdate.html", ob_get_contents());
?>