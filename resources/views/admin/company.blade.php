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

     <div class="mb-3">
       <button class="btn btn-primary fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
         Add Company
       </button>

       <form action="#" method="post">
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
                       <input type="text" name="company_code" id="companyCode" class="form-control"
                         placeholder="Company Code">
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
                       <input type="text" name="company_name" id="companyName" class="form-control"
                         placeholder="Company Name">
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
           <tr>
             <td></td>
             <td></td>
             <td></td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
 </div>
 @include('layouts.footer')
