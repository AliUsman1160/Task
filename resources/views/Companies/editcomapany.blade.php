@extends('layout.app')

@section('style')
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
            <p class="page-indicate">Edit Company</p>
        </div>

        <form class="custom-form mt-5" action="{{ route('update_company', $company->id) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT') {{-- Use PUT method for update --}}
            
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="XYZ Company" name="name" value="{{ old('name', $company->name) }}"> {{-- Use old() to retain old input or use the existing value --}}
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="xyz@gmail.com" name="email" value="{{ old('email', $company->email) }}"> {{-- Use old() to retain old input or use the existing value --}}
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website"
                            placeholder="XYZ.com" name="website" value="{{ old('website', $company->website) }}"> {{-- Use old() to retain old input or use the existing value --}}
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input class="form-control" name="logo" type="file" id="logo">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
           
            <div class="col-12 mt-3 d-flex justify-content-center">
                <button type="submit" class="btn main-color">Update Company Record</button> {{-- Change button text --}}
            </div>
        </form>
    </div>
@endsection
