<!doctype html>
<html>
<head>
<meta name="referrer" content="no-referrer">
<meta charset="utf-8">
<title>直播聚合</title>
<link rel="stylesheet" type="text/css" href="item/css/css.css" />
</head>
<body class="no-sidebar">
<div id="page-wrapper">
  <div class="container">
    <div id="header-wrapper" class="wrapper">
      <div id="header"><a href="index.php" id="logo"><span class="pennant"><span class="icon fa-brands fa-youtube "></span></span>
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
          <h2>平台列表</h2>
        </header>
        <ul id="portfolio">
          <li>
            <div class="row">
              <?php
              $handle = fopen( "接口自己找/mf/json.txt", "rb" );
              $content = "";
              while ( !feof( $handle ) ) {
                  $content .= fread( $handle, 10000 );
              };
              $content = json_decode( $content );
              foreach ( $content->pingtai as $key ) {
                  echo '<div class="3u 12u(mobile)"><a href="list.php?url=' . $key->address . '&title=' . $key->title . '" class="image fit"><img src="' . $key->xinimg . '" onerror="this.src=\'item/img/no.jpg\'"><p>' . $key->title . '</p></a></div>';
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
