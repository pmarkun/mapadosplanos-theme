<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<div style="display:none;">
	<?php 
	    global $custom_fields;
	    $custom_fields = get_post_custom(the_ID());
	    global $estapa;
	    if ($custom_fields['wpcf-qs_etapa01'][0] == "Sim") {
	    	$etapa = 'complano';
	    }
	    elseif ($custom_fields['wpcf-qs_etapa01'][0] == "Elaboração") {
	     	$etapa = 'elaboracao';
    	}
     	elseif ($custom_fields['wpcf-qs_etapa01'][0] == "Não") {
	      	$etapa = 'semplano';
      	}
	?>
	</div>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		
		<div class="entry-summary">
			<?php  the_excerpt(); ?>
		</div><!-- .entry-summary -->
		
		<?php else : ?>
		<div class="entry-content img-polaroid" id="mapa">
            <?php 
		global $custom_fields;
		echo do_shortcode("[mapbox layers='acaoeducativa.mapadosplanos' api='' options='' lat='" . $custom_fields['lat'][0] . "' lon='" . $custom_fields['lng'][0] . "' z='7' width='250' height='250']"); ?>
			<!-- <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?> -->
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php if ( is_single() ) : ?>

		<!-- EXIBICAO DOS CUSTOMFIELDS -->
		<div id="fichaae" class="well fichas">
			

		<ul class="nav nav-tabs">
  			<li <?php echo ($custom_fields['wpcf-qs_etapa01'][0] != "Sim" && $custom_fields['wpcf-qs_etapa01'][0] != "Elaboração" ? 'class="active"' : '');  ?>><a href="#parte1" data-toggle="tab">IBGE</a></li>
  			<li <?php echo ($custom_fields['wpcf-qs_etapa01'][0] != "Sim" && $custom_fields['wpcf-qs_etapa01'][0] != "Elaboração" ? '' : 'class="active"');  ?>><a href="#parte2" data-toggle="tab">Questionário</a></li>
  			<li><a href="#parte3" data-toggle="tab">Sociedade</a></li>
		</ul>

		
		<!-- TABS -->
		<div class="tab-content">
			<!-- IBGE -->
			<div class="tab-pane <?php echo ($etapa != "complano" && $etapa != "elaboracao" ? 'active' : '');  ?>" id="parte1">
				<span class="titulo">Dados do IBGE</span><br><span>Perfil dos Municípios Brasileiros (Munic/2011)</span>
				<hr />
				<table class="table table-bordered">
					<tr>
						<th>Tem plano?</th>
						<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a172'][0]; ?>"><?php echo $custom_fields['wpcf-a172'][0]; ?></span></td>
					</tr>
					<tr><th><b><div>Modalidades abrangidas</div></b></th>
					<td><?php
						//Exibe os niveis do plano
						if ($custom_fields['wpcf-a173'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Ensino fundamental</span>";
						    endif;
						if ($custom_fields['wpcf-a174'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Infantil</span>";
						    endif;
						if ($custom_fields['wpcf-a175'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>EJA</span>";
						    endif;
						if ($custom_fields['wpcf-a176'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Especial</span>";
						    endif;
						if ($custom_fields['wpcf-a177'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Ensino médio</span>";
						    endif;
						if ($custom_fields['wpcf-a178'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Profissional</span>";
						    endif;
						if ($custom_fields['wpcf-a179'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Ensino superior</span>";
						    endif;
						if ($custom_fields['wpcf-a180'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>No campo</span>";
						    endif;
						if ($custom_fields['wpcf-a181'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Indigena</span>";
						    endif;
						if ($custom_fields['wpcf-a182'][0] == "Sim") :
						    echo "<span class='label label-info ibge-Multi'>Ambiental</span>";
						    endif;
				    ?>
					</td>
					</tr>
				</table>
			
				<table class="table table-bordered">
				<tr><th colspan="2">Instâncias de Gestão Democrática</th></tr>
				<tr>
					<td>Sistema Municipal de Ensino</td>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a164'][0]; ?>"><?php echo $custom_fields['wpcf-a164'][0]; ?></span></td>
				</tr>
				<tr>
					<td>Fundo Municipal de Educação</td>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a195'][0]; ?>"><?php echo $custom_fields['wpcf-a195'][0] ?></span></td>
				</tr>
				<tr>
					<td>Conselho Municipal de Educação</td> 
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a188'][0]; ?>"><?php echo $custom_fields['wpcf-a188'][0] ?></span></td>
				</tr>
				<tr>
					<td>Conselho de Controle e Acompanhamento Social do FUNDEB</td>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a183'][0]; ?>"><?php echo $custom_fields['wpcf-a183'][0] ?></span></td>
				</tr>
				<tr>
					<td>Conselhos Escolares</td>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a184'][0]; ?>"><?php echo $custom_fields['wpcf-a184'][0] ?></span></td>
				</tr>
				<tr>
					<td>Conselho de Alimentação Escolar</td>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a185'][0]; ?>"><?php echo $custom_fields['wpcf-a185'][0] ?></span></td>
				</tr>
				<tr>
					<td>Conselho do Transporte Escolar</td>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a186'][0]; ?>"><?php echo $custom_fields['wpcf-a186'][0] ?></span></td>
				</tr>
				</table>

				<table class="table table-bordered">
				<tr>
					<th>No município, há programa ou ações de educação em direitos humanos?</th>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a489'][0]; ?>"><?php echo $custom_fields['wpcf-a489'][0] ?></span></td>
				</tr>
				</table>

				<table class="table table-bordered">
				<tr>
					<th colspan="2">Na rede municipal de ensino há programas e ações de:</th>
				</tr>
				<tr>
					<td>Combate à discriminação</td> <td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a168'][0]; ?>"><?php echo $custom_fields['wpcf-a168'][0] ?></span></td>
				</tr>
				<tr>
					<td>Combate à violência</td> <td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a169'][0]; ?>"><?php echo $custom_fields['wpcf-a169'][0] ?></span></td>
				</tr>
				<tr>
					<td>Combate à violência</td> <td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a167'][0]; ?>"><?php echo $custom_fields['wpcf-a167'][0] ?></span></td>
				</tr>
				</table>

				<table class="table table-bordered">
				<tr>
					<th>Na rede municipal de ensino existem escolas aptas a receber pessoas com deficiência?</th>
					<td><span class="resposta label label-info ibge-<?php echo $custom_fields['wpcf-a187'][0]; ?>"><?php echo $custom_fields['wpcf-a187'][0] ?></span></td>
				</tr>
				</table>
			</div>
		
			<!-- Questionário Gestor -->
			<?php if ($etapa == "complano" || $etapa == "elaboracao") : ?>
			<div class="tab-pane active" id="parte2">
				<span class="titulo">Questionário respondido por gestor/a do município</span><br>
				<span>Status informado: <b><?php echo ($custom_fields['wpcf-qs_etapa01'][0] == 'Sim' ? 'Tem plano' : 'Plano em elaboração');  ?></b></span>
				<hr />
				<table class="table table-bordered">
				<tr>
					<th>Possui sistema municial de ensino?</th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano01'); ?>"><?php echo types_render_field('qs_plano01'); ?></span></td>
				</tr>
				<tr>
					<th>Possui Conselho Municipal em Atividade?</th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano02'); ?>"><?php echo types_render_field('qs_plano02'); ?></span></td>
				</tr>
				<tr>
					<th>Possui plano de carreira para o magistério?</th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano03'); ?>"><?php echo types_render_field('qs_plano03'); ?></span></td>
				</tr>
				<tr>
					<th>Secretário de educação é ordenador de despesas?</th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano04'); ?>"><?php echo types_render_field('qs_plano04'); ?></span></td>
				</tr>
				<tr>
					<th>Seu município possui Plano de Educação em vigência?</th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano05'); ?>"><?php echo types_render_field('qs_plano05'); ?></span></td>
				</tr>
				
				<?php if ($custom_fields['wpcf-qs_etapa01'][0] == "Sim") { ?>
				
				<!-- Tem plano -->
					<tr>
						<th>Quando o Plano de Educação foi aprovado pelo Legislativo e entrou em vigência?</th>
						<td><span class="resposta label label-info ibge-Multi ?>"><?php echo types_render_field('qs_plano06_complano'); ?></span></td>
					</tr>
					<tr>
						<th>O Plano de Educação já foi avaliado nos últimos quatro anos?</th>
						<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano07_complano'); ?>"><?php echo types_render_field('qs_plano07_complano'); ?></span></td>
					</tr>
					<tr>
						<th>As metas do Plano de Educação estão contempladas no Plano Plurianual do Município (PPA) e nas leis orçamentárias?</th>
						<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano08_complano'); ?>"><?php echo types_render_field('qs_plano08_complano'); ?></span></td>
					</tr>
				<?php } elseif ($custom_fields['wpcf-qs_etapa01'][0] == "Elaboração") { ?>
				
					<!-- Plano em elaboração -->
					<tr>
						<th>Seu município está elaborando o Plano de Educação?</th>
						<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano06_elaboracao'); ?>"><?php echo types_render_field('qs_plano06_elaboracao'); ?></span></td>
					</tr>
					<tr>
						<th>Em qual momento se encontra o processo de elaboração do Plano de Educação de seu município?</th>
						<td><span class="resposta label label-info ibge-Multi"><?php echo types_render_field('qs_plano07_elaboracao'); ?></span></td>
					</tr>

				<?php } ?>
					<tr>
						<th>Há investimento na comunicação sobre o processo de elaboração do Plano de Educação?</th>
						<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano09'); ?>"><?php echo types_render_field('qs_plano09'); ?></span></td>
					</tr>
				<tr>
					<th>Há assessoria no processo de elaboração do Plano de Educação? </th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano12'); ?>"><?php echo types_render_field('qs_plano12'); ?></span></td>
				</tr>
				<tr>
					<th>Em caso afirmativo, informe quem foram os assessores:</th>
					<td><?php echo types_render_checkboxes($custom_fields['wpcf-qs_plano14'][0], 'resposta label label-info ibge-Multi'); ?></td>
				</tr>
				<tr>
					<th>Quais das instituições/entidades que atuam no município participaram da elaboração do plano de educação?</th>
					<td><?php echo types_render_checkboxes($custom_fields['wpcf-qs_plano14'][0], 'resposta label label-info ibge-Multi'); ?></td>
				</tr>
				<tr>
					<th>Dos segmentos da comunidade escolar descritos abaixo, quais participam da elaboração do Plano de Educação de seu município?</th>
					<td><?php echo types_render_checkboxes($custom_fields['wpcf-qs_plano14'][0], 'resposta label label-info ibge-Multi'); ?></td>
				</tr>
				<tr>
					<th>Há participação de crianças e adolescentes na elaboração do Plano de Educação?</th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano21'); ?>"><?php echo types_render_field('qs_plano21'); ?></span></td>
				</tr>
				<tr>
					<th>Em que ano desta gestão (2013-2016) seu município pretente avaliar o Plano de Educação?</th>
					<td><span class="resposta label label-info ibge-<?php echo(types_render_field('qs_plano23', array('raw'=>'true'))); ?>"><?php echo(types_render_field('qs_plano23', array('raw'=>'true'))); ?></span></td>
				</tr>
				<tr>
					<th>A quem cabe a avaliação da implantação das metas do Plano de Educação de seu município?</th>
					<td><?php echo types_render_checkboxes($custom_fields['wpcf-qs_plano14'][0], 'resposta label label-info ibge-Multi'); ?></td>
				</tr>
				<tr>
					<th>Seu município já respondeu a alguma demanda baseada na lei de acesso à informação pública (lei 12.527/2011) com relação à área de educação?</th>
					<td><span class="resposta label label-info ibge-<?php echo types_render_field('qs_plano26'); ?>"><?php echo types_render_field('qs_plano26') ?></span></td>
				</tr>
				</table>
			</div>
			
			<?php elseif ($etapa != "complano" || $etapa != "elaboracao") : ?>
			<div class="tab-pane" id="parte2">
				<span class="titulo">Seu município ainda não respondeu às perguntas sobre o Plano de Educação!</span>
				<p></p>
				<p>Se você é gestor, faça seu <a href="wp-admin/post.php?post=<?php echo the_ID();?>&action=edit">login</a> para preencher o questionário, ou veja <a href="/gestor">como gestores(as) podem participar</a>.</p>
				<p>Se você é um membro da sociedade civil, nos informe sobre o processo do Plano de Educação no seu município, preenchendo o questionário na aba Sociedade. Ou saiba mais sobre <a href="/sociedade">como a sociedade pode colaborar</a>.
			
			</div>

			<?php endif; ?>
			<!-- Questionário Sociedade -->
			
			
			<div class="tab-pane" id="parte3">
				<?php 
					//Visualização dos questionários. Falta preparar o resto do HTML. Ainda tem um bug nas questões de multipla escolha.

					$resultados = mapadosplanos_select_questionarios(get_the_ID()); 
					//print_r($resultados);
					$total = $resultados['post_id'][get_the_ID()];
				?>
				<table class="table table-bordered">
				<td rowspan="4">Plano de Educação</td>
				<td>
					<tr><td><div style="background-color:#0000ff;width:<?php echo $resultados['qs_01']['Sim']/$total*100; ?>%">Sim</div></td></tr></td></tr>
					<tr><td><div style="background-color:#ff0000;width:<?php echo $resultados['qs_01']['Não']/$total*100; ?>%">Não</div></td></tr></td></tr>
					<tr><td><div style="background-color:#00ff00;width:<?php echo $resultados['qs_01']['Em elaboração']/$total*100; ?>%">Em elaboração</div></td></tr>
					<tr><td>Não sabe</td></tr>
				</td>
				</table>
					
			<?php 
				if (function_exists('mapadosplanos_submit_form')) {
					mapadosplanos_submit_form(get_the_ID()); 
				} 
			?>
			</div>
	</div>

        <?php endif; ?>
		<!-- FIM DA EXIBICAO DOS CUSTOMFIELDS -->
				
		<footer class="entry-meta">
		
		</footer><!-- .entry-meta -->
		
				<!-- EXIBICAO DOS ATTACHMENTS -->
        
            <?php

              if( function_exists( 'attachments_get_attachments' ) )
              {
                $attachments = attachments_get_attachments();
                $total_attachments = count( $attachments );
                if( $total_attachments ) : ?>
                
                  <?php 
                  	echo '<div class="anexos well">';
                              echo '<h4>Anexos - Faça o download</h4>';
                        echo '<ul class="thumbnails">';
                  
                  for( $i=0; $i<$total_attachments; $i++ ) : ?>
                  <li id="arquivo-<?php echo $i; ?>" class="thumbnail arquivo <?php echo substr($attachments[$i]['mime'], -3); ?>">
                  <a class="img-ico" href="<?php echo $attachments[$i]['location'] ?>">a</a>
                    <h5><small><?php echo '<a href="' . $attachments[$i]['location'] . '">'.$attachments[$i]['title'].'</a>'; ?></small></h5>
                    <p><small><?php echo $attachments[$i]['caption']; ?></small></p>
                    <p><?php echo '<a class="btn" href="' . $attachments[$i]['location'] . '">Download</a>'; ?></p>
                    <p><small><?php echo $attachments[$i]['filesize']; ?></small></p>
                  </li>
                  <?php endfor; ?>
                <?php 
                echo '</ul></div>';
                endif; 
                
                ?>
                
            <?php } ?>
        
		<!-- FIM DOS ATTACHMENTS -->
	</article><!-- #post -->
	
	

