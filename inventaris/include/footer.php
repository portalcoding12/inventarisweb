<footer class="container-fluid" style="height:50px;">
		<div class="container">
			<div class="row">
			<div class="col-md-9">
				<p>Copyright &copy; 2019 <a href="https://www.portalcoding.com" target="_blank">PORTAL CODING</a>. Allright reserved.</p>
			</div>
			</div>
		</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/inventaris/bootstrap/js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/inventaris/bootstrap/js/bootstrap.min.js"></script>
<script src="/inventaris/bootstrap/js/valid.js" charset="utf-8"></script>
<script>
$(document).ready(function(){
	$("#btnPlus").click(function(){
    $("#formInput").fadeIn("slow");
  });

	$("#btnBatal").click(function(){
    $("#formInput").fadeOut("slow");
  });
});
</script>
