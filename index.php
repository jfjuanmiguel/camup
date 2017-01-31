<!DOCTYPE html>

<html>

  <head>
    <style type="text/css">
      #form-container{ display:none; }
      #image-holder{width:750px; height:750px; max-width: 750px;max-height: 750px; background-color: #CCC;}
      #button-area{ text-align: center; max-width: 750px; background-color: #3E3E3E; }

      #action-area{ background-color: #DDD; width:750px; height:50px; }

      .btn-left,.btn-right{ 
          background-color: #fff;
          border-radius: 10px;
          margin: 10px;
          width: 25px;
          height: 25px;
          text-align: center;
          padding: 5px;
          line-height: 25px;
        }      

      .btn-right{
          float: right;
      }
      .btn-left{
          float: left;
      }

      #img-submit{ cursor: pointer;}

      /* imagen que se esta cargando */
      .thumb-image{
        width:750px; height:750px; max-width: 750px;max-height: 750px;
      }


      /*   ------------------------  */
         .rotate-90 {
            -moz-transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
          }

          .rotate-180 {
            -moz-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
          }

          .rotate-270 {
            -moz-transform: rotate(270deg);
            -webkit-transform: rotate(270deg);
            -o-transform: rotate(270deg);
            transform: rotate(270deg);
          }

          .flip {
            -moz-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            -o-transform: scaleX(-1);
            transform: scaleX(-1);
          }

          .flip-and-rotate-90 {
            -moz-transform: rotate(90deg) scaleX(-1);
            -webkit-transform: rotate(90deg) scaleX(-1);
            -o-transform: rotate(90deg) scaleX(-1);
            transform: rotate(90deg) scaleX(-1);
          }

          .flip-and-rotate-180 {
            -moz-transform: rotate(180deg) scaleX(-1);
            -webkit-transform: rotate(180deg) scaleX(-1);
            -o-transform: rotate(180deg) scaleX(-1);
            transform: rotate(180deg) scaleX(-1);
          }

          .flip-and-rotate-270 {
            -moz-transform: rotate(270deg) scaleX(-1);
            -webkit-transform: rotate(270deg) scaleX(-1);
            -o-transform: rotate(270deg) scaleX(-1);
            transform: rotate(270deg) scaleX(-1);
          }
    </style>

  	
  </head>

  <body>
     


  <div id="wrapper"> 
     <div id="form-container">
        <form id="img-form" action="camup.php" method="post" enctype="multipart/form-data">
        	<input type="file" accept="image/*;capture=camera" name="archivoImagen" id="fileUpload">
          <input type="submit" value="submit">
        </form>
      </div>
      <div id="image-holder"> </div>

      <div id="action-area">
          <span class="btn-left">A</span>
          <span class="btn-right">B</span>
      </div>

      <div id="button-area">
        <img id="img-submit" src="btn.png">
      </div>
  </div>

  <hr>

  <?php
      include(dirname(__FILE__).'/imgutils.php');

      $img_util = new Imgutils();
      echo "<div>";
      foreach ($img_util->listarImagenes() as $key => $value) {
        if($key%3==0){echo "<br><br>";}
        echo '<img style="max-height:50px; margin:10px;" src="http://gus.chrosoftweb.com/camup/uploads/'. $value.'">'; 
      }
      echo "</div>";
  ?>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="exif.js"></script>
 <script>
      $(function () {  

            $("#fileUpload").on('change', function () {
       
              if (typeof (FileReader) != "undefined") {
       
                  var image_holder = $("#image-holder");
                  image_holder.empty();
       
                  var reader = new FileReader();
                  
                  
                  reader.onload = function (e) {
                      $im = $("<img />", {
                          "src": e.target.result,
                          "class": "thumb-image"
                      }).appendTo(image_holder);
                    fixExifOrientation($($im));
                  }



                  image_holder.show();
                  reader.readAsDataURL($(this)[0].files[0]);
              } else {
                  alert("This browser does not support FileReader.");
              }
          });


          function fixExifOrientation($img) {
              $img.on('load', function(e) {
                  EXIF.getData($img[0], function() {
                      //alert('Exif=', EXIF.getTag(this, "Orientation"));
                      switch(parseInt(EXIF.getTag(this, "Orientation"))) {
                          case 2:
                              $img.addClass('flip'); break;
                          case 3:
                              $img.addClass('rotate-180'); break;
                          case 4:
                              $img.addClass('flip-and-rotate-180'); break;
                          case 5:
                              $img.addClass('flip-and-rotate-270'); break;
                          case 6:
                              $img.addClass('rotate-90'); break;
                          case 7:
                              $img.addClass('flip-and-rotate-90'); break;
                          case 8:
                              $img.addClass('rotate-270'); break;
                      }
                  });

            });

}



      });


      $('#image-holder').on('click tap',function(){  $("#fileUpload").trigger( "click" );   });

      $('#img-submit').on('click tap',function(){  $("#img-form").submit();   });
    </script>

  </body>
</html>

