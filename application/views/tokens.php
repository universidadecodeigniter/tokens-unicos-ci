<?php $this->load->view('commons/header.php') ?>

<div id="container">
	<h1>Exemplo de geração de tokens únicos com gravação em banco de dados</h1>

	<div id="body">

		<h2>Seu token</h2>
		<p>
			<?=$token?>
		</p>

		<p><a href="<?=base_url('generate-token')?>" title="Clique aqui para gerar outro token único">Clique aqui</a> para gerar outro token único.</p>

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

</div>


<?php $this->load->view('commons/footer.php') ?>
