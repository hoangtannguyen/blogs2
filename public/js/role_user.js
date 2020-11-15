let RoleUser = {} || RoleUser;

RoleUser.index = function(){
    $.ajax({
        method: "GET",
        url: "/role_user/index/",
        success: function(response){
                $("#role_userTable").empty();
             $.each(response.data, function(index,value){
                 console.log(response.data)
                $("#role_userTable").append(`
                    <tr>
                        <td>
                            ${++index}
                        </td>
                        <td>
                            ${value['user_name']}
                        </td>
                        <td>
                            ${value['role_user_name']}
                        </td>
                        <td>
                                <a  href="#" class="btn btn-info btn-sm" onclick="RoleUser.edit(${value["id"]})">
                                            <i class="fas fa-pencil-alt"></i>      
                                            Edit
                                </a>

                                <a  href="javascript:;" class="btn btn-danger btn-sm" onclick="RoleUser.destroy(${value["id"]})" >
                                            <i class='fas fa-trash-alt'></i>
                                            Delete
                                </a>
                        </td>                                       
                    </tr>
                `)
            });
        }
    })
}


RoleUser.create = function(){

    $.ajax({
        url: "/role_user/create/",
        method: "GET",
        dataType: "json",
        success: function(data){
            $("#role_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.role,function(i,v){
                $("#role_id").append(
                    `
                        <option value='${v.id}'>${v.name}</option>
                    `
                );
            });
            $("#user_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.user,function(i,v){
                $("#user_id").append(
                    `
                        <option value='${v.id}'>${v.name}</option>
                    `
                );
            });
        }
    })


    $("#fs-modal").modal('show');
    $('#fs-modal form')[0].reset();
    $('#fs-modal #fs-modal-title').text("Create User");
    $('#fs-modal #btn-save').removeData('id');
    $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
    $('small').remove();
};


RoleUser.edit = function(id) {


    $.ajax({
        url: "/role_user/edit/" +id,
        method: "GET",
        dataType: "json",
        success: function(data){
            $("#role_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.role,function(i,v){ 
                $("#role_id").append(
                    `
                        <option  value='${v.id}' ${v.id==data.role_id ?'selected':""}>${v.name}</option>
                    `
                );
            });
            $("#user_id").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.user,function(i,v){ 
                $("#user_id").append(
                    `
                        <option  value='${v.id}' ${v.id==data.user_id ?'selected':""}>${v.name}</option>
                    `
                );
            });
        }
    })

    $.get(`/role_user/edit/${id}/`).done(function(Obj) {
            $.each(Obj, (i, v) => {
                if( i != 'image'){
                $(`#fs-modal input[id=${i}]`).val(v);
            }
        });    
        $('#fs-modal #fs-modal-title').text("Edit User");
        $('#fs-modal').modal('show');
        $('#fs-modal #btn-save').data('id', Obj.id);
        $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
        $('small').remove();
    });
}


RoleUser.save = function(){
    if (confirm('Save this data')){
        if($('#id').val() == 0){
            var ruObj = {};
            ruObj.user_id = $('#user_id').val();
            ruObj.role_id = $('#role_id').val();
            $.ajax({
                method: "POST",
                url: "/role_user/post/",            
                contentType : "application/json",
                data : JSON.stringify(ruObj),
                success : function(data){
                    $('#fs-modal').modal("hide");
                    RoleUser.index();
                    RoleUser.success('Create success');
                },
                error: function(errors){
                    RoleUser.errors(errors)
                }
            })
        }else{
            var ruObj = {};
            ruObj.user_id = $('#user_id').val();
            ruObj.role_id = $('#role_id').val();
            ruObj.id = $('#id').val()
            $.ajax({
                method: "PUT",
                url: "/role_user/put/" +  ruObj.id,
                contentType : "application/json",
                data : JSON.stringify(ruObj),
                success : function(data){
                    $('#fs-modal').modal("hide");
                    RoleUser.index();
                    RoleUser.success('Edit success');
                },
                error: function(errors){
                    RoleUser.errors(errors)
                }
            });
        }
    };
}



RoleUser.destroy = function(id) {
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
            url: "/role_user/delete/"+ id +"/",
            method: 'POST',
            success: function() {   
                RoleUser.index();
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


// us.uploadAvatar = function(input){
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('#image').attr('src', e.target.result);
//             $('#base').val(e.target.result);
//             $('#showAvatar').attr('src', e.target.result)
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// };


RoleUser.errors = function(errors) {
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;   
        $(`#fs-modal .is-invalid`).removeClass('is-invalid');
        $(`#fs-modal .is-valid`).removeClass('is-valid');
        $(`#fs-modal .field`).addClass('is-valid');
        $('small.text').remove();
        $.each(msg, function(i, v)  {
            $(`#fs-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
        });
    } else {
        $('#fs-modal').modal('hide');
        RoleUser.success("You are not authorized for this action", "Error", 'error');
    }
}


RoleUser.success = function(msg) {
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
    RoleUser.index();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
})