<?php
	if (isset($_POST['btn_update'])){
		$newhost = $_POST['newhost'];
		$newuser = $_POST['newuser'];
		$newpass = $_POST['newpass'];
						
		$file = 'config.php';
		$message = '<?php '."\n";
		$message = $message.'$host = "'.$newhost.'";'."\n";
		$message = $message.'$user = "'.$newuser.'";'."\n";
		$message = $message.'$pass = "'.$newpass.'";'."\n";
		$message = $message."?>";
		try {
			file_put_contents($file, $message);
				echo '<script>cmodal("Sucesso!", "Novas configurações salvas com sucesso!", "success", "index.php")</script>';
			}
		catch(PDOException $e) {
				echo '<script>cmodal("Acesso Negado!", "Erro atualizando as configurações!", "error", "index.php")</script>';
			}										
	}
?>
<div class="container">
	<header>
		<h1 style="text-align:center;">Mikrotik</h1>	
		<h2 style="text-align:center;">Gerenciamento de usuários/vouchers no hotspot</h2>
		<h3 style="text-align:center;">Bentley Brasil - Luiz Marcello</h3>
	</header>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 well" style="box-shadow: 10px 10px 5px #888888;">
			<div class="panel panel-primary">
				<div class="panel panel-heading">
					<p><strong>Por favor, atualize as configurações abaixo</strong></p>
				</div>
				<div class="panel-body">	

					<form class="form-horizontal" id="loginform" action="" method="POST">
						<div class="form-group form-group-sm">
							<label class="col-sm-2 control-label" for="txt_hostname">Host IP</label>
							<div class="col-sm-8">
								<input type="text" id="txt_hostname" name="newhost" placeholder="IP address of host" value="<?php echo $host; ?>" required class="form-control" autofocus>
							</div>
						</div>
						<div class="form-group form-group-sm">
							<label class="col-sm-2 control-label" for="txt_username">Usuário</label>
							<div class="col-sm-8">
								<input type="text" id="txt_username" name="newuser" placeholder="Registered Username" value="<?php echo $user; ?>" required class="form-control" autofocus>
							</div>
						</div>						
						<div class="form-group form-group-sm">
							<label class="col-sm-2 control-label" for="newpass">Senha</label>
							<div class="col-sm-8">
								<input type="password" id="newpass" name="newpass" placeholder="Password" placeholder="Password" value="<?php echo $pass; ?>" required class="form-control">
							</div>
						</div>
						<div class="form-group form-group-sm">
							<div class="col-sm-2 col-sm-offset-4">
								<button id="btn_update" name="btn_update" type="submit" class="btn btn-primary">&nbsp;Enviar</button>
							</div>
							<div class="col-sm-2">
								<button id="btn_cancel" name="btn_cancel" type="close" class="btn btn-success">&nbsp;Cancelar</button>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>

					
