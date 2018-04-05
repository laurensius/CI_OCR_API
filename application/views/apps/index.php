
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
            <label>Text Hasil Scan</label>
            <div class="well">
                <i>
                    <?php echo $raw_text; ?>
                </i>
            </div>
        </div>
        <div class="row">
            <form role="form">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img img-responsive" src="<?php echo $gambar; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["PROVINSI"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Kabupaten</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["KABUPATEN"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["NIK"]; ?>">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Nama"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Tempat dan Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Tempat/Tgl Lahir"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Jenis Kelamin"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Golongan Darah</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Gol. Darah"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Alamat"]; ?>">
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>RT/RW</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["RT/RW"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Kel/Desa</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Kel/Desa"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Kecamatan"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Agama</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Agama"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Status Perkawinan</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Status Perkawinan"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Pekerjaan"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Kewarganegaraan</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Kewarganegaraan"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Berlaku Hingga</label>
                            <input type="text" class="form-control" value="<?php echo $ktp["Berlaku Hingga"]; ?>">
                        </div>
                    </div>
                </div>
             </form>
        </div>
        

    </div>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script>
  </body>
</html>
