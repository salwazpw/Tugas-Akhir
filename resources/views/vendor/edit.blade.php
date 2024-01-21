@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class ="card card-primary">
                <div class="card-header">
                    <h3 class ="card-title"> Edit Vendor</h3>
                </div>

                <form method="POST" action="{{route('vendor.update', $vendor->id)}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name</label>
                            <input type="text" class="form-control" id="vendor_name" name="vendor_name" value={{$vendor->vendor_name}}>
                        </div>
                        <div class="form-group">
                            <label for="vendor_address">Vendor Address</label>
                            <input type="text" class="form-control" id="vendor_address" name="vendor_address" value={{$vendor->vendor_address}}>
                        </div>
                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <input for="remark" class="form-control" id="remark" name="remark" value={{$vendor->remark}}></input>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('vendor.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection