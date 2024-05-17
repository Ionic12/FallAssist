@extends('layouts.user_type.auth') @section('content')
<div class="row mt-0 mb-5">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-header pb-0 mb-3">
            <div class="d-flex flex-row justify-content-between">
               <div>
                  <h6 style="margin: 0;">All Telegram Contacts</h6>
               </div>
               <div>
                  <form method="get" action="{{ route('searchContact') }}" class="d-flex">
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
                        <th width="12%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 10px">
                           Phone <a href="javascript:void(0);" onclick="toggleSortDirectionPhone('phone')" class="sort-link"><span class="symbol" id="sortIconPhone">&#x25B2;</span></a>
                        </th>
                        <th width="17%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 10px">
                           Username <a href="javascript:void(0);" onclick="toggleSortDirectionUsername('username')" class="sort-link"><span class="symbol" id="sortIconUsername">&#x25B2;</span></a>
                        </th>
                        <th width="17%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 10px">
                           ID Chat <a href="javascript:void(0);" onclick="toggleSortDirectionID('idchat')" class="sort-link"><span class="symbol" id="sortIconID">&#x25B2;</span></a>
                        </th>
                        <th width="17%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 30px">
                           Created at <a href="javascript:void(0);" onclick="toggleSortDirectionCreated('created_at')" class="sort-link"><span class="symbol" id="sortIconCreated">&#x25B2;</span></a>
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $count = 1; @endphp @foreach ($contacts as $contacts)
                     <tr>
                        <td class="text-center">
                           <p class="text-xs font-weight-bold mb-0" >{{ $count++ }}</p>
                        </td>
                        <td class="text-left" >
                           <p class="text-xs font-weight-bold mb-0" style="text-transform: capitalize">{{ $contacts->name}}</p>
                        </td>
                        <td class="text-left">
                           <a class="button-link" href="tel:{{ $contacts->phone}}"><p class="text-xs font-weight-bold mb-0">{{ $contacts->phone}}</p></a>
                        </td>
                        <td class="text-left" >
                           <a class="button-link" href="https://t.me/{{ $contacts->username }}"><p class="text-xs font-weight-bold mb-0" style="text-transform: capitalize">{{ '@'.(strlen($contacts->username) > 25 ? substr($contacts->username, 0, 25) . '...' : $contacts->username) }}</p></a>
                        </td>
                        <td class="text-left" >
                           <p class="text-xs font-weight-bold mb-0" style="text-transform: capitalize">{{ $contacts->idchat}}</p>
                        </td>
                        <td class="text-center" >
                           <p class="text-xs font-weight-bold mb-0" style="text-transform: capitalize">{{ $contacts->created_at}}</p>
                        </td>
                        <td class="text-center">
                           <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" style="color: grey"></i></a>
                           <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                              <li>
                              <li><a class="dropdown-item border-radius-md" href="{{ route('contact.edit',$contacts->contact_id) }}">Edit</a></li>
                                 <a>
                                    <form action="{{route('contact.destroy', $contacts->contact_id)}}" method="POST">
                                       @csrf
                                       @method("delete")
                                       <button type="submit" class="text-danger dropdown-item">Delete</button>
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
   function toggleSortDirectionPhone(column) {
       toggleSortDirection(column, 'sortIconPhone', 2);
   }
   function toggleSortDirectionUsername(column) {
       toggleSortDirection(column, 'sortIconUsername', 3);
   }
   function toggleSortDirectionID(column) {
       toggleSortDirection(column, 'sortIconID', 4);
   }
   function toggleSortDirectionCreated(column) {
       toggleSortDirection(column, 'sortIconCreated', 5);
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
        } else if (column === 'phone' || column === 'idchat' || column === 'no') {
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
@endsection