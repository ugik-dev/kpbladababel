<div class="container">
        <div class="col-md-8 col-md-offset-2">  
            <form action="<?php echo base_url().'index.php/NewsController/simpan_post'?>" method="post" enctype="multipart/form-data">
                <input type="text" name="judul" class="form-control" placeholder="Judul berita" required/><br/>
                <textarea id="ckeditor" name="berita" class="form-control" required></textarea><br/>
                <input type="file" name="filefoto" required><br>
                <button class="btn btn-primary btn-lg" type="submit">Post Berita</button>
            </form>
        </div>
         
    </div>
     
    <script src="<?php echo base_url().'assets/jquery/jquery-2.2.3.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <!-- <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script> -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
      $(function () {
        $('#news_post').addClass('active');
        CKEDITOR.replace('ckeditor');
      });
    </script>