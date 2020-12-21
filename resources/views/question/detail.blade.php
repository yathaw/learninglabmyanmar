<x-backend>
    @php
        if($answer->isEmpty()){
            $ans_status = 0;
        }else{
            $ans_status = 1;
        }
    @endphp
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h4> Question For <strong class="font-weight-bolder">  {{ $question->course->title }} </strong> </h4>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('panel') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backside.questions.index') }}">List</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Detail </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-dark font-weight-bolder"> {{ $question->title }} </h4>
                    <h6 class="card-subtitle text-muted"> By {{ $question->user->name }}
                        <p class="float-right"> Asked : {{$question->created_at->diffForHumans()}}  </p>
                    </h6>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-light border">
                                <div class="card-body">
                                    {!! $question->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title"> Your Answer </h6>
                </div>
                <div class="card-body">

                    @if(!$answer->isEmpty())
                        <div class="row">
                            <div class="col-6">
                                <div class="btn-group" role="group" aria-label="Small button group">
                                    <button type="button" class="btn btn-warning rounded-0 text-dark editBtn" data-toggle="tooltip" data-placement="top" title="ပြင်ဆင်မည်" data-description="{{ $answer[0]->description }}"> <i class="align-middle mr-3" data-feather="edit-2"></i>  Edit </button>
                                    

                                    <form method="post" action="{{ route('backside.questions.destroy',$question->id) }}" class="" onsubmit="return confirm('Are you Sure want to Delete?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger rounded-0" data-toggle="tooltip" data-placement="top" title="ဖျက်စီးမည်" type="submit"> 
                                           <i class="align-middle mr-2" data-feather="x"></i> Remove 
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-6">
                                <p class="float-right"> Asked : {{$answer[0]->created_at->diffForHumans()}}  </p>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <div class="card bg-light border">
                                    <div class="card-body">
                                        {!! $answer[0]->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    @else

                    <form action="{{route('answerquestion')}}" method="POST" id="addForm">
                        @csrf
                        <input type="hidden" name="questionid" value="{{ $question->id }}">

                        <div id="descriptionId"></div>

                        <textarea class="form-control d-none" id="hiddenArea" name="description"></textarea>

                        <input type="button" value="Post Your Answer" class="btn btn-warning mt-3 saveBtn">
                    </form>

                    @endif
                    
                    @if(!$answer->isEmpty())

                    <div id="editformDiv">
                        <form method="POST" id="editForm" action="{{ route('backside.answer.update',$answer[0]->id) }}">
                            @csrf
                            @method('PUT')

                            <div id="editdescriptionId"></div>

                            <textarea class="form-control d-none" id="edit_hiddenArea" name="edit_description"></textarea>

                            <input type="button" value="Post Your Answer" class="btn btn-warning mt-3 updateBtn">
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@section('script_content')
    <style type="text/css">
        .ql-editor {
            min-height: 200px;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#editformDiv').hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var toolbarOptions = [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['link', 'image'],
                ['code-block'],

                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent                

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            

            ];

            var quill = new Quill('#descriptionId', {
                modules: {
                    toolbar: toolbarOptions
                  },
                theme: 'snow',
                placeholder: 'Explain your current problem.',
            });

            var addform = $("#addForm");

            $('.saveBtn').click(function() {
                var about = document.querySelector('textarea[name=description]');

                var quillData = quill.getContents();
                var quillText = quill.getText();
                var quillHtml = quill.root.innerHTML.trim();

                about.value =  quillHtml;

                addform.submit();

            });

            var edit_quill = new Quill('#editdescriptionId', {
                modules: {
                    toolbar: toolbarOptions
                  },
                theme: 'snow',
                placeholder: 'Explain your current problem.',
            });

            var answer = `{{ $answer }}`;


            $('.editBtn').click(function() {
                $('#editformDiv').show();

                var description = $(this).data('description');

                    edit_quill.clipboard.dangerouslyPasteHTML(description);



            });

            var editform = $("#editForm");

            $('.updateBtn').click(function() {
                var about = document.querySelector('textarea[name=edit_description]');

                var quillData = edit_quill.getContents();
                var quillText = edit_quill.getText();
                var quillHtml = edit_quill.root.innerHTML.trim();

                about.value =  quillHtml;

                editform.submit();

            });

        });

    </script>

@endsection

</x-backend>