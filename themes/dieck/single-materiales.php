
<?php
get_header();
while(have_posts()) {// runs through all the posts
  the_post(); //ges info about next posts ready
  //We exit an enter php to combin use of php with html
  ?>
  <div id="main">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-4 align-left">
        <h2> <?php the_title(); ?></h2>
      </div>
    </div>
    <div class="row space"></div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-4 " style="padding:0;">
        <div >
          <div id="img-mat" class="img-mat-large polaroid " style="background: url('<?php   the_post_thumbnail_url() ?>');background-size: cover;"></div>
        </div>
      </div>
      <div class="col-sm-4 align-left" style="padding:2.5vw">
        <?php the_content(); ?>
      </div>
      <div class="col-sm-2"></div>
    </div>
    <div class="row space"></div>
    <?php
    $count = 0 ;
    if( have_rows('textura') ){
      ?>
      <div class="row paddingbtm20">
        <div class="col-sm-2"></div>
        <?php
        while ( have_rows('textura') ) {
          the_row();
          $imagen = get_sub_field('imagen');
          $archivo=get_sub_field('archivo');
          if($count % 2 == 0){
            ?>
            <div class="col-sm-2"></div>
          </div>
          <div class="row space"></div>
          <div class="row paddingbtm20">
            <div class="col-sm-2"></div>
            <?php
          }
          ?>
          <div class="col-sm-4 notmobile" style="margin:10px">
            <div class="row">
              <div class="col-sm-6 mini-thumb-mat1" style="padding: 0 5px;">
                <div class="polaroid mini-thumb-mat1">
                  <div class="mini-thumb-mat1">
                    <img src='<?php echo $imagen['url']; ?>' class="img-textura">
                  </div>
                </div>
              </div>
              <div id="texture-text"class="col-sm-6" style="padding-left: 1vw;padding:0">
                <h3 class="align-left" style="margin-top:0;"><?php  the_sub_field('nombre'); ?></h3>
                <p class="align-left"><?php the_sub_field('descripcion'); ?></p>
                <form method="get" action="<?php  if($archivo){echo $archivo['url'];}else{echo '';} ?>">
                  <button class="btn-enviar">Descargar textura</button>
                </form>
              </div>
            </div>
          </div>
          <?php
          $count=$count+1;
        }
        ?>
      </div>
      <?php
      //Mobile display
      while ( have_rows('textura') ) {
        the_row();
        $imagen = get_sub_field('imagen');
        $archivo=get_sub_field('archivo');
        ?>
        <div class="row">
          <div class="col-sm-12 mini-thumb-mat1" style="padding: 0 5px;height: 80vw;">
            <div class="polaroid mini-thumb-mat1">
              <div class="mini-thumb-mat1"style="height: 80vw;">
                <img src='<?php echo $imagen['url']; ?>' class="img-textura"style="height: 80vw;">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12" style="padding-left: 1vw;padding:0">
            <h3 class="align-left" style="margin-top:1em;"><?php  the_sub_field('nombre'); ?></h3>
            <p class="align-left"><?php the_sub_field('descripcion'); ?></p>
            <form method="get" action="<?php  if($archivo){echo $archivo['url'];}else{echo '';} ?>">
              <button class="btn-enviar" style="margin-bottom: 1em;">Descargar textura</button>
            </form>
          </div>
        </div>
        <?php
      }
    }
    ?>

    <div class="row space"></div>


    <?php
  }

  get_footer();
  ?>
