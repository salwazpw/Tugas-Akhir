@extends('layouts.app')

@section('content')

<div id="success-alert" class="alert alert-success" style="display: none;"></div>
<div id="error-alert" class="alert alert-danger" style="display: none;"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class ="card card-primary">
                    <div class="card-header">
                        <h3 class ="card-title"> Edit Vendor</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name</label>
                            <input type="text" class="form-control" id="vendor_name" name="vendor_name"
                                value={{ $vendor->vendor_name }}>
                        </div>
                        <div class="form-group">
                            <label for="vendor_address">Vendor Address</label>
                            <input type="text" class="form-control" id="vendor_address" name="vendor_address"
                                value={{ $vendor->vendor_address }}>
                        </div>
                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <input for="remark" class="form-control" id="remark" name="remark"
                                value={{ $vendor->remark }}></input>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="submit_btn" onclick="updateVendor()" class="btn btn-primary">Submit</button>
                        <a href="{{ route('vendor.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        function updateVendor(){
            var vendor_name = $('#vendor_name').val();
            var vendor_address = $('#vendor_address').val();
            var remark = $('#remark').val();

            var data = {
                _token: "{{ csrf_token() }}",
                vendor_name: vendor_name,
                vendor_address: vendor_address,
                remark: remark
            };

            $.ajax({
                type: "POST",
                url: "{{ route('vendor.update', $vendor->id) }}",
                data: data,
                success: function(response) {
                    if (response.status == true) {
                        $('#submit_btn').attr('disabled', 'disabled');
                        $('#success-alert').html(response.message);
                        $('#success-alert').show();
                        setTimeout(function() {
                            $('#success-alert').fadeOut('fast');
                        }, 3000);
                        setTimeout(function() {
                            window.location.href = "{{ route('vendor.index') }}";
                        }, 3000);
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                    } else {
                        $('#error-alert').html(response.message);
                        $('#error-alert').show();
                        setTimeout(function() {
                            $('#error-alert').fadeOut('fast');
                        }, 3000);
                    }
                },
                error: function(response) {
                    $('#error-alert').html(response.message);
                    $('#error-alert').show();
                    setTimeout(function() {
                        $('#error-alert').fadeOut('fast');
                    }, 3000);
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                }
            })
        }
    </script>
@endsection
