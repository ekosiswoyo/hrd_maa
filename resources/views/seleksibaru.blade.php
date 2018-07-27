@extends('layouts.header')

@section('content')

      
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Form Data Jenis Tes</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Forms</a>
                    </li>
                    <li class="active">Data Jenis Tes</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Data Jenis Tes
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form id="commentForm" method="post" action="#">
                                        {{csrf_field()}}
                                   
                                        
                                       
                                           
                                           
                                            
                                                    <div class="panel panel-default">
                                                            
                                                            <div class="panel-body"><div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    
                                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                        <div class="panel-body">
                                                                            <div class="form-group after-add-more">
                                                                               
                                                                                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div id="copy" class="copy hide">
                                                                            <div class="form-group" style="margin-top:10px">
                                                                            
                                                                                <input type="text" style="position: static;" class="form-control" id="nama" name="nama[]" placeholder="Nama Jenis Tes" >
                                                                        
                                                                            
                                                                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                        
                                                                        </div>
                                                                      </div>
                                                                </div>
                                                                 </div>
                                                            
                                                            </div>
                                                         </div>
                                               
                                            
                                           
                                                         <button type="submit" id="hapus" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Simpan</button>
                                 
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        </aside>
        @endsection
        @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $(".add-more").click(function(){ 
                    var html = $(".copy").html();
                    $(".after-add-more").after(html);
                });
                $("body").on("click",".remove",function(){ 
                    $(this).parents(".form-group").remove();
                });
                
              });

              $("#hapus").click(function() {
            $("#copy").remove();
            })
  
              function isNumberKey(evt)
              {
                 var charCode = (evt.which) ? evt.which : event.keyCode
                 if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
        
                 return true;
              }
              //-->
        </script>
        @endsection
        