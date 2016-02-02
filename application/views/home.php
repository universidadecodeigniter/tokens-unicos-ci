<?php $this->load->view('commons/header.php') ?>

<div id="container">
	<h1>Exemplo de geração de tokens únicos com gravação em banco de dados</h1>

	<div id="body">
		<p><a href="<?=base_url('generate-token')?>" title="Clique aqui para gerar um token único">Clique aqui</a> para gerar um token único.</p>
	</div>

	<?php if($tokens): ?>
	<h3>Outros tokens gerados</h3>
	<ul>
		<?php foreach($tokens as $tk): ?>
		<li>
			<?=$tk->token?>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

</div>


<?php $this->load->view('commons/footer.php') ?>
