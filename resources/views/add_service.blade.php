@extends('layouts.master')

@section("title","add service page")


@section('content')
<!--  BEGIN NAVBAR  -->
@include("adminheader")
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
   <header class="header navbar navbar-expand-sm">
      <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
         </svg></a>

      <ul class="navbar-nav flex-row">
         <li>
            <div class="page-header">

               <nav class="breadcrumb-one" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                     <!-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> -->
                  </ol>
               </nav>

            </div>
         </li>
      </ul>
      <!-- <ul class="navbar-nav flex-row ml-auto "> -->
      <!-- <li class="nav-item more-dropdown"> -->
      <!-- <div class="dropdown  custom-dropdown-icon"> -->
      <!-- <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a> -->

      <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown"> -->
      <!-- <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a> -->
      <!-- <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a> -->
      <!-- <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a> -->
      <!-- <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a> -->
      <!-- <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a> -->
      <!-- </div> -->
      <!-- </div> -->
      <!-- </li> -->
      <!-- </ul> -->
   </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("adminsidebar")
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="allform-page addservice">
         <h2 class="pb-4">Add Services</h2>


         <div class="row">
            <div class="col-md-7" role="tab" id="headingOne10">
               <label for="fname">Title

               </label><br>
               <textarea rows="3" name="name" id="name" cols="90" placeholder="Title...">@if(isset($service_id)){{$service_id->name}}@endif</textarea><br>

               <label for="fname">Description</label><br>
               <!-- <div id="summernote"></div> -->
               <textarea id="summernote" name="description" rows="6" cols="70" placeholder="Description...">@if(isset($service_id)){{$service_id->description}}@endif</textarea>
               <!-- <input type="button" id="btnValue" value="Get Value" />   -->
               <!-- <div id="divkarea"></div> -->

               <br>

               <br>
               <h2 class="">Sub Heads</h2>

               <!-- <form id="subservice-form" action="/admin/services/sub" method="post"> -->
               <form id="sub-services">

                  @if(isset($service_id))
                  <input type="hidden" name="service_id" value="{{$service_id->id}}">
                  @else
                  <input type="hidden" name="service_id" value="">
                  @endif

                  @if(isset($service_id))
                  @php($i = 0)
                  @foreach ($sub_heads as $list)
                  @php($i++)
                  <label>Products{{$i}}</label><br>
                  <input type="text" name="sub_head{{$i}}" id="{{$list->id}}" value="{{$list->sub_head}}">
                  <br>
                  <br>
                  @endforeach
                  @else
                  <label>Products1</label><br>
                  <input type="text" name="sub_head1" id="1" value="Products1">
                  <br>
                  <br>
                  <label>Products2</label><br>
                  <input type="text" name="sub_head2" id="2" value="Products2">
                  <br>
                  <br>
                  @endif
               </form>
               <!-- </form> -->


               <a class="btn btn-info btn-xs rounded-0 text-white" id="add-product"><small>Add More</small></a>
            </div>

            <div class="col-md-5">
               <div class="action">
                  <h6>Save Field</h6>
                  </select>
                  <form class="saveall pl-3" id="service-form">
                     @csrf
                     <div class="saveall pl-3">
                        <div class="">
                           <label for="category" class="form-label">Category</label> <br>
                           <select name="category" class="form-control w-75" id="category">
                              <option value="incorporation">Incorporation</option>
                              <option value="registration">Registration</option>
                              <option value="tax/gst">Tax/GST</option>
                              <option value="compliance">Compliance</option>
                              <option value="others">Others</option>
                           </select>
                        </div>
                        <br>
                        @if(isset($service_id))
                        @php($price = $service_id->price)
                        @else
                        @php($price = '')
                        @endif
                        <label for="fname">Pricing:</label><br>
                        <input type="text" id="price" name="price" value="{{$price}}" placeholder="₹"><br>
                        <br>

                        @if(isset($service_id))
                        @php($points = $service_id->points)
                        @else
                        @php($points = '')
                        @endif
                        <label for="fname">Royalty Points:</label><br>
                        <input type="text" id="points" name="points" placeholder="₹" value="{{$points}}"><br>
                        <br>

                        @if(isset($service_id))
                        @php($f_price = $service_id->f_price)
                        @else
                        @php($f_price = '')
                        @endif
                        <label for="fname">fran_Pricing:</label><br>
                        <input type="text" id="f_price" name="f_price" value="{{$f_price}}" placeholder="₹"><br>
                        <br>

                        @if(isset($service_id))
                        @php($f_point = $service_id->f_point)
                        @else
                        @php($f_point = '')
                        @endif
                        <label for="fname">fran_Royalty Points:</label><br>
                        <input type="text" id="f_point" name="f_point" placeholder="₹" value="{{$f_point}}"><br>
                        <br>


                        <input type="button" class="btn btn-xs btn-info rounded-0" value="Save" id="save-all-btn">
                        <br><br>
                        <p id="notify"></p>
                     </div>
                  </form>
               </div>
            </div>



         </div>


         <div class="row">
            <div class="col-md-3 col-sm-3">
               <div class="tab">
                  <button class="tablinks" onclick="openCity(event, 'Overview')" id="defaultOpen">Overview</button>
                  <button class="tablinks" onclick="openCity(event, 'Details')">Details</button>
                  <button class="tablinks" onclick="openCity(event, 'requ')">Requirement</button>
                  <button class="tablinks" onclick="openCity(event, 'Listicles')">Listicles</button>
                  <button class="tablinks" onclick="openCity(event, 'regs')">Registration Information</button>
                  <button class="tablinks" onclick="openCity(event, 'Other')">Other Information</button>
                  <button class="tablinks" onclick="openCity(event, 'Guide')">Composition Guide</button>
                  <button class="tablinks" onclick="openCity(event, 'FAQS')">FAQS</button>
               </div>
            </div>
            <!-- tab content -->

            <div class="col-md-9 col-sm-9">
               <form id="tabs-service-form">
                  <!-- @csrf -->

                  @if(isset($service_id))
                  <input type="hidden" name="service_id" value="{{$service_id->id}}">
                  @else
                  <input type="hidden" name="service_id" value="">
                  @endif


                  <div id="Overview" class="tabcontent">
                     <textarea name="overview" id="summernote1">

                                @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "overview")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                overview
                                @endif
                            </textarea>
                  </div>

                  <div id="Details" class="tabcontent">
                     <textarea name="details" id="summernote2">
                            @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "details")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                details
                                @endif
                            </textarea>
                  </div>

                  <div id="requ" class="tabcontent">
                     <textarea name="requ" id="summernote3">
                            @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "requ")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                requ
                                @endif
                            </textarea>
                  </div>

                  <div id="Listicles" class="tabcontent">
                     <textarea name="listicles" id="summernote4">
                            @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "listicles")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                listicles
                                @endif
                            </textarea>
                  </div>

                  <div id="regs" class="tabcontent">
                     <textarea name="regs" id="summernote5">
                            @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "regs")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                regs
                                @endif
                            </textarea>
                  </div>

                  <div id="Other" class="tabcontent">
                     <textarea name="others" id="summernote6">
                            @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "others")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                others
                                @endif
                            </textarea>
                  </div>

                  <div id="Guide" class="tabcontent">
                     <textarea name="guide" id="summernote7">
                            @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "guide")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                guide
                                @endif
                            </textarea>
                  </div>

                  <div id="FAQS" class="tabcontent">
                     <textarea name="faq" id="summernote8">
                            @if(isset($service_id))
                                 @foreach($tabs as $item)
                                  @if($item->name == "faq")
                                  {{$item->description}}
                                  @endif
                                  @endforeach
                                @else
                                faq
                                @endif
                            </textarea>
                  </div>
               </form>
            </div>



         </div>







      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>







<!-- for texteditor -->
<script>
   $('#summernote').summernote({
      placeholder: 'Type here',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });

   $('#summernote1').summernote({
      placeholder: 'Overview',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
   $('#summernote2').summernote({
      placeholder: 'Details',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
   $('#summernote3').summernote({
      placeholder: 'Requirement',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
   $('#summernote4').summernote({
      placeholder: 'Listicles',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
   $('#summernote5').summernote({
      placeholder: 'Registration Information',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });

   $('#summernote6').summernote({
      placeholder: 'Other Information',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });

   $('#summernote7').summernote({
      placeholder: 'Composition Guide',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
   $('#summernote8').summernote({
      placeholder: 'FAQS',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
</script>

<script>
   let count = $("#sub-services input");

   count = count.length;

   let nos = count;
   $(document).on("click", "#add-product", function() {

      nos++;

      let appendHtml = `<label>Products${nos}</label><br>
                        <input type="text" id="${nos}" name="sub_head${nos}" value=""><br>
                        <br> `;

      $("#sub-services").append(appendHtml);
   });
</script>


<!-- add service ajax  -->
<script>
   $("#save-all-btn").click(() => {

      $("#save-all-btn").val('Sending...');

      let formData1 = $("#sub-services").serializeArray();
      let formData2 = $("#tabs-service-form").serializeArray();


      let subHeadForm = false;
      let tabsForm = false;

      formData1.forEach(element => {
         if (element != '') {
            subHeadForm = true;
         }
      });
      formData2.forEach(element => {
         if (element != '') {
            tabsForm = true;
         }
      });

      console.log(subHeadForm + tabsForm + "true");
      // console.log(formData2);

      // proceed to next form if first successful 
      let nextForm = "";


      let name = $("[name=name]").val();
      let price = $("[name=price]").val();
      let points = $("[name=points]").val();
      let f_price = $("[name=f_price]").val();
      // let f_price = "10";
      // let f_points = "2";
      let f_point = $("[name=f_point]").val();
      let description = $("[name=description]").val();
      let category = $("[name=category]").val();
      let id = $("[name=service_id]").val();


      // if (name && price && points && description && category) {
      if (subHeadForm == true && tabsForm == true && name && price && points && description && category) {

         // service ajax 
         $.ajax({
            url: "/admin/services",
            type: "post",
            data: {
               name,
               description,
               category,
               price,
               points,
               f_price,
               f_point,
               id
            },
            success: function(data) {
               if (data.status == 'success') {

                  $("[name=service_id]").val(data.data.id);

                  $("#save-all-btn").val('please wait..');

                  formData1 = $("#sub-services").serializeArray();
                  formData2 = $("#tabs-service-form").serializeArray();

                  // subhead services 
                  $.ajax({
                     url: "/admin/services/sub",
                     type: "post",
                     data: formData1,
                     success: function(data) {
                        console.log(data);

                        $("#save-all-btn").val('please wait..');



                        // tabs form submit 
                        $.ajax({
                           url: "/admin/services/tabs",
                           type: "post",
                           data: formData2,
                           success: function(data) {
                              console.log(data);

                              $("#save-all-btn").val('Success');
                              $("#notify").html('Service inserted successfully').addClass('text-success')


                           },
                           complete: function() {
                              $("#save-all-btn").val('Save');

                              $("#notify").html('Service inserted successfully').addClass('text-success');

                              location.href = "/admin/service/manage";
                           },
                           error: function() {
                              $("#save-all-btn").val('failed');
                              $("#notify").html('Service failed to insert ! Try again').addClass('text-danger');
                           }
                        })

                        // tabs form submit ends 


                     },
                     error: function() {
                        alert("failed to send sub head request")
                     }
                  })
                  // sub head ends 


               } else {
                  $("#save-all-btn").val('failed');
                  $("#notify").html('Service failed to insert ! Try again').addClass('text-danger');
               }
            },
            complete: function() {
               // $("#save-all-btn").val('Save');
            },
            error: function(jqXHR, exception) {

               // console.log(jqXHR)
               // console.log(exception)
               // console.log(error1)
               alert('failed to send request')
            }
         })
      } else {
         $("#notify").html('All fields are required (Service, Sub Heads, Tabs Description)').addClass('text-danger');
         $("#save-all-btn").val('failed!');

      }



   })
</script>


@endsection