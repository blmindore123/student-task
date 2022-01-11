<div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         
        <h4 class="modal-title"> Add Student </h4>
      </div>
    <form method="POST" action="{{url('student/store')}}" enctype="multipart/form-data" id="addStudent">
    @csrf
    <div class="modal-body">
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Roll No:</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="roll_number" name="roll_number" value="" placeholder="Enter Roll No">
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Student Name:</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Student Name">
        </div>
    </div>

   
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="price"> Student Image :</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Class</label>
        </div>
        <div class="form-group col-sm-8">
            <select class="form-control" name="class" id="class" title="Select Class">
                <option value="">Select Class</option>
                @if(isset($classes) && !empty($classes))
                    @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-2">
            <label for="name"> Hindi</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="hindi" name="hindi" value="" placeholder="Enter hindi subject marks">
        </div>
        <div class="form-group col-sm-2">
            <label for="name"> English</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="english" name="english" value="" placeholder="Enter english subject marks">
        </div>
     </div>
     <div class="row">    
     <div class="form-group col-sm-2">
            <label for="name"> Maths</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="maths" name="maths" value="" placeholder="Enter maths subject marks">
        </div>
        <div class="form-group col-sm-2">
            <label for="name"> Science</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="science" name="science" value="" placeholder="Enter science subject marks">
        </div>
        <div class="form-group col-sm-2">
            <label for="name">Social Science</label>
        </div>
        <div class="form-group col-sm-4">
        <input type="text" class="form-control" id="social_science" name="social_science" value="" placeholder="Enter social science subject marks">
        </div>
     </div>
    
 
      <div class="modal-footer">
         <button type="submit" style="margin-top: 14px; background-color: #31b0d5; border-color: #31b0d5;" id="save_btn" class="btn btn-info" >Submit</button>
         <button type="button" style="margin-top: 14px; background-color: #31b0d5; border-color: #31b0d5;" class="btn btn-info" data-dismiss="modal">Close</button>
     </div>

      </form>
    </div>
    
  </div>
  {!! JsValidator::formRequest('App\Http\Requests\StudentRequest','#addStudent') !!}
  <script>
           $("#save_btn").on('click', (function (e) {
           e.preventDefault();
           var frm = $('#addStudent');
           if (frm.valid()) {
               showButtonLoader('save_btn', 'Save', 'disable');
               $.ajax({
                   url: "{{url('student/store')}}",
                   type: "POST",
                   data: new FormData(frm[0]),
                   contentType: false,
                   cache: false,
                   processData: false,
                   success: function (response)
                   {
                       showButtonLoader('save_btn', 'Save', 'enable');
                       if(response.status){
                           toastr.success(response.message);
                           $("#AddStudentForm").modal('hide');
                           location.reload();
                       }else{
                           toastr.error(response.message);
                       }
                   },
                   error: function (response) {
                       showButtonLoader('save_btn', 'Save', 'enable');
                       (response.message)?toastr.error(response.message, 'Student'):'';
                       $(".invalid-feedback").text('');
                       $(".invalid-feedback").css('display','block');
                       var errors = $.parseJSON(response.responseText);
                        $.each(errors.errors, function (key, val) {
                          $("#" + key + "-error").text(val);
                        });
                   },
               });
           }
       }));
       </script>