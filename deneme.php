<html>
<head>
	<meta charset="UTF-8" />
	<title>Ajax Post</title>
</head>
<body>
	<form id="gonderilenform">
		<input type="text" name="gidenveri1">
		<input type="text" name="gidenveri2">
		<input id="buton" type="button" value="GÖNDER"/>
	</form>
		<label id="result"></label>
</body>
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
$(document).ready(function(){
	$("#buton").on("click", function(){ // buton idli elemana tıklandığında
		var gonderilenform = $("#gonderilenform").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
		
		$.ajax({
			url:'result.php', // serileştirilen değerleri ajax.php dosyasına
			type:'POST', // post metodu ile 
			data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
			success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
				$("#result").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
			}
		});
		
	});
});
</script>
</html>