<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php
include_once "config/Database.php";
include_once "class/Articles.php";

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);
$result = $article->getArticles();
?>

<div id="blog" class="row">		
	<?php
	while ($post = $result->fetch_assoc()) {
		$date = date_create($post['created']);					
		$message = str_replace("\n\r", "<br><br>", $post['message']);
		$message = $article->formatMessage($message, 100);
		?>
		<div class="col-md-10 blogShort">
		<h3><a href="view.php?id=<?php echo $post['id']; ?>">
		<?php echo $post['title']; ?></a></h3>		
			<em><strong>Published on</strong>: 
		<?php echo date_format($date, "d F Y");	?></em>
			<em><strong>Category:</strong>
 		<a href="#" target="_blank"><?php echo $post['category']; ?></a></em>
			<br><br>
		<article>		
			<p><?php echo $message; ?> 	</p>
		</article>
		<a class="btn btn-blog pull-right" href="view.php?id=<?php echo $post['id']; ?>">READ MORE</a> 
		</div>
	<?php } ?> 	
</div>

</body>
</html>