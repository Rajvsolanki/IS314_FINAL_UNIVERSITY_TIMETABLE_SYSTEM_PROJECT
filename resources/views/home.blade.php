@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                   Dashboard 
                    
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <h3> Welcome to University Student TimeTable </h3>
                        <img src="{{asset('img/3.jpg')}}" alt=" welcome" style=" width:100%;">
                     
                </div>
         
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection