@include('header')
@include('nav')
@push('header_styles')
<link  href="{{ url('admin/dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush 
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
          <h5><strong> Students List </strong></h5>
          <div class="card-header-right">
 
          </div>
        </div>
         <div class="card-block">
            <div class="dt-responsive table-responsive">
              <div class="card-header ">
                  <span style="float:right;">
                    <a type="button" style="margin-top: -21px; border-radius: 25px; color: #fff;
    font-weight: 600;" class="btn btn-fill btn-info"  onclick="AddStudentForm()">  Add Student </a>
                  </span>
              </div>
            <table id="table" class="table table-striped table-bordered nowrap">
                  <thead>
                     <tr>
                        <th scope="col">Roll No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Class</th>
                        <th scope="col">Score</th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

   <!-- Modal -->
   <div class="modal fade" id="AddStudentForm" role="dialog">
 
  </div>

  <!-- Modal -->
  <div class="modal fade" id="ViewStudentScore" role="dialog">
 
 </div>

  <script src="{{ url('public/js/jquery.dataTables.min.js') }}" defer></script>
  <script type="text/javascript">
  var index_url = "{{url('student/getData')}}";

  function AddStudentForm(){
    $.ajax({
          url: "{{url('student/create')}}",
          type: 'get',
          success: function (res) {
            $("#AddStudentForm").html(res);
            $("#AddStudentForm").modal();
          }
      });
  }

  function showScore(id){

    var url = "{{url('student/showScore')}}"+"/"+id ;
    $.ajax({
          url: url ,
          type: 'get',
          success: function (res) {
            $("#ViewStudentScore").html(res);
            $("#ViewStudentScore").modal();
          }
      });
  }

  $(function() { 
  $('#table').DataTable({
      "targets": [0], 
      processing: true,
      serverSide: false,
      scrollX : true,
      responsive: true,
      ajax: index_url,
      ordering: false,
      columns: [
        { data: null,
          render: function(data){
            return '<a>'+data.roll_number+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<img class="img-circle" src="'+ data.image_url+'" style="width:50px;height:50px;object-fit:contain">';
          }
        },
        { data: null,
          render: function(data){
            return '<a>'+data.name+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<a>'+data.class+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<a href="javascript:void(0);" onclick="showScore('+data.id+')" >'+data.score+'</a>';
          }
        },
      ]
    });
 });
  </script>


@include('footer')