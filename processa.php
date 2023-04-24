<?php
	
	include_once("conexao.php");
	
	if(!empty($_FILES['importarTurma']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['importarTurma']['tmp_name']);
		
		
		$linhas = $arquivo->getElementsByTagName("Row");
		
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
			
				$matricula = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "matricula: $matricula <br>";
				
				$nome = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "nome: $nome <br>";

				$dataNascimento = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "dataNascimento: $dataNascimento <br>";
				
				echo "<hr>";
				$result_usuario ="insert into aluno (nome, matricula, dataNascimento) values ('$nome', '$matricula', '$dataNascimento')"
				$resultado_usuario = mysqli_query($conn, $result_usuario);
			}
			$primeira_linha = false;
		}
	}

?>
