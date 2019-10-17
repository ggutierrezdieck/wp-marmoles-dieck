<footer>
  <div class="row space"></div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-2 materiales foot-menu">
      <a href="<?php echo site_url('/materiales') ?>"><h2>Materiales</h2></a>
      <ul>
        <!--AREA DE MATERIALES-->
        <?php
        $materiales=new WP_Query(array(
          'posts_per_page'=> -1,
          'post_type'=>'Materiales',
          'order_by'=>'title',
          'order'=>'ASC',
        ));
        if($materiales->have_posts()){
          while($materiales->have_posts()){
            $materiales->the_post();?>
            <li><a href="<?php the_permalink() ?>"><p><?php echo get_the_title(); ?></p></a></li>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </ul>
    </div>
    <div class="col-sm-2 foot-menu">
      <a href="<?php echo site_url('/inspiracion') ?>"><h2>Inspiracion</h2></a>
      <ul>
        <!--AREA DE Inspiración-->
        <?php
        $inspiracion=new WP_Query(array(
          'posts_per_page'=> -1,
          'post_type'=>'Inspiraciones',
          'order_by'=>'title',
          'order'=>'ASC',
        ));
        if($inspiracion->have_posts()){
          while($inspiracion->have_posts()){
            $inspiracion->the_post();?>
            <li><a href="<?php the_permalink() ?>"><p><?php echo get_the_title(); ?></p></a></li>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </ul>
    </div>
    <div class="col-sm-2 foot-menu">
      <a href="<?php echo site_url('/servicios') ?>"><h2>SERVICIOS</h2></a>
      <ul>
        <!-- Area de SERVICIOS -->
        <?php
        $servicios=new WP_Query(array(
          'posts_per_page'=> -1,
          'post_type'=>'Servicios',
          'order_by'=>'title',
          'order'=>'ASC',
        ));
        if($servicios->have_posts()){
          while($servicios->have_posts()){
            $servicios->the_post();
            ?>
            <li><a href="<?php the_permalink() ?>"><p><?php echo get_the_title();?><p></a></li>
              <?php
            }
          }?>
        </ul>
      </div>
      <div class="col-sm-2 foot-menu">
        <a href="<?php echo site_url('/contacto') ?>"><h2>Sucursales</h2></a>
        <ul>
          <?php
          $sucursal=new WP_Query(array(
            'posts_per_page'=> -1,
            'post_type'=>'Sucursales',
            'order_by'=>'title',
            'order'=>'ASC',
          ));
          if($sucursal->have_posts()){
            while($sucursal->have_posts()){
              $sucursal->the_post();
              ?>
              <li><a href="<?php the_permalink() ?>"><p><?php echo get_the_title();?><p></a></li>
                <?php
              }
            }?>
          </ul>
        </div>
        <div class="col-sm-2"></div>
      </div>
      <div class="row">
        <div class="col-sm-2 foot-menu"></div>
        <div class="col-sm-3 foot-menu"><h5>Siguenos en nuestras redes</h5></div>
        <div class="col-sm-1 foot-menu"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri('images/logos/02_instagram.png');?>"></a></div>
                <div class="col-sm-1 foot-menu"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri('images/logos/01_facbook.png');?>"></a></div>
        <div class="col-sm-1 foot-menu"></div>
        <div class="col-sm-2 foot-menu"><a href="<?php echo home_url(); ?>"><img class="logo-dieck" src="<?php echo get_theme_file_uri('images/logos/02_logo basico.png');?>"></a></div>
        <div class="col-sm-2 foot-menu"></div>
      </div>
      <div class="row space"></div>
    </footer>


    <?php wp_footer(); ?>
  </body>
  </html>
