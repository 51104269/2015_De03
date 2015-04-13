<div class="gallery col-md-8 col-md-offset-2">
	<button id = "close-btn" class="btn btn-primary">Đóng</button>

	<?php
		$files = File::allFiles("uploads");
	?>
	<ul>
	<?php	
		foreach ($files as $file)
		{
			$name = (string) $file;
			echo "<li><a href=\"{$name}\"><img src =\"{$name}\"></a></li>";
		}
	?>
	</ul>
</div>