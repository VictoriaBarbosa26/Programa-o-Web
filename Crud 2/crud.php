<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
	 @import url('https://fonts.googleapis.com/css2?family=Caveat&display=swap');
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
	  background-image: url('fundo.gif');
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      perspective: 100px;
	  background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .container {
      background-color: rgba(66, 135, 245, 0.3); 
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      max-width: 600px;
      width: 100%;
      text-align: center;
      transform-style: preserve-3d;
      transition: transform 0.5s;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    a {
      text-decoration: none;
      color: blue;
    }

  </style>
</head>
<body>
  <div class="container">
    <?php
	$nome = $_POST["nome"];
	$imagem = $_POST["imagem"];
	$profissao = $_POST["profissao"];
	$acao = $_POST["acao"];
	
	
	$con = new mysqli("127.0.0.1:3306", "root", "", "Barbosa");
	
	session_start(); 
	
	if($acao == "c"){ 
		$sql = "insert into produtos (nome, profissao, imagem) values ('$nome', '$profissao', '$imagem')"; 
		$res = $con->query($sql); 
		$_SESSION["aviso"] = "O cadastro foi efetuado com sucesso"; 
		header("location: ".$_SERVER['HTTP_REFERER']); 
	}
	if($acao == "r"){ 
		$sql = "select * from produtos where profissao='$profissao'"; 
		$res = $con->query($sql); 
		if(mysqli_num_rows($res) > 0){ 
			echo("<table>");
			echo("<tr><th>idprod</th><th>nome</th><th>profissao</th><th>imagem</th></tr>"); 
			while($campo = $res->fetch_assoc()){ 
				echo("<tr>");
				echo("<td>".$campo["idprod"]."</td>"); 
				echo("<td>".$campo["nome"]."</td>"); 
				echo("<td>".$campo["profissao"]."</td>");
				echo("<td>".$campo["imagem"]."</td>"); 
				echo("</tr>");
			}
			echo("</table>"); 
		}
		else{
			echo "nenhum resultado encontrado buscando por: $nome";
		}
		
		echo("<br><br><a href='".$_SERVER['HTTP_REFERER']."'>Voltar a pagina inicial</a>"); 
	}
	if($acao == "u"){ 
        $sql = "update produtos set nome='$nome', imagem='$imagem' where profissao='$profissao'"; 
        $res = $con->query($sql); 
        $_SESSION["aviso"] = "O item foi alterado com sucesso"; 
        header("location: ".$_SERVER['HTTP_REFERER']); 
    }
	if($acao == "d"){ 
		$sql = "delete from produtos where profissao='$profissao'"; 
		$res = $con->query($sql); 
		$_SESSION["aviso"] = "Foi deletado um total de ".$con->affected_rows." itens"; 
		header("location: ".$_SERVER['HTTP_REFERER']); 
	}
	
	$con->close();	

?>
  </div>
</body>
</html>
