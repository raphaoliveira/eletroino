
<!DOCTYPE html>
 <?php include 'header.php'; ?>   

      <!-- Example row of columns -->
      <div class="row-fluid">
      	<div class="span5">
      		<h2>Endereço</h2>
      		<address>
  				<strong>Software Livre School</strong><br><br>
  				Rua João da Silva, 600, Centro<br>
  				Santa Fé do Sul - SP    CEP: 15775-000<br>
  				<abbr title="Phone">Tel:</abbr> (17) 3222-1000
          <br><br>
              <a href="mailto:#">contato@slschool.com</a>
			</address>
 
			
      <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?t=h&amp;ie=UTF8&amp;ll=-20.204696,-50.927553&amp;spn=0.048168,0.084543&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?t=h&amp;ie=UTF8&amp;ll=-20.204696,-50.927553&amp;spn=0.048168,0.084543&amp;z=14&amp;source=embed" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>
      	</div>
      	
        <div class="span7">
          	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contato</h2>
          	<form align="left" class="form-horizontal">
  				<div class="control-group">
    				<label class="control-label" for="inputNome">Nome</label>
    				<div class="controls">
      					<input class="span8" type="text" id="inputNome" placeholder="Nome">
    				</div>
  				</div>
  				<div class="control-group">
    				<label class="control-label" for="inputEmail">E-Mail</label>
    				<div class="controls">
      					<input class="span8" type="text" id="inputEmail" placeholder="Email">
    				</div>
  				</div>
  				<div class="control-group">
    				<label class="control-label" for="inputTel">Telefone</label>
    				<div class="controls">
      					<input class="span8" type="text" id="inputTel" placeholder="Telefone">
    				</div>
  				</div>
  				<div class="control-group">
    				<label class="control-label" for="inputAssunto">Assunto</label>
    				<div class="controls">
      					<input class="span8" type="text" id="inputAssunto" placeholder="Assunto">
    				</div>
  				</div>
  				<div class="control-group">
    				<label class="control-label" for="inputMsg">Mensagem</label>
    				<div class="controls">
      					<textarea rows="5" class="span10"></textarea>
    				</div>
  				</div>
  				<div class="control-group">
    				<div class="controls">
      					<button type="submit" class="btn">Enviar</button>
    				</div>
  				</div>
			</form>
          	
        </div>
      </div>
      
    <?php include 'footer.php'; ?>   