@extends('api.layout.app')

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src={{ asset('js/dropzone.js') }}></script>
@section('content')
<style>
	
.uploadArea{ min-height:300px; height:auto; border:1px dotted #ccc; padding:10px; cursor:move; margin-bottom:10px; position:relative;}
h1, h5{ padding:0px; margin:0px; }
h1.title{ font-family:'Boogaloo', cursive; padding:10px; }
.uploadArea h1{ color:#ccc; width:100%; z-index:0; text-align:center; vertical-align:middle; position:absolute; top:25px;}
.dfiles{ clear:both; border:1px solid #ccc; background-color:#E4E4E4; padding:3px;  position:relative; height:25px; margin:3px; z-index:1; width:97%; opacity:0.6; cursor:default;}
h5{ width:95%; line-height:25px;}
h5, h5 img {  float:left;  }
.invalid { border:1px solid red !important; }
.buttonUpload { display:inline-block; padding: 4px 10px 4px; text-align: center; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); background-color: #0074cc; -webkit-border-radius: 4px;-moz-border-radius: 4px; border-radius: 4px; border-color: #e6e6e6 #e6e6e6 #bfbfbf; border: 1px solid #cccccc; color:#fff; }
.progress img{ margin-top:7px; margin-left:24px; }

</style>

<script type="text/javascript">
      var config = {
        support : "image/jpg,image/png,image/bmp,image/jpeg,image/gif",   // Valid file formats
        form: "demoFiler",          // Form ID
        dragArea: "dragAndDropFiles",   // Upload Area ID
        uploadUrl: "{{ url('api/upload/saveimageajax') }}"//upload.php       // Server side upload url
      }
      $(document).ready(function(){
        initMultiUploader(config);
      });
      </script>

      

<h1 class="page-header">Add New Image By Jquery</h1>
<div id="dragAndDropFiles" class="uploadArea">
	<h1>Drop Images Here</h1>
</div>

<form name="demoFiler" id="demoFiler" enctype="multipart/form-data">
<input type="file" name="multiUpload" id="multiUpload" multiple />
<input type="submit" name="submitHandler" id="submitHandler" value="Upload" class="buttonUpload" />
</form>
<div class="progressBar">
	<div class="status"></div>
</div>

@stop
