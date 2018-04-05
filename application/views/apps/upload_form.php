
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="OCR Menggunakan Tesseract">
    <meta name="author" content="Laurensius Dede Suhardiman">
    <title>Laurensius - OCR Tesseract</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Laurensius - OCR Tesseract</a>
        </div>
      </div>
    </div>
    <div class="container" style="margin-top:60px">
        <div class="row">
          <!-- <form id="my_form" role="form" method="post" enctype="multipart/form-data">
            <div class="col-lg-12">
                <input type="hidden" value="upload_image" name="code">
                <br>
                <input class="btn btn-default form-control" type="file" name="foto_ktp" id="foto_ktp" required> 
                <br>
              <button type="submit" id="btn_simpan" value="simpan" class="btn btn-success">Simpan</button>
            </div>
          </form> -->
          <input class="form-control" type="text" id="NIK" name="NIK">
          <br>
          <input class="form-control" type="file" name="foto_ktp" id="foto_ktp" required>
        </div>
        <p>
        <div class="row">
          <div class="col-lg-6">
            <img src="" class="img img-responsive" id="original">
          </div>
          <div class="col-lg-6">
            <canvas id="edited" class="img img-responsive">
            </canvas
          </div>
        <div>
    </div>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/caman.full.min.js'); ?>"></script>
    <script>
      // $("form#my_form").submit(function(e) {
      //   var konfirmasi = confirm("Apakah Anda yakin akan menyimpan foto?");
      //   if(konfirmasi){
      //     e.preventDefault();   
      //     console.log("Melaksanakan proses upload . . . "); 
      //     var formData = new FormData(this);
      //     $.ajax({
      //         url: "<?php echo site_url('/api/do_upload/'); ?>",
      //         type: 'POST',
      //         data: formData,
      //         success: function(response) {
      //             console.log("Proses upload berhasil!");
      //             console.log("Response dari server : ");
      //             console.log(response);
      //             if(response.message_severity === "success"){
      //               $("#original").attr("src","<?php echo base_url('image_dir/"+ response.nama_lampiran +"')?>");
      //               Caman("#edited", "<?php echo base_url('image_dir/"+ response.nama_lampiran +"')?>", 
      //                 function () {
      //                   console.log("Melaksanakan proses editing . . . "); 
      //                   this.brightness(15);
      //                   this.render(function(){
      //                       do_save_edit(response.nama_lampiran,this.toBase64());
      //                   });
      //                 }
      //               );
      //             }
      //         },
      //         error: function(response){
      //           alert("Proses upload gagal!");
      //         },
      //         cache: false,
      //         contentType: false,
      //         processData: false
      //     });
      //   }
      // });


      $("#foto_ktp").change(function() {
        upload();
      });

      function upload(){
        var file_data = $("#foto_ktp").prop("files")[0];  
        var NIK = $("#NIK").val(); 
        var form_data = new FormData();                  
        form_data.append("foto_ktp", file_data) ;            
        form_data.append("NIK", NIK);   
        $.ajax({
          url: "<?php echo site_url('/api/do_upload/'); ?>",
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,                         
          type: 'POST',
          success: function(response) {
            console.log("Proses upload berhasil!");
            console.log("Response dari server : ");
            console.log(response);
            if(response.message_severity === "success"){
              $("#original").attr("src","<?php echo base_url('image_dir/"+ response.nama_lampiran +"')?>");
              Caman("#edited", "<?php echo base_url('image_dir/"+ response.nama_lampiran +"')?>", 
                function () {
                  console.log("Melaksanakan proses editing . . . "); 
                  this.brightness(15);
                  this.render(function(){
                      do_save_edit(response.nama_lampiran,this.toBase64());
                  });
                }
              );
            }
          },
          error: function(response){
            console.log(response);
            alert("Proses upload gagal!");
          }
        });

      }

      function do_ocr(image_name){
        console.log("Proses pemindaian text OCR Tesseract . . . "); 
        $.ajax({
            url: "<?php echo site_url('/api/do_ocr/'); ?>/" + image_name,
            type: 'GET',
            success: function(response) {
              console.log("Penyimpanan pemindaian berhasil!");
              console.log("Response dari server : ");
              console.log(response);
            },
            error: function(response){
              console.log("Penyimpanan pemindaian gagal!");
            },
            cache: false,
            contentType: false,
            processData: false
        });
      }

      function do_save_edit(original_name,base64){
        var dataimage = {
          "original_name" : original_name,
          "image" : base64
        }
        console.log("Menyimpan hasil editing . . . "); 
        $.ajax({
            url: "<?php echo site_url('/api/do_save_edit/'); ?>/",
            type : "POST",
            data : dataimage,
            dataType : "json",
            success: function(response) {
              console.log("Penyimpanan hasil editing berhasil!");
              console.log("Response dari server : ");
              console.log(response);
              console.log("Nama file hasil editing : " + response.image_name);
              if(response.message_severity === "success"){
                do_ocr(response.image_name);
              }
            },
            error: function(response){
              console.log("Penyimpanan hasil editing gagal!"); 
            }
        });
      }
    </script>
  </body>
</html>
