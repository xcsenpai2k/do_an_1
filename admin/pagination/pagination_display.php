<br>
<p style="text-align: center; font-size: 20px;">
	<
<?php 
		for ($i=1; $i <= $number_of_pages; $i++) { ?>
			<a style="text-decoration: none;" href="index.php?pages=<?php echo $i ?>&search=<?php echo $search ?>&category_search=<?php echo $category_search ?>" >
				<?php echo $i ?>
			</a>
	<?php } ?>
	>
<p>