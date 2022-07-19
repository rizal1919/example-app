@extends('layouts/main')

@section('content')

@if( session('store') )
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Saved Succesfully!</strong> Employe has been successfully saved.
    <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
</div>
@endif

@if( session('update') )
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Update Succesfully!</strong> Employe has been successfully updated.
    <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
</div>
@endif

@if( session('destroy') )
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Delete Succesfully!</strong> Employe has been successfully deleted.
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
            <form action="" class="col-auto ms-auto">
            <div class="input-group">
                <input type="text" placeholder="Search" name="search" value="{{ request()->search }}" class="form-control">
                <button class="btn btn-secondary" type="submit">
                    Go!
                </button>
            </div>
        </form>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-dark table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full Name | ID</th>
                    <th>Phone Number</th>
                    <th>Job Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($employes as $employe)
                    <?php $id = $employe->id; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $employe->fullname }} | {{ $employe->id }}</td>
                        <td>{{ $employe->phone_number }}</td>
                        <td>{{ $employe->jobtitle }}</td>
                        <td>
                            <a href="{{ route('employes.show', ['employe'=>$employe->id]) }}" class="btn btn-sm">
                                <i class="fas fa-book-open" style="color:white;"></i>
                            </a>
                            <a href="{{ route('employes.edit', ['employe'=>$employe->id]) }}" class="btn btn-sm">
                                <i class="fas fa-edit" style="color:white;"></i>
                            </a>
                            <!-- <button class="btn btn-sm delete" type="button" data-url="{{ route('employes.destroy', ['employe'=>$employe->id]) }}">
                                <i class="fas fa-trash" style="color: white;"></i>
                            </button>  -->
                            <button type="button" id="delete" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-trash" style="color: white;"></i>
                            </button>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body pb-0">
        {{ $employes->appends(['search'=>request()->search])->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>

@endsection

@push('modal')
    <!-- <div class="modal" tabindex="-1" id="modalDelete">
        <div class="modal-dialog">
            <form action="#" method="post" class="modal-content">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-trash"></i>Delete
                    </h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <p>Are you sure ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit">Yes, Delete!</button>
                </div>
            </form>
        </div>
    </div> -->
    @foreach($employes as $employe)
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('employes.destroy', ['employe'=>$employe->id]) }}" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-trash mx-2"></i>Delete
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <p>Are you sure ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete !</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endpush

<!-- @push('js')
<script>
$(function(){
    let staticBackdrop = new bootstrap.Modal( $('#staticBackdrop') );
    $('#delete').click(function(){
        let url = $(this).attr('data-url');
        $('#staticBackdrop form').attr('action', url);
        staticBackdrop.show();
    });
})
</script>
@endpush -->