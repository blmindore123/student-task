<div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         
        <h4 class="modal-title">   Student Marks </h4>
      </div>
    
    <div class="modal-body">
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Roll No:</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="roll_number" name="roll_number" value="{{$marks->student->roll_number}}" readonly >
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Student Name:</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="{{$marks->student->name}}"   readonly>
        </div>
    </div>
 
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Class</label>
        </div>
        <div class="form-group col-sm-8">
        <input type="text" class="form-control" id="name" name="name" value="{{$marks->student->class}}" readonly  >   
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-2">
            <label for="name"> Hindi</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="hindi" name="hindi" value="{{$marks->hindi}}" readonly  >
        </div>
        <div class="form-group col-sm-2">
            <label for="name"> English</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="english" name="english" value="{{$marks->english}}" readonly  >
        </div>
     </div>
     <div class="row">    
     <div class="form-group col-sm-2">
            <label for="name"> Maths</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="maths" name="maths"  value="{{$marks->maths}}" readonly   >
        </div>
        <div class="form-group col-sm-2">
            <label for="name"> Science</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="science" name="science"  value="{{$marks->science}}" readonly   >
        </div>
        <div class="form-group col-sm-2">
            <label for="name">Social Science</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="social_science" name="social_science"  value="{{$marks->social_science}}" readonly   >
        </div>
     </div>

      <div class="modal-footer">
         
         <button type="button" style="margin-top: 14px; background-color: #31b0d5; border-color: #31b0d5;" class="btn btn-info" data-dismiss="modal">Close</button>
     </div>

    </div>
    
  </div>
 