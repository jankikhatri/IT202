<html>
<head>
	<script>
	function pageLoaded(){
		
		let myDiv = document.createElement('div');
		myDiv.innerText = "Added New Element";
		
		document.body.appendChild(myDiv);
}
	</script>
</head>
<body onload="pageLoaded();">
	<!--This is a comment -->
  <p id="myPara">Just showing that we loaded something...</p>
</body>
</html>