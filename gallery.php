<?php 
if(!isset($_SESSION['username'])){
   header("Location:index.php");
}



?>


	<h2 id="galleryhdr">My Gallery</h2>
	<nav id="gallery-nav">
		
		<a href='index.php?page=gallery&innerpage=gallery-btns/glry-all'>All</a>
		<a href='index.php?page=gallery&innerpage=gallery-btns/glry-album'>Gallery</a>
	
	</nav>
	<div class="inner-page" style=" margin:20px; border:solid white 1px;">
		<?php
				include isset($_GET['innerpage']) ? $_GET['innerpage'].'.php' : 'gallery-btns/glry-album.php';?>
	</div>