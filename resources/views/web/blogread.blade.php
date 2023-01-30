@extends("layouts.web")

@section('title','Consolegal | Blogs')

@section('content')
<section id="blog-read-home">
   <h3 class="main-title">{{$blog->title}}</h3>

   <div class="author">
      <div class="pic"><img src="{{ asset('web/image')}}/profile.png" alt="" class="img-fluid"></div>
      <div class="detail">
         <div class="name">Author</div>
         <div class="profile">Admin (ConsoLegal)</div>
      </div>
   </div>
   <div class="img-container">
      <img src="{{asset('storage')}}/{{$blog->banner}}" alt="blog-banner" />
   </div>

   <div class="content-section container-md row mx-auto">
      <div class="col-md-1"></div>
      <div class="col-md-7 content-align-container">

         {!! $blog->description !!}

         <div class="container-fluid">
            Share via: 
            <a href="https://wa.me/send?text={{request()->url()}}" target="_blank" class="btn fs-5">
               <i class="fab fa-whatsapp text-success"></i>
            </a>
            <a href="http://www.facebook.com/sharer.php?u={{request()->url()}}" target="_blank" class="btn fs-5">
               <i class="fab fa-facebook text-primary"></i>
            </a>
            <a href="http://www.twitter.com/share?url={{request()->url()}}" target="_blank" class="btn fs-5">
               <i class="fab fa-twitter text-info"></i>
            </a>
         </div>
      </div>
      <div class="col-md-4">
         <div class="recent-post-card">
            <!-- <h4 class="recent-title">Recent Posts</h4> -->

            @foreach($recent as $post)
            <div class="card mx-auto" style="width: 18rem;">
               <img src="{{ asset('storage')}}/{{$post->image}}" class="card-img-top" alt="...">
               <div class="card-body">
                  <a class="nav-item card-text" href="/blogpage/{{$post->id}}">
                     {{$post->title}}</a>
               </div>
            </div>
            @endforeach

         </div>

      </div>
   </div>
</section>

@endsection