@extends('layouts.user_type.auth') @section('content')
<div class="row mt-0 mb-5">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-header pb-0 mb-3">
            <div class="d-flex flex-row justify-content-between">
               <div>
                  <h6 style="margin: 0;">All Users</h6>
               </div>
               <div>
                  <form method="get" action="{{ route('searchUser') }}" class="d-flex">
                     <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input id="search" type="text" class="form-control" placeholder="Search" name="search"/>
                     </div>
                     <button type="submit" style="display: none;"></button>
                  </form>
               </div>
            </div>
         </div>
         <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
               <table class="table align-items-center mb-0" id="dataTabel">
                  <thead>
                     <tr>
                        <th width="5%" class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 30px">
                           No <a href="javascript:void(0);" onclick="toggleSortDirectionNo('no')" class="sort-link"><span class="symbol" id="sortIconNo">&#x25B2;</span></a>
                        </th>
                        <th width="15%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 10px">
                           Name <a href="javascript:void(0);" onclick="toggleSortDirectionName('name')" class="sort-link"><span class="symbol" id="sortIconName">&#x25B2;</span></a>
                        </th>
                        <th width="18%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 10px">
                           Email <a href="javascript:void(0);" onclick="toggleSortDirectionEmail('email')" class="sort-link"><span class="symbol" id="sortIconEmail">&#x25B2;</span></a>
                        </th>
                        <th width="10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 10px">
                           Phone <a href="javascript:void(0);" onclick="toggleSortDirectionPhone('phone')" class="sort-link"><span class="symbol" id="sortIconPhone">&#x25B2;</span></a>
                        </th>
                        <th width="10%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 27px">
                           Status <a href="javascript:void(0);" onclick="toggleSortDirectionStatus('status')" class="sort-link"><span class="symbol" id="sortIconStatus">&#x25B2;</span></a>
                        </th>
                        <th width="10%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 30px">
                           Level <a href="javascript:void(0);" onclick="toggleSortDirectionLevel('level')" class="sort-link"><span class="symbol" id="sortIconLevel">&#x25B2;</span></a>
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 30px">
                           Created at <a href="javascript:void(0);" onclick="toggleSortDirectionCreated('created_at')" class="sort-link"><span class="symbol" id="sortIconCreated">&#x25B2;</span></a>
                        </th>
                        <th width="15%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $count = 1; @endphp @foreach ($user as $user)
                     <tr>
                        <td class="text-center">
                           <p class="text-xs font-weight-bold mb-0">{{ $count++ }}</p>
                        </td>
                        <td class="text-left" >
                           <p class="text-xs font-weight-bold mb-0" style="text-transform: capitalize">{{ strlen($user->name) > 25 ? substr($user->name, 0, 25) . '...' : $user->name }}</p>
                        </td>
                        <td class="text-left">
                           <a class="button-link" href="mailto:{{ $user->email}}"><p class="text-xs font-weight-bold mb-0">{{ strlen($user->email) > 35 ? substr($user->email, 0, 35) . '...' : $user->email }}</p></a>
                        </td>
                        <td class="text-left">
                           <a class="button-link" href="tel:{{ $user->phone}}"><p class="text-xs font-weight-bold mb-0">{{ $user->phone}}</p></a>
                        </td>
                        <td class="text-center">
                           <p class="text-xs font-weight-bold mb-0">{{ $user -> setStatus ? 'Active' : 'Inactive'; }}</p>
                        </td>
                        <td class="text-center">
                           <p class="text-xs font-weight-bold mb-0">{{ $user -> setLevel ? 'Admin' : 'User'; }}</p>
                        </td>
                        <td class="text-center">
                           <p class="text-xs font-weight-bold mb-0">{{ $user -> created_at }}</p>
                        </td>
                        <td class="text-center">
                           <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" style="color: grey"></i></a>
                           <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                              <li>
                                 <a>
                                 <?php if($user->setStatus == 1){ ?>
                                 <a href="{{url('/updateStatus',$user->user_id)}}" class="dropdown-item">Disable</a>
                                 <?php }else{ ?>
                                 <a href="{{url('/updateStatus',$user->user_id)}}" class="dropdown-item">Enable</a>
                                 <?php } ?>
                                 </a>
                                 <a>
                                 <?php if($user->setLevel == 1){ ?>
                                 <a href="{{url('/updateLevel',$user->user_id)}}" class="dropdown-item">Set to User</a>
                                 <?php }else{ ?>
                                 <a href="{{url('/updateLevel',$user->user_id)}}" class="dropdown-item">Set to Admin</a>
                                 <?php } ?>
                                 </a>
                                 <a>
                                    <form action="{{route('userDestroy', $user->user_id)}}" method="POST">
                                       @csrf @method("delete")
                                       <button type="submit" class="dropdown-item" style="color: #ea0606;">Delete</button>
                                    </form>
                                 </a>
                              </li>
                           </ul>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
   #search:focus {
   border-color:#4a3aff;
   box-shadow:0 0 0 2px #4a3affa2;
   outline:0
   }
   .button-link{
    text-decoration:none;
    font-weight: bold;
    color: #6c757d;
  }
  .button-link:hover{
    color: #4a3aff;
    text-decoration:none
  }
</style>
<script>
   var sortDirection = 'asc';
   var dataDokumen = $dokumen;
   function toggleSortDirectionNo(column) {
       toggleSortDirection(column, 'sortIconNo', 0);
   }
   function toggleSortDirectionName(column) {
       toggleSortDirection(column, 'sortIconName', 1);
   }
   function toggleSortDirectionEmail(column) {
       toggleSortDirection(column, 'sortIconEmail', 2);
   }
   function toggleSortDirectionPhone(column) {
       toggleSortDirection(column, 'sortIconPhone', 3);
   }
   function toggleSortDirectionStatus(column) {
       toggleSortDirection(column, 'sortIconStatus', 4);
   }
   function toggleSortDirectionLevel(column) {
       toggleSortDirection(column, 'sortIconLevel', 5);
   }
   function toggleSortDirectionCreated(column) {
       toggleSortDirection(column, 'sortIconCreated', 6);
   }
   function toggleSortDirection(column, sortIconId, columnIndex) {
    var sortIcon = document.getElementById(sortIconId);
    var dataTabel = document.getElementById('dataTabel');
    var rows = Array.from(dataTabel.getElementsByTagName('tr')).slice(1);
    if (sortDirection === 'asc') {
        sortDirection = 'desc';
        sortIcon.innerHTML = '&#x25BC;';
    } else {
        sortDirection = 'asc';
        sortIcon.innerHTML = '&#x25B2;';
    }
    rows.sort(function(a, b) {
        var aText = a.getElementsByTagName('td')[columnIndex].textContent;
        var bText = b.getElementsByTagName('td')[columnIndex].textContent;
        if (column === 'created_at') {
            var dateA = new Date(aText);
            var dateB = new Date(bText);
            return sortDirection === 'asc' ? dateA - dateB : dateB - dateA;
        } else if  (column === 'phone' || column === 'no') {
            var valueA = parseInt(aText.replace(/\D/g, ''));
            var valueB = parseInt(bText.replace(/\D/g, ''));
            return sortDirection === 'asc' ? valueA - valueB : valueB - valueA;
        } else {
            // Default sorting (text)
            return sortDirection === 'asc' ? aText.localeCompare(bText) : bText.localeCompare(aText);
        }
    });
    for (var i = 0; i < rows.length; i++) {
        dataTabel.tBodies[0].appendChild(rows[i]);
    }
}
</script>
{{--
<tbody>
   <tr>
      <td class="ps-4">
         <p class="text-xs font-weight-bold mb-0">1</p>
      </td>
      <td>
         <div>
            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
         </div>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Admin</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">admin@softui.com</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Admin</p>
      </td>
      <td class="text-center">
         <span class="text-secondary text-xs font-weight-bold">16/06/18</span>
      </td>
      <td class="text-center">
         <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user"><i class="fas fa-user-edit text-secondary"></i></a>
         <span>
         <i class="cursor-pointer fas fa-trash text-secondary"></i>
         </span>
      </td>
   </tr>
   <tr>
      <td class="ps-4">
         <p class="text-xs font-weight-bold mb-0">2</p>
      </td>
      <td>
         <div>
            <img src="/assets/img/team-1.jpg" class="avatar avatar-sm me-3">
         </div>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Creator</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">creator@softui.com</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Creator</p>
      </td>
      <td class="text-center">
         <span class="text-secondary text-xs font-weight-bold">05/05/20</span>
      </td>
      <td class="text-center">
         <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user"><i class="fas fa-user-edit text-secondary"></i></a>
         <span>
         <i class="cursor-pointer fas fa-trash text-secondary"></i>
         </span>
      </td>
   </tr>
   <tr>
      <td class="ps-4">
         <p class="text-xs font-weight-bold mb-0">3</p>
      </td>
      <td>
         <div>
            <img src="/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
         </div>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Member</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">member@softui.com</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Member</p>
      </td>
      <td class="text-center">
         <span class="text-secondary text-xs font-weight-bold">23/06/20</span>
      </td>
      <td class="text-center">
         <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user"><i class="fas fa-user-edit text-secondary"></i></a>
         <span>
         <i class="cursor-pointer fas fa-trash text-secondary"></i>
         </span>
      </td>
   </tr>
   <tr>
      <td class="ps-4">
         <p class="text-xs font-weight-bold mb-0">4</p>
      </td>
      <td>
         <div>
            <img src="/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
         </div>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Peterson</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">peterson@softui.com</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Member</p>
      </td>
      <td class="text-center">
         <span class="text-secondary text-xs font-weight-bold">26/10/17</span>
      </td>
      <td class="text-center">
         <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user"><i class="fas fa-user-edit text-secondary"></i></a>
         <span>
         <i class="cursor-pointer fas fa-trash text-secondary"></i>
         </span>
      </td>
   </tr>
   <tr>
      <td class="ps-4">
         <p class="text-xs font-weight-bold mb-0">5</p>
      </td>
      <td>
         <div>
            <img src="/assets/img/marie.jpg" class="avatar avatar-sm me-3">
         </div>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Marie</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">marie@softui.com</p>
      </td>
      <td class="text-center">
         <p class="text-xs font-weight-bold mb-0">Creator</p>
      </td>
      <td class="text-center">
         <span class="text-secondary text-xs font-weight-bold">23/01/21</span>
      </td>
      <td class="text-center">
         <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user"><i class="fas fa-user-edit text-secondary"></i></a>
         <span>
         <i class="cursor-pointer fas fa-trash text-secondary"></i>
         </span>
      </td>
   </tr>
</tbody>
--}}
@endsection