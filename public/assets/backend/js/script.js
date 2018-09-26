$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document.body).on('click', '.user-delete',function() {
        var thisDelete = $(this);
        var userid = $(this).data('id');
        swal({
            title: 'Are you sure?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/users-panel/'+userid,
                        type: 'DELETE',
                        success: function (result) {
                            if ((result.result) == true) {
                                thisDelete.parent().parent().hide();
                                swal("User!", "User Has been Delete Successfully!", "success");
                            } else {
                                swal("Error!", "There is some problem to delete this user", "error");
                            }
                        }
                    });
                }
            });
    });
    (function updateAdmin() {
        $.ajax({
            url: '/updateDashboard',

            success: function(data) {

                $('#std-count').html(data['total']['totalstadium']);
                $('#user-count').html(data['total']['totaluser']);
                $('#players-count').html(data['total']['totalplayer']);
                $('#comments-count').html(data['total']['totalComments']);
                $('#team-count').html(data['total']['totalteams']);
                $('#sport-count').html(data['total']['totalsports']);

            },
            complete: function() {
                // Schedule the next request when the current one's complete
                setTimeout(updateAdmin, 200);
            }
        });
    })();


    $(".trash").on('click',function() {
        var thisDelete = $(this);
        var comment_id = $(this).data('id');
        swal({
            title: 'Are you sure?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '/commentsDelete/'+comment_id,
                    type: 'get',
                    success: function (result) {
                        if (result == true) {
                            thisDelete.parent().parent().hide();
                            swal("User!", "Comment Has been Delete Successfully!", "success");
                        } else {
                            swal("Error!", "There is some problem to delete this Comment", "error");
                        }
                    }
                });
            }
        });
    });


});