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
    <div class="d-flex justify-content-between align-items-center">
        <p class="page-indicate">Companies Record</p>
        <div style="margin-top:10px;">
            <button class="btn main-color"><i class="fa-solid fa-plus"></i><a href="/add_company" style="color:white"> Add Comapny Record</a></button>
        </div>
    </div>
    
    <div class="row my-4">
        <div class="col-md-12">
            @if(session('add'))
                <div id="successAlert" class="alert alert-success">
                    Company Record has been added successfully!
                </div>
                <script>
                    setTimeout(function(){
                        document.getElementById('successAlert').style.display = 'none';
                    }, 3000);
                </script>
            @endif
            @if(session('delete'))
            <div id="deleteAlert" class="alert alert-success">
                Company Record has been deleted!
            </div>
            <script>
                setTimeout(function(){
                    document.getElementById('deleteAlert').style.display = 'none';
                }, 3000);
            </script>
            @endif

            @if(session('update'))
            <div id="updateAlert" class="alert alert-success">
                Company Record has been Updated!
            </div>
            <script>
                setTimeout(function(){
                    document.getElementById('updateAlert').style.display = 'none';
                }, 3000);
            </script>
            @endif

            <div class="table-responsive ">
                <table class="table table-hover">
                    <thead class="main-color">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $index => $company)
                            <tr>
                                <th scope="row">{{ $companies->firstItem() + $index }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <img style="width:60px;" src="{{ asset('storage/'. $company->logo) }}" alt="Logo">
                                </td>
                                
                                
            
                                <td>
                                    <form action="{{ route('edit_company', ['id' => $company->id]) }}" method="get" style="display: inline;">
                                        <button style="padding: 0px;" type="submit" class="btn btn-link text-primary">
                                            <i class="fa-solid fa-pencil"></i> <!-- Assuming you have Font Awesome included in your project -->
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('delete_company', ['id' => $company->id]) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button style="padding: 0px;" type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i style="padding: 0px;" class="fa-solid fa-trash"></i> <!-- Assuming you have Font Awesome included in your project -->
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $companies->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection

