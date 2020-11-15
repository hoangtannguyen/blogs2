let Ca = {} || Ca;

Ca.table;
// Ca.tableTrash;

Ca.drawTable = function() {
    Ca.table = $('#fs-table').DataTable({
        ajax: {
            url: '/category/index',
            dataSrc: function(jsons) {
                let i = 0;
                return jsons.map(json => {
                    return {
                        Ca: ++i,
                        Ca1: json.name,
                        action: `
                            <a class="btn btn-danger text-light btn-sm" onclick="Ca.edit(${json.id})"><i class="fas fa-pencil-alt"></i>Edit</a>
                            <a class="btn btn-warning text-dark btn-sm" onclick="Ca.destroy(${json.id})"><i class='fas fa-trash-alt'></i> Delete</a>
                        `
                    }
                });
            }
        },
        columns: [
            {
                data: "Ca"
            },
            {
                data: "Ca1"
            },

            {
                data: "action"
            }
        ]

    });
};


// Cv.drawTableTrash = function() {
//     Cv.tableTrash = $('#fs-table-trash').DataTable({
//         processing: true,
//         ajax: {
//             url: '/chuc-vu/trash',
//             dataSrc: function(jsons) {
//                 return jsons.map(json => {
//                     let i = 0;
//                     return jsons.map(json => {
//                         return {
//                             Ca: ++i,
//                             Ca1: json.name,
//                             action: `
    
//                                 <a class="btn btn-danger text-light btn-sm" onclick="Ca.edit(${json.id})"><i class="fas fa-pencil-alt"></i>Edit</a>
//                                 <a class="btn btn-warning text-dark btn-sm" onclick="Ca.destroy(${json.id})"><i class='fas fa-trash-alt'></i> Delete</a>
//                             `
//                         }
//                     });
//                 });
//             }
//         },
//         columns: [
//             {
//                 data: "Ca"
//             },
//             {
//                 data: "Ca1"
//             },

//             {
//                 data: "action"
//             }
//         ]

//     });
// };

// Cv.trash = function(id) {
//     if (confirm('Move this to Trash')) {
//         $.ajax({
//             url: `/chuc-vu/${id}`,
//             method: "delete",
//             success: function(msg) {
//                 Cv.success(msg);
//                 Cv.table.ajax.reload();
//                 Cv.tableTrash.ajax.reload();
//             }
//         });
//     }
// }


Ca.create = function() {
    $('#fs-modal').modal("show");
    $('#fs-modal form')[0].reset();
    $('#fs-modal #fs-modal-title').text("Create Category");
    $('#fs-modal #btn-save').removeData('id');
    $(`#fs-modal input`).removeClass(['is-valid']);
    $('small.badge').remove();
}




Ca.edit = function(id) {
    $.get(`/category/edit/${id}/`).done(function(Obj) {
        $.each(Obj, (i, v) => {
            $(`#fs-modal input[name=${i}]`).val(v);
        });
        $('#fs-modal #fs-modal-title').text("Edit Category");
        $('#fs-modal #btn-save').data('id', Obj.id);
        $('#fs-modal').modal('show');
        $(`#fs-modal input`).removeClass(['is-valid']);
        $('small.badge').remove();
    });
}




Ca.save = function(btn) {
    let id = $(btn).data('id');
    let data = $(btn.form).serializeJSON();
    console.log(id);
    console.log(data);
    if (id) {
        if (confirm('Save change')) {
            $.ajax({
                url: `/category/put/${id}/`,
                method: 'PUT',
                data: data,
                success: function(Obj) {
                    Ca.table.ajax.reload( );
                    $('#fs-modal').modal("hide");
                    Ca.success("Update success!");
                },
                error: function(errors) {
                    Ca.errors(errors);
                }
            });
        }
    }   
    else {
        if (confirm('Save this data')) {
            $.ajax({
                url: `/category/post/`,
                method: 'post',
                data: data,
                success: function() {
                    Ca.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Ca.success("Create success");
                },
                error: function(errors) {
                    Ca.errors(errors);
                }
            });
        }
    }
}





Ca.destroy = function(id) {
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
                url: `/category/delete/${id}/`,
                method: 'delete',
                success: function(msg) {
                    Ca.table.ajax.reload(null, false);
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







Ca.errors = function(errors) {
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;
        $(`#fs-modal .is-valid`).removeClass('is-valid');
        $(`#fs-modal .field`).addClass('is-valid');
        $('small.text').remove();
        $.each(msg, function(i, v) {
            $(`#fs-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
        });
    } else {
        $('#fs-modal').modal('hide');
        Ca.success("You are not authorized for this action", "Error", 'error');
    }
}

Ca.success = function(msg) {
    $.toast({
        heading: 'Success',
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: 'success'
    });
}

Ca.init = function() {
    Ca.drawTable();
    // Ca.drawTableTrash();
}


$(document).ready(function() {
    Ca.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});