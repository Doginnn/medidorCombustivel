<?php

$mensagem = "";

if ($_POST) {
    
    $distancia = $_POST['distancia'];
    $autonomia = $_POST['autonomia']; 
    
    if (is_numeric($distancia) && is_numeric($autonomia)) {

        if ($distancia > 0 && $autonomia > 0) {
            $valorGasolina = 6.10;
            $valorAlcool = 3.80;
            $valorDiesel = 3.90;
            
            $calculoGasolina = ($distancia / $autonomia) * $valorGasolina;
            $calculoGasolina = number_format($calculoGasolina, 2, ',', '.');

            $calculoAlcool = ($distancia / $autonomia) * $valorAlcool;
            $calculoAlcool = number_format($calculoAlcool, 2, ',', '.');
            
            $calculoDiesel = ($distancia / $autonomia) * $valorDiesel;
            $calculoDiesel = number_format($calculoDiesel, 2, ',', '.');
            
            $mensagem.= "<p>Vacê gastará: R$ ".$calculoGasolina." com Gasolina</p>";
            $mensagem.= "<p>Vacê gastará: R$ ".$calculoAlcool." com Alcool</p>";
            $mensagem.= "<p>Vacê gastará: R$ ".$calculoDiesel." com Diesel</p>";
        } else {
            $mensagem.= "<div class = 'erro'";
            $mensagem.= "<p>O valor da Distância e da Autonomia, deve ser maior que zero!</p>";
            $mensagem.= "</div>";
        }        

    } else {
        $mensagem.= "<div class = 'erro'";
        $mensagem.= "<p>O valor recebido não é numérico</p>";
        $mensagem.= "</div>";
    }    

} else {
    $mensagem.= "<div class = 'erro'";
    $mensagem.= "<p>Nenhum dado foi recebido pelo formulário!</p>";
    $mensagem.= "</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calculo de Consumo de Combustível</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<main>
		<div class="painel">
			<h2>Resultado do cálculo de consumo</h2>
			<div class="conteudo-painel">
				<?php
				echo $mensagem;
				?>
				<a class="botao" href="index.php">Voltar</a>
			</div>
		</div>
	</main>
</body>
</html>
