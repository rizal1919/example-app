@extends('layouts/main')

@section('content')

@if( session('store') )
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Saved Succesfully!</strong> Employe has been successfully saved.
    <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
</div>
@endif


<div class="card mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                <a href="{{ route('employes.create') }}" class="btn btn-primary">
                    <i class="fas fa-circle-plus"></i> Create New Employe
                </a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-dark table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Job Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employes as $employe)
                    <tr>
                        <td>{{ $employe->id }}</td>
                        <td>{{ $employe->fullname }}</td>
                        <td>{{ $employe->phone_number }}</td>
                        <td>{{ $employe->jobtitle }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection