@extends('layouts.master')

@section("title","add leads")


@section("content")

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
   <div class="sidebar-wrapper sidebar-theme">

      <nav id="sidebar">
         <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">
            <li class="menu">
               <a href="#leads" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <div class="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                     </svg>
                     <span>Lead Manager</span>
                  </div>
                  <div>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                     </svg>
                  </div>
               </a>
               <ul class="collapse submenu list-unstyled" id="leads" data-parent="#accordionExample">
                  <li>
                     <a href="{{route('agent.leads')}}">All Leads</a>
                  </li>
                  <li>
                     <a href="{{route('agent.dashboard')}}">Add Leads </a>
                  </li>
               </ul>
            </li>

         </ul>

      </nav>

   </div>
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <div class="d-flex justify-content-between align-items-center">
            <h2>Leads</h2>
            <a href="{{route('export.agent.lead')}}" class="btn-sm btn-dark"><i class="fas fa-file text-white"></i></a>
         </div>


         <table class="table responsive table-striped">
            <tr>
               <th>Id</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Service</th>
               <th>Status</th>
               <th>From</th>
               <th>Date & Time</th>
            </tr>
            @if(isset($leads) && count($leads) > 0)
            @foreach($leads as $data)
            <tr>
               <td>
                  {{$data->id}}
               </td>
               <td>
                  {{$data->name}}
               </td>
               <td>
                  {{$data->email}}
               </td>
               <td>
                  {{$data->phone}}
               </td>
               <td>
                  @foreach($service as $list)
                  @if($list->id == $data->service_id)
                  {{$list->name}}
                  @endif
                  @endforeach
               </td>
               <td>
                  {{$data->isUser?"onboard":"pending"}}
               </td>
               <td>
                  {{$data->from}}
               </td>
               <td>
                  {{$data->created_at}}
               </td>
            </tr>
            @endforeach
            @endif
         </table>
         {{$leads->links()}}
      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>


@endsection