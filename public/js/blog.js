let Bl = {} || Bl;


Bl.index = function(page = 1){
    $.ajax({
        url: "/blog/index?page="+page,
        method: "GET",
        success: function(response){
            $("#blog_table").empty();
            $.each(response.data, function(index,value){
              $("#blog_table").append(`         
                    <tr>
                        <td>${++index}</td>
                        <td>${value.title}</td>
                        <td><img src="${value.image}" alt=""  style="width:50px;height:50px;border-radius:15%"></td>
                        <td>${value.view}</td>
                        <td>${value.categories.name}</td>
                        <td>${value.users && value.users.name}</td>
                    <td> 
                        <div style= "color:#fff" >
                            <a  style= "color:#000" class="btn btn-warning btn-sm" onclick="Bl.show(${value['id']})" >
                                <i class="fa fa-eye"></i> Show                        
                            </a>                 
                            <a class="btn btn-primary btn-sm" onclick="Bl.edit(${value['id']})"">
                                    <i class="fas fa-pencil-alt"></i> Edit
                            </a>    
                            <a class="btn btn-danger     btn-sm" onclick="Bl.destroy(${value['id']})"">
                                <i class='fas fa-trash-alt'></i> Delete
                            </a>                    
                        </div>
                    </td>
                    </tr>       
                                                      
              `)
            })
        }
    })
}






Bl.create = function (){

    $.ajax({
        url: "/blog/create",
        method: "GET",
        dataType: "json",
        success: function(data){
            $("#category_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.category,function(i,v){
                $("#category_id").append(
                    `
                        <option value='${v.id}'>${v.name}</option>
                    `
                );
            });
        }
    })

    $("#fs-modal").modal('show');
    $('#fs-modal form')[0].reset();
    $('#fs-modal .note-editable').html("");
    $('#showAvatar').attr('src', "/images/conruoi.jpg");
    $('#fs-modal #fs-modal-title').text("Create blogs");
    $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
    $(`#fs-modal select`).removeClass(['is-valid', 'is-invalid']);
    $(`#fs-modal textarea`).removeClass(['is-valid', 'is-invalid']);
    $('small').remove();
}

Bl.edit = function(id) {
    
    $.ajax({
        url: "/blog/edit/" + id,
        method:"GET",
        dataType: 'json',
        success: function(data){
     
            $('.card-block').html(data.content);
            $('#content').val(data.content);
            $('#title').val(data.title);
            $('#description').val(data.description);
            $('#showAvatar').attr('src', data.image);
            $('#image').attr('src', data.image);
            $('#id').val(data.id);          

            $("#category_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.category,function(i,v){ 
                $("#category_id").append(
                    `
                        <option  value='${v.id}' ${v.id==data.category_id ?'selected':""}>${v.name}</option>
                    `
                );
            });

            $('#fs-modal #fs-modal-title').text("Update blogs");
            $('#fs-modal').modal('show');
            $('#fs-modal #btn-save').data('id', data.id);
            $('#image').val("");
            $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
            $(`#fs-modal select`).removeClass(['is-valid', 'is-invalid']);
            $(`#fs-modal textarea`).removeClass(['is-valid', 'is-invalid']);
            $('small').remove();
        }
    })
}




Bl.save = function (){
    if(confirm("Save this data")){
        if($("#id").val() == 0){
            var BlObj =  new FormData();
            BlObj.append( 'title', $('#title').val());
            BlObj.append( 'description', $('#description').val());
            BlObj.append( 'content', $('#content').val());
            BlObj.append( 'category_id', $('#category_id').val());
            BlObj.append( 'image', $('#image')[0].files[0]);
            $.ajax({
                url: "/blog/post",
                method: "POST",
                processData: false,
                contentType: false,              
                data: BlObj,
                success: function(){
                    $("#fs-modal").modal("hide");
                    Bl.success("Create succes blogs")
                    Bl.index();
                },
                error: function(errors){
                    Bl.errors(errors)
                }
            })
        }else{
            var BlObj =  new FormData();
            BlObj.append( 'title', $('#title').val());
            BlObj.append( 'description', $('#description').val());
            BlObj.append( 'content', $('#content').val());
            BlObj.append( 'category_id', $('#category_id').val());
            BlObj.append( 'image', $('#image')[0].files[0]);
            BlObj.id = $('#id').val();
            $.ajax({
                url: "/blog/put/" + BlObj.id,
                method: "POST",
                processData: false,
                contentType: false,              
                data: BlObj,
                success: function(){
                    $("#fs-modal").modal("hide");
                    Bl.index()
                    Bl.success("Edit succes blogs")
                },
                error: function(errors){
                    Bl.errors(errors)
                }
            })
        }
    }
}




Bl.show = function(id) {
    $('#dx-modal').modal("show");
    $.ajax({
        method: "GET",
        url: "/blog/show/"+ id,
        success: function(response) {
            console.log(response)
            $("#dx-modal").find("#description").html(response.data.description);
            $("#dx-modal").find("#content").html(response.data.content);
            $("#dx-modal").find("#user_name").html(response.user_name);
            $("#dx-modal").find("#user_email").html(response.user_email);
            $("#dx-modal").find("#created_at").html(response.data.created_at);
            $("#dx-modal").find("#user_image").attr("src", `${response.user_image}`);
        },
        error: function() {},
    });
}
    

Bl.showUserPost = function(id) {
    $('#dx-modal').modal("show");
    $.ajax({
        method: "GET",
        url: "/UserPost/show/"+ id,
        success: function(response) {
            console.log(response)
            $("#dx-modal").find("#description").html(response.data.description);
            $("#dx-modal").find("#content").html(response.data.content);
        },
        error: function() {},
    });
}
    



Bl.destroy = function(id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "/blog/delete/"+ id +"/",
            method: 'POST',
            success: function() {   
                Bl.index();
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            },
            error: function(errors) {
                alert('Delete errors');
            }
        });
        } else {
          swal("Your imaginary file is safe!");
        }
    });
}




Bl.errors = function(errors) {
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;
        $(`#fs-modal .is-invalid`).removeClass('is-invalid');
        $(`#fs-modal .is-valid`).removeClass('is-valid');
        $(`#fs-modal .field`).addClass('is-valid');
        $('small.text').empty();
        $.each(msg, function(i, v)  {
            if( i != 'content'){
                $(`#fs-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
            }else{
                $(`#fs-modal .note-editor`).after(`<small id="ssd" class="text text-danger mx-auto">${v}</small>`);
            }
        });
    } else {
        $('#fs-modal').modal('hide');
        Bl.success("You are not authorized for this action", "Error", 'error');
    }
}

Bl.uploadAvatar = function(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
            $('#base').val(e.target.result);
            $('#showAvatar').attr('src', e.target.result)
        };
        reader.readAsDataURL(input.files[0]);
    }
};


Bl.success = function(msg) {
    $.toast({
        heading: 'Success',
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: 'success'
    });
}

$(document).ready(function(){

    Bl.index();


    $('#btn-file-reset-id').on('click', function() {
        $('#image').val('');
        $('#showAvatar').attr('src',"");
      });

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})

