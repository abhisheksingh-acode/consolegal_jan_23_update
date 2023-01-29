<table>
   <thead>
      <tr>
         <th>Id</th>
         <th><table>
   <thead>
      <tr>
         <th>Order Id</th>
         <th>Payment ID</th>
         <th>User ID</th>
         <th>Fran ID</th>
         <th>Service ID</th> 
         <th>Amount</th> 
         <th>Date</th>
      </tr>
   </thead>

   @foreach ($data as $list)
   <tr>
      <td>{{$list->id}}</td>
      <td>{{$list->r_payment_id}}</td>
      <td>{{$list->user_id}}</td>
      <td>{{$list->fran_id}}</td>
      <td>{{$list->product_id}}</td>      
      <td>{{$list->amount}}</td>
      <td>{{$list->created_at}}</td>
   </tr>
   @endforeach
</table></th>
         <th>Fran ID</th>
         <th>Service ID</th>
         <th>Service Name</th>
         <th>Payment ID</th>
         <th>Date</th>
      </tr>
   </thead>

   @foreach ($data as $list)
   <tr>
      <td>{{$list->id}}</td>
      <td>{{$list->user_id}}</td>
      <td>{{$list->fran_id}}</td>
      <td>{{$list->service_id}}</td>      
      <td>{{$list->payment_id}}</td>
      <td>{{$list->created_at}}</td>
   </tr>
   @endforeach
</table>