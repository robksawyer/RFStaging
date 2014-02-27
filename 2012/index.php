<?php
/****************************/
/* PAGE VARIABLES TO UPDATE */
/****************************/
$location = "<strong>Razorfish Portland</strong><br>
			700 SW Taylor #400<br>
			Portland, OR 97205<br>";
$contact = 	"<strong>Firstname Lastname</strong><br>
			Account Director<br>
			(123) 456-7890<br>
			first.last@razorfish.com";
$logo = 	"/_includes/logo-windows.jpg";
$logo2 = 	"/_includes/logo-razorfish.png";

/* PAGE TITLE GENERATED FROM SANITIZED DIRECTORY NAME */
$myTitle = basename(getcwd());
$myTitle = str_replace("-", " ", $myTitle);
$myTitle = str_replace("_", " ", $myTitle);
$page_title = $myTitle;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
</head>


<body class="year">
<?php include '../_includes/ssi/header.php'; ?>

<div id="content">
<?php include '../_includes/ssi/aside-info.php'; ?>
<?php #include '../_includes/ssi/aside-uploader.php'; ?>
<?php include '../_includes/ssi/aside-accordion.php'; mkmap(".."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>
<?php #include '../_includes/ssi/aside-public.php'; ?> 

<section>
<script>breadcrumbs();</script>

<article>
<h1><?php echo $page_title; ?></h1>

<?php
/* Directory Navigation with SCANDIR */
error_reporting(E_ALL ^ E_NOTICE);

/* Global Exclusion Handling */
include '../_includes/ssi/exclusions.php';

if (isset($_GET["dir"])) {
  $dir_path = $_SERVER["DOCUMENT_ROOT"].$_SERVER["REQUEST_URI"].$_GET["dir"];
}
else {
  $dir_path = $_SERVER["DOCUMENT_ROOT"].$_SERVER["REQUEST_URI"];
}

function dir_nav() {
  global $exclude_list, $dir_path;
   $directories = array_diff(scandir($dir_path), $exclude_list);

  foreach($directories as $entry) {

	$file_entry = str_replace("-", " ", $entry);
	$file_entry = str_replace("_", " ", $file_entry);

    if(is_dir($dir_path.$entry)) {
      echo "<p><a href='".$_GET["dir"].$entry."/"."'>".$file_entry."</a></p>\n";
    }
  }
}
dir_nav();
?>

</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>