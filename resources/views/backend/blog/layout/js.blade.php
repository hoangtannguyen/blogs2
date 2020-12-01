
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
      $('#categories').on('change', function() {
          $("#category_form").submit();
      });
  });
</script>

<script>
    var openFile = function(file) {
    var input = file.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };

</script>

{{-- <script>
  $(function () {
    $('.text-xara').summernote()
  })
</script> --}}


<script>
    $('.summernote').summernote({
      placeholder: 'Viết lên điều gì đó !',
      tabsize: 2,
      height: 250,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>

 <script>

  // CKEDITOR.replace('noidung');
     //  if(CKEDITOR.instances['noidung'].getData() === '') {
    //   $("#cke_noidung").after('<span class="error">This field is required</span>');
    //   $('#cke_noidung').css("border","1px solid red");
    //   $('#cke_1_bottom').css("border-top","1px solid red");
    //   $('#cke_1_top').css("border-bottom","1px solid red");
    //   e.preventDefault();
    //   }

  $(document).ready(function() {

    $('#contact_form').submit(function(e) {

      let title = $('#title').val();
      let description = $('#description').val();
      let category_id = $('#category_id').val();
      let title_two = $('#title_two').val();
      let xara = $('#text-xara').val();
      let image = $('#image').val();

      $(".error").remove();
      $('#title').css("border","");
      $('#image').css("border","");
      $('#description').css("border","");
      $('#category_id').css("border","");
      $('#cke_noidung').css("border","");
      $('#cke_1_bottom').css("border","");
      $('#cke_1_top').css("border","");


      if (xara == "") {
        $('.s1').after('<span class="error">This field is required</span>');
        $('.circle').css("display","block");
        e.preventDefault();
      }

      if (image == "") {
        $('#image').after('<span class="error">This field is required</span>');
        $('.circle').css("display","block");
        e.preventDefault();
      }


      if (title == "") {
        $('#title').after('<span class="error">This field is required</span>');
        $('#title').css("border","1px solid red");
        $('.circle').css("display","block");
        e.preventDefault();
      }


      if (description == "" || description.length > 60){
        $('#description').after('<span class="error">This field is required</span>');
        $('#description').css("border","1px solid red");
        $('small').css("display","block");
        e.preventDefault();
      }

      if (category_id == 'default'){
        $('#category_id').after('<span class="error">This field is required</span>');
        $('#category_id').css("border","1px solid red");
        $('small').css("display","block");
        e.preventDefault();
      }
    });

  });
  </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
 $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
          form.submit()
        }
        else {
          swal("Your imaginary file is safe!");
        }
      });
  });
</script>
