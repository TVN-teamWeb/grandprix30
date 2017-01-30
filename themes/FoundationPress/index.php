

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<section id="hp">
  <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
    <ul class="orbit-container">
          <?php $args = array(
              'post_type' => 'slider',
              'posts_per_page' => 10
            );

          $the_query = new WP_Query( $args );

          if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
              $image = get_field('immagine');
              if( !empty($image) ): ?>
            <li class="is-active orbit-slide blurImg">
              <img class="orbit-image" data-interchange="[<?php  echo $image['url']; ?>, small],[<?php  echo $image['url']; ?>, medium],[<?php  echo $image['url']; ?>, large],[<?php  echo $image['url']; ?>, xlarge]">
            </li>

          <?php
              endif;
            endwhile;
          endif;
          wp_reset_postdata();

            ?>
    </ul>

    <div class="claim">

      <?php $args = array(
          'post_type' => 'claim',
          'posts_per_page' => 1
        );

      $the_query = new WP_Query( $args );

      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
          $claim = get_field('immagine');
          if( !empty($claim) ): ?>
          <a href="#">
            <img data-interchange="[<?php  echo $claim['url']; ?>, small], [<?php  echo $claim['url']; ?>, medium], [<?php  echo $claim['url']; ?>, large], [<?php  echo $claim['url']; ?>, xlarge]">
          </a>
        <?php
            endif;
          endwhile;
        endif;
        wp_reset_postdata();

          ?>

    </div>


  </div>

</section>

<section id="premio">
  <div class="premio-content">
      <div class="columns space">


        <?php
        $args = array(
          'page_id' => '74'
      );

          $the_query = new WP_Query( $args );


          if ( $the_query->have_posts() ) :
              while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>

        <div class="testo">
          <?php the_content(); ?>
        </div>
        <?php

          endwhile;
        endif;
        // Reset Post Data
        wp_reset_postdata();

        ?>
      </div>
  </div>
</section>

<section id="gallery">

  <?php $args = array(
      'post_type' => 'link',
      'posts_per_page' => 4
    );

    $linkhp = new WP_Query( $args );

    if ( $linkhp->have_posts() ) :
      while ( $linkhp->have_posts() ) : $linkhp->the_post();
        $link = get_field( "link" );
        $img = get_field('immagine');
        if( !empty($img) ): ?>
        <div class="small-12 large-6 columns" role="main" >
            <a href="<?php echo $link; ?>">
              <img src="<?php echo $img['url']; ?>">
            </a>
        </div>
      <?php
          endif;
        endwhile;
      endif;
      wp_reset_postdata();

?>
</section>


<section id="giuria">
  <div id="lista-giuria">
    <div class="testo">
      <?php
      $args = array(
        'page_id' => '66'
    );

        $the_query = new WP_Query( $args );


        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
      ?>

      <h3><?php the_title(); ?></h3>
      <?php the_content(); ?>
      <?php

        endwhile;
      endif;
      // Reset Post Data
      wp_reset_postdata();

      ?>

    </div>

    <?php $args = array(
        'post_type' => 'giuria',
        'posts_per_page' => 14
      );

      $giuria = new WP_Query( $args );

//print_r($giuria);


      if ( $giuria->have_posts() ) :
        while ( $giuria->have_posts() ) : $giuria->the_post();

          $nome = get_field( "nome_giurato" );
          $ruolo = get_field( "ruolo" );
          $foto = get_field('foto');

          if( !empty($foto) ): ?>

          <!-- Thumb Giudici -->
          <div class="griglia-giuria zoom">
            <img class="thumbnail size" src="<?php echo $foto['url']; ?>">
            <div class="scheda-giuria">
                <p class="nome"><?php  echo $nome; ?></p>
                <p class="work"><?php  echo $ruolo; ?></p>
            </div>
          </div>


        <?php
            endif;
          endwhile;
        endif;
        wp_reset_postdata();

  ?>
</div>
</section>


<section id=gp>
  <h3>grand prix 2016</h3>
      <div class="winner">
        <div class="jwbox">
         <img data-interchange="[<?php echo get_bloginfo('template_url'); ?>/images/gp30/winner-small.jpg, small], [<?php echo get_bloginfo('template_url'); ?>/images/gp30/winner-medium.jpg, medium], [<?php echo get_bloginfo('template_url'); ?>/images/gp30/winner-large.jpg, large], [<?php echo get_bloginfo('template_url'); ?>/images/gp30/winner-xl.jpg, xlarge]">
         <div class="jwbox_hidden">
           <div class="close"> <img src="<?php bloginfo('template_url'); ?>/images/gp30/close-button.png"> </div>
           <div  class="jwbox_content">
             <div id="vincitori"></div>
           </div>
         </div>
       </div>
      </div>

      <script type="text/javascript">
      $(document).ready(function () {

        jwplayer('vincitori').setup({
          flashplayer: '<?php bloginfo('template_url'); ?>/assets/javascript/jwplayer/player.swf',
          width: '640',
          height: '360',
          file: 'http://wpc.6F93.edgecastcdn.net/806F93/media.televisionet.tv/video/grandprix/advertisingstrategies/24_05_16-business-Winner_List_GP_2016_Ecadem-IT.mp4',
          autostart: true,
          bufferlength:'5',
          provider:'http',
          skin:"<?php bloginfo('template_url'); ?>/assets/javascript/jwplayer/televisionet.zip",
          plugins: "timeslidertooltipplugin-1"
        });
        });
      </script>


</section>


<section id="winner-list">
  <h3>winner list</h3>
<div id="video">

  <?php $args = array(
        'post_type' => 'winners',
        'category_name' => 'edizione-2016',
        'posts_per_page' => 12
      );

      $winner = new WP_Query( $args );

      $i=0;

      if ( $winner->have_posts() ) :
        while ( $winner->have_posts() ) : $winner->the_post();

        $i++;
        $spot = get_field('titolo');
        $video = get_field('nome_video');
        $cliente = get_field('azienda');
        $agenzia = get_field('agenzia');
        $cdp = get_field('cdp');

        ?>

        <div class="thumb-video">
          <div class="jwbox">
            <img class="thumbnail size" src="<?php echo get_bloginfo('template_url'); ?>/images/gp30/thumb-video.jpg">
            <div class="jwbox_hidden">
              <div  class="jwbox_content">
                <div id="winner-<?php echo $i; ?>"></div>
              </div>
            </div>
            <div class="caption">
                  <h3><?php echo $spot; ?></h3>
                  <ul>
                    <li>Client: <span><?php echo $cliente; ?><span></li>
                    <li>Agency: <span><?php echo $agenzia; ?><span></li>
                    <li>Cdp: <span><?php echo $cdp; ?><span></li>
                  </ul>
              </div>
          </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function () {

          jwplayer('winner-<?php echo $i; ?>').setup({
            flashplayer: '<?php bloginfo('template_url'); ?>/assets/javascript/jwplayer/player.swf',
            width: '640',
            height: '360',
            file: 'http://wpc.6F93.edgecastcdn.net/806F93/media.televisionet.tv/video/grandprix/advertisingstrategies/<?php echo $video; ?>',
            autostart: true,
            bufferlength:'5',
            provider:'http',
            skin:"<?php bloginfo('template_url'); ?>/assets/javascript/jwplayer/televisionet.zip",
            plugins: "timeslidertooltipplugin-1"
          });
          });
        </script>

<?php
endwhile;
endif;
// Reset Post Data
wp_reset_postdata();


?>
</div>
</section>







<section id="interviste">
  <div class="testo">
    <h3>interviste</h3>
    <p>Un riconoscimento particolare va ai membri del comitato di selezione</p>
    <p>per lo scrupolo e l’attenzione posti nell’individuare i vincitori di categoria</p>
  </div>
<div class="carosel">
  <div class="responsive slider">
    <div>
      <img src="http://placehold.it/350x300?text=1">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=2">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=3">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=4">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=5">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=6">
    </div>
  </div>
</div>
</section>



<section id="sponsor">
  <div id="lista-loghi">
    <div class="testo">
      <h3>partner & sponsor</h3>
    </div>

    <!-- Thumb Giudici -->
    <div class="griglia-loghi"><img class="thumbnail size" src="<?php echo get_bloginfo('template_url'); ?>/images/gp30/loghi/campari.png"></div>
    <div class="griglia-loghi">  <img class="thumbnail size" src="<?php echo get_bloginfo('template_url'); ?>/images/gp30/loghi/connectClimate.png"></div>
    <div class="griglia-loghi"><img class="thumbnail size" src="<?php echo get_bloginfo('template_url'); ?>/images/gp30/loghi/Newyork.png"></div>
    <div class="griglia-loghi">  <img class="thumbnail size" src="<?php echo get_bloginfo('template_url'); ?>/images/gp30/loghi/zero.png"></div>
  </div>
</section>



<?php get_footer();
