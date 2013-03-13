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
	?></div>

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
		
		

        <?php
		global $custom_fields;
echo '<div id="fichaae" class="well fichas">'; 
echo '<span class="titulo" >Respostas do município </span>';


echo edit_post_link('[responder]', '<span class="edit-link">', '</span>' );
echo '<hr />';

?>



<ul class="nav nav-tabs">
  <li class="active"><a href="#parte1" data-toggle="tab">Parte 1</a></li>
  <li><a href="#parte2" data-toggle="tab">Parte 2</a></li>
</ul>


<?php

echo '<div class="tab-content">'; // começa tab content

echo '<div class="tab-pane active" id="parte1">'; // começa parte 1

echo(types_render_field("conselho", array("show_name" => "true", "output" => "html") ));
echo(types_render_field("cargo", array("show_name" => "true", "output" => "html") ));

echo '</div>'; // fim parte 1

echo '<div class="tab-pane" id="parte2">'; // começa parte 2

echo '<div class="questaoae">Quais foram ou estão sendo os dados utilizados para a elaboração do diagnóstico do município a ser utilizado no plano de educação?</div> <div id="resposta" class="text-info">' . $custom_fields['Q12'][0]. '</div>';

echo '</div>';

echo '</div>'; // fim parte 2

echo '</div>'; // termina tab content

//ficha IBGE

echo '<div id="fichaibge" class="well fichas">';
echo '<span class="titulo">IBGE Munic 2011</span>';
echo '<hr /><table class="table table-bordered">';
echo '<tr>
<th>Tem plano?</th>
<td><span class="resposta label label-info ibge-'.$custom_fields['wpcf-a188'][0].'">' . $custom_fields['wpcf-a187'][0] . '</span></td>
</tr></table>';

echo '<table class="table table-bordered">
<tr><th colspan="2">Instâncias de Gestão Democrática</th></tr>';
echo '<tr><td>Sistema Municipal de Ensino</td> 
	<td>
	<span class="resposta label label-info ibge-'.$custom_fields['wpcf-a188'][0].'">' . $custom_fields['wpcf-a171'][0]. '</span>
	</td></tr>';
echo '<tr>
	<td>Fundo Municipal de Educação</td> <td>
		<span class="resposta label label-info ibge-'.$custom_fields['wpcf-a188'][0].'">' . $custom_fields['wpcf-a195'][0]. '</span>
	</td>
</tr>';
echo '<tr>
	<td>Conselho Municipal de Educação</td> <td>
		<span class="resposta label label-info ibge-'.$custom_fields['wpcf-a188'][0].'">' . $custom_fields['wpcf-a188'][0]. '</span>
	</td>
</tr>';
echo '<tr>
	<td>Conselho de Controle e Acompanhamento Social do FUNDEB</td> <td>
		<span class="resposta label label-info ibge-'.$custom_fields['wpcf-a188'][0].'">'. $custom_fields['wpcf-a183'][0]. '</span>
	</td>
</tr>';
echo '<tr>
	<td>Conselhos Escolares</td> <td>
		<span class="resposta label label-info ibge-'.$custom_fields['wpcf-a188'][0].'">' . $custom_fields['wpcf-a184'][0]. '</span>
	</td>
</tr>';
echo '<tr>
	<td>Conselho de Alimentação Escolar</td> <td>
		<span class="resposta label label-info">' . $custom_fields['wpcf-a185'][0]. '</span>
	</td>
</tr>';
echo '<tr>
	<td>Conselho do Transporte Escolar</td> <td>
		<span class="resposta label label-info">' .	$custom_fields['wpcf-a186'][0]. '</span>
	</td>
</tr></table>';

echo '<table class="table table-bordered"><tr><th>No município, há programa ou ações de educação em direitos humanos??</th></tr><tr><td> <span class="resposta label label-info">'. $custom_fields['wpcf-a489'][0]. '</span></td></tr></table>';

echo '<table class="table table-bordered">
<tr><th colspan="2">Na rede municipal de ensino há programas e ações de:</th></tr>';
echo '<tr><td>Combate à discriminação</td> <td><span class="resposta label label-info">' . $custom_fields['wpcf-a168'][0]. '</span></td></tr>';
echo '<tr><td>Combate à violência</td> <td><span class="resposta label label-info">' . $custom_fields['A190'][0]. '</span></td></tr>';

echo '<table class="table table-bordered"><tr><th>Na rede municipal de ensino existem escolas aptas a receber pessoas com deficiência?</th></tr><tr><td> <span class="resposta label label-info">' . $custom_fields['wpcf-a187'][0]. '</span></td></tr></table>';
echo '</table></div>';
        ?>
        
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
	
	
