	</div>

	<div id="footer" role="contentinfo">
		<div class="b">
			<div class="b1"><?php dynamic_sidebar( 'sb_i4l' ); ?></div>
			<div class="b2"><?php wp_nav_menu(array('menu' => 'footer1')); wp_nav_menu(array('menu' => 'footer2')); ?></div>
			<div class="b3"><?php dynamic_sidebar( 'sb_i4r' ); ?></div>
		</div>
	</div>

</div>

<?php wp_footer(); ?>
</body>
</html>