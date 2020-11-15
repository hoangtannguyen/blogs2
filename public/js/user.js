let us = {} || us;

us.index = function(){
    $.ajax({
        method: "GET",
        url: "/user/index/",
        success: function(response){
                $("#userTable").empty();
             $.each(response, function(index,value){
                $("#userTable").append(`
                    <tr>
                        <td>
                            ${++index}
                        </td>
                        <td>
                            ${value['name']}
                        </td>
                        <td>
                            <img style="width:70px;height:70px;object-fit: cover;border-radius:50%" src="${value["image"]}">
                        </td>
                        <td>
                            ${value['email']}
                        </td>
                        <td>
                                <a  href="#" class="btn btn-info btn-sm" onclick="us.edit(${value["id"]})">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                </a>

                                <a  href="javascript:;" class="btn btn-danger btn-sm" onclick="us.destroy(${value["id"]})" >
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


us.create = function(){

    $.ajax({
        url: "/user/create",
        method: "GET",
        dataType: "json",
        success: function(data){
            $("#roles").empty().append(`<option value=''>Choose ...</option>`);
            $.each(data.role,function(i,v){
                $("#roles").append(
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
    $('#showAvatar').attr('src', "/images/conruoi.jpg");

};


us.edit = function(id) {

    $.get(`/user/edit/${id}/`).done(function(Obj) {
            $.each(Obj, (i, v) => {
                console.log(v)
                if( i != 'image'){
                $(`#fs-modal input[id=${i}]`).val(v);
            }
        });
        $('#fs-modal #fs-modal-title').text("Edit User");
        $('#showAvatar').attr('src', Obj.image);
        $('#fs-modal').modal('show');
        $('#fs-modal #btn-save').data('id', Obj.id);
        $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
        $('small').remove();
    });
}


us.save = function(){
    if (confirm('Save this data')){
        if($('#id').val() == 0){
            var usObj =  new FormData();
            usObj.append( 'name', $('#name').val());
            usObj.append( 'image', $('#image')[0].files[0]);
            usObj.append( 'email', $('#email').val());
            usObj.append( 'password', $('#password').val());
            $.ajax({
                method: "POST",
                url: "/user/post/",
                processData: false,
                contentType: false,
                data: usObj,
                success : function(data){
                    $('#fs-modal').modal("hide");
                    us.index();
                    us.success('Create success');

                },
                error: function(errors){
                    us.errors(errors)
                }
            })
        }else{
            var usObj =  new FormData();
            usObj.append( 'name', $('#name').val());
            usObj.append( 'image', $('#image')[0].files[0]);
            usObj.append( 'email', $('#email').val());
            usObj.append( 'password', $('#password').val());
            usObj.id = $('#id').val()
            $.ajax({
                method: "POST",
                url: "/user/put/" +  usObj.id,
                processData: false,
                contentType: false,
                data: usObj,
                success : function(data){
                    $('#fs-modal').modal("hide");
                    us.index();
                    us.success('Edit success');
                },
                error: function(errors){
                    us.errors(errors)
                }
            });
        }
    };
}



us.destroy = function(id) {
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
            url: "/user/delete/"+ id +"/",
            method: 'POST',
            success: function() {
                us.index();
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


us.uploadAvatar = function(input){
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


us.errors = function(errors) {
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
        us.success("You are not authorized for this action", "Error", 'error');
    }
}


us.success = function(msg) {
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
    us.index();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
})
