@extends('layout.app')

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
        .custom-form {
            border: 2px solid #ddd;
            border-radius: 20px;
            padding: 15px;
            box-shadow: 5px 5px 2px 2px rgb(227, 227, 227);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div>
            <p class="page-indicate">Edit Employee</p>
        </div>

        <form class="custom-form mt-5" action="/update_employee/{{ $employee->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                            placeholder="John" name="first_name" value="{{ $employee->first_name }}">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                            placeholder="Doe" name="last_name" value="{{ $employee->last_name }}">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control select2" id="company_id" name="company_id">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="example@example.com" name="email" value="{{ $employee->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                placeholder="Phone number" name="phone" value="{{ $employee->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-center">
                <button type="submit" class="btn main-color">Update Employee Record</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
  
            $('#company_id').select2({
            width: '100%', 
            containerCssClass: 'select2-custom-container', 
        });
        });
       
    </script>
@endsection
