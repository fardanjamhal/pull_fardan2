<footer class="main-footer">
    <div class="card-footer py-2 bg-transparent text-center">
			<div class="footer bg-transparent text-center">
				<span class="text-dark">
				<strong>&copy; <span id="year"></span> 
					<a href="#" class="text-decoration-none text-dark">Pelayanan Surat Desa</a>
				</strong>
				</span>
			</div>
			<script>
				document.getElementById("year").textContent = new Date().getFullYear();
			</script>
	</div>
</footer>
<script src="../../../assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../../assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../../assets/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="../../../assets/AdminLTE/bower_components/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../../assets/AdminLTE/bower_components/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../../assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../../assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../assets/AdminLTE/bower_components/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="../../../assets/AdminLTE/bower_components/moment/moment.min.js"></script>
<script src="../../../assets/AdminLTE/bower_components/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../../assets/AdminLTE/bower_components/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../../assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../../assets/AdminLTE/bower_components/slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../assets/AdminLTE/bower_components/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../assets/AdminLTE/dist/js/app.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../assets/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../assets/AdminLTE/dist/js/demo.js"></script>
<!-- DataTable Plugin -->
<script src="../../../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../../../assets/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#data-table').DataTable();
    });
</script>
</body>
</html>