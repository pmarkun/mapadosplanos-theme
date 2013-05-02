<?php
/**
 * Mapa da Home
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 */
?>
<?php 

$elaboracao = do_shortcode( "[mapa_respostas etapa='elaboracao']" );
$elaboracao = do_shortcode( "[mapa_respostas etapa='complano']" );
$total = do_shortcode( "[mapa_respostas etapa='total']" );

if ($elaboracao != 0):
	$porcentagem_elab = $total/$elaboracao*100;
else:
	$porcentagem_elab = 0;
endif;
if ($elaboracao != 0):
	$porcentagem_complano = $total/$elaboracao*100;
else:
	$porcentagem_complano = 0;
endif;

$porcentagem_total = $porcentagem_complano + $porcentagem_elab;

?>

<div id="map" class="img-polaroid">
	<a href="#" class="zoomer zoomin">+</a>
	<a href="#" class="zoomer zoomout">-</a>
	<ul id="map-ui">
		<a href='#' id='acaoeducativa.mapadosplanos' class='active'>Munícipios</a>
		<a href='#' id='acaoeducativa.mapadosplanos-estados'>Estados</a>
	</ul>
	<div class="termometro">
		<span>Termômetro dos planos</span>
		<div>Estados
			<span><?php echo $porcentagem_total; ?>%</span>
			<div class="progress progress-success progress-striped">
			  <div class="bar bar_complano" style="width: <?php echo $porcentagem_total; ?>%"></div>
			  <div class="bar bar_elab" style="width: <?php echo $porcentagem_total; ?>%"></div>
			</div>
		</div>
		<div>Municípios
			<span><?php echo $porcentagem_total; ?>%</span>
			<div class="progress progress-success progress-striped">
			  <div class="bar bar_complano" style="width: <?php echo $porcentagem_total; ?>%"></div>
			  <div class="bar bar_elab" style="width: <?php echo $porcentagem_total; ?>%"></div>
			</div>
			
		</div>
	</div>
	<div class="map-legends">
		<div class="map-legend">
			<div class="legenda">
				<span>Planos de educação</span>
				<div class="leg_elab">
					<span class="marker"></span>
					<span>Em elaboração</span>
				</div>
				<div class="leg_complano">
					<span class="marker"></span>
					<span>Com plano</span>
				</div>
				<div class="leg_semplano">
					<span class="marker"></span>
					<span>Sem plano</span>
				</div>
				<div class="leg_gestor">
					<span class="marker"></span>
					<span>Resposta do/a gestor/a</span>
				</div>
			</div>
		</div>
	</div>
</div>
