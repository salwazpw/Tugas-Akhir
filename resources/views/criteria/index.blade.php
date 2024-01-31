@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <h4>Criteria Master</h4>
            </div>
            <div class="col-6"></div>
            <div class="col-4">
                <a href="{{ route('criteria.create') }}">
                    <button class="btn btn btn-success btn-sm float-right">
                        <i class="fa fa-plus"></i>&nbsp;
                        Add Criteria
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    @if(session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div id="error-alert" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Criteria</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>uom</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($criteria as $data)
                    <tr>
                        <td>{{ $data->criteria_code }}</td>
                        <td>{{ $data->criteria_name }}</td>
                        <td>{{ $data->criteria_type }}</td>
                        <td>{{ $data->uom }}</td>
                        <td>{{ $data->remark }}</td>
                        <td>
                          <form action="{{ route('criteria.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('criteria.edit', $data->id) }}" class="btn btn-xs btn-primary btn-flat" data-toggle="tooltip" title='Edit'>
                              <i class="fa fa-edit"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection