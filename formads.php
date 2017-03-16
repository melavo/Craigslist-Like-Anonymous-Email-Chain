<?php
if(!session_id()) session_start();
require_once './api/api.db.php';
require_once './api/Config.php';
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
<div class="container">
    <div class="row">
        <div class="span12">
          <div class="head">
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h1 class="muted">Company Name</h1>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
<form action="postdb.php" method="post" enctype="multipart/form-data">
 <div class="row">
  <div class="form-group">
    <label for="ads_name">Name</label>
    <input type="text" class="form-control" name="ads_name" placeholder="Enter name">
  </div> 
  <div class="form-group">
    <label for="ads_content">Content</label>
    <textarea class="form-control" id="exampleTextarea" rows="3" name="ads_content"></textarea>
  </div>

  <div class="form-group">
    <label for="ads_img">Image</label>
    <input type="file" name="ads_img" class="form-control-file" id="imagefile" aria-describedby="fileHelp">
  </div>
    <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="exampleSelect1" name="status">
      <option value="1">Active</option>
      <option value="0">Deactive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>&nbsp;
  <button type="button" class="btn btn-primary">Cancel</button>
</form>
</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
