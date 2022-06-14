<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>



<!-- -->

<script src="<?php echo base_url('assets/bootstrap-5.1.3/js/bootstrap.min.js');?>"></script>
</body>
</html>
