<?php include 'sistema/conexao.php'; ?>

 <?php include 'header.php'; ?>

 <?php


session_start();
try
{
	if(isset($_POST['permissao']))
	{
		$permissao = $_POST['permissao'];
	}

	else
	{
		$permissao = "nada";
	}
	
	if($permissao == 'admin')
	{

		$sql = "SELECT * FROM administradores WHERE login = :login AND senha = :senha";

		//'senha' => md5($_POST['senha'])
		$dados = array(
			'login' => $_POST['login'],
			'senha' => md5($_POST['senha'])
			);

		$inst = $conexao->prepare($sql);
		$inst->execute($dados);
		$log = $inst->fetchAll();
		
		if($log != null)
		{
			$login = $log[0];
			$usuario = $login['login'];
			$senha = $login['senha'];
		}
		
		if (isset($login)) {
			$_SESSION['logado'] = true;
			$_SESSION['login'] = $usuario;
			echo "</br></br></br>";
			echo "<center><h4>Redirecionando...</center></h4>";
			echo "<script>logadoComSucessoAdmin()</script>";
		}

		else
		{
			echo "</br> </br> </br>";
			echo "<center><h4>Falha no Login! Usuário, senha ou permissão não correspondem.</h4>
					 </br><h4>Aguarde um instante e tente novamente.</h4></center>";
			echo "<script>falhaNoLogin()</script>";
		}
	}

	elseif ($permissao == 'professor') 
	{
		$sql = "SELECT * FROM professores WHERE login = :login AND senha = :senha;";

		$dados = array(
			'login' => $_POST['login'],
			'senha' => md5($_POST['senha'])
			);

		$inst = $conexao->prepare($sql);
		$inst->execute($dados);
		$log = $inst->fetchAll();
		
		if($log != null)
		{
			$login = $log[0];
			$usuario = $login['login'];
			$senha = $login['senha'];
		}

		if (isset($login)) {
			$_SESSION['logado'] = true;
			$_SESSION['login'] = $login['login'];
			echo "</br></br></br>";
			echo "<center><h4>Redirecionando...</center></h4>";
			echo "<script>logadoComSucessoProfessor()</script>";
		}

		else
		{
			echo "</br> </br> </br>";
			echo "<center><h4>Falha no Login! Usuário, senha ou permissão não correspondem.</h4>
					 </br><h4>Aguarde um instante e tente novamente.</h4></center>";
			echo "<script>falhaNoLogin()</script>";
		}	
	}

	elseif ($permissao == 'aluno')
	{
	    $sql = "SELECT * FROM alunos WHERE login = :login AND senha = :senha;";

		$dados = array(
			'login' => $_POST['login'],
			'senha' => md5($_POST['senha'])
			);

		$inst = $conexao->prepare($sql);
		$inst->execute($dados);
		$log = $inst->fetchAll();
		
		if($log != null)
		{
			$login = $log[0];
			$usuario = $login['login'];
			$senha = $login['senha'];
		}

		if (isset($login)) {
			$_SESSION['logado'] = true;
			$_SESSION['login'] = $login['login'];
			echo "</br></br></br>";
			echo "<center><h4>Redirecionando...</center></h4>";
			echo "<script>logadoComSucessoAluno()</script>";
		}

		else
		{
			echo "</br> </br> </br>";
			echo "<center><h4>Falha no Login! Usuário, senha ou permissão não correspondem.</h4>
					 </br><h4>Aguarde um instante e tente novamente.</h4></center>";
			echo "<script>falhaNoLogin()</script>";
		}
	}

	else
	{
		echo "</br> </br> </br>";
		echo "<center><h4>Escolha uma permissão para efetuar o Login! </h4></center>";
		echo "<center></br><h4>Aguarde um instante e tente novamente.</h4></center>";
		echo "<script>falhaNoLogin()</script>";
	}
} 

	catch (PDOException $e) {
			echo "Erro " . $e->getMessage();
		}
	?>

 <?php include 'footer.php'; ?>