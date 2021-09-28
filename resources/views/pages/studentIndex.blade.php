@extends('layouts.index')

@section('content')

@include('partials.addModal')
@include('partials.editModal')
@include('partials.deleteModal')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div class="success_message "></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Student Data
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddStudentModal">Add Student</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
