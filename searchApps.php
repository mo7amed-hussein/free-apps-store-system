<?php
include_once('./includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Search</title>
     <link rel="stylesheet" href="./styles/mainStyle.css" type="text/css"/>
</head>

<body>

<div id="upperPanel">
<?php
include_once('./layout/upperBar.php');
include_once('./layout/searchPanel.php');
?>
</div>
<div id="wrapper">
<div id="content">
<?php
include_once ('searchProviders.php');
?>
</div>
<div id="sideBars">
<?php
include_once('./layout/topDownloadsBar.php');
?>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>