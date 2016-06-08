@extends('api.layout.app')

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 30%; }
 
  </style>
 


@section('content')
<?php if(trim($msg) != ""){echo '<p class="alert alert-danger text-center">'.$msg.'</p>';} ?>




 
<ul id="sortable">
 

   @foreach($images as $image)
      <li id='ID_{{ $image->image_id }}' ><img src= "{{ Request::root() }}/uploads/{{ $image->path }} " class="img-responsive img-thumbnail" style="width:30%" /></li>
   @endforeach 

</ul>


	

<div id="results">
  <a  id="saveDisplayChanges" class="btn btn-info">Save changes</a>
  <div id="categorysavemessage"> </div>
</div>
<br><br>


<script>
  $(document).ready(function(){

//    $( "#sortable" ).sortable();
      $( "#sortable" ).sortable({ 
         opacity: 0.6, 
         cursor: 'move',  
         update: function(){
                $('#categorysavemessage').html('Changes not saved');
                $('#categorysavemessage').css("color","red");
               // console.log($("#sortable").sortable("serialize"));
                }
         });



$("#saveDisplayChanges").click(function(){
  
  var order = $("#sortable").sortable("serialize");

 //     console.log("aaaaaa" + order);
      //$('#categorysavemessage').html('Saving changes..');
      $.post( "{{ url('api/upload/arrange') }}" ,order,function(theResponse){
        
        console.log(theResponse);
        $("#categorysavemessage").html(theResponse);
        $('#categorysavemessage').css("color","green" );
      
      });

      /*$.ajax(
      {
        type : 'POST',
        data : 'order=' + order,
        url : "{{ url('api/upload/arrange') }}" ,

        success : function( result )
        {
          console.log(result); 
        }
      }); */




});


  });
  </script> 

 <?php //echo $images->render(); ?>

 
@stop
