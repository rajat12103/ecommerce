@extends('admin.layouts.master')
@section('title','Edit Banner')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Banner</h1>
                  <small>Edit Banner</small>
               </div>
            </section>
             @if(Session::has('flash_message_error'))
                <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif

                 @if(Session::has('flash_message_success'))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('admin/banners')}}"> 
                              <i class="fa fa-eye"></i> View Banners </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-banner/'.$bannerDetails->id)}}" method="post">
                              {{csrf_field()}}
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" value="{{$bannerDetails->name}}" name="banner_name" id="banner_name" required>
                              </div>
                              <div class="form-group">
                                 <label>Text Style</label>
                                 <input type="text" class="form-control" value="{{$bannerDetails->text_style}}"  name="text_style" id="text_style" required>
                              </div>
                              <div class="form-group">
                                 <label>Content</label>
                                 <textarea name="banner_content" id="banner_content" class="form-control">
                                  {{$bannerDetails->content}}
                                 </textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Link</label>
                                 <input type="text" class="form-control" value="{{$bannerDetails->link}}" name="link" id="link" required>
                              </div>
                              <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="text" class="form-control" value="{{$bannerDetails->sort_order}}"name="sort_order" id="sort_order" required>
                              </div>
                              <div class="form-group">
                                 <label>Banner Image</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="current_image" value="{{$bannerDetails->image}}">
                                 @if(!empty($bannerDetails->image))
                                 <img style="width: 100px; margin-top: 10px;" src="{{asset('/uploads/banners/'.$bannerDetails->image)}}">
                                 @endif
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Edit Banner" name="">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>

@endsection