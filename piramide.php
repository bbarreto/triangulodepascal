<?php

//Função para calcular o fatorial de um número
function fatorial($n) {
	if ($n==0) {
		$n = 1;
	}

	for($i = $n; $i>1; $i--) {
		$n = $n * ($i - 1);
	}
	return $n;
}

//Parâmetro com a quantidade de linhas
$linhas = $_GET['linhas'];

//Parâmetro com a fonte preferencial
$fonte = 'courier.ttf';

//Array quer guardará todos os resultados para montagem da imagem
$piramide = array();

//Variável que auxiliará a decidir qual é o tamanho de cada célula
$maior_numero = 0;

//Montagem do array com todos os resultados
for ($linha=0; $linha<$linhas; $linha++) {
	for($coluna=0; $coluna<$linha+1; $coluna++) {

		//Fórmula do resultado da combinação Cn,p
		$resultado = fatorial($linha)/(fatorial($coluna)*fatorial($linha-$coluna));

		//Armazenar o resultado no array
		$piramide[$linha][$coluna] = $resultado;

		//Atualizar a variável de maior resultado se necessário
		if ($resultado > $maior_numero) {
			$maior_numero = $resultado;
		}
	}
}

//Início da montagem da imagem

//Calcular a largura das células
$largura = imagefontwidth(1)*strlen($maior_numero);

//Margem entre células
$margem = 10;

//Calcular tamanho do maior box de texto
$box = imagettfbbox(16, 0, $fonte, $maior_numero);

$altura_celula = $box[1] - $box[7];
$largura_celula = $box[2] - $box[0];

$largura = $largura_celula * count($piramide[$linhas-1]) + (count($piramide[$linhas-1])+1) * $margem;
$altura = $altura_celula * count($piramide) + count($piramide) * $margem;

//Criar o canvas para a imagem
$imagem = imagecreatetruecolor($largura, $altura);

//alocar as cores
$preto = imagecolorallocate($imagem, 0, 0, 0);
$azul = imagecolorallocate($imagem, 0, 0, 255);

//Deixar a imagem transparent
imagealphablending($imagem, false);
imagesavealpha($imagem, true);
$transparencia = imagecolorallocatealpha($imagem, 255, 255, 255, 127);
imagefill($imagem, 0, 0, $transparencia);

//Passar pelas linhas e colunas e imprimir o resultado no triângulo
foreach($piramide as $linha=>$colunas) {

	//Calcular posição superior
	$y = ($linha+1) * ($altura_celula + $margem);

	//Calcular posição mínima esquerda para centralizar os elementos
	$left = ((count($piramide)-$linha+1)/2)*$largura_celula;

	//Escrever o número da linha
	imagettftext($imagem, 14, 0, $margem, $y, $azul, $fonte, $linha);

	//Pra cada coluna
	foreach($colunas as $coluna=>$resultado) {
		
		//calcular a posição horizontal da coluna
		$x = $left + $coluna*($largura_celula+$margem);

		//imprimir o resultado na imagem
		imagettftext($imagem, 14, 0, $x, $y, $preto, $fonte, $resultado);

	}
}

//Gerar a imagem em PNG
header("Content-Type:image/png");
imagepng($imagem);