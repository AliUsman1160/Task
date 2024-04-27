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
            <p class="page-indicate">Add Company</p>
        </div>

        <form class="custom-form mt-5" action="/store_company" method="post" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="XYZ Company" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="mail" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="xyz@gmail.com" name="email" email="email" value="{{ old('email') }}">
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
                            placeholder="XYZ.com" name="website" website="website" value="{{ old('website') }}">
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
                <button type="submit" class="btn main-color">Store Comapny Record</button>
            </div>
        </div>
        </form>
    </div>
@endsection

