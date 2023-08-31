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
                            <li class="list-group-item m-auto btn btn-success ">
                                <button class="btn btn-danger">{{$ch->name}}</button>
                                
                            </li>
                        @endforeach
                    
                    </ul>
                </main>
                <div class="d-flex justify-content-center container mt-4 ">
                    <a class="btn btn-success" href="{{route('disc.create')}}">Add Discusstion</a>
                </div>
                <div class="card mx-auto mt-3" style="width: 800px;">
                    <div class="card-header">Add Discussions</div>
                    <div class="card-body">
                        <form action="{{route('disc.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>
                            </div>
                            <div class="form-group">
                                <label for="content">Channel</label>
                               <select name="channel" id="channel" class="form-control">
                                @foreach ($Channels as $ch)
                                   <option value="{{$ch->id}}">{{$ch->name}}</option>
                                @endforeach
                               </select>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Create Discussion</button>
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
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/toastr.min.js') }}" ></script>
@endsection