{{--  {{dd($users)}}  --}}
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>papan</title>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto|PT+Mono'>
  <link href="{{ asset('trello/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('trello/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('trello/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('trello/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('trello/css/app.css') }}">
  <link href="{{ asset('trello/css/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('trello/css/bootstrap-editable.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/sweetalert.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/magic-check.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/font-awesome.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/selectize.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/sidebar.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/animation.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/select2.css') }}" rel="stylesheet"/>
  <link href="{{ asset('trello/css/select2.min.css') }}" rel="stylesheet"/>
  <link href="{{asset('trello/css/fancy-buttons.css')}}" rel="stylesheet" type="text/css">
  <style type="text/css">
  .navbar {
    position: unset;
    min-height: unset;
    margin-bottom: 0px;
    border: unset;
    border-radius: 0px;

    padding: 0px 10px 0px 10px;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }
  .scrolltask{
  width: 515px;
  overflow: auto;
  height: 150px;
  }
  .scrollcomment{
  width: 485px;
  overflow: auto;
  height: 150px;
  }
  a.disabled {
   pointer-events: none;
   cursor: default;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="{{ asset('trello/js/config.js')}}"></script>
  <meta name="_token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="spinner">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>
  {{--  @include('new.modal')  --}}
  <div class="ui">
    	<nav class="navbar app">
        <div style="text-align: center;font-size:18px;margin-top:8px;" class="uppercase-font" id="boardId" data-boardid=""><a href="/board"></a>
           <a href="/task-dashboard"><button  class="pull-left btn-xs btn btn-success btn-outline fancy-button btn-0" style="margin: auto; margin-right: 5px; margin-top: 3px;">Back</button></a>
            {{-- @if ($board->owner_user == Auth::user()->id) --}}
          <span><a href="/board/setting"><button class="pull-right btn-xs btn btn-primary btn-outline fancy-button btn-0" style="margin: auto; margin-right: 5px; margin-top: 3px;">Setting</button></a></span>
              {{-- <span><a href=""><button class="pull-right btn-xs btn btn-primary btn-outline fancy-button btn-0" style="margin: auto; margin-right: 5px; margin-top: 5px;">Setting</button></a></span> --}}
              {{-- @endif --}}
        </div>
      </nav>
      <nav class="navbar board">
      <form action="" method="get" role="search" class="top-nav-search pull-left chat-search">

       <div class="input-group">

         <input style="margin-top:5px;" id="search" name="cari" value="{{ Request::get('cari') }}" class="form-control" placeholder="Search" type="text">
         <span class="input-group-btn">
         <!-- <button type="submit" class="btn  btn-default"><i class="zmdi zmdi-search" style="position:absolute;left:80%;bottom:100%;"></i></button> -->
         </span>
       </div>

      </form>
    </nav>
{{--  
        @if (Session::has('message'))
          <div class="alert alert-success" style="position:fixed;left:40%;" id="success-alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i> {{ Session::get('message')}}
          </div>
        @endif  --}}

    	<div class="lists" style="background:#fff;">
                 @foreach ($users as $user) 

            <div class="list">
              <div class="panel-heading" style="border-bottom: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px">
                  <div class="row">
                        <div class="col-lg-10">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <h3 class="panel-title" style="border-bottom: dashed 1px #3e9e80;" data-pk="1">{{$user->nama}}</h3>
                        </div>
                  </div>
              </div>
              <ul>
                <div class="card-conn" data-listid="1">
                  {{--  @foreach ($start->cards as $card)
                      @foreach ($card->users as $value )
                        @if ($value->id == Auth::user()->id)  --}}
                          <li class="list-group-item board-list-items" id="" data-cardid ="" data-toggle="modal" href="#card-detail">

                              <div class="row">
                                  <div class="col-lg-12">
                                    <p style="margin-bottom: 0px;" class="pull-left"></p>
                                      <ul class="card-description-intro list-inline pull-right">
                                        <li id="card_description">
                                              <span style="color:#FF9800" class="" aria-hidden="true"></span>
                                        </li>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                        {{--  @endif
                      @endforeach
                  @endforeach  --}}
                </div>
              </ul>
              <div class="list-footer" style="padding: 10px 10px;">
                {{--  <a href="#" class="show-input-field">Add a card...</a>
                <form id="card" action="" method="POST" role="form" style="display: none;">{{ csrf_field() }}
                    <div class="form-group" id="dynamic-board-input-con" style="margin-bottom: 8px;">
                        <textarea  style="color:#000;" name="nama_card" class="form-control" rows="3"></textarea>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_board" value="">
                    </div>
                    <div class="form-group" style="margin-bottom: 0px;">
                        <button type="submit" class="btn btn-success btn-outline btn-xs" id="saveCard">Save</button>
                        <span class="glyphicon glyphicon-remove close-input-field" aria-hidden="true"></span>
                    </div>
                </form>  --}}
              </div>
              @endforeach
            </div>
      </div>
      </div>
  </div>
  {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js'></script> --}}
  {{-- <script src="../js/jquery.js"></script> --}}
  <script src="../trello/js/jquery.js"></script>
    <script src="../trello/js/jquery-ui.js"></script>
    <script src="../trello/js/bootstrap.min.js"></script>
    <script src="../trello/js/app.js"></script>
    <script src="../trello/js/bootstrap-editable.min.js"></script>
    <script src="../trello/js/sweetalert.min.js"></script>
    <script src="../trello/js/moment.min.js"></script>
    <script src="../trello/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../trello/js/ajax-loading.js"></script>
    <script src="../trello/js/selectize.js"></script>
    {{--  <script src="../trello/js/board.js"></script>  --}}
    <script src="../trello/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../trello/js/sidebar.js"></script>
    <script src="../trello/js/typed.min.js"></script>
<script src="../vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="../trello/js/select2.full.js"></script>
<script src="../trello/js/select2.full.min.js"></script>
<script src="../trello/js/select2.js"></script>
<script src="../trello/js/select2.min.js"></script>
<script>
$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});
</script>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        autoclose: true,
    });
</script>
<script src="../trello/js/dropdown-bootstrap-extended.js"></script>


<script>

$(".js-example-theme-multiple").select2({
  theme: "classic"
});

$('#mySelect').select2({
    allowClear:true
});

$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});

</script>
  {{-- <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script> --}}

  <!-- Bootstrap Core JavaScript -->
  {{-- <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> --}}
  <!-- Add JavaScript -->
</body>
</html>
