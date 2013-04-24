<?php
/**
 * Mapa da Home
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 */
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
			<span>25%</span>
			<div class="progress progress-success progress-striped">
			  <div class="bar" style="width: 25%"></div>
			</div>
		</div>
		<div>Municípios
			<span>25%</span>
			<div class="progress progress-success progress-striped">
			  <div class="bar" style="width: 25%"></div>
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
				<div class="leg_semplano">
					<span class="marker"></span>
					<span>Com plano</span>
				</div>
				<div class="leg_complano">
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
