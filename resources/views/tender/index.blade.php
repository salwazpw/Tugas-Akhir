@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <h4>Tender</h4>
            </div>
            <div class="col-6"></div>            
            <div class="col-4">
                <button class="btn btn btn-success btn-sm float-right">
                    <i class="fa fa-plus"></i>&nbsp;
                    Create Tender
                </button>
                <button class="btn btn btn-info btn-sm float-right mr-1">
                    <i class="fas fa-file-alt"></i>&nbsp;
                    Add Criteria
                </button>                                
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">                
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">Resume</div>
                        <div class="col-10">Graphs</div>
                    </div>
                    <div class="row">
                        <div class="col-12">DATA</div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
