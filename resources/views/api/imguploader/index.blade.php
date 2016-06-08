@extends('api.layout.app')
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>


@section('content')
<?php if(trim($msg) != ""){echo '<p class="alert alert-danger text-center">'.$msg.'</p>';} ?>

<table class="table table-striped table-bordered  table-hover">
                <tr>
                  <th >image</th>
                  <th>Action</th>
                </tr>
               @foreach($images as $image)
                <tr>
                  <td>
                    <img src= "{{ Request::root() }}/uploads/{{ $image->path }} " class="img-responsive img-thumbnail" style="width:30%" />
                  </td>
                  <td><a class="btn btn-info" href="{{ Request::root() }}/api/upload/deleteimg/{{$image->image_id}}">Delete</a></td>
                </tr>
               @endforeach

            </table>	


 <?php echo $images->render(); ?>

 
@stop
