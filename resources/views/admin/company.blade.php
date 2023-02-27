 @include('layouts.header', ['title' => 'COMPANY'])
 @include('layouts.admin_navbar')
 <!-- COMPANY LIST -->
 <div class="container-fluid mt-5">
   <div class="container shadow p-3 mb-5 bg-body-rounded">

     @if (session()->has('success'))
     <div class="alert alert-success">
       {{ session('success') }}
     </div>
     @endif

     @if (session()->has('deleted'))
     <div class="alert alert-danger">
       {{ session('deleted') }}
     </div>
     @endif

     @if (session()->has('updated'))
     <div class="alert alert-warning">
       {{ session('updated') }}
     </div>
     @endif

     <div class="mb-3">
       <button class="btn btn-primary fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
         Add Company
       </button>

       <form action="/company/store" method="post">
         @csrf
         <div class="modal fade" id="addModal">
           <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">Create Company</h5>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <div class="col-12">
                     <div class="mb-3 form-floating">
                       <input type="text" name="company_code" id="companyCode" class="form-control" placeholder="Company Code">
                       <label for="companyCode">Company Code</label>
                       @error('company_code')
                       <span class="text-danger">
                         {{ $message }}
                       </span>
                       @enderror
                     </div>
                   </div>
                   <div class="col-12">
                     <div class="mb-3 form-floating">
                       <input type="text" name="company_name" id="companyName" class="form-control" placeholder="Company Name">
                       <label for="companyName">Company Name</label>
                       @error('company_name')
                       <span class="text-danger">
                         {{ $message }}
                       </span>
                       @enderror
                     </div>
                   </div>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="submit" class="btn btn-primary fw-bold">Create</button>
               </div>
             </div>
           </div>
         </div>
       </form>
     </div>


     <div class="table-responsive">
       <table class="table table-hover table-striped" id="myTable">
         <thead>
           <tr>
             <th>Company Code:</th>
             <th>Company Name:</th>
             <th>Actions:</th>
           </tr>
         </thead>
         <tbody>
           @foreach($company as $rowCompany)
           <tr>
             <td>{{ strtoupper($rowCompany->company_code) }}</td>
             <td>{{ $rowCompany->company_name }}</td>
             <td>
               <div class="d-inline-block">
                 <button class="btn btn-warning fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#editModal-{{ $rowCompany->id }}">
                   <i class="fa-solid fa-pen-to-square"></i>
                 </button>

                 <form action="/company/{{ $rowCompany->id }}" method="post">
                   @csrf
                   @method('put')
                   <div class="modal fade" id="editModal-{{ $rowCompany->id }}">
                     <div class="modal-dialog modal-dialog-centered">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title">Update Company</h5>
                         </div>
                         <div class="modal-body">
                           <div class="row">
                             <div class="col-12">
                               <div class="mb-3 form-floating">
                                 <input type="text" name="company_code" id="companyCode" class="form-control" placeholder="Enter Company Code" value="{{ $rowCompany->company_code }}">
                                 <label for="companyCode">Enter Company Code</label>
                               </div>
                             </div>
                             <div class="col-12">
                               <div class="mb-3 form-floating">
                                 <input type="text" name="company_name" id="companyName" class="form-control" placeholder="Enter Company Name" value="{{ $rowCompany->company_name }}">
                                 <label for="companyName">Enter Company Name</label>
                               </div>
                             </div>
                           </div>
                         </div>
                         <div class="modal-footer">
                           <button type="submit" class="btn btn-primary fw-bold">Update</button>
                         </div>
                       </div>
                     </div>
                   </div>
                 </form>
               </div>
               <div class="d-inline-block">
                 <button class="btn btn-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $rowCompany->id }}">
                   <i class="fa-solid fa-trash"></i>
                 </button>

                 <form action="/company/{{ $rowCompany->id }}" method="post">
                   @csrf
                   @method('delete')
                   <div class="modal fade" id="deleteModal-{{ $rowCompany->id }}">
                     <div class="modal-dialog modal-dialog-centered">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title">Are you sure you want to delete?</h5>
                         </div>
                         <div class="modal-footer">
                           <button class="btn btn-danger fw-bold" type="submit">Delete</button>
                         </div>
                       </div>
                     </div>
                   </div>
                 </form>
               </div>
             </td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>
   </div>
 </div>
 @include('layouts.footer')
