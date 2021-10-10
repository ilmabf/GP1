<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="dist/datepickk.min.css">
	<script src="dist/datepickk.min.js"></script>


	<style>
		.btncls {
			background-color: #B80C4D;
			border: #2e6da4;
			font-family: Arial, Geneva, Arial, Helvetica, sans-serif;
			font-size: 15px;
			color: #fff;
			letter-spacing: 1px;
			padding: 8px 12px;
			font-size: 14px;
			font-weight: normal;

			border-radius: 4px;
			line-height: 1.5;
			text-decoration: none;
		}
	</style>
</head>


<body>

	<script>
		var datepicker = new Datepickk();
	</script>

	<div id="closeOnClick">
		<button class="btncls" onclick="closeOnClickDemo()">Click to open date picker</button>
		<input type="text" id="datedemo">
		<script>
			function closeOnClickDemo() {
				datepicker.unselectAll();
				datepicker.closeOnClick = false;
				datepicker.button = 'Close';
				datepicker.onSelect = function(checked) {
					document.getElementById("datedemo").value = this.toLocaleDateString();
				};
				datepicker.onClose = function() {
					datepicker.closeOnClick = true;
					datepicker.button = null;
					datepicker.onClose = null;
				}
				datepicker.show();
			}
		</script>
	</div>

</body>

</html>