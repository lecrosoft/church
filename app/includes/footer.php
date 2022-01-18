  <footer class="footer">
      <div class="container-fluid clearfix">
          <span class="
                  text-muted
                  d-block
                  text-center text-sm-left
                  d-sm-inline-block
                ">Copyright © www.lecrosoft.com <?php echo date('Y') ?></span>
          <span class="
                  float-none float-sm-right
                  d-block
                  mt-1 mt-sm-0
                  text-center
                ">

              <a href="https://www.lecrosoft.com" target="_blank">Powered By Lecrosoft Technologies
              </a>
              www.lecrosoft.com</span>
      </div>
  </footer>


















  <script>
      // Date Picker
      var date = $('#datepicker').datepicker({
          dateFormat: 'yy-mm-dd'
      }).val();
      jQuery('.mydatepicker, #datepicker').datepicker();
      jQuery('#datepicker-autocloseLekan').datepicker({

          autoclose: true,
          todayHighlight: true
      });
  </script>


  <script src="/app/script.js"></script>
  <!-- comment table -->






  <script src="../plugins/bower_components/tinymce/tinymce.min.js"></script>
  <script>
      $(document).ready(function() {
          if ($("#mymce").length > 0) {
              tinymce.init({
                  selector: "textarea#mymce",
                  theme: "modern",
                  height: 300,
                  plugins: [
                      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                  ],
                  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
              });
          }
      });
  </script>