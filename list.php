<?php
$title = $_GET[ 'title' ];
?>
<!doctype html>
<html>
<head>
<meta name="referrer" content="no-referrer">
<meta name="referrer" content="no-referrer">
<meta charset="utf-8">
<title><?php echo $title ?>平台</title>
<link rel="stylesheet" type="text/css" href="item/css/css.css" />
</head>
<body class="no-sidebar">
<div id="page-wrapper">
  <div class="container">
    <div id="header-wrapper" class="wrapper">
      <div id="header"><a href="index.php" id="logo"><span class="pennant"><span class="icon fa-camera"></span></span>
        <h1>直播聚合</h1>
        </a>
        <nav id="nav">
          <ul>
            <li><a href="index.php">主页</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="wrapper">
      <article id="content" class="centered">
        <header>
          <h2><?php echo $title ?>平台</h2>
        </header>
        <ul id="portfolio">
          <li>
            <div class="row">
              <?php
              $url2 = isset( $_GET[ "url" ] ) ? $_GET[ "url" ] : "jsonxingguang.txt";
              $url = "接口自己找/mf/" . $url2;
              $handle = fopen( $url, "rb" );
              $content = "";
              while ( !feof( $handle ) ) {
                  $content .= fread( $handle, 10000 );
              };
              $content = json_decode( $content );

              foreach ( $content->zhubo as $key ) {
                  $title1 = str_replace( array( "%3F", "%20", "%28", "%29", "%5E", "%7E" ), "", $key->title );
                  echo '<div class="3u 12u(mobile)"><a href="play.php?title=' . $title . '&name=' . $title1 . '&url=' . $key->address . '" class="image fit"><img src="' . $key->img . '" onerror="this.src=\'item/img/no.jpg\'"><p>' . $title1 . '</p></a></div>';
              };
              ?>
            </div>
          </li>
        </ul>
      </article>
    </div>
    <div id="footer-wrapper" class="wrapper">
      <div id="copyright"> © All rights reserved. </div>
    </div>
  </div>
</div>
</body>
</html>
