@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-gray-100">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif
        @Auth
        <main>
            <ul class="container list-group d-flex flex-row mt-3">
                @foreach ($Channels as $ch)
                    <li class="list-group-item m-auto btn btn-info ">
                        <button class="btn btn-danger">{{$ch->name}}</button>
                        
                    </li>
                @endforeach
            
            </ul>
        </main>
        <!-- Page Content -->
       
        <div class="d-flex justify-content-center container mt-4 ">
            <a class="btn btn-success mb-3" href="{{route('disc.create')}}">Add Discusstion</a>
        </div>
        <div class="card mx-auto mt-3" style="width: 800px;">
           
            <div class="card-header" style="background-color: rgb(128, 165, 245)">
                
            <img src="{{ Gravatar::src($disc->user->email) }}"  style="border-radius: 50%; display:inline" width="50px"   height="50px">
            <strong class="ml-2" style="display: inline"> {{$disc->user->name}} </strong>
            <div class="btn btn-info btn-sm content-center"><a href="{{route('dashboard')}}">Return</a></div>   
               
            </div>
            <div class="card-body">
                <strong>{{$disc->title}}</strong>

                <hr>
                {!!$disc->content!!}

                @if($disc->BestReply)
               <div class="card bg-success my-5" style="color: #fff">
                <div class="card-header" >
                    <div class="d-flex justify-content-between">
                       <div>
                        <img src="{{Gravatar::src($disc->BestReply->owner->email)}}" alt="" width="40px" height="40px" style="border-radius: 50%;display:inline" class="mr-2">
                        <strong>  {{$disc->BestReply->owner->name}}</strong>
                       </div>
                       <div>
                           <strong>Best Reply</strong>
                       </div>
                    </div>
                </div>
                <div class="card-body">
                   {!!$disc->BestReply->content!!} 
                </div>
               </div>
               @endif
            </div>
       </div>    
       @foreach ($disc->replies()->paginate(3) as $reply)
       <div class="card container mx-auto my-5">
           <div class="card-header">
               <div class="d-flex justify-content-between">
                   <div>
                       <img src="{{Gravatar::src($reply->owner->email)}}" height="40px" width="40px" style="border-radius: 50%; display:inline" alt="">
                       <span class="ml-2">   {{$reply->owner->name}}</span>
                   </div>
                   <div>
                       @if(auth()->user()->id == $disc->user_id)
                       <form action="{{route('reply.best',['discussion' => $disc->slug ,'reply' => $reply->id])}}"  method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary">Mark As Best Reply</button>
                       </form>
                       @endif
                   </div>
               </div>

           </div>
           <div class="card-body">
               {!! $reply->content !!}
               
           </div>
       </div>
   @endforeach 
   {{$disc->replies()->paginate(3)->links()}}
      <div class="card container   mt-4" style="width: 60%">
          <div class="card-header">
            Add Reply
          </div>
          <div class="card-body">
            <form action="{{route('reply.store',$disc->slug)}}" method="POST">
                @csrf
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
                <button type="submit" class="btn btn-success btn-sm mt-2">Add Reply</button>
            </form>
          </div>
      </div>
      
        @else
        Cant See This Page
        @endAuth      
   
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection