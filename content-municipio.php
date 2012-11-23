<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

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
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content" id="mapa">
            <?php echo do_shortcode("[mapbox layers='acaoeducativa.mapadosplanos' api='' options='' lat='-13.3255' lon='-51.1523' z='7' width='250' height='250']"); ?>
			<!-- <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?> -->
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php if ( is_single() ) : ?>

		<!-- EXIBICAO DOS CUSTOMFIELDS -->

        <?php
		$custom_fields = get_post_custom(the_ID());
		echo '<div id="fichaae" class="fichas">';
                echo '<span class="titulo" >Respostas do município </span>';
		echo edit_post_link('[responder]', '<span class="edit-link">', '</span>' );
		echo '<hr />';
                echo '<div class="questaoae">Seu município possui plano de educação em vigência?</div> <div id="resposta">' . $custom_fields['Q1'][0] . '</div>';
                echo '<div class="questaoae"> Quando o plano de educação foi aprovado?</div> <div id="resposta">' . $custom_fields['Q2'][0] . '</div>';
                echo '<div class="questaoae"> O plano de educação já foi revisado nos últimos quatro anos?</div> <div id="resposta">' . $custom_fields['Q3'][0] . '</div>';
                echo '<div class="questaoae">Seu município está elaborando um plano de educação?</div> <div id="resposta">' . $custom_fields['Q4'][0]. '</div>';
                echo '<div class="questaoae">Seu município pretende elaborar um plano de educação nesta gestão (2013-2016)?</div> <div id="resposta">' . $custom_fields['Q5'][0]. '</div>';
                echo '<div class="questaoae">Seu município pretende revisar o plano de educação nesta gestão (2013-2016)?</div> <div id="resposta">' . $custom_fields['Q6'][0]. '</div>';
                echo '<div class="questaoae">Em qual momento da elaboração se encontra?</div> <div id="resposta">' . $custom_fields['Q7'][0]. '</div>';
                echo '<div class="questaoae">O município contratou ou pretende contratar algum tipo de consultoria externa para elaboração do plano de educação?</div> <div id="resposta">' . $custom_fields['Q8'][0]. '</div>';
                echo '<div class="questaoae">Quais dos órgãos/instâncias abaixo participam ou participaram da elaboração do plano de educação?</div> <div id="resposta">' . $custom_fields['Q9'][0]. '</div>';
                echo '<div class="questaoae">Quais das organizações/movimentos abaixo participam ou participaram da elaboração do plano de educação?</div> <div id="resposta">' . $custom_fields['Q10'][0]. '</div>';
                echo '<div class="questaoae">Dos segmentos da comunidade escolar descritos abaixo, quais participaram ou estão participando da elaboração do plano de educação de seu município.</div> <div id="resposta">' . $custom_fields['Q11'][0]. '</div>';
                echo '<div class="questaoae">Quais foram ou estão sendo os dados utilizados para a elaboração do diagnóstico do município a ser utilizado no plano de educação?</div> <div id="resposta">' . $custom_fields['Q12'][0]. '</div>';
                echo '<div class="questaoae">Quais foram ou estão sendo as principais metodologias utilizadas para a elaboração do plano de educação de seu município?</div> <div id="resposta">' . $custom_fields['Q13'][0]. '</div>';
                echo '<div class="questaoae">O processo de elaboração do plano de educação mobilizou ou vem mobilizando</div> <div id="resposta">' . $custom_fields['Q14'][0]. '</div>';
                echo '<div class="questaoae">Houve ou há um investimento na comunicação sobre o processo de construção/revisão do Plano?</div> <div id="resposta">' . $custom_fields['Q15'][0]. '</div>';
                echo '<div class="questaoae">Caso positivo, a comunicação do processo se deu:</div> <div id="resposta">' . $custom_fields['Q16'][0]. '</div>';
                echo '<div class="questaoae">Seu município está preparado para cumprir a lei de acesso à informação pública (lei 12.527/2011) com relação à área de educação?</div> <div id="resposta">' . $custom_fields['Q17'][0]. '</div>';
                echo '<div class="questaoae">Além da gestão municipal, participam ou participaram do processo de construção/revisão dos Planos</div> <div id="resposta">' . $custom_fields['Q18'][0]. '</div>';
                echo '<div class="questaoae">A construção do plano envolveu/envolve as seguintes etapas/modalidades e níveis da educação?</div> <div id="resposta">' . $custom_fields['Q19'][0]. '</div>';
                echo '<div class="questaoae">Houve ou há um investimento na participação de crianças e adolescentes na construção do Plano de Educação?</div> <div id="resposta">' . $custom_fields['Q20'][0]. '</div>';
                echo '<div class="questaoae">Se sim, de que forma?</div> <div id="resposta">' . $custom_fields['Q21'][0]. '</div>';
		echo '</div>';
            
		echo '<div id="fichaibge" class="fichas">';
		echo '<span class="titulo">IBGE Munic 2009</span>';
		echo '<hr />';
                echo '<div class="pergunta1">Tem plano?</div> <div class="resposta">' . $custom_fields['A187'][0] . '</div>';
                
                echo '<div class="pergunta1">Instâncias de Gestão Democrática:</div>';
                echo '<div class="pergunta2">Sistema Municipal de Ensino</div> <div class="resposta">' . $custom_fields['A171'][0]. '</div>';
                echo '<div class="pergunta2">Fundo Municipal de Educação</div> <div class="resposta">' . $custom_fields['A219'][0]. '</div>';
                echo '<div class="pergunta2">Conselho Municipal de Educação</div> <div class="resposta">' . $custom_fields['A211'][0]. '</div>';
                echo '<div class="pergunta2">Conselho de Controle e Acompanhamento Social do FUNDEF</div> <div class="resposta">'. $custom_fields['A181'][0]. '</div>';
                echo '<div class="pergunta2">Conselhos Escolares</div> <div class="resposta">' . $custom_fields['A182'][0]. '</div>';
                echo '<div class="pergunta2">Conselho de Alimentação Escolar</div> <div class="resposta">' . $custom_fields['A183'][0]. '</div>';
                echo '<div class="pergunta2">Conselho do Transporte Escolar</div> <div class="resposta">' .	$custom_fields['A184'][0]. '</div>';
                
                echo '<div class="pergunta1">O Plano Municipal de Educação incorpora educação em direitos humanos no currículo?</div> <div class="resposta">'. $custom_fields['A188'][0]. '</div>';

                echo '<div class="pergunta1">Na rede municipal de ensino existe capacitação de professores em:</div>';
                echo '<div class="pergunta2">Direitos Humanos</div> <div class="resposta">' . $custom_fields['A189'][0]. '</div>';
                echo '<div class="pergunta2">Gênero</div> <div class="resposta">' . $custom_fields['A190'][0]. '</div>';
                echo '<div class="pergunta2">Raça/etnia</div> <div class="resposta">' . $custom_fields['A191'][0]. '</div>';
                echo '<div class="pergunta2">Orientação Sexual</div> <div class="resposta">' . $custom_fields['A192'][0]. '</div>';
                
                echo '<div class="pergunta1">Na rede municipal de ensino existem escolas aptas a receber pessoas com deficiência?</div> <div class="resposta">' . $custom_fields['A194'][0]. '</div>';
            echo '</div>';
        ?>
        <?php endif; ?>
		<!-- FIM DA EXIBICAO DOS CUSTOMFIELDS -->
		
		<!-- EXIBICAO DOS ATTACHMENTS -->
        <h2></h2>
        <div class="anexos">
            <?php
            echo '<h2>Anexos - Faça o download</h2>';
              if( function_exists( 'attachments_get_attachments' ) )
              {
                $attachments = attachments_get_attachments();
                $total_attachments = count( $attachments );
                if( $total_attachments ) : ?>
                  <?php for( $i=0; $i<$total_attachments; $i++ ) : ?>
                  <div id="arquivo-<?php echo $i; ?>" class="arquivo">
                  <ul>               
                    <li><?php echo '<a href="' . $attachments[$i]['location'] . '">'.$attachments[$i]['title'].'</a>'; ?></li>
                    <li><?php echo $attachments[$i]['caption']; ?></li>
                    <li><?php echo $attachments[$i]['filesize']; ?></li>
                  </ul>
                  </div>
                  <?php endfor; ?>
                <?php endif; ?>
            <?php } ?>
        </div>
		<!-- FIM DOS ATTACHMENTS -->
		
		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
