<?php

function getrealurl( $url ) {
    $header = get_headers( $url, 1 );
    if ( strpos( $header[ 0 ], '301' ) || strpos( $header[ 0 ], '302' ) ) {
        if ( is_array( $header[ 'Location' ] ) ) {
            return $header[ 'Location' ][ count( $header[ 'Location' ] ) - 1 ];
        } else {
            return $header[ 'Location' ];
        }
    } else {
        return $url;
    }
}
$url = $_GET[ 'url' ];
$title = $_GET[ 'title' ];
$name = $_GET[ 'name' ];
if ( strpos( $url, 'rtmp' ) !== false ) {
    $url2 = $url;
} else {
    $url2 = getrealurl( $url );
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title.'平台-'.$name ?></title>
<link rel="stylesheet" type="text/css" href="item/css/css.css" />
<script type="text/javascript" src="DPlayer/flv.js"></script> 
<script type="text/javascript" src="DPlayer/hls.js"></script> 
<script type="text/javascript" src="DPlayer/DPlayer.min.js"></script>
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
      <article id="content">
        <header>
          <h2><?php echo $title.'平台-'.$name ?></h2>
        </header>
        <div class="videosamplex"  id="video"> </div>
        <script>
const dp = new DPlayer({
    container: document.getElementById('video'),
	live: true,
	autoplay: true,
    video: {
        url: '<?php echo $url2 ?>',
        type: 'auto',
    },
});
</script>
        <p><?php echo "视频地址:".$url2 ?></p>
      </article>
    </div>
    <div id="footer-wrapper" class="wrapper">
      <div id="copyright"> © All rights reserved. </div>
    </div>
  </div>
</div>
</body>
</html>
