@extends('layouts/main')

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <form action="{{ route('employes.store') }}" method="post" class="card">
                <div class="card-header">
                    <i class="fas fa-circle-plus mx-1"></i>Create New Employe
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Full name</label>
                        <input type="text" value="{{ old('fullname') }}" name="fullname" class="form-control @error('fullname') is-invalid @enderror">
                        @error('fullname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone number</label>
                        <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Job title</label>
                        <input type="text" value="{{ old('jobtitle') }}" name="jobtitle" class="form-control @error('jobtitle') is-invalid @enderror">
                        @error('jobtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-database"></i> Save to Database
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
