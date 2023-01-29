@extends("layouts.web")

@section('title','Consolegal | Career')

@section('content')

   @push('css')
   <link rel="stylesheet" href="{{ asset('web/css/style.css')}}">
   @endpush

    <section id="career-sec-1" class="py-5 ">
        <div class="text-center pb-5">
            <h1 class="fw-bold">Careers</h1>
            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nobis iusto <br> voluptates
                aliquid beatae.</p>
        </div>


        <div class="my-5 py-5  bg-light">
            <h1 class="fw-bold text-center">Similar Openings</h1>
            <div class="container pt-5">
                <div class="row">

                    @forelse ($data as $item)
                        
                    <div class="col-md-4 col-sm-6 p-3">
                        <div class="career-card p-3 d-flex flex-column bg-white rounded-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-semibold career-heading ">{{$item->category_name}}</div>
                                <div class="career-designation text-capitalize">
                                    {{$item->job_type}}
                                </div>
                            </div>
                            <p class="career-location">{{$item->location}}</p>


                            <a class="career-btn text-decoration-none career-apply-btn" 
                            data-category-id="{{$item->id}}" >View & Apply</a>
                        </div>
                    </div>
                    @empty
                        No Available Job Openings
                    @endforelse
                    {{-- <div class=" col-md-4 col-sm-6 p-3">
                        <div class="career-card p-3 d-flex flex-column bg-white rounded-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-semibold career-heading">Front-end Designer</div>
                                <div class="career-designation">
                                    Full Time
                                </div>
                            </div>
                            <p class="career-location">Sidney, Australia</p>


                            <a class="career-btn text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" type="button">View & Apply</a>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6 p-3">
                        <div class="career-card p-3 d-flex flex-column bg-white rounded-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-semibold career-heading">Front-end Designer</div>
                                <div class="career-designation">
                                    Full Time
                                </div>
                            </div>
                            <p class="career-location">Sidney, Australia</p>


                            <a class="career-btn text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" type="button">View & Apply</a>
                        </div>
                    </div>
                    <div class=" col-md-4 col-sm-6 p-3">
                        <div class="career-card p-3 d-flex flex-column bg-white rounded-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-semibold career-heading">Front-end Designer</div>
                                <div class="career-designation">
                                    Full Time
                                </div>
                            </div>
                            <p class="career-location">Sidney, Australia</p>


                            <a class="career-btn text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" type="button">View & Apply</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header popup-modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Get In Touch</h5>
                    <button type="button" class="close text-light" data-bs-dismiss="modal" aria-label="Close">
                        <span data-bs-dismiss="modal" aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body popup-modal-body">
                    <form action="" method="POST" class="py-3" id="modal-form" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="Person_name">Name</label>
                            <input type="text" class="form-control bg-light rounded border-0 " id="Person_name"
                                name="name" required>
                        </div>
                        <div class="mb-2">
                            <label for="Person_number">Number</label>
                            <input type="number" class="form-control bg-light rounded border-0 " id="phone_number"
                                name="phone" required>
                        </div>
                        <div class="mb-2">
                            <label for="Person_email">Email</label>
                            <input type="email" class="form-control bg-light rounded border-0 " id="Person_email"
                                name="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="Person_city">City</label>
                            <input type="text" class="form-control bg-light rounded border-0 " id="Person_city"
                                name="city" required>
                        </div>
                        <div class="mb-2">
                            <label for="Person_resume">Resume</label>
                            <input type="file" class="form-control bg-light rounded border-0 " id="Person_resume" name="resume" required>
                        </div>
                        <div class="mb-0">
                            <label for="Person_message">Your Message</label>
                            <textarea name="message" id="Person_message" style="width: 100%;" rows="3"
                                class="form-control bg-light rounded border-0" required></textarea>
                        </div>
                        <div id="msg_reply" class="mt-3"></div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" id="career-submit" form="modal-form" class="btn mx-auto px-5 rounded"
                        style="width:200px;background-color:#15426d;color: white;font-weight:500;">Send<button>
                </div>
            </div>
        </div>
    </div>



    @push('script')
    <script>
        $('#career-submit').siblings().css('display', 'none');


        

        $("form").on("submit", function (e) {

            var dataString = new FormData(this);

            // alert(dataString); return false;

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{route('career.store')}}",
                data: dataString,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                beforeSend:function(){
                        $('.modal form [type=submit]').html('Sending....');
                },
                success: function (data) {

                    console.log(data);


                    if(data.status){
                    $('input').val("");
                    $('textarea').val("");
                    $("#msg_reply").html("<div id='message'></div>");
                    $('[name=category_id]').remove();
                    $("#message")
                        .html("<h2>Contact Form Submitted!</h2>")
                        .append("<p>We will be in touch soon.</p>")
                        .hide()
                        .fadeIn(1500, function () {
                            $("#message").append(
                                //    "<img id='checkmark' src='images/check.png' />"
                            );
                        });
                    }else{
                        $("#message")
                        .html(`<h3 class="text-danger">${data.msg}</h3>`)
                        .append("")
                        .hide()
                        .fadeIn(1500, function () {
                            $("#message").append(
                                //    "<img id='checkmark' src='images/check.png' />"
                            );
                        });
                    }
                   
                },
                error: function(err){
                    console.log(err);
                },
                complete:function(){
                    $('.modal form [type=submit]').html('Send');
                }
            });




        });



        $('#phone_number').parent().append("<div class='span-danger'><div/>");


        $(document).on('input', '#phone_number', function () {
            let length = $('input[type=number]').val().length;

            // console.log('clicked', length);
            if (length != 10) {
                $('#phone_number').parent().find('.span-danger').html("<span>Enter 10 Digit Mobile Number <span/>");
                $('button[type=submit]').attr('disabled', 'disabled');
                $('#phone_number').parent().removeClass('mb-3');
            } else {
                $('#phone_number').parent().find('.span-danger').html("<span><span/>");
                $('button[type=submit]').removeAttr('disabled');
                $('#phone_number').parent().addClass('mb-3');
            }
        })

        $(document).on('click','.career-apply-btn',function (){
            let id = $(this).attr('data-category-id');

            let category_id = `<input type="hidden" name="category_id" value="${id}" required />`;
            $('.modal').find('form').append(category_id);

            $('.modal').modal('show');
        });
    </script>
    @endpush

@endsection