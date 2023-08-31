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
                        <a class="btn btn-danger" href="{{route('dashboard')}}?channel={{$ch->slug}}">
                            {{$ch->name}}
                        </a>
                        
                    </li>
                @endforeach
            
            </ul>
        </main>
        <div class="d-flex justify-content-center container mt-4 ">
            <a class="btn btn-success" href="{{route('disc.create')}}">Add Discusstion</a>
        </div>
        <div class="card mx-auto mt-3" style="width: 800px;">
            <div class="card-header">
              Featured
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
          </div>
        @else
        Cant See This Page
        @endAuth      
   
</div>
@endsection