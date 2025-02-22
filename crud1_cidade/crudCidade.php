<?php
	// Recuperação da informação enviada pelo formulário
	$nome = $_POST["nome"];
	$cidade = $_POST["cidade"]; // Adicionei a variável $cidade
	$imagem=$_POST["imagem"];
	$acao=$_POST["acao"];	
	$con = new mysqli("127.0.0.1:3306","root","","Victoria_Barbosa");// conexão com banco
	
	
	// identifica acao a ser realizada e associa com respectiva sql
	if ($acao=="cadastro") $sql="insert into produtos (nome, imagem) values ('$nome','$imagem')";
	if ($acao=="consulta") $sql="select * from produtos where nome like '$nome%'";
	if ($acao=="exclusao") $sql="delete from produtos where nome ='$nome'";
	if ($acao=="alteracao") $sql="update produtos set imagem='$imagem' where nome ='$nome' AND cidade='$cidade'";
	
	
	if ($acao == "cadastro") $sql = "insert into produtos (nome, imagem, cidade) values ('$nome','$imagem','$cidade')"; // Adicionei $cidade no cadastro
	if ($acao == "consulta") $sql = "select * from produtos where nome like '%$nome%' OR cidade like '%$cidade%'"; // Modifiquei a consulta para considerar cidade
	if ($acao == "exclusao") $sql = "delete from produtos where nome ='$nome' AND cidade = '$cidade'"; // Adicionei cidade na exclusão
	if ($acao == "alteracao") $sql = "update produtos set imagem='$imagem' where nome ='$nome' AND cidade = '$cidade'"; // Adicionei cidade na alteração
	
	
	// define array para resposta ao usuário 
	$resposta = array();	
	// cadastro
	if ($acao=="cadastro"){
		$execucao = $con->query($sql);// execução da sql
		if ($execucao){
			$resposta[] = array("resultado"=>"inserido");
		}
		else
			$resposta[] = array("resultado"=>"erro de inserção");
	}
	
	
	// consulta
	if ($acao=="consulta"){
		$execucao = $con->query($sql);// executa consulta
		$cont=mysqli_num_rows($execucao);// conta número de registros retornados pela consulta
		if ($cont>0){ // verifica se número de registro retornados é maior que 0
			while($campo = $execucao->fetch_assoc()){ // separa informaçõs do registro em campos
				$resposta[] = array("resultado"=>$campo["idprod"].";".$campo["nome"].";".$campo["imagem"]);
				break;// sai do laço (só interessa primeiro registo obtido pelo like)
			}
		}
		else // não econtrado
			$resposta[] = array("resultado"=>"Nao encontrado!");
	}
	
	
	// exclusao
	if ($acao=="exclusao"){
		$execucao = $con->query($sql);// executa sql de exclusão
		if ( $con->affected_rows>0 ){ // verifica quantas linhas foram afetadas pela execução da exclusao
			$resposta[] = array("resultado"=>"removido");//>0, então existe e foi excluído
		}
		else //<=0, não exite ou erro na exclusão
			$resposta[] = array("resultado"=>"não existe informação ou houve erro de exclusao");
	}
	
	
	// 	alteração
	if ($acao=="alteracao"){
		$execucao = $con->query($sql);
		if ($execucao){
			$resposta[] = array("resultado"=>"alterado");
		}
		else
			$resposta[] = array("resultado"=>"erro de alteracao");	
	}
	
	
	// codifica vetor para padrão json e devolve para ajax no javascript
	echo json_encode($resposta);
	$con->close();
?>