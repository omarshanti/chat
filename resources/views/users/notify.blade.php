<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
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
        <!-- Page Content -->
        <main>
            <ul class="container list-group d-flex flex-row mt-3">
                @foreach ($Channels as $ch)
                    <li class="list-group-item m-auto btn btn-success ">
                        <button class="btn btn-danger">{{$ch->name}}</button>
                        
                    </li>
                @endforeach
            
            </ul>
        </main>
        <div class="d-flex justify-content-center container mt-4 ">
            <a class="btn btn-success" href="{{route('disc.create')}}">Add Discussion</a>
        </div>
        <div class="card mx-auto mt-3" style="width: 800px;">
            <div class="card-header">
              Notifications
            </div>
            <div class="card-body">
                <div class="group-list">
                    @foreach ($notify as $notify)
                    <div class="group-list-item mb-2">
                       @if($notify->type == "App\Notifications\NewReplyAdded")
                        New Reply Add To Your Discussion 
                        {{$notify->data['discussion']['title']}}
                       @endif
                       <a class="btn btn-info btn-sm " href="{{route('disc.show',$notify->data['discussion']['slug'])}}">View Discussion</a>
                    </div>
                @endforeach
                </div>
                
            </div>
          </div>
        @else
        Cant See This Page
        @endAuth      
   
</div>
@endsection