
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
      let content = $('#content').val();
      let category_id = $('#category_id').val();
      let image = $('#image').val();
      $(".error").remove();
    //   $('#title').css("border","");
    //   $('#image').css("border","");
    //   $('#description').css("border","");
    //   $('#category_id').css("border","");
    //   $('#cke_noidung').css("border","");
    //   $('#cke_1_bottom').css("border","");
    //   $('#cke_1_top').css("border","");
      if (image == "") {
        $('#nameError').after('<span class="error"> Chọn ảnh đi bố đi bố ! </span>');
        // $('.circle').css("display","block");
        e.preventDefault();
      }
      if (title == "") {
        $('#title').after('<span class="error"> Nhập đi bố ! </span>');
        // $('#title').css("border","1px solid red");
        // $('.circle').css("display","block");
        e.preventDefault();
      }
      if (title.length > 40){
        $('#title').after('<span class="error"> Nhập dài thế bố </span>');
        e.preventDefault();
      }
      if (description == ""){
        $('#description').after('<span class="error"> Nhập đi bố ! </span>');
        e.preventDefault();
      }
      if (description.length > 100){
        $('#description').after('<span class="error">Nhập dài thế  bố</span>');
        e.preventDefault();
      }
      if (content == ""){
        $('.note-editor').after('<span class="error"> Nhập đi bố ! </span>');
        e.preventDefault();
      }
      if (category_id == 'default'){
        $('#category_id').after('<span class="error"> Nhập đi bố ! </span>');
        // $('#category_id').css("border","1px solid red");
        // $('small').css("display","block");
        e.preventDefault();
      }
    });
  });
  </script>

  <script>
      $(document).ready(function(){
        $('#btn-file-reset').on('click', function() {
        $('#image').val('');
        $('#output').attr('src',"");
      });
    })
  </script>

{{--
<script type="text/javascript">
    $('#contact_form').on('submit',function(event){

        event.preventDefault();

        title = $('#title').val();
        description = $('#description').val();
        content = $('#content').val();
        category_id = $('#category_id').val();
        image = $('#image').val();

          $.ajax({
            url: "/UserPost/post",
            type:"POST",
            data:{
              "_token": "{{ csrf_token() }}",
              title:title,
              description:description,
              content:content,
              category_id:category_id,
              image:image,
            },
            success:function(response){
              console.log(response); #Its return your success message
            },

            error: function(response) {
                $('#nameError').text(response.responseJSON.errors.title);
                $('#emailError').text(response.responseJSON.errors.description);
                $('#mobileNumberError').text(response.responseJSON.errors.content);
                $('#aboutError').text(response.responseJSON.errors.category_id);
                $('#aboutError').text(response.responseJSON.errors.image);
             }

           });
          });
  </script> --}}



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
