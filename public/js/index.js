let Ix = {} || Ix;


Ix.details = function(){
    $.ajax({
        method: "GET",
        url: "/index/details/"+ id,
        success: function(response) {
            $("#dx-modal").find("#title_two").html(response.data.title_two);
            $("#dx-modal").find("#description").html(response.data.description);
            $("#dx-modal").find("#content").html(response.data.content);
            $("#dx-modal").find("#image").attr("src", `${response.data.image}`);
        },
        error: function() {},
    });
}

$(document).ready(function(){

    Ix.details();

})