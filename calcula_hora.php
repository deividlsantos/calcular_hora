<?php
	if (isset($_POST['teste'])) {
		$teste = $_POST['teste'];
		$teste2 = $_POST['teste2'];
		//$data1 = substr($teste, 0, 10);
		$hora1 = substr($teste, -5);
		$hora2 = substr($teste2, -5);

		$hora_1 = strtotime($hora1);
		$hora_2 = strtotime($hora2);


		$sub = $hora_2 - $hora_1 - 3600;

		$result = date('H:i', $sub);

		//$sub = str_replace(':', '.', $hora2) - str_replace(':', '.', $hora1);
		echo $result;
	}else{


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Teste horas</title>
	<script src="jquery.js"></script>	
	<script>
		function calculo(){
			var teste = document.getElementById('teste').value;
			var teste2 = document.getElementById('teste2').value;
			var retorno;
			$.ajax({
				url: "calcula_hora.php",
				method: "POST",
					data: "teste2=" + teste2 + "&teste=" + teste,
					success: function(data){
						 $('#horas').val(data);
						 //$('#horas1').html(data);
					},
					error: function (xhr, status, error) {
				// Em caso de erro
						document.getElementById('resultado').innerHTML = error;
					}
			});	
		}	
	</script>
</head>
<body>
	<!--<form method="post">-->
		Hora Inicio:
		<input type="datetime-local" name="teste" id="teste"><br>
		Hora Fim:&nbsp;&nbsp;&nbsp;
		<input type="datetime-local" name="teste2" id="teste2"><br>

		<input type="submit" value="Calcular Hora" onClick="calculo();">
	<!--</form>-->
	
	<input type="time" class="input" id="horas" name="horas" pattern='[ 0-9]{1,}'/><br>
	<!--<label id="horas1"></label>-->
	
	
</body>
</html>
<?php
}
?>