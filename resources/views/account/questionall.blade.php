<x-backend>

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong> Show All Question Notification </strong> </h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('panel') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Notification </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <div class="wizard-content">
                    <div class="row">
                    @foreach($noti_data as $noti)
                      <div class="col-md-12"> 
                      @php $data = json_encode((object)$noti->data); $value = json_decode($data,true);
                      $user = $value['user_id'];
                      $users = \App\Models\User::find($user);

                      @endphp
                      <div class="row">
                        <div class="col-md-1">
                          <img src="{{$users->profile_photo_path}}" class="rounded-circle" width="90px">
                        </div>
                        <div class="col-md-8 pt-3">
                          <span style="padding-right: 850px;">{{$users->name}}</span>
                          <span>{{date('F d, Y', strtotime($noti->created_at))}}</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="offset-md-1 col-md-8">
                          <p>{{$value['description']}}</p>
                        </div>
                      </div>

                      @php 
                        $answers = \App\Models\Answer::all();
                      @endphp
                      @foreach($answers as $ans)
                        @if($ans->question_id == $value['id'])
                        <div class="row">
                          <div class="offset-md-1 col-md-1">
                            <img src="{{$ans->user->profile_photo_path}}" class="rounded-circle" width="90px">
                          </div>
                          <div class="col-md-8 pt-3">
                            <span style="padding-right: 850px;">{{$ans->user->name}}</span>
                            <span>{{date('F d, Y', strtotime($ans->created_at))}}</span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="offset-md-2 col-md-8">
                            <p>{{$ans->description}}</p>
                          </div>
                        </div>
                        @endif
                      @endforeach
                      <div class="row">
                        <div class="pb-5">
                          <button class="btn btn-primary float-right reply" data-id="{{$value['id']}}">Reply</button>
                        </div>
                      </div>
                      <div class="row pb-5 comment{{$value['id']}} commentall">
                        
                        <div class="offset-md-2 col-md-8 pb-5">
                          <div class="card" style="border: 1px solid rgba(0,0,0,.125);">
                          <h5 class="card-header" style="background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);">Leave a Comment</h5>
                          <div class="card-body">
                            <form action="{{route('answerquestion')}}" method="post">
                              @csrf
                              <input type="hidden" name="question" value="{{$value['id']}}">
                              <textarea rows="3" class="form-control mb-3" name="description"></textarea>
                              <button class="btn btn-primary" type="submit">Send</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                    <hr>
                    @endforeach
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@section('script_content')
    
    <script type="text/javascript">

        $(document).ready(function() {
$('.commentall').hide();
$('.reply').on('click',function(){
            var form = $("#example-form");
            var id = $(this).data('id');
            form.steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> #title#',
                onFinished: function (event, currentIndex)
                {
                    $("#hiddenArea").val($(".description"+id).html());
                    form.submit();

                }
            });

            var toolbarOptions = [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['link', 'image'],
                ['blockquote', 'code-block'],

                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                
                [{ 'align': [] }],


            ];

            var quill = new Quill('.description'+id, {
                modules: {
                    toolbar: toolbarOptions
                  },
                theme: 'snow'
            });


            $('.select2').select2({
                theme: 'bootstrap4',
            });
            
            var max_fields = 10; //Maximum allowed input fields 
            var situation_wrapper    = $(".situation_morewrapperField"); //Input fields wrapper
            var requirement_wrapper    = $(".requirement_morewrapperField"); //Input fields wrapper

            var add_answerBtn = $(".add_situations"); //Add button class or ID
            var add_requirementBtn = $(".add_requirements"); //Add button class or ID

            var x = 1; //Initial input field is set to 1
            var y =1;

            

                
                 
                

        


                
                 
                //when user click on remove button
                $(requirement_wrapper).on("click",".remove_requirementfield", function(e){ 
                    e.preventDefault();
                $(this).parent('div').remove(); //remove inout field
                y--; //inout field decrement

            });
                
            
              
              $('.comment'+id).show();

            })

            
            
        });


    </script>

@stop
</x-backend>