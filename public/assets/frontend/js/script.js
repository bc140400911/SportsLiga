$(document).ready(function () {

    $('.form-validate').validator()

    $(".hide-fav-remove").hide();
    $(".hide-fav-add").hide();



    var value = $('#seasonstanding').val();
    displayVals(value);
    $('#seasonstanding').change(function () {
        var value = $(this).val();
        displayVals(value);
    });

    function displayVals(data) {
        $('#stadata tr').empty();
        var val = data;
        $.ajax({
            type: "get",
            url: "/standings/" + val,
            success: function (result) {
                $('.stadata').empty();
                $.each(result, function (index, value) {
                    $.each(value, function (index, data) {
                        $('.stadata').append('<tr>'
                            + '<td>' + data.name + '</td>'
                            + '<td>' + data.played + '</td>'
                            + '<td>' + data.win + '</td>'
                            + '<td>' + data.draw + '</td>'
                            + '<td>' + data.loss + '</td>'
                            + '<td>' + data.goalsfor + '</td>'
                            + '<td>' + data.goalsdifference + '</td>'
                            + '<td>' + data.goalsagainst + '</td>'
                            + '<td>' + data.total + '</td>'
                            + '</tr>')
                    })

                });
            }
        });
    }


    var score = $('#teamscore').val();
// console.log(score);
    displayScore(score);
    $('#teamscore').change(function () {
        var score = $(this).val();
        displayScore(score);
    });
    function getName(id)
    {
        var teamId = id;
        $.get("/getTeamName/"+teamId, function(data){
            $('.rslt1').html(data['teamName']);
        });
    }
    function getName2(id, index)
    {
        var teamId = id;
        $.get("/getTeamName/"+teamId, function(data){
            $('.rslt2'+index).html(data['teamName']);
        });
    }

    function displayScore(data) {
        $('#scoredata li').empty();
        var val = data;
        $.ajax({
            type: "get",
            url: "/tournament/1/score-filter/" + val,
            success: function (result) {
                $('.scoredata').empty();
                var chk = getName(val);
                console.log((result["array"]["1"]).length);
                for(i=0;i<(result["array"]["1"]).length;i++){
                    var chk1 = getName2(result["array"]["1"][i].team_two,i)
                    $('.scoredata').append('<li><span class="head"><aad class="rslt1"></aad> vs <avd class="rslt2'+[i]+'"></avd><span class="date">'+
                        result["array"]["0"][i].date +'</span></span><div class="goals-result"><a href=""><aad class="rslt1"></aad></a><span class="goals"><b>'+
                        result["array"]["1"][i].team_one_score +
                        '</b> - <b>'+ result["array"]["1"][i].team_two_score +
                        '</b><a href="score-info/'+result["array"]["0"][i].id+'" class="btn theme">View More</a></span><a href=""> <avd class="rslt2'+[i]+'"></avd></div></li>');
                }
            }
        });
    }



    $(document).ready(function () {
        $("#notificationLink").click(function () {
            $("#notificationContainer").fadeToggle(300);
            $("#notification_count").fadeOut("slow");
            return false;
        });

//Document Click
        $(document).click(function () {
            $("#notificationContainer").hide();
        });
//Popup Click
        $("#notificationContainer").click(function () {
            return false
        });
        //create comments on scoreboard
        $("#comments").submit(function () {
            var comment_id = ($(this).data('id'));
            alert(comment_id);
            var text = $("textarea#comment").val();
            var user_id = $("#user_id").val();
            var match_id = $("#match_id").val();
            var _token = $("#_token").val();

            $.ajax({
                type: "post",
                url: "/comments/" + match_id,
                data: {'text': text, 'user_id': user_id, 'match_id': match_id, '_token': _token},
                success: function (data) {
                    $("#comment"+comment_id).hide();
                    $("textarea#comment").val("");
                    $('.testimonials').append(
                        '<li id=comment'+data['id']+'>' +
                        '<blockquote>' +
                        '<p>' +
                        data['text']
                        +
                        '<i class="fa fa-edit editing"  data-id ="'+data['id']+'"  style="float:right; margin-left: 18px;"  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">'+ '</i>'+
                        '<i class="fa fa-trash-o  delettion" style="float: right " data-id=' +data['id']+'>'+'</i>'+
                        '</p>' +
                        '</blockquote>' +
                        '</li>');

                },
            });
        });

//update comments

        $(document).on("click",".editing",function () {


            // console.log($(this)[0].parentNode.innerText);
            // })
            // $(".editing").click(function () {
            $('#message-text').val($(this)[0].parentNode.innerText);
            var comment_id = ($(this).data('id'));
            alert(comment_id);

            // alert( $('#message-text').val($(this).data("text")));
            $("#update").click(function () {

                var text = $("#message-text").val();


                var user_id = $("#user_id").val();

                var match_id = $("#match_id").val();

                var _token = $("#_token").val();
                $.ajax({
                    type: "post",
                    url: "/update_comments/" + match_id,
                    data: {
                        'text': text,
                        'user_id': user_id,
                        'match_id': match_id,
                        'comment_id': comment_id,
                        '_token': _token
                    },
                    success: function (data) {
                        $("#comment"+comment_id).hide();
                        swal("updateComment!", "User Has been Delete Successfully!", "success");
                        $('.mymodal').modal("hide");

                        $('.testimonials').append(

                            '<li id=comment'+comment_id+'>' +
                            '<blockquote>' +
                            '<p>' +
                            data['text'] +
                            '<i class="fa fa-edit editing" style="float:right; margin-left: 18px;"  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">'+'</i>'+
                             '<i class="fa fa-trash-o delettion" style="float: right " data-id='+comment_id+'>'+ '</i>'+
                            '</p>' +
                            '</blockquote>' +
                            '</li>');
                    },
                });


            });
        });

        //update comments
            $(document).on('click',".delettion", function () {
                var thisDelete = $(this);
                var comment_id = $(this).data('id');
                console.log(comment_id);
                swal({
                    title: 'Are you sure?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '/deleteComments/'+comment_id,
                            type: 'get',
                            success: function (result) {
                                if (result == true) {
                                    thisDelete.parent().parent().hide();
                                    swal("Comment!", "Comment Has been Delete Successfully!", "success");
                                } else {
                                    swal("Error!", "There is some problem to delete this Comment", "error");
                                }
                            }
                        });
                    }
                });
            });

 // delete comments

        $(".favorite-btn").click(function () {
            var type = $(this).data('type');
            var user_id = $(this).data('user');
            var id = $(this).data('id');
            var _token = $(this).data('token');
            $.ajax({
                type: "post",
                url: "/favorite",
                data: {'type': type, 'user_id': user_id, 'id': id, '_token': _token},
                success: function (data) {
                    if (data > 0) {
                        $(".favorite-btn").hide();
                        $(".hide-fav-remove").show();
                        $(".hide-fav-remove").data('id', data);

                    }
                },
            });

        });

        $('#notificationLink').click(function () {
            var val = $('#notifications').val();
            console.log(val);
            $.ajax({
                type: "get",
                url: "/notification/create",
                data: {val: val},
                success: function (result) {
                    $('.stadata').empty();
                    $.each(result, function (index, value) {
                        $.each(value, function (index, data) {

                        })

                    });
                }
            });
        })

        $(".favorite-remove-btn").click(function () {
            var id = $(this).data('id');
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "delete",
                url: "/favorite/" + id,
                success: function (data) {
                    console.log(data);
                    if (data) {
                        $(".hide-fav-remove").hide();
                        $(".favorite-remove-btn").hide();
                        $(".hide-fav-add").show();

                    }
                },
            });

        });
        $("#update-user-profile").click(function () {
            var  updateFirstName = $("#first-name").val();
            var  updatedLastName = $("#last-name").val();
            var  userId          = $("#user-id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/updateProfile/'+userId,{'firstName':updateFirstName,'lastName':updatedLastName},function (response) {
                $('#updated-name').html(response['first_name']+" "+ response['last_name']);


            })
        });


    });
});
