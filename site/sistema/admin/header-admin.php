<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Software Livre School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TCC">
    <link rel="shortcut icon" href="img/ico.png" type="image/x-icon">

    <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/mystyle.css" rel="stylesheet">
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <script type="text/javascript" src="../js/kickstart.js"></script>

    <script type="text/javascript" src="../js/jquery.js"></script>
    
    <script type="text/javascript" src="../js/jquery.meio.mask.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.png">

<script type="text/javascript">
  function cancelar()
  {
      if(document.getElementById('cancelaraluno'))
      {
          setTimeout("window.location='alunos.php'", 0);
      }

      else if(document.getElementById('cancelarprofessor'))
      {
          setTimeout("window.location='professores.php'", 0);
      }

      else if(document.getElementById('cancelaradmin'))
      {
          setTimeout("window.location='administradores.php'", 0);
      }

      else if(document.getElementById('cancelarcadastro'))
      {
          setTimeout("window.location='index-admin.php'", 0);
      }

      else if(document.getElementById('cancelarcurso'))
      {
          setTimeout("window.location='cursos.php'", 0);
      }
  }
</script>

<script type="text/javascript">
    function validaSenha (input){ 
    if (input.value != document.getElementById('senha').value) {
    input.setCustomValidity('As senhas não correspondem!');
    setTimeout( "#", 1000);
    document.getElementById("imgconfsenha").src = "";
  } else {
    document.getElementById("imgconfsenha").src = "../img/certo.png";
    input.setCustomValidity('');
  }
}
    
</script>

<script type="text/javascript">
    function validaLogin (input){

      var i, k, l;
      var j = 0;
      var texto = new Array();
      var logins = window.document.getElementById('logins').value;

      var teste = false;

      for(l = 0; l < 20; l++)
      {
          texto[l] = "";
      }
      

      for(i = 0; i < logins.length; i++)
      {
          var c = (logins[i]).indexOf(' ');
          if(c === -1)
          {
             texto[j] = texto[j] + logins[i];
          }

          else
          {
             j++;
          }
      }

      for(k = 0; k < 20; k++)
      {
          if(input.value === texto[k])
          {
              teste = true;
              input.setCustomValidity('Usuário ja existe!');
              setTimeout( "#", 1000);  
              document.getElementById("imglogin").src = "../img/errado.png";
          }

      }

      if(teste === false)
      {
          document.getElementById("imglogin").src = "../img/certo.png";
          input.setCustomValidity('');
      }
   
    }

  </script>

  <script language="Javascript"> 
  function validacaoEmail(input) 
  { 
      usuario = input.value.substring(0, input.value.indexOf("@"));
      dominio = input.value.substring(input.value.indexOf("@")+ 1, input.value.length); 
      if ((usuario.length >=1) && 
          (dominio.length >=3) && 
          (usuario.search("@")==-1) && 
          (dominio.search("@")==-1) && 
          (usuario.search(" ")==-1) && 
          (dominio.search(" ")==-1) && 
          (dominio.search(".")!=-1) && 
          (dominio.indexOf(".") >=1)&& 
          (dominio.lastIndexOf(".") < dominio.length - 1)) 
        { 
            document.getElementById("imgemail").src = "../img/certo.png";
            input.setCustomValidity('');
        } 
        else
        {
            document.getElementById("imgemail").src = "../img/errado.png";
            input.setCustomValidity('Email Inválido!');
            setTimeout( "#", 1000);  
        } 
   } 
  </script>
  
  <script type="text/javascript">
        jQuery(function($){
            $("#telefone").setMask("(99) 99999-9999");
            $("#cpf").setMask("999.999.999-99");
        });
  </script>


  </head>

  
  <body>
		<div class="navbar navbar-inverse navbar-fixed-top visible-phone">
		      	<div class="navbar-inner">
		        	<div class="container-fluid">
		          		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            		<span class="icon-bar"></span>
		            		<span class="icon-bar"></span>
		            		<span class="icon-bar"></span>
		          		</button>
		          		<a class="brand" href="http://twitter.github.com/bootstrap/examples/fluid.html#">Navegação</a>
		          		<div class="nav-collapse collapse">
		            		<ul class="nav">
		              			<li><a href="index-admin.php">Inicial</a></li>
		                    <li><a href="administradores.php">Administradores</a></li>
		                		<li><a href="professores.php">Professores</a></li>
                        <li><a href="cursos.php">Cursos</a></li>
		                		<li><a href="alunos.php">Alunos</a></li>
		                		
		            		</ul>
		          		</div><!--/.nav-collapse -->
		        	</div>
		      	</div>
		    </div>

<?php 

session_start();

include('../conexao.php');

$sql4 = "SELECT id_administrador FROM administradores WHERE login = '". $_SESSION['login'] . "' ;";

        $instrucao4 = $conexao->prepare($sql4);
        $instrucao4->execute();
        $linhas5 = $instrucao4->fetchAll();
        $linhas6 = $linhas5[0];
  
?>

   <div class="container">
      
        <div class="row-fluid">
            <div class="span6">
                <a href="index-admin.php">
                <img src="../../img/logo.png" alt="Software Livre School" title="Software Livre School" style="margin-bottom: 10px;">
                </a>
            </div>
            <div class="login-modal span6 text-right" style="margin-top:5px">
                
              <?php if($_SESSION['logado']):

                echo "<h5>Olá, ".$_SESSION['login']."!</h5>";
                ?>
                 <a href="#myModal" role="button" class="btn btn-info" data-toggle="modal"><i class="icon-remove icon-white"></i> Logout</a>
                 <a href="minha-conta.php?id=<?php echo $linhas6['id_administrador'] ?>" role="button" class="btn btn-info"><i class="icon-cog icon-white"></i> Conta</a>
            
                <?php else:?>
                <?php header("Location: ../../index.php") ?>
              <?php endif; ?>
                
            </div>
       
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                   <h3 id="myModalLabel">Confirmar Logout?</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal span2" method="post" action="sair.php">
                       <div class="control-group">
                          <div class="controls">
                            </br>
                            </br>
                            <button type="submit" class="btn">Sair</button>
                          </div>
                       </div>
                    </form>
                    <form class="form-horizontal span2" method="post" action="#">
                        <div class="control-group">
                           <div class="controls">
                              </br>
                              </br>
                              <button type="submit" class="btn">Cancelar</button>
                           </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div><!--myModal-->
        </div><!--row-fluid-->
          
        

        
        <div class="navbar hidden-phone">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li><a href="index-admin.php">Inicial</a></li>
                <li><a href="administradores.php">Administradores</a></li>
                <li><a href="professores.php">Professores</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="alunos.php">Alunos</a></li>
                
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->