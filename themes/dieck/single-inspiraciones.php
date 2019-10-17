
<?php
get_header();
if (have_posts()){
  while(have_posts()) {// runs through all the posts
    the_post(); //ges info about next posts ready
    //We exit an enter php to combin use of php with html
    ?>
    <div id="main" class="notmobile">

      <div class="row" style="height: 40vw;">
        <div class="col-sm-2"></div>
        <div id="arrow-back" class="col-sm-1" style="padding: 21% 0;">
          <div  id="arrow-back" class="arrow-left"></div>
        </div>
        <div class="col-sm-6 large-img">
          <h2 style="text-align:left;"><?php the_title(); ?></h2>
          <div class="row space"></div>
          <div class="row space"></div>
          <div>
            <img id="image-main" class="polaroid"  src="" style="object-fit: contain;height:20vw;max-width: 100%;width: auto;">
          </div>
          <!--<img src='Contacto.png' class="polaroid" style="    height: -webkit-fill-available;":-->

        </div>
        <div id="arrow-fwd" class="col-sm-1"  style="padding: 21% 0;">
          <div class="arrow-right"></div>
        </div>
        <div class="col-sm-2"></div>
      </div>
      <?php
      $counter=1;
      $attachments = get_children( array (
        'post_parent' => $post->ID,
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'posts_per_page'=> -1
      ));
      ?>
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-1">
          <!-- <div  id="arrow-back" class="arrow-left"></div> -->
        </div>
        <div class="col-sm-6">
          <h3 id="img_title" style="margin:0;"></h3> <!--///Quiza podamos poner el titulo con javascript-->
        </div>
        <div class="col-sm-1 ">
          <!-- <div  class="arrow-right"></div> -->
        </div>
        <div class="col-sm-2"></div>
      </div>
      <div class="row space"></div>
      <div class="row">
        <div class="col-sm-2"></div>
        <?php
        foreach($attachments as $att_post) {
          $imgTitle[$counter] = get_the_title($att_post->ID);
          if($counter>4){
            $imgUrl[$counter-4]=wp_get_attachment_url($att_post->ID);
          }else{
            ?>
            <div class="col-sm-2">
              <div>
                <img id="thumb<?php echo $counter; ?>" src='<?php echo wp_get_attachment_url($att_post->ID); ?>' class="polaroid galeria-thumb" style="opacity:1">
              </div>
            </div>
            <?php
          }
          $counter=$counter+1;
        }
        wp_reset_postdata();
        ?>
        <div class="col-sm-2"></div>
      </div>
      <div class="row space"></div>
    </div>


    <div class="mobile">
      <?php
      // $attachments = get_children( array (
      //   'post_parent' => $post->ID,
      //   'post_type' => 'attachment',
      //   'post_mime_type' => 'image',
      //   'posts_per_page'=> -1
      // ));
      foreach($attachments as $att_post) {
        // $imgTitle[$counter] = get_the_title($att_post->ID);
        // if($counter>4){
        //   $imgUrl[$counter-4]=wp_get_attachment_url($att_post->ID);
        // }else{
        ?>
        <div class="col-sm-12">
          <h3 id="img_title" style="margin:0;"><?php echo get_the_title($att_post->ID); ?></h3>
          <div>
            <img id="image-main" class="polaroid"  src="<?php echo wp_get_attachment_url($att_post->ID); ?>" style="object-fit: contain;max-width: 100%;width: auto;">
          </div>
        </div>
        <div class="row space"></div>
        <?php
      }
      //   $counter=$counter+1;
      // } ?>
      <div class="row space"></div>

    </div>

    <script>
    var count = 1;
    var imgs = document.getElementsByClassName("polaroid galeria-thumb");
    var imgUrl = <?php echo json_encode($imgUrl); ?>;
    var imgTitle = <?php echo json_encode($imgTitle); ?>;
    var imgCount = [];

    function setImgTitle(elem){
      if (imgUrl != null) {
        if (parseInt(elem,10)-(Object.keys(imgUrl).length -4) < 1) {
          console.log("neg");
          console.log(parseInt(elem,10)-(Object.keys(imgUrl).length -4));
          document.getElementById("img_title").innerHTML = imgTitle[Object.keys(imgTitle).length+(parseInt(elem,10)-(Object.keys(imgUrl).length -4))];
        }else {
          console.log("pos");
          console.log(parseInt(elem,10)-(Object.keys(imgUrl).length -4));
          document.getElementById("img_title").innerHTML = imgTitle[parseInt(elem,10)-(Object.keys(imgTitle).length -4)];
        }

      }else {
        console.log("less than 4"+elem);
        document.getElementById("img_title").innerHTML =   imgTitle[parseInt(Object.keys(imgCount).find(key => imgCount[key] ===  document.getElementById('thumb'+elem).src))+1];
      }
    }
    for (var i = 0; i < imgs.length; i++) {
      if(imgs[i].id.substr(0,5) == 'thumb'){
        if (imgUrl != null) {
          imgUrl[Object.keys(imgUrl).length  + 1] = document.getElementById(imgs[i].id).src;
        }
      }
    }

    if (!imgCount.length) {
      for (var i = 0; i < imgs.length; i++) {
        console.log(i);
        if(imgs[i].id.substr(0,5) == 'thumb'){
          imgCount[i] = document.getElementById(imgs[i].id).src;
        }
      }
    }


    //Placing the clicked image on the big image.
    $(".galeria-thumb").click(function(){
      document.getElementById("image-main").src = $(this).attr('src');

      if (imgUrl == null) {
        setImgTitle(this.id.substr(5,5));
      }else {
        setImgTitle(Object.keys(imgUrl).find(key => imgUrl[key] === document.getElementById(this.id).src));
      }

      for (var i = 0; i < imgs.length; i++) {
        if(imgs[i].id.substr(0,5) == 'thumb'){
          document.getElementById(imgs[i].id).style.opacity = "0.5";
        }
      }
      document.getElementById(this.id).style.opacity = "1";
      count=document.getElementById(this.id).id.substr(5);
    });

    // virtually click on the current
    // image to load it into the big image
    $("#thumb" + count).click();

    // when you click on the backwards
    // button select the previous image
    $("#arrow-back").click(function (){
      // go back one in the count
      count--;
      // if we are below 1 (the first
      // image) loop round to 4 (the
      // last image)
      if(count < 1){
        var imgs = document.getElementsByClassName("polaroid galeria-thumb");
        var lastImgSrc = document.getElementById(imgs[document.getElementsByClassName("polaroid galeria-thumb").length-1].id).src;
        for (var i = imgs.length-1; i >=0; i--) {
          if(imgs[i].id.substr(0,5) == 'thumb') {
            if (imgUrl != null) {
              var lastShownImg = Object.keys(imgUrl).find(key => imgUrl[key] === document.getElementById('thumb1').src);
              if (i > 0) {
                document.getElementById(imgs[i].id).src=document.getElementById(imgs[i-1].id).src;
              }else {
                if (document.getElementById(imgs[0].id).src == imgUrl[1]) {
                  document.getElementById(imgs[0].id).src = imgUrl[Object.keys(imgUrl).length];
                }else{
                  document.getElementById(imgs[0].id).src = imgUrl[parseInt(lastShownImg,10)-1];
                }
              }
            }else {
              if (i > 0){

                document.getElementById(imgs[i].id).src = document.getElementById(imgs[i-1].id).src;
              }else {
                document.getElementById(imgs[i].id).src = lastImgSrc;
              }
            }
          }
        }
        count=1;
        //count = 4;
      }
      // virtually click on the current
      // image to load it into the big image
      $("#thumb"+count).click();
    });

    // when you click on the backwards
    // button select the next image
    $("#arrow-fwd").click(function (){
      // go forward one in the count
      count++;

      if(parseInt(count) > document.getElementsByClassName("polaroid galeria-thumb").length){
        var imgs =document.getElementsByClassName("polaroid galeria-thumb");
        var firstImgSrc = document.getElementById(imgs[0].id).src;
        for (var i = 0; i < imgs.length; i++) {
          if(imgs[i].id.substr(0,5) == 'thumb') {
            if (imgUrl != null) {
              //ERRROR con los acentos, corregir eso
              var lastShownImg = Object.keys(imgUrl).find(key => imgUrl[key] === document.getElementById('thumb4').src);
              if (i < 3) {
                document.getElementById(imgs[i].id).src=document.getElementById(imgs[i+1].id).src;
              }else if (imgUrl != null) {
                if (document.getElementById(imgs[3].id).src == imgUrl[Object.keys(imgUrl).length]) {
                  document.getElementById(imgs[3].id).src = imgUrl[1];
                }else{
                  document.getElementById(imgs[3].id).src = imgUrl[parseInt(lastShownImg,10)+1];
                }
              }
            } else {

              if (i < document.getElementsByClassName("polaroid galeria-thumb").length-1 ) {
                document.getElementById(imgs[i].id).src= document.getElementById(imgs[i+1].id).src;
              }else {
                document.getElementById(imgs[i].id).src = firstImgSrc;
              }
            }
          }
        }
        count = document.getElementsByClassName("polaroid galeria-thumb").length;

        // count = 1;
      }
      // virtually click on the current
      // image to load it into the big image
      $("#thumb"+count).click();
    });
    </script>


    <?php
  }
}
get_footer();
?>
