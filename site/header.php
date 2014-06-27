<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>EletroIno - Controle sua casa por aqui</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EletroIno">
    <link rel="shortcut icon" href="img/ico.png" type="image/x-icon">
    

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="ico/favicon.png">
  <script type="text/javascript">

      function logadoComSucessoAdmin()
      {
        setTimeout("window.location='sistema/admin/index-admin.php'", 500);
      }

        function logadoComSucessoProfessor()
        {
            setTimeout("window.location='sistema/professor/index-professor.php'", 500);
        }

        function logadoComSucessoAluno()
        {
            setTimeout("window.location='sistema/aluno/index-aluno.php'", 500);
        }

      function falhaNoLogin()
      {
        setTimeout("window.location='index.php'", 3000);
      }
 </script>
  </head>

 <?php //$base_url = $_SERVER["SERVER_NAME"]; ?>

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
              			<li><a href="index.php">Inicial</a></li>
                    <li><a href="quem-somos.php">O Projeto</a></li>
                		<li><a href="cursos.php">Como Fazer?</a></li>
                		<li><a href="valores.php">Os Códigos</a></li>
                		<li><a href="calendario.php">Fotos e Vídeos</a></li>
                		<li><a href="contatos.php">Contato</a></li>
            		</ul>
          		</div><!--/.nav-collapse -->
        	</div>
      	</div>
    </div>

    <div class="container">

      
        <div class="row-fluid">
            <div class="span6">
        		    <a href="index.php">
        			  <img src="img/logo.png" alt="Software Livre School" title="Software Livre School" style="margin-bottom: 10px;">
        		    </a>
        	  </div>
        
        	  <div class="login-modal span6 text-right" style="margin-top:20px">
        		    <a href="#myModal" role="button" class="btn btn-info" data-toggle="modal"><i class="icon-lock icon-white"></i> Faça o Login</a>
          	</div>
        	
        	  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  			       	<div class="modal-header">
    			         	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    			         	<h3 id="myModalLabel">Faça o login</h3>
  			       	</div>
  				      <div class="modal-body">
    			         	<form class="form-horizontal" method="post" action="tratar-login.php">
  					           	<div class="control-group">
    				            		<label class="control-label" for="login">Login</label>
    					             	<div class="controls">
      						            	<input type="text" name="login" id="login" placeholder="Login">
    						            </div>
  					            </div>
  						          <div class="control-group">
    					             	<label class="control-label" for="senha">Senha</label>
    					             	<div class="controls">
      						            	<input type="password" name="senha" id="senha" placeholder="Senha">
    					             	</div>
  						          </div>
  					           	<div class="control-group">
    					             	<div class="controls">
                                <input type="radio" name="permissao" value="aluno"> Aluno
                                <input style="margin-left: 15px;" type="radio" name="permissao" value="professor"> Professor
                                <input style="margin-left: 15px;" type="radio" name="permissao" value="admin"> Admin 
                                </br>
                                </br>
      							            <button type="submit" class="btn">Entrar</button>
    					             	</div>
  						          </div>
					          </form>
  				      </div>
  			       	<div class="modal-footer">
    				    </div>
			      </div>
        	
        </div>
        
        <div class="navbar hidden-phone">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                   <li><a href="index.php">Inicial</a></li>
                   <li><a href="quem-somos.php">O Projeto</a></li>
                   <li><a href="cursos.php">Como Fazer?</a></li>
                   <li><a href="valores.php">Os Códigos</a></li>
                   <li><a href="calendario.php">Fotos e Vídeos</a></li>
                  <li><a href="contatos.php">Contato</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->

   