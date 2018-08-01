$(document).ready(function() {
    var Board = {
        init: function(params) {
            this.params = params;
            this.bindUI();
            // this.initCradDrag();
            this.initEditableListName();
        },
        initCradDrag: function () {
          $(function() {
            $.ajaxSetup({
              headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
              }
            });
          });
            $(".card-con").each(function(index, el) {
                $(el).sortable({
                    scroll: true,
                    connectWith: ".card-con",
                    placeholder: "dashed-placeholder",
                    revert: 200,
                    receive: function( event, ui ) {
                        var targetList = event.target;
                        var targetCard = ui.item[0];
                        var listId = $(targetList).data('listid');
                        var cardId = $(targetCard).data('cardid');
                        // console.log(targetCard);
                        $.ajax({
                            url: 'changeCardList',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                listId: listId,
                                cardId: cardId
                            },
                            success: function (data) {
                                console.log(data);
                            },
                            error: function (error) {
                                var response = JSON.parse(error.responseText);
                                console.log(response);
                            }
                        });
        
                    },
                }).disableSelection();
            });
        },
        initEditableListName: function () {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $(".board-panel-title").each(function(index, el) {
                $.fn.editable.defaults.mode = 'popup';
                $(el).editable({
                      validate: function(value) {
                          if($.trim(value) == '')
                              return 'Nama list harus diisi.';
                      },
                    type: 'text',
                    url:'update-list-name',
                    placement: 'right',
                    send:'always',
                    ajaxOptions: {
                        dataType: 'json',
                        success: function() {
                            var listId = $(el).attr("data-pk");
                             // that.createActivity(listId, 'board_list', 'edit list name');
                        }
                    }

                });
            });
        },
        bindUI: function () {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            // $(".create-board-form").on("submit", function(e) {
            //     e.preventDefault();
            //     that.saveBoard();
            // });

            // this.params['saveBoardBtn'].on('click', function(event) {
            //     event.preventDefault();
            //     that.saveBoard();
            // });

            $('#saveListName').on('click', function(event) {
                event.preventDefault();
                that.saveList($(this).closest('.panel-body').find('form').serialize(), this);
            });

            $(document).on('click', '.show-input-field', function() {
                var currentList = $(this).hide();
                that.targetList =  $(currentList).parent();
                $(this).closest('.list-footer').find('form').show();
            });

            $(document).on('click', '.close-input-field', function() {
                $(this).closest('.list-footer').find('.show-input-field').show();
                $(this).closest('.list-footer').find('form').hide();
            });

            $(document).on('click', '#saveCard', function(event) {
                event.preventDefault();
                that.saveCard($(this).closest('.list-footer').find('form').serialize(), this);
            });

            $(document).on('click', '#saveBoard', function(event) {
                event.preventDefault();
                that.saveBoard($(this).closest('.sm-data-box').find('form').serialize(), this);
            });

            // $(document).on('click', '.show-input-field', function() {<ul class="card-description-intro list-inline pull-right">{{-- info tambahan di card --}}
            //                 <li id="card_description">
            //                     <a href="#" data-placement="bottom" data-toggle="tooltip" title="This card has a description.">
            //                       <span class="ti-align-right" aria-hidden="true"></span></a>
            //                 </li>
            //               </ul>
            //     var currentList = $(this).hide();
            //     that.targetList =  $(currentList).parent();
            //     $(this).closest('.panel-body').find('form').show();
            // });

            $(document).on('click', '.close-input-field', function() {
                $(this).closest('.panel-body').find('.show-input-field').show();
                $(this).closest('.panel-body').find('form').hide();
            });

            // $(document).on('click', '#saveCard', function(event) {
            //     event.preventDefault();
            //     that.saveCard($(this).closest('.panel-body').find('form').serialize(), this);
            // });

            $(document).on('click', '.board-list-items', function() {
                var cardId = $(this).data('cardid');
                $('.modal#card-detail').find('button#delete-card').data('cardid', cardId);
                that.putCardDetailInModal(cardId);
            });

            // $(document).on('click', '.board-list-items', function() {
            //     var cardId = $(this).data('cardid');
            //     $('.modal#card-detail').find('button#delete-card').data('cardid', cardId);
            //     that.putCardDetailInModal(cardId);
            // });

            $(document).on('click', 'button#delete-card', function() {
                var cardId = $(this).data('cardid');
                var cardIdCon = $(".list-group-item").filter("[data-cardid="+cardId+"]");
                that.deleteCard(cardId, cardIdCon);
            });

            $(document).on('click', 'a.delete-task', function(event) {
                event.preventDefault();
                var taskId = $(this).attr("data-taskId");
                that.deleteTask(taskId, this);
            });
            $(document).on('click', 'a.delete-team', function(event) {
                event.preventDefault();
                var teamId = $(this).attr("data-teamId");
                that.deleteTeam(teamId, this);
            });

            $(document).on('click', '#save-change', function(event) {
                event.preventDefault();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                that.saveChanges(cardId);
            });
            // var cek = document.getElementById("status").val();
            //
            // if (cek  == "start"){
            //     $('#card-detail').find("#saveFinish").hide();
            //     $('#card-detail').find("#saveStart").hide();
            //     $('#card-detail').find("#savePending").hide();
            // }
            //
            // else if (cek == "process"){
            //     $('#card-detail').find("#saveProcess").hide();
            //     $('#card-detail').find("#saveStart").hide();
            //     $('#card-detail').find("#savePending").hide();
            // }
            // var abc = $("card-detail").find("#status").value;
            // var a = "";
            // a += '<li><a href="#" onClick="window.location.reload()">Process</a></li>';
            //
            //
            // if (abc  == "start"){
            //   $("#card-detail").find("ul.dropdown-menu").append(a);
            // }



            $(document).on('click', '#saveStart', function(event) {
                event.preventDefault();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                that.saveStart(cardId);
            });
            $(document).on('click', '#updateTeamAdmin', function(event) {
                event.preventDefault();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                that.updateTeamAdmin(cardId);
            });
            $(document).on('click', '#updateTeamuser', function(event) {
                event.preventDefault();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                that.updateTeamUser(cardId);
            });

            $(document).on('click', '#saveProcess', function(event) {
                event.preventDefault();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                that.saveProcess(cardId);
            });

            $(document).on('click', '#saveFinish', function(event) {
                event.preventDefault();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                that.saveFinish(cardId);
            });

            $(document).on('click', '#savePending', function(event) {
                event.preventDefault();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                that.savePending(cardId);
            });

            $(document).on('click', '#submit-comment', function() {
                var comment = $('#card-detail').find("#comment-input").val();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                if (comment.length > 0) {
                    event.preventDefault();
                    that.postComment(comment, cardId);
                };
            });
            $(document).on('click', '#submit-team', function() {
                var id_user = $('#card-detail').find("#mySelect").val();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                if (id_user.length > 0) {
                    event.preventDefault();
                    that.postTeam(id_user, cardId);
                };
            });

            $(document).on('click', '#submit-task', function() {
                var taskTitle = $('#card-detail').find("#task-description-input").val();
                var cardId = $(document).find('#card-detail').attr("data-cardid");
                if (taskTitle.length > 0) {
                    event.preventDefault();
                    that.saveTask(taskTitle, cardId);
                };
            });

            $(document).on("click", ".sub-task-content", function() {
                var isCompleted;
                var isChecked = $(this).closest("div").find('input.sub-task-title-input').attr("data-checked");
                var taskId = $(this).attr("data-taskid");

                if (isChecked == 0) {
                    isCompleted = 1;
                    $(this).closest("div").find('input.sub-task-title-input').attr("data-checked", 1);
                    that.updateTaskCompleted(taskId, isCompleted);
                } else {
                    isCompleted = 0;
                    $(this).closest("div").find('input.sub-task-title-input').attr('data-checked', 0);
                    that.updateTaskCompleted(taskId, isCompleted);
                }
            });

            that.makeEditable('#select-board');

            $(document).on('click', '#make-fv-board', function(event) {
                event.preventDefault();
                event.stopPropagation();

                var starColor = $(this).css('color');
                var boardId = $(this).closest('.board-link').attr("data-boardid");
                var isFavourite;
                if (starColor == "rgb(255, 255, 255)") {
                    isFavourite = 1;

                    $(this).css('color', "#FFEB3B");
                    var boardCon = $(this).closest('.col-lg-3').clone();
                    var boardTitle = $(boardCon).find("h2").text().trim();
                    if ($(".my-fv-board").find('h1.board-starred-heading').length == 0) {
                        $(".my-fv-board").prepend('<h1 class="board-starred-heading" style="margin-top: 10px;margin-left: 15px;font-weight: 500;font-size: 25px;"><span class="glyphicon glyphicon-star-empty starred-boards" aria-hidden="true"></span> Starred Boards</h1>');
                    };

                    if ($(".my-fv-board").find(".boards-col .col-lg-3").length == 0 ) {
                        $(".my-fv-board").css('display', 'block');
                    }
                    $(boardCon).find(".col-lg-2").remove();
                    $(".my-fv-board").find(".boards-col").prepend(boardCon);
                    $("ul.stared-board-list-con").prepend(
                        '<li style="margin-bottom: 5px;" data-boardid="'+boardId+'">'+
                            '<a href="http://localhost:8000/board/'+boardId+'" style="color: #393333; padding-left: 0px; line-height: 20px; height: 20px; mar">'+boardTitle+'</a>'+
                        '</li>'
                    );
                    // that.createActivity(boardId, 'board', 'fav a board');
                } else {
                    $(this).css('color', "#FFF");
                    isFavourite = 0;
                    $(".my-fv-board").find(".boards-col .col-lg-3").filter("[data-boardid="+boardId+"]").remove();
                    if ($(".my-fv-board").find(".boards-col .col-lg-3").length == 0 ) {
                        $(".my-fv-board").css('display', 'none');
                    };
                    $("ul.stared-board-list-con").find("li").filter("[data-boardid="+boardId+"]").remove();
                    // that.createActivity(boardId, 'board', 'un-fav a board');
                }
                that.updateBoardFavourite(boardId, isFavourite);
            });

            $(".board-link").hover(function() {
                $(this).find("#make-fv-board").slideDown("fast");
            }, function() {
                $(this).find("#make-fv-board").slideUp("fast");
            });

            $(document).on('click', '.board-link', function() {
                var boardId = $(this).attr("data-boardid");
                window.location.replace("board/"+boardId);
            });

            $(document).on('submit', '#selet-board-form', function(event) {
                event.preventDefault();
                var boardId = $("#select-board").val();
                var location = window.location;

                if (location.pathname.substr(1, 5) === "board") {
                    location.replace(boardId);
                } else {
                    location.replace("board/" + boardId);
                }
            });

            $(document).on('click', '.delete-list', function() {
                var listId = $(this).data("listid");
                that.deleteList(listId, this);
            });
        },
        
        updateTaskCompleted: function (taskId, isCompleted) {
            var cardId = $(document).find('#card-detail').attr("data-cardid");
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $.ajax({
                url: 'update-task-completed',
                type: 'POST',
                dataType: 'json',
                data: {
                    taskId: taskId,
                    isCompleted: isCompleted,
                    cardId: cardId
                },
                success: function (data) {
                    var perTaskCompleted = Math.floor(data.totalTasksCompleted/data.totalTasks*100);
                    $(document).find(".per-tasks-completed").addClass('active');
                    $(document).find(".per-tasks-completed").attr("aria-valuenow", perTaskCompleted);
                    $(document).find(".per-tasks-completed").css('width', perTaskCompleted+"%");
                    $(document).find(".per-tasks-completed").find(".show").text(perTaskCompleted+"% Tasks Completed");
                    setTimeout(function () {
                        $(document).find(".per-tasks-completed").removeClass('active');
                    }, 2000);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },
        saveTask: function (taskTitle, cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });

            $.ajax({
                url: 'save-task',
                type: 'POST',
                dataType: 'json',
                data: {
                    taskTitle: taskTitle,
                    cardId: cardId
                },
                success: function (data) {
                    var task = '<div class="form-group sub-task-con">'+
                            '<div class="row">'+
                                '<div class="col-lg-11">'+
                                    '<input class="magic-checkbox sub-task-title-input" type="checkbox" name="layout" id="' + data.card["id"] + '" value="option" ' + ((data.card["is_completed"] == 1) ? ' checked="checked" data-checked="1"' : 'data-checked="0"') + '>'+
                                    '<label for="' + data.card["id"] + '" class="sub-task-content" data-taskid="' + data.card["id"] + '">' + data.card["task_title"] + '</label>'+
                                '</div>'+
                                '<div class="col-lg-1">'+
                                    '<a href="" style="color:#000;" class="delete-task" data-taskId="' + data.card["id"] + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    $("#card-detail").find(".task-list-con").prepend(task);
                    $('#card-detail').find("#task-description-input").val("");

                    var perTaskCompleted = Math.floor(data.totalTasksCompleted/data.totalTasks*100);
                    if(isNaN(perTaskCompleted)) {
                        perTaskCompleted = 0;
                    };
                    $(document).find(".per-tasks-completed").addClass('active');
                    $(document).find(".per-tasks-completed").attr("aria-valuenow", perTaskCompleted);
                    $(document).find(".per-tasks-completed").css('width', perTaskCompleted+"%");
                    $(document).find(".per-tasks-completed").find(".show").text(perTaskCompleted+"% Tasks Completed");
                    setTimeout(function () {
                        $(document).find(".per-tasks-completed").removeClass('active');
                    }, 2000);

                    // if ($(".list-group-item").filter("[data-cardid="+cardId+"]").find('ul.card-description-intro #totalTasks').length == 0) {
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('ul.card-description-intro').append(
                    //         '<li id="totalTasks">'+
                    //             '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-totaltask="1" data-original-title="This card have 1 tasks."><span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>'+
                    //         '</li>'
                    //     );
                    //   }
                    // } else {
                    //     var totalTasks = $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalTasks a').attr("data-totaltask");
                    //     totalTasks++;
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalTasks a').attr("data-original-title", "This card have "+ totalTasks +" tasks.");
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalTasks a').attr("data-totaltask", totalTasks);
                    // }
                    that.reInitializeToolTip();
                    // that.createActivity(cardId, 'card_task', 'task is added');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },
        postComment: function (comment, cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $.ajax({
                url: 'save-comment',
                type: 'POST',
                dataType: 'json',
                data: {
                    comment: comment,
                    cardId: cardId
                },
                success: function (data) {
                    comment = '<li>'+
                            '<div class="row">'+

                                '<div class="col-lg-10">'+
                                '<div class="addSubTaskCon">'+
                                    '<div class="comment-user-name">'+
                                        '<h1 style="color:#000;">'+ data[0].nama +'</h1>'+
                                    '</div>'+
                                    '<div class="commentText">'+
                                        '<p class="">' + data[0].comment_description + '</p> <span class="date sub-text">'+that.time_ago(data[0].created_at)+'</span>'+
                                        // '<div style="text-align: right">'+
                                        // '<a href="" class="show-input-field">' + 'Reply' +'</a>'+
                                        // '</div>'+
                                    '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</li>';
                    $("#card-detail").find("ul.commentList").prepend(comment);
                    $('#card-detail').find("#comment-input").val("");

                    // if ($(".list-group-item").filter("[data-cardid="+cardId+"]").find('ul.card-description-intro  #totalComments').length == 0) {
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('ul.card-description-intro').append(
                    //         '<li id="totalComments">'+
                    //             '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-totalcomments="1" data-original-title="This card have 1 comments."><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a>'+
                    //         '</li>'
                    //     );
                    // } else {
                    //     var totalComments = $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalComments a').attr("data-totalcomments");
                    //     totalComments++;
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalComments a').attr("data-original-title", "This card have "+ totalComments +" comments.");
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalComments a').attr("data-totalComments", totalComments);
                    // }

                    // that.createActivity(data[0].id, 'comment', 'posted a comment');
                    that.reInitializeToolTip();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        postTeam: function (id_user, cardId) {
            var that = this;

            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $.ajax({
                url: 'save-team',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_user: id_user,
                    cardId: cardId
                },
                success: function (data) {
                    console.log(data);
                    team = '<li class="follow-list">'+
                            '<div class="follo-body">'+
                              '<div class="follo-data" style="border-bottom:0;padding:1px;">'+
                                // '<img class="user-img img-circle"  src="public/dist/img/user.png" alt="user"/>'+
                                  '<div class="user-data>'+
                                  '<span style="color:#000;" class="name block capitalize-font">'+data[0].id_user+data[0].nama+'</span>'+

// '                                  <span class="time block truncate txt-grey">'+data[0].status_user+'</span>'+'<div class="comment-user-name">'+
                              '</div>'+
                              // '<button aria-expanded="false" data-toggle="dropdown" class="btn btn-success btn-outline dropdown-toggle pull-left" type="button">Change To..<span class="caret"></span></button>'+
          										// 					'<ul role="menu" class="dropdown-menu">'+
                              //           '<li><a href="#" id="saveStart" onClick="window.location.reload()">Start</a></li>'+
          										// 						'<li><a href="#" id="saveProcess" onClick="window.location.reload()">Process</a></li>'+
          										// 						'<li><a href="#" id="saveFinish"  onClick="window.location.reload()">Finish</a></li>'+
          										// 						'<li class="divider"></li>'+
          										// 						'<li><a href="#" id="savePending" onClick="window.location.reload()">Pending</a></li>'+
          										// 					'</ul>'
                              // '<button  style="margin-left:5px;" id="updateTeamAdmin" onClick="window.location.reload()" class="btn btn-success pull-right btn-xs fixed-btn">Admin</button>'+
                              // '<button  style="margin-left:5px;" id="updateTeamUser" onClick="window.location.reload()" class="btn btn-success pull-right btn-xs fixed-btn">User</button>'+
                              // '<button id="" onClick="window.location.reload()" class="btn btn-success pull-right btn-xs fixed-btn">Delete</button>'+
                              '<div class="clearfix"></div>'+
                                '</div>'+
                            '</div>'+
                        '</li>';
                    $("#card-detail").find("ul.followers-list-wrap").prepend(team);
                    $('#card-detail').find("#mySelect").val("");

                    // if ($(".list-group-item").filter("[data-cardid="+cardId+"]").find('ul.card-description-intro  #totalComments').length == 0) {
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('ul.card-description-intro').append(
                    //         '<li id="totalComments">'+
                    //             '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-totalcomments="1" data-original-title="This card have 1 comments."><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a>'+
                    //         '</li>'
                    //     );
                    // } else {
                    //     var totalComments = $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalComments a').attr("data-totalcomments");
                    //     totalComments++;
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalComments a').attr("data-original-title", "This card have "+ totalComments +" comments.");
                    //     $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalComments a').attr("data-totalComments", totalComments);
                    // }

                    // that.createActivity(data[0].id, 'comment', 'posted a comment');
                    that.reInitializeToolTip();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },


        saveChanges: function (cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardName = $(document).find("#card_title_editable").text();
            var cardDescription = $(document).find("#card_description_editable").text();
            // var cardColor = $(document).find("#card_color").val();
            var cardDueDate = $(document).find("#due-date").val();
            var cardProcessDate = $(document).find("#process-date").val();
            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'update-card-data',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardName: cardName,
                    cardDescription: cardDescription,
                    // cardColor: cardColor,
                    cardDueDate: cardDueDate,
                    cardProcessDate : cardProcessDate,
                    cardId: cardId
                },
                success: function (data) {
                  window.location.reload();
                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }
                    if(cardDescription != "Empty") {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro").prepend('<li id="card_description">'+
                            '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="This card has a description."><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>'+
                        '</li>');
                    } else {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                    }

                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },
        updateTeamAdmin: function (cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });

            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'update-team-card-admin',
                type: 'POST',
                dataType: 'json',
                data: {

                    cardId: cardId
                },
                success: function (data) {

                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }


                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        updateTeamuser: function (cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });

            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'update-team-card-user',
                type: 'POST',
                dataType: 'json',
                data: {

                    cardId: cardId
                },
                success: function (data) {

                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }


                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        saveStart: function (cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardName = $(document).find("#card_title_editable").text();
            var cardDescription = $(document).find("#card_description_editable").text();
            // var cardColor = $(document).find("#card_color").val();
            var cardDueDate = $(document).find("#due-date").val();
            var status = $(document).find("#status").val();
            var cardProcessDate = $(document).find("#process-date").val();
            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'update-data',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardName: cardName,
                    cardDescription: cardDescription,
                    // cardColor: cardColor,
                    status :status,
                    cardDueDate: cardDueDate,
                    cardProcessDate : cardProcessDate,
                    cardId: cardId
                },
                success: function (data) {

                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }
                    if(cardDescription != "Empty") {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro").prepend('<li id="card_description">'+
                            '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="This card has a description."><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>'+
                        '</li>');
                    } else {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                    }

                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        saveProcess: function (cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardName = $(document).find("#card_title_editable").text();
            var cardDescription = $(document).find("#card_description_editable").text();
            // var cardColor = $(document).find("#card_color").val();
            var cardDueDate = $(document).find("#due-date").val();
            var cardProcessDate = $(document).find("#process-date").val();
            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'update-process-card-data',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardName: cardName,
                    cardDescription: cardDescription,
                    // cardColor: cardColor,
                    cardDueDate: cardDueDate,
                    cardProcessDate : cardProcessDate,
                    cardId: cardId
                },
                success: function (data) {

                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }
                    if(cardDescription != "Empty") {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro").prepend('<li id="card_description">'+
                            '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="This card has a description."><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>'+
                        '</li>');
                    } else {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                    }

                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },


        saveFinish: function (cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardName = $(document).find("#card_title_editable").text();
            var cardDescription = $(document).find("#card_description_editable").text();
            // var cardColor = $(document).find("#card_color").val();
            var cardDueDate = $(document).find("#due-date").val();
            var cardProcessDate = $(document).find("#process-date").val();
            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'update-finish-card-data',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardName: cardName,
                    cardDescription: cardDescription,
                    // cardColor: cardColor,
                    cardDueDate: cardDueDate,
                    cardProcessDate : cardProcessDate,
                    cardId: cardId
                },
                success: function (data) {

                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }
                    if(cardDescription != "Empty") {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro").prepend('<li id="card_description">'+
                            '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="This card has a description."><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>'+
                        '</li>');
                    } else {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                    }

                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },


        savePending: function (cardId) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardName = $(document).find("#card_title_editable").text();
            var cardDescription = $(document).find("#card_description_editable").text();
            // var cardColor = $(document).find("#card_color").val();
            var cardDueDate = $(document).find("#due-date").val();
            var cardProcessDate = $(document).find("#process-date").val();
            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'update-pending-card-data',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardName: cardName,
                    cardDescription: cardDescription,
                    // cardColor: cardColor,
                    cardDueDate: cardDueDate,
                    cardProcessDate : cardProcessDate,
                    cardId: cardId
                },
                success: function (data) {

                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }
                    if(cardDescription != "Empty") {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro").prepend('<li id="card_description">'+
                            '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="This card has a description."><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>'+
                        '</li>');
                    } else {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                    }

                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },




        reInitializeToolTip: function () {
            $('[data-toggle="tooltip"]').tooltip();
        },
        deleteTask: function (taskId, deleteTaskBtn) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardId = $(document).find('#card-detail').attr("data-cardid");
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Task!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function(){
                    $.ajax({
                        url: 'delete-task',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            taskId: taskId,
                            cardId: cardId
                        },
                        success: function (data) {
                            $(deleteTaskBtn).closest('.form-group').remove();
                            var cardId = $('.modal#card-detail').attr('data-cardid');
                            var totalTasks = $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalTasks a').attr("data-totaltask");
                            totalTasks--;
                            $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalTasks a').attr("data-original-title", "This card have "+ totalTasks +" tasks.");
                            $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalTasks a').attr("data-totaltask", totalTasks);

                            var perTaskCompleted;

                            if (data.totalTasks != 0) {
                                perTaskCompleted = Math.floor(data.totalTasksCompleted/data.totalTasks*100);
                            } else {
                                perTaskCompleted = 0;
                                $(".list-group-item").filter("[data-cardid="+cardId+"]").find('#totalTasks').remove();
                            }

                            $(document).find(".per-tasks-completed").addClass('active');
                            $(document).find(".per-tasks-completed").attr("aria-valuenow", perTaskCompleted);
                            $(document).find(".per-tasks-completed").css('width', perTaskCompleted+"%");
                            $(document).find(".per-tasks-completed").find(".show").text(perTaskCompleted+"% Tasks Completed");
                            setTimeout(function () {
                                $(document).find(".per-tasks-completed").removeClass('active');
                            }, 2000);
                            // that.createActivity(cardId, 'card_task', 'task is deleted');
                            swal("Deleted!", "Your file was successfully deleted!", "success");
                        },
                        error: function (error) {
                            var response = JSON.parse(error.responseText);
                            swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    });
            });
        },
        putCardDetailInModal: function (cardId) {
            var that = this;
            $("#card-detail").find("#mySelect").empty();
            var boardId = $(document).find('#boardId').attr("data-boardid");
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $.ajax({
                url: 'getCardDetail',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardId: cardId,
                    boardId: boardId
                },
                success: function (data) {
                    console.log(data);
                    $("#check").click(function(){
                        if($("#check").is(':checked') ){
                            $("#mySelect1 > option").prop("selected","selected");
                            $("#mySelect1").trigger("change");
                        }else{
                            $("#mySelect1> option").removeAttr("selected");
                                $("#mySelect1").trigger("change");
                            }
                    });
                    $('#mySelect1').select2({closeOnSelect:false});

                    $.each(data.membercard, function(key, value){
                        $('#mySelect1').append($('<option>', { 
                              value: value.id,
                              text : value.nama 
                          }));        });

                          $('#mySelect1').val([]).trigger('change');
			$(this).removeData('bs.modal');
       		$('#card-detail form')[0].reset();
                    $(document).find("#card-detail").attr("data-cardid", data.card.id);

                    $("#card-detail").find("#card_title_editable").text(data.card.nama_card);
                    that.makeEditable("#card_title_editable");

                  $("#card-detail").find("#status").val(data.card.status);

                  var abc = data.card.status;
                  if (abc === "start") {
                      $("#savePending").show();
                  }
                  else if (abc === "process") {
                      $("#savePending").show();
                      $("#delete-card").hide();
                  }
                  else if(abc === "finish"){
                      $("#savePending").hide();
                      $("#delete-card").hide();
                      $("#saveStart").hide();
                  }
                  else if (abc === "pending") {
                      $("#savePending").hide();
                  }



                    $("#card-detail").find("#id").val(data.card.id);

                    $("#card-detail").find("#card_description_editable").text(data.card.card_description);
                    that.makeEditable("#card_description_editable");

                    var labels = "";
                    $.each(data.label, function(index, val) {
                        labels += val.tag_title + ", ";
                    });
                    labels = labels.substr(0, labels.length-2);
                    $("#card-tags-input").attr("value", labels);
                    that.makeEditable("#card-tags-input", labels);


                    var createdAt = data.card.created_at;
                    createdAt = that.formatDate(createdAt);
                    var createdAtInput = $('#created-at').datetimepicker();
                    createdAtInput.val(createdAt).change();

                    var dueDate = data.card.due_date;
                    dueDate = that.formatDate(dueDate);
                    var dueDateInput = $('#due-date').datetimepicker();
                    dueDateInput.val(dueDate).change();

                    var processDate = data.card.process_date;
                    processDate = that.formatDate(processDate);
                    var processDateInput = $('#process-date').datetimepicker();
                    processDateInput.val(processDate).change();

                    var finishDate = data.card.finish_date;
                    finishDate = that.formatDate(finishDate);
                    var finishDateInput = $('#finish-date').datetimepicker();
                    finishDateInput.val(finishDate).change();


                    var pendingDate = data.card.pending_date;
                    pendingDate = that.formatDate(pendingDate);
                    var pendingDateInput = $('#pending-date').datetimepicker();
                    pendingDateInput.val(pendingDate).change();

                    var taskList = "",
                        countCompletedTasks = 0,
                        countTotalTasks = 0;
                    $.each(data.task, function(index, val) {
                        countTotalTasks++;
                        if(val.is_completed) {
                            countCompletedTasks++;
                        }
                        taskList += '<div class="form-group sub-task-con">'+
                            '<div class="row">'+
                                '<div class="col-lg-11">'+
                                    '<input class="magic-checkbox sub-task-title-input" type="checkbox" name="layout" id="' + val.id + '" value="option" ' + ((val.is_completed == 1) ? 'checked="checked" data-checked="1"' : 'data-checked="0"') + '>'+
                                    '<label for="' + val.id + '" class="sub-task-content" data-taskid="' + val.id + '">' + val.task_title + '</label>'+
                                '</div>'+
                                '<div class="col-lg-1">'+
                                    '<a style="color:#000;" href="" class="delete-task" data-taskId="' + val.id + '"><span style="color:#000;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    });
                    var perTaskCompleted;
                    if (countTotalTasks != 0) {
                        perTaskCompleted = Math.floor(countCompletedTasks/countTotalTasks*100);
                    } else {
                        perTaskCompleted = 0;
                    }

                    $(document).find(".per-tasks-completed").attr("aria-valuenow", perTaskCompleted);
                    $(document).find(".per-tasks-completed").css('width', perTaskCompleted+"%");
                    $(document).find(".per-tasks-completed").find(".show").text(perTaskCompleted+"% Tasks Completed");

                    $("#card-detail").find(".task-list-con").empty();
                    $("#card-detail").find(".task-list-con").append(taskList);

                    var commentList = "";
                    $.each(data.comment, function(index, val) {
                        commentList += '<li>'+
                            '<div class="row">'+

                                '<div class="col-lg-10">'+
                                 '<div class="addSubTaskCon">'+
                                    '<div class="comment-user-name">'+
                                        '<h1 style="color:#000;">'+ val.nama +'</h1>'+
                                    '</div>'+
                                    '<div class="commentText">'+
                                        '<p class="" style="color:#000;">' + val.comment_description + '</p> <span style="color:#000;" class="date sub-text">'+that.time_ago(val.created_at)+'</span>'+
                                        // '<div style="text-align: right">'+
                                        // '<a href="" class="show-input-field">'+'Reply'+'</a>'+
                                        // '</div>'+
                                    '</div>'+
                                   '</div>'+
                                '</div>'+
                            '</div>'+
                        '</li>';
                    });
                    $("#card-detail").find("ul.commentList").empty();
                    $("#card-detail").find("ul.commentList").append(commentList);



                    var team = "";
                    
                    $.each(data.teamcard, function(index, val) {
                    team += '<li class="follow-list">'+
                            '<div class="follo-body">'+
                              '<div class="follo-data" style="border-bottom:0;padding:1px;">'+
                                // '<img class="user-img img-circle"  src="public/dist/img/user.png" alt="user"/>'+
                                  '<div class="user-data>'+
                                  '<span style="color:#000;" class="name block capitalize-font">'+val.nama+'</span>'+
                                  // '<button style="margin-left:5px;" id="updateTeamAdmin" onClick="window.location.reload()" class="btn btn-success pull-right btn-xs fixed-btn">Admin</button>'+
                                    '<a style="color:#000;" href="" class="delete-team pull-right" data-teamId="' + val.id + '"><span style="color:#000;" class="glyphicon glyphicon-trash" ></span></a>'+
// '                                  <span class="time block truncate txt-grey">'+val.status_user+'</span>'+'<div class="comment-user-name">'+
                              '</div>'+

                              // '<button style="margin-left:5px;" id="updateTeamUser" onClick="window.location.reload()" class="btn btn-success pull-right btn-xs fixed-btn">User</button>'+
                              // '<button id="" onClick="window.location.reload()" class="btn btn-success pull-right btn-xs fixed-btn">Delete</button>'+
                              '<div class="clearfix"></div>'+
                                '</div>'+
                            '</div>'+
                        '</li>';
                      });
                        $("#card-detail").find("ul.followers-list-wrap").empty();
                        $("#card-detail").find("ul.followers-list-wrap").append(team);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        deleteTeam: function (teamId, deleteTeambtn) {
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardId = $(document).find('#card-detail').attr("data-cardid");
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this user!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function(){
                    $.ajax({
                        url: 'delete-team',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            teamId: teamId,
                            cardId: cardId
                        },
                        success: function (data) {
                            $(deleteTeambtn).closest('.form-group').remove();
                            var cardId = $('.modal#card-detail').attr('data-cardid');

                            // that.createActivity(cardId, 'card_task', 'task is deleted');
                            swal("Deleted!", "Your file was successfully deleted!", "success");
                            window.location.reload();
                        },
                        error: function (error) {
                            var response = JSON.parse(error.responseText);
                            swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    });
            });
        },


        time_ago: function (time){
            switch (typeof time) {
                case 'number': break;
                case 'string': time = +new Date(time); break;
                case 'object': if (time.constructor === Date) time = time.getTime(); break;
                default: time = +new Date();
            }
            var time_formats = [
                [60, 'detik', 1], // 60
                [120, '1 detik yang lalu', '1 menit dari sekarang'], // 60*2
                [3600, 'menit', 60], // 60*60, 60
                [7200, '1 jam yang lalu', '1 jam dari sekarang'], // 60*60*2
                [86400, 'jam', 3600], // 60*60*24, 60*60
                [172800, 'kemarin', 'besok'], // 60*60*24*2
                [604800, 'hari', 86400], // 60*60*24*7, 60*60*24
                [1209600, 'minggu lalu', 'minggu depan'], // 60*60*24*7*4*2
                [2419200, 'minggu', 604800], // 60*60*24*7*4, 60*60*24*7
                [4838400, 'bulan lalu', 'bulan depan'], // 60*60*24*7*4*2
                [29030400, 'bulan', 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
                [58060800, 'tahun lalu', 'tahun depan'], // 60*60*24*7*4*12*2
                [2903040000, 'tahun', 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
                [5806080000, 'abad lalu', 'abad depan'], // 60*60*24*7*4*12*100*2
                [58060800000, 'abad', 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
            ];
            var seconds = (+new Date() - time) / 1000,
                token = 'yang lalu', list_choice = 1;

            if (seconds == 0) {
                return 'baru saja'
            }
            if (seconds < 0) {
                seconds = Math.abs(seconds);
                token = 'dari sekarang';
                list_choice = 2;
            }
            var i = 0, format;
            while (format = time_formats[i++])
                if (seconds < format[0]) {
                    if (typeof format[2] == 'string')
                        return format[list_choice];
                    else
                        return Math.floor(seconds / format[2]) + ' ' + format[1] + ' ' + token;
                }
            return time;
        },
        formatDate: function (dueDate) {
            var d = new Date(dueDate),
            dformat = [d.getMonth()+1,
                       d.getDate(),
                       d.getFullYear()].join('/')+' '+
                      [d.getHours(),
                       d.getMinutes(),
                       d.getSeconds()].join(':');

            return dformat;
        },
        makeEditable: function (elementId, opt) {
          $(function() {
            $.ajaxSetup({
              headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
              }
            });
          });
            switch (elementId) {
                case "#card_title_editable":
                    var cardTitle = $(elementId).text();
                    $("#card-detail").find(elementId).editable({
                        validate: function(value) {
                            if($.trim(value) == '')
                                return 'Nama Card harus diisi.';
                        },
                        inputclass: "x-editable-input",
                        type: 'text',
                        placement: 'right',
                    });
                    $("#card-detail").find(elementId).editable("setValue", cardTitle);
                    break;
                case "#card_description_editable":
                    var cardDescription = $(elementId).text();
                    $("#card-detail").find(elementId).editable({
                        inputclass: "x-editable-input",
                        type: 'text',
                        placement: 'right',
                    });
                    $("#card-detail").find(elementId).editable("setValue", cardDescription);
                    break;
                case "#card-tags-input":
                    if ($('#card-tags-input').hasClass('selectized') === false) {
                        if ($('#card-detail').hasClass('selectized') === false)
                        {
                            $("#card-detail").find(elementId).selectize({
                                persist: false,
                                createOnBlur: true,
                                create: true
                            });
                        }
                    } else {
                        var opt = opt.split(',');
                        var selectize = $("#card-tags-input")[0].selectize;
                        selectize.clearOptions()
                        $(opt).each(function(index, lalbe){
                            label = $.trim(lalbe);
                            selectize.addOption({value:label,text:label});
                            selectize.addItem(label);
                        });
                    }
                default:
                    break;
            }
        },
        deleteCard: function (cardId, cardIdCon) {
            window.location.reload();
            var that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            var cardName = $(document).find("#card_title_editable").text();
            var cardDescription = $(document).find("#card_description_editable").text();
            // var cardColor = $(document).find("#card_color").val();
            var cardDueDate = $(document).find("#due-date").val();
            var cardProcessDate = $(document).find("#process-date").val();
            var cardId = $(document).find('#card-detail').attr("data-cardid");

            $.ajax({
                url: 'deleteCard',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardName: cardName,
                    cardDescription: cardDescription,
                    // cardColor: cardColor,
                    cardDueDate: cardDueDate,
                    cardProcessDate : cardProcessDate,
                    cardId: cardId
                },
                success: function (data) {
                    window.location.reload();
                    $(".list-group-item").filter("[data-cardid="+data.cardId+"]").find("p").text(data.cardTitle);
                    // if(cardColor.length > 0 ) {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").css('border-top', '5px solid #'+cardColor);
                    // } else {
                    //     $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").removeAttr("style");
                    // }
                    if(cardDescription != "Empty") {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro").prepend('<li id="card_description">'+
                            '<a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="This card has a description."><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>'+
                        '</li>');
                    } else {
                        $(document).find(".list-group-item").filter("[data-cardid="+data.cardId+"]").find(".card-description-intro #card_description").remove();
                    }

                    that.reInitializeToolTip();
                    $('.modal#card-detail').modal("hide");
                    // that.createActivity(data.cardId, 'board_card', 'card is edited');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },
        saveCard: function (data, curentBtnClicked) {
            var that = this;


            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $.ajax({
                url: 'postCard',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    console.log(data);
                    // window.location.reload();
                    $(document).find('.card-conn').append(
                        '<li class="list-group-item board-list-items ui-sortable-handle" id="card_'+data.id+'" data-cardid="'+ data.id +'" data-toggle="modal" href="#card-detail">'+
                            '<div class="row">'+
                                '<div class="col-lg-12">'+
                                    '<p style="margin-bottom: 0px;" class="pull-left">'+data.nama_card+'</p>'+
                                    '<ul class="card-description-intro list-inline pull-right">'+
                                      '<li id="card_description">'+
                                        //   '<a href="#" data-placement="bottom" data-toggle="tooltip" title="This card has a description.">'+
                                        //     // '<span class="date sub-text">'+that.time_ago(data[0].created_at)+'</span></a>'+
                                            '<span style="color:#FF9800" class="" aria-hidden="true">'+that.time_ago(data.updated_at)+'</span>'+
                                      '</li>'+
                                    '</ul>'+
                                '</div>'+
                            '</div>'+
                        '</li>'
                    );
                    $(document).find('form#card').hide();
                    $(document).find('form textarea').val('');
                    $(document).find('a.show-input-field').show();

                    // that.createActivity(data.id, 'card', 'created a card');
                },

                error: function (error) {

                    var response = JSON.parse(error.responseText);
                    $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').find('.alert').remove();
                    $.each(response, function(index, val) {
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').addClass('has-error');
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                    });
                }
            });
        },

        saveBoard: function (data, curentBtnClicked) {
            var that = this;


            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $.ajax({
                url: 'postBoard',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    window.location.reload();
                    $(that.targetList).find('.container-fluid').append(
                      '<div class="row">'+
                      '<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">'+
                          '<span class="weight-500 uppercase-font block">'+data.nama_board+'</span>'+
                        '</div>'+
                        '<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">'+
                          '<i class="icon-user data-right-rep-icon txt-light-grey"></i>'+
                        '</div>'+
                      '</div>'
                    );
                    $(that.targetList).find('form').hide();
                    $(that.targetList).find('form textarea').val('');
                    $(that.targetList).find('div.col-xs-12').show();

                    // that.createActivity(data.id, 'card', 'created a card');
                },

                error: function (error) {

                    var response = JSON.parse(error.responseText);
                    $(curentBtnClicked).closest('form').find('#dynamic-board-input').find('.alert').remove();
                    $.each(response, function(index, val) {
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input').addClass('has-error');
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input').prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                    });
                }
            });
        },

        // saveBoard: function () {
        //     that = this;
        //     $(function() {
        //       $.ajaxSetup({
        //         headers: {
        //           'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        //         }
        //       });
        //     });
        //     $.ajax({
        //         url: 'postBoard',
        //         type: 'POST',
        //         dataType: 'json',
        //         data: {
        //             boardTitle: that.params['boardTitle'].val(),
        //             boardPrivacyType: that.params['boardPrivacyType'].val()
        //         },
        //         success: function (data) {
        //             $(that.params['createBoardLink']).closest(".col-lg-3").before(
        //                 '<div class="col-lg-3">'+
        //                     '<div class="board-link" style="cursor: pointer;" data-boardid="'+data.id+'">'+
        //                         '<div class="row">'+
        //                             '<div class="col-lg-10">'+
        //                                 '<h2 style="margin-top: 5px;">'+
        //                                     '<a href="http://localhost:8000/board?id='+data.id+'" class="board-main-link-con" style="font-size: 20px; color: #FFF;">'+
        //                                         data.boardTitle +
        //                                     '</a>'+
        //                                 '</h2>'+
        //                             '</div>'+
        //                             '<div class="col-lg-2">'+
        //                                 '<p style="margin-top: 12px;">'+
        //                                     '<a href="#" style="font-size: 20px; color: #FFF;" id="make-fv-board"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>'+
        //                                 '</p>'+
        //                             '</div>'+
        //                         '</div>'+
        //                     '</div>'+
        //                 '</div>'
        //             );
        //             that.params['createNewBoardModal'].modal('hide')
        //             that.params['boardTitle'].val('');
        //             that.params['boardTitleCon'].removeClass('has-error');
        //             that.params['boardTitleCon'].find('.help-block').remove();
        //             // that.createActivity(data.id, 'board', 'created a board');
        //         },
        //         error: function (error) {
        //             var response = JSON.parse(error.responseText);
        //             that.params['boardTitleCon'].find('.help-block').remove();
        //             $.each(response, function(index, val) {
        //                 that.params['boardTitleCon'].addClass('has-error');
        //                 that.params['boardTitleCon'].append('<span class="help-block"><strong>'+ val +'</strong></span>');
        //             });
        //         }
        //     });
        // },
        // createActivity: function(activity_in_id, changed_in, activity_description) {
        //     $.ajax({
        //         url: 'create-user-activity',
        //         type: 'POST',
        //         dataType: 'json',
        //         data: {
        //             activity_in_id: activity_in_id,
        //             changed_in: changed_in,
        //             activity_description: activity_description
        //         },
        //         success: function (data) {
        //             console.log("data")
        //         },
        //         error: function(error) {
        //             console.log(error);
        //         }
        //     });
        // },
        saveList: function (data, curentBtnClicked) {
            that = this;
            $(function() {
              $.ajaxSetup({
                headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
              });
            });
            $.ajax({

                url: 'postListName',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    $(curentBtnClicked).closest(".list").before(
                        '<div class="list" data-list-id="' + data.id + '">'+
                                '<div class="panel-heading" style="border-bottom: 0px; ">'+
                                    '<div class="row">'+
                                        '<div class="col-lg-10">'+
                                            '<h3 class="panel-title board-panel-title editable editable-click" data-pk="' + data.id + '">' + data.nama_list + '</h3>'+
                                        '</div>'+
                                        '<div class="col-lg-2">'+
                                            '<span data-listid="' + data.id + '" class="glyphicon glyphicon-trash delete-list" aria-hidden="true" style="cursor: pointer;"></span>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="list-footer card-list frame" style="padding: 10px 10px;">'+
                                '<ul class="list-group">'+
                                        '<div class="card-conn ui-sortable" data-listid="' + data.id + '">'+
                                        '</div>'+
                                    '</ul>'+
                                    '<a href="#" class="show-input-field">Add a card...</a>'+
                                    '<form action="" method="POST" role="form" style="display: none;">'+
                                        '<div class="form-group" id="dynamic-board-input-con" style="margin-bottom: 8px;">'+
                                            '<textarea name="nama_card" class="form-control" rows="3"></textarea>'+
                                            '<input type="hidden" name="id_list" value="' + data.id + '">'+
                                            '<input type="hidden" name="id_board" value="' + data.id_board + '">'+
                                        '</div>'+
                                        '<div class="form-group" style="margin-bottom: 0px;">'+
                                            '<button type="submit" class="btn btn-success btn-outline btn-xs" id="saveCard">Save</button> <span class="glyphicon glyphicon-remove close-input-field" aria-hidden="true"></span>'+
                                        '</div>'+
                                    '</form>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                    // that.initCradDrag();
                    that.initEditableListName();
                    that.params['createNewBoardModal'].modal('hide');
                    $('.show-input-field').show();
                    $('.add-board-list-form').hide();
                    $('.add-board-list-form').find('input[type="text"]').val('');
                    that.params['boardTitle'].val('');
                    that.params['boardTitleCon'].removeClass('has-error');
                    that.params['boardTitleCon'].find('.alert').remove();
                    // that.createActivity(data.id, 'board_list', 'created a list');
                },
                error: function (error) {
                    var response = JSON.parse(error.responseText);
                    $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').find('.alert').remove()
                    $.each(response, function(index, val) {
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').addClass('has-error');
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                    });
                }
            });
        }
    };
    Board.init({
        boardTitle          :   $('#boardTitle'),
        boardPrivacyType    :   $('#boardPrivacyType'),
        // saveBoardBtn        :   $('#save-board'),
        createNewBoardModal :   $('#create-new-board'),
        boardTitleCon       :   $('#boardTitleCon'),
        saveListNameBtn     :   $('#saveListName'),
        createBoardLink     :   $('.board-create-link')
    });
});
