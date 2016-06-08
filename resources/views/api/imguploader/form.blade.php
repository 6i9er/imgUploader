<form action="{{$action}}" method="post" enctype="multipart/form-data">

  
    
    <div class="form-group">
      <label for="email">Logo:</label>
      <input type="file" class="form-control"  name="images[]" multiple>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>
