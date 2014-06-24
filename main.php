<html>
<head>
	<title>Address Book</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>
<body>

<div class="containerclass" id="container-top">
		<div id="ctext">Address Book</div>
	</div>

	<div class="containerclass" id="container-left">
		<div id="containerlefttext">
			Hello and welcome! This is an online address book to maintain contacts.
			It is very simple to use so get started.
			<br><br><br>
			1. <a href="http://localhost:8888/city.php" onmouseover="preview(this.href,'container');">City</a>
			<br><br>
			2. <a href="http://localhost:8888/country.php" onmouseover="preview(this.href,'container');">Country</a>
			<br><br>
			3. <a href="http://localhost:8888/index.php" onmouseover="preview(this.href,'container');">Address Book</a>
		</div>
	</div>

	<div id="container">
	</div>

	<script>

	function preview(url,target)
	{
   	     clearTimeout(window.ht);
   	     window.ht = setTimeout(function(){
   	         var div = document.getElementById(target);
   	         div.innerHTML = '<iframe style="width:100%;height:100%;" frameborder="0" src="' + url + '" />';

  	      },20);      
  	  }   



	</script>

</body>
</html>