<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1>Tokens únicos com CodeIgniter</h1>
	</div>
	<h2>Seu token</h2>
	<p class="lead">
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

<?php $this->load->view('commons/rodape'); ?>
