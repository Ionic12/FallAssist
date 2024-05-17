@extends('layouts.user_type.auth') @section('content')
<div class="row mt-0 mb-5">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0 pt-0 mb-0 mt-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Devices Management</h6>
                    <div class="d-flex">
                        <button id="button" class="btn mt-3 mb-3 ms-2" onclick="window.location.href='devices-add'">{{ 'Add Devices' }}</button>
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
                            <th width="30%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 10px">
                               MAC Address 
                            </th>
                            <th width="25%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="padding-left: 30px">
                               Created at <a href="javascript:void(0);" onclick="toggleSortDirectionCreated('created_at')" class="sort-link"><span class="symbol" id="sortIconCreated">&#x25B2;</span></a>
                            </th>
                            <th width="5%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                        @php $count = 1; @endphp @foreach ($devices as $devices)
                        <tr>
                           <td class="text-center">
                              <p class="text-xs font-weight-bold mb-0" >{{ $count++ }}</p>
                           </td>
                           <td class="text-left" >
                            <p class="text-xs font-weight-bold mb-0" style="text-transform: capitalize">{{ $devices->mac}}</p>
                         </td>
                         <td class="text-center" >
                            <p class="text-xs font-weight-bold mb-0" style="text-transform: capitalize">{{ $devices->created_at}}</p>
                         </td>
                         <td class="text-center">
                            <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" style="color: grey"></i></a>
                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                               <li>
                                  <a>
                                     <form method="POST">
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
    #button{
        background-color: #4a3aff;
        color: white
    }
</style>
@endsection