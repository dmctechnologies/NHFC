<!--footer section start-->
			<footer>
			   <p>&copy 2025 NHFC Admin Panel. All Rights Reserved | Designed by <a href="#" target="_blank">dmcSoft.</a></p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>
  
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delbtn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this item?')) {
                e.preventDefault();
            }
        });
    });
});
</script>
</body>
</html>