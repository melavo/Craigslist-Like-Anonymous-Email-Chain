<?php
// this is only simple
if(!session_id()) session_start();
require_once './api/api.db.php';
require_once './api/Config.php';
$results = DB::query("SELECT * FROM ads WHERE status = %i", 1);

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
<title>Ads</title>
</head>
<body>

<div class="main-content">
	<?php foreach($results as $item):?>
	<div class="item">	
    	<div class="name">
        	<h1><?php echo $item['ads_name'];?></h1> <span> Reply to: <?php echo $item['email_reply'];?></span>
        </div>
        <div class="image">
	        <img src="<?php echo $item['ads_img'];?>" width="200px"/>
        </div>
        <div class="content">
	        <?php echo $item['ads_content'];?>
        </div>
    </div>
    <?php endforeach;?>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
