<?php

include_once "conexao.php";

$acao = $_GET['acao'];

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

switch ($acao) {
	case 'inserir':
	

		$name = $_POST['name'];
        $email = $_POST['email'];
    	$date = $_POST['date'];
    	$message = $_POST['message'];

    	$sql = "INSERT INTO users (user_name, user_email, user_date, user_mensagem) values ('$name', '$email', '$date', '$message')";

		if (!mysqli_query($conexao, $sql)) {
			die("Erro ao inserir as informações do formulário na tabela users: ". mysqli_error($conexao));
		} else {
			echo "<script language='javascript' type='text/javascript'>
			alert('Dados cadastrados com sucesso!')
			window.location.href='crud.php?acao=selecionar'</script>";
		}
        break;
        
	case 'montar':
	    
    $id = $_GET['id'];
	$sql = 'SELECT * FROM users WHERE user_id=' . $id;
	$resultado = mysqli_query($conexao, $sql) or die("Erro ao retornar dados");
	
	echo "<form method='post' name='dados' action='crud.php?acao=atualizar' onSubmit='return enviardados();' >";
	echo "<table width='588' border='0' align='center' >";

	While ($registro = mysqli_fetch_array($resultado)) {
		echo "    <tr> ";
		echo "      <td width='118'><font size='1 face='Verdana, Arial, Helvetica, sans-serif'>Código:</font></td> ";
		echo "       <td width='460'>";
		echo "        <input name='id' type='text' class='formbutton' id='id' size='52' maxlength='150' value=" . $id . " readonly> ";
		echo "      </td> ";
		echo "     </td> ";
			
		echo " <tr>";
		echo " <td><font face='Verdana, Arial, Helvetica, sans-serif'><font size='1'>Nome<strong>:</strong></font></font></td>";
		echo " <td rowspan='2'>";
		echo " <style>textarea{resize:nome;}</style>";
		echo " <textarea name='nome' cols='50' rows='3' class='formbutton'>".htmlspecialchars($registro['user_name'])."</textarea>";
		echo "</font></td>";
		echo " <tr>";

		echo "    <tr> ";
		echo "      <td width='118'><font size='1 face='Verdana, Arial, Helvetica, sans-serif'>Email:</font></td> ";
		echo "       <td width='460'>";
		echo "        <input name='email' type='text' class='formbutton' id='email' size='52' maxlength='150' value=" . $registro['user_email']. " ";
		echo "      </td> ";
		echo "     </td> ";
		
		
		echo "    <tr> ";
		echo "      <td width='118'><font size='1 face='Verdana, Arial, Helvetica, sans-serif'>Data:</font></td> ";
		echo "       <td width='460'>";
		echo "        <input name='data' type='date' class='formbutton' id='data' size='15' maxlength='150' value=" . $registro['user_date']. " ";
		echo "      </td> ";
		echo "     </td> ";

		
		echo " <tr>";
		echo " <td><font face='Verdana, Arial, Helvetica, sans-serif'><font size='1'>Mensagem<strong>:</strong></font></font></td>";
		echo " <td><font size='2'>";
		echo "<textarea name='tx_mensagem' cols='50' rows='8' class='formbutton'>'=" . htmlspecialchars($registro['user_mensagem']) . "</textarea>";
		echo "</font></td>";
		echo "</tr>";


		echo "<tr>";
		echo " <td height='22'></td>";
		echo " <td>";
		echo "<input name='submit' type='submit'  class='formobjects' value='Atualizar'> ";
		echo " <button type='submit' formaction='crud.php?acao=selecionar'>Selecionar</button>   ";
		echo " <input name='Resert' type='reset' class='formobjects' values='Lipar campos'>";
		echo "</td>";
		echo "</tr>";

		
		echo "</table>";
		echo "</form>   ";
}
	mysqli_close($conexao);   
	    
		break;

	case 'atualizar':
	    
	$codigo = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$data = $_POST['data'];
	$mensagem = $_POST['tx_mensagem'];

	$sql = "UPDATE users SET user_name = '" . $nome . "', user_email = '" . $email . "', user_date = '" . $data . "', user_mensagem = '" . $mensagem . "' WHERE user_id = '" . $codigo . "'";

	if (!mysqli_query($conexao, $sql)) {
		die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
	} else {
		echo "<script language='javascript' type='text/javascript'>alert('Dados atualizado com sucesso!')window.location.hfef='crud.php?acao=selecionar'<script>";
	}
	mysqli_close($conexao);	    
	    
		break;

	case 'deletar':
        $sql = "DELETE FROM users WHERE user_id = '" . $id . "'";

		if (!mysqli_query($conexao, $sql)) {
			die('Error:' . mysqli_error($conexao));
		} else {
			echo"<script language='javascript' type='text/javascript'>
			alert('Dados excluidos com sucesso!')
			window.location.href='crud.php?acao=selecionar'</script>";
		}
		mysqli_close($conexao);
		header("Location:crud.php?acao=selecionar");
		break;
		break;

	case 'selecionar':
        date_default_timezone_set('America/Sao_Paulo');
		header("Content-type: text/html; charset=utf-8");
		include_once "conexao.php";

		echo "<meta charset='UTF-8'>";
		echo "<center><table border=1>";
		echo "<tr>";
		echo "<th>CODIGO</th>";
		echo "<th>NOME</th>";
		echo "<th>EMAIL</th>";
		echo "<th>DATA CADASTRO </th>";
		echo "<th>MENSAGEM</th>";
		echo "<th>AÇÃO</th>";
		echo "<tr>";
		
		$sql = "SELECT * FROM users";
		$resultado = mysqli_query($conexao, $sql) or die("Erro ao retornar dados");

		echo "<CENTER> Registro cadastrados na base de dados.<br/><CENTER> ";
		echo "</br>";
		
		While ($registro = mysqli_fetch_array($resultado)) {

		$id = $registro['user_id'];
		$nome = $registro['user_name'];
		$email = $registro['user_email'];
		$data = $registro['user_date'];
		$mensagem = $registro['user_mensagem'];
		
		echo "<tr>";
		echo "<td>".$id."</td>";
		echo "<td>".$nome."</td>";
		echo "<td>".$email."</td>";
		echo "<td>".date("d/m/Y", strtotime($data))."</td>";
		echo "<td>".$mensagem."</td>";
		echo "<td><a href='crud.php?acao=deletar&id=$id'><img src='delete.png' alt='Deletar' title='Deletar regitro'></
		a>
		<a href='crud.php?acao=montar&id=$id'><img src='update.png' alt'Atualizar' title='Atualizar registro'></a>
		<a href='index.php'><img src='insert.png' alt='Inserir' title='Inserir registro'></a>";
		
		echo "</tr>";
		
		}
		mysqli_close($conexao);
		break;

	default:
		header("Location:crud.php?acao=selecionar");
		break;
}