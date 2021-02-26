<div class="container">
        <div class="col-md-8 col-md-offset-2">  
            <form id='editor_form' action="<?php echo base_url().'index.php/NewsController/simpan_post'?>" method="post" enctype="multipart/form-data">
                <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul berita" required/><br/>
                <textarea id="ckeditor" name="berita" class="form-control" required></textarea><br/>
                <!-- <input id="ckeditor" type="file" name="filefoto" required><br> -->
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

        var berita_id = `<?=$berita_id?>`;

        var editor_form = {
          'form': $('#editor_form'),
          'judul': $('#editor_form').find('#judul'),
          'ckeditor': $('#editor_form').find('#ckeditor'),
          'saveBtn': $('#save_btn'),
        }

        $.when(getNews()).then((e) =>{
    swal.close();
  }).fail((e) => { console.log(e) });

  function getNews(){
    return $.ajax({
      url: "<?php echo site_url('NewsController/get')?>",
      data : {'id_berita': berita_id},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataNews = json['data'];
        console.log(dataNews);
        renderNews(dataNews);
      },
      error: function(e) {}
    });
  }

  function renderNews(data){
    editor_form.judul.val(data['berita_judul']);
    editor_form.ckeditor.val('<p>post1</p><p>pos2</p><p>post</p><p>awd</p><p>awdawd</p><p>awdawd</p><p>awd</p><p>awd</p><p></p>');
 
  }

        CKEDITOR.replace('ckeditor');
      });
    </script>