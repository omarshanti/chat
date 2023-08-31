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
                        <a class="btn btn-danger" href="{{route('dashboard')}}?channel={{$ch->slug}}">
                            {{$ch->name}}
                        </a>
                        
                    </li>
                @endforeach
            
            </ul>
        </main>
        <!-- Page Content -->
       
        <div class="d-flex justify-content-center container mt-4 ">
            <a class="btn btn-success mb-3" href="{{route('disc.create')}}">Add Discusstion</a>
        </div>
            @foreach ($discs as $disc)
        <div class="card mx-auto mt-3" style="width: 800px;">
           
            <div class="card-header" style="background-color: rgb(128, 165, 245)">
                
            <img src="{{ Gravatar::src($disc->user->email) }}"  style="border-radius: 50%; display:inline" width="50px"   height="50px">
            <strong class="ml-2" style="display: inline"> {{$disc->user->name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <div class="btn btn-info btn-sm content-center"><a href="{{route('disc.show',$disc->slug)}}">View</a></div>
        
               
            </div>
            &nbsp;
            <div class="card-body text-center">
                <strong>{{$disc->title}}</strong>
            </div>
       </div> 
       @endforeach
       <div class="d-flex justify-content-center mt-4">
        {{ $discs->appends(['channel' => request()->query('channel')])->links() }}
       </div>
      
        @else
        Cant See This Page
        @endAuth      
   
</div>
@endsection