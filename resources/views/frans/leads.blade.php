@extends('layouts.frans')

@section("title","Dashboard Franchise")


@section('content')
          <!--wallet start -->
          <div class="tab-pane active text-style" id="tab3">

            <div class="d-flex justify-content-end align-items-center mb-3">
               <a href="{{route('franchise.dashboard.leads.create')}}" class="btn btn-primary">Add Lead <i class="fas fa-plus text-white"></i></a>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
               <h2>Leads</h2>
               <a href="{{route('export.fran.lead')}}" class="btn-sm btn-dark"><i class="fas fa-file text-white"></i></a>
            </div>
            <table class="table table-striped custab">
              <thead>
                <tr>
                  <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Service</th>
               <th>Status</th>
               <th>Date & Time</th>
                </tr>
              </thead>
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
                  {{$data->created_at}}
               </td>
            </tr>
            @endforeach
            @endif
         </table>
         {{$leads->links()}}
          </div>
          <!--wallet end -->

@endsection