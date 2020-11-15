
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


<script>

  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
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



<script>

  CKEDITOR.replace('noidung');

  $( document ).ready(function() {
    $("#contact_form").submit(function(e) {


      if(CKEDITOR.instances['noidung'].getData() === '') {
        e.preventDefault();
        $(".error-validation").empty();
        $("#content1").append('<div class="error-validation" style="color:red;"> Please enter message </div>');
      }
      else {
          $(".error-validation").hide();
        
      }

    })
});


  if ($("#contact_form").length > 0) {
      $("#contact_form").validate({
          debug: false,
          errorClass: "error",
          errorElement: "label",
         
          rules: {
            title: {
                  required: true,
                  maxlength: 50
              },

            description: {
                  required: true,
                  minlength: 150,
                  maxlength: 170,
              },

            content: {
              required: function(textarea) {
              CKEDITOR.instances['noidung'].getData();
              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
              return editorcontent.length === 0;
            }
               },

            view: {
                  required: true,
                
              },
            title_two: {
                  required: true,
                
              },
            category_id: {
                  required: true,
                 
              },
          },
          messages: {

            title: {
                  required: "Please enter name",
              },
              title: {
                  required: "Please enter name",
              },
              description: {
                  required: "Please enter message",
                  minlength: "The email name should less than or equal to 150 characters",
                  maxlength: "The email name should less than or equal to 170 characters",
              },
              content: {
                  required: "Please enter valid content",
                  // maxlength: "The email name should less than or equal to 50 characters",
              },
              view: {
                  required: "Please enter valid view",
                  maxlength: "The email name should less than or equal to 50 characters",
              },
              category_id: {
                  required: "Please enter valid view",
                  maxlength: "The email name should less than or equal to 50 characters",
              },

          },
          highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
    }
  
      })
  } 
</script>



 {{-- <script>
  $(document).ready(function() {
  
    $('#contact_form').submit(function(e) {

 
      var title = $('#title').val();
      // var last_name = $('#last_name').val();
      // var email = $('#email').val();
      // var password = $('#password').val();
      
    
  
      $(".error").remove();
  
      if (title === "") {
        $('#title').after('<span class="error">This field is required</span>');
        e.preventDefault();
      }
      // if (last_name.length < 1) {
      //   $('#last_name').after('<span class="error">This field is required</span>');
              
      // }
      // if (email.length < 1) {
      //   $('#email').after('<span class="error">This field is required</span>');
        
      // } else {
      //   var regEx = /^[A-Za-z0-9_\-\.]+\@[A-Za-z0-9_\-\.]+\.[a-z]{2,3}$/;
      //   var validEmail = regEx.test(email);
      //   if (!validEmail) {
      //     $('#email').after('<span class="error">Enter a valid email</span>');
      //   }
      // }
      // if (password.length < 8) {
      //   $('#password').after('<span class="error">Password must be at least 8 characters long</span>');
      //   }
       
     
    });
  
  });
  </script>   --}}