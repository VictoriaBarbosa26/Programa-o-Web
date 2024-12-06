<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital@1&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Caveat&display=swap');

    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('fundo.gif');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 80vh; 
    }

    .form-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 50%; 
      background-color: rgba(0, 10, 50, 0.85); 
      padding: 18px; 
      border-radius: 12px; 
      box-shadow: 8px 8px 15px rgba(9, 9, 9, 0.9); 
    }

    table {
      width: 100%;
      border: 1px solid darkgray; 
      text-align: center;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid darkgray; 
      font-family: 'Lobster', sans-serif;
      color: white; 
      font-size: 20px;	
    }

    input[type="text"] {
      padding: 6px; 
      margin: 3px 0; 
      border: 1px solid #000;
      border-radius: 5px;
      width: calc(100% - 14px); 
      box-sizing: border-box;
      font-family: 'Caveat', cursive;
      font-size: 14px;
      color: black; 
    }

    input[type="button"] {
      padding: 8px 16px;
      margin: 3px;
      border: none;
      border-radius: 5px;
      background-color: #336699; 
      color: white;
      cursor: pointer;
      font-family: 'Exo 2', sans-serif;
      font-size: 14px; 
      transition: background-color 0.7s ease;
    }

    input[type="button"]:hover {
      background-color: #234466; 
    }
  </style>

  <script>
    function submeterForm(acao){
      document.getElementById('acao').value = acao;
      document.getElementById('f').submit();
    }
  </script>
  <?php session_start(); //inicia a sessao ?>
</head>
<body>
  
  <div class="container">
    <div class="form-container">
      <form name="f" id="f" method="post" action="crud.php">
        <table>
          <tr>
            <th>Nome</th>
            <td><input type="text" name="nome" value=""></td>
          </tr>
          <tr>
            <th>Profissão</th>
            <td><input type="text" name="profissao" value=""></td>
          </tr>
          <tr>
            <th>Imagem</th>
            <td><input type="text" name="imagem" value=""></td>
          </tr>
        </table>
        <input type="text" name="acao" id="acao" style="display:none"><br>
        <div>
          <input type="button" value="Create (Criar)" onclick="submeterForm('c')">
          <input type="button" value="Restore (Consultar)" onclick="submeterForm('r')">
          <input type="button" value="Update (Atualizar)" onclick="submeterForm('u')">
          <input type="button" value="Delete (Deletar)" onclick="submeterForm('d')">
        </div>
      </form>
    </div>
  </div>
  <br><br>
	<?php
		if(isset($_SESSION["aviso"])){ //Se a variavel aviso foi criada na pagina anterior...
			echo($_SESSION["aviso"]); //imprime o aviso e...
			unset($_SESSION["aviso"]); //exclui o aviso da memoria
		} 
	?>
	<br>
	<?php
		$con = new mysqli("127.0.0.1:3306", "root", "", "Barbosa"); //executa a conexao com o banco
		$sql = "select * from produtos"; // seleciona todos os dados ta tabela produtos
		$res = $con->query($sql); //executa a consulta SQL
		if(mysqli_num_rows($res) > 0){ //checa se foram encontrados resultados
			echo("<table>"); //daqui pra baixo estamos montando a tabela
			echo("<tr><th>idprod</th><th>nome</th><th>imagem</th><th>profissao</th></tr>"); //cabecalho da tabela
			while($campo = $res->fetch_assoc()){ //para cada linha de resultado recuperada da consulta monta uma linha em <table>
				echo("<tr>");
				echo("<td>".$campo["idprod"]."</td>"); 
				echo("<td>".$campo["nome"]."</td>"); 
				echo("<td>".$campo["imagem"]."</td>");
				echo("<td>".$campo["profissao"]."</td>");
				echo("</tr>");
			}
			echo("</table>"); //finaliza a tabela
		}
		else{ //nenhum dado na tabela
			echo "nenhum dado inserido por enquanto";
		}
	
	?>
</body>
</html>
