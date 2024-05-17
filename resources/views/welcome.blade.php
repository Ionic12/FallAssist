<div class="row mt-0 mb-4">
   <div class="col-xl-3 col-sm-4 mb-xl-0">
      <div class="card shadow">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Active User</p>
                     <h6 class="font-weight-bolder mb-0">{{ $userCount }}</h6>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                     <i class="fa-solid fa-user fa-xl opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-sm-4 mb-xl-0">
      <div class="card shadow">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Connected Contact</p>
                     <h6 class="font-weight-bolder mb-0">{{ $contactCount }}</h6>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                     <i class="fa-solid fa-address-book fa-xl opacity-10" aria-hidden="true"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row mt-0">
   <div class="col-xl-12">
      <div class="row">
         <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
            <div class="card shadow">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-8">
                        <div class="numbers">
                           <p class="text-sm mb-0 text-capitalize font-weight-bold" id="batt-head">MQTT Server</p>
                           <h6 class="font-weight-bolder mb-0" id="batt-data">Connecting</h6>
                        </div>
                     </div>
                     <div class="col-4 text-end">
                        <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                           <i id="icon1" class="fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
            <div class="card shadow">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-8">
                        <div class="numbers">
                           <p class="text-sm mb-0 text-capitalize font-weight-bold" id="mqtt-head">MQTT Server</p>
                           <h6 class="font-weight-bolder mb-0" id="mqtt-data">Connecting</h6>
                        </div>
                     </div>
                     <div class="col-4 text-end">
                        <div id="background" class="icon icon-shape bg-primary shadow text-center border-radius-md">
                           <i id="icon2" class="fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
            <div class="card shadow">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-8">
                        <div class="numbers">
                           <p class="text-sm mb-0 text-capitalize font-weight-bold" id="temp-head">MQTT Server</p>
                           <h6 class="font-weight-bolder mb-0" id="temp-data">Connecting</h6>
                        </div>
                     </div>
                     <div class="col-4 text-end">
                        <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                           <i id="icon3" class="fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
            <div class="card shadow">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-8">
                        <div class="numbers">
                           <p class="text-sm mb-0 text-capitalize font-weight-bold" id="date">NTP Server</p>
                           <h6 class="font-weight-bolder mb-0" id="clock">Connecting</h6>
                        </div>
                     </div>
                     <div class="col-4 text-end">
                        <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                           <i id="icon4" class="fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-12">
            <div id="alert" class="mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none" style="text-align: justify" role="alert">
               <span class="alert-text text-white text-sm font-weight-bold">Attention : 'No Activity' may indicate that the wearable device is not in use or is offline. If the wearable device was previously in use but still shows 'No Activity' ensure that the device is connected to the internet. Disregard this message if the device is intentionally not in use.</span>
               <button type="button" class="mt-1 btn-close text-white" data-bs-dismiss="alert" aria-label="Close">
               <i class="fa-solid fa-xmark fa-lg" style="color: #ffffff;"></i>
               </button>
            </div>
         </div>
      </div>
      <div class="row mt-4 mb-0 d-none" id="telegram">
         <div class="col-xl-12">
            <div class="card bg-danger z-index-2 shadow">
               <div class="card-body p-3">
                  <div class="text-center text-white">
                     <span class="alert-text text-white text-sm font-weight-bold">Fall detected! Please check on your elderly immediately and offer help if necessary.</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-xl-9">
            <div class="card z-index-2 shadow">
               <div class="card-header pb-0" style="display: flex; align-items: center;">
                  <h6 style="margin: 0;">Activity Statistics</h6>
                  <input type="date" class="text-sm font-weight-bold" id="datePicker" onchange="updateChart()" style="font-family: Open Sans; padding: 5px; margin-left: 10px; border: 1px solid #ccc; border-radius: 5px;">
               </div>
               <div class="card-body p-3">
                  <div class="chart">
                     <canvas id="chart-line" class="chart-canvas" height="325"></canvas>
                  </div>
               </div>
            </div>
            <div class="row mt-4">
               <div class="col-lg-6">
                  <div class="card h-100 shadow">
                     <div class="card-header pb-0 p-3">
                        <div class="row">
                           <div class="col-10 d-flex align-items-center">
                              <h6 class="mb-0">Medical Records</h6>
                           </div>
                           <div class="col-2 text-end">
                              @if ($recordsCount > 0)
                              <a href="/edit-medical-records"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #4A3AFF;"></i></a>
                              @else 
                              <a href="/medical-records"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #4A3AFF;"></i></a> 
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="card-body p-3 pb-0">
                        @if ($recordsCount > 0)
                        <p class="text-sm" style="max-height: 240px;overflow: hidden;text-align:justify">{{ $records->records}}</p>
                        @else
                        <p class="text-sm" style="max-height: 240px;overflow: hidden;text-align:justify">Use this note to record information about the health status or medical history of your parents, especially those that can affect their balance.</p>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="card h-100 shadow">
                     <div class="card-header pb-0 p-3">
                        <div class="row">
                           <div class="col-12 d-flex align-items-center">
                              <h6 class="mb-0">Emergency Contact</h6>
                           </div>
                        </div>
                     </div>
                     <div class="card-body p-3 pb-0">
                        <ul class="list-group mb-2">
                           <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                              <div class="d-flex align-items-center">
                                 <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-md d-flex align-items-center justify-content-center"><i class="fa-solid fa-truck-medical fa-lg"></i></button>
                                 <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Ambulance</h6>
                                    <span class="text-xs">119</span>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center text-danger text-sm font-weight-bold">
                                 <a href="tel:119"><i class="fa-solid fa-phone fa-lg" style="color: #4A3AFF"></i></a>
                              </div>
                           </li>
                           <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                              <div class="d-flex align-items-center">
                                 <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-md d-flex align-items-center justify-content-center"><i class="fa-solid fa-car fa-lg"></i></button>
                                 <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Police</h6>
                                    <span class="text-xs">110</span>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center text-danger text-sm font-weight-bold">
                                 <a href="tel:110"><i class="fa-solid fa-phone fa-lg" style="color: #4A3AFF"></i></a>
                              </div>
                           </li>
                           <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                              <div class="d-flex align-items-center">
                                 <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-md d-flex align-items-center justify-content-center"><i class="fa-solid fa-fire fa-lg"></i></button>
                                 <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Firefighter</h6>
                                    <span class="text-xs">113</span>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center text-danger text-sm font-weight-bold">
                                 <a href="tel:113"><i class="fa-solid fa-phone fa-lg" style="color: #4A3AFF"></i></a>
                              </div>
                           </li>
                           <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                              <div class="d-flex align-items-center">
                                 <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-md d-flex align-items-center justify-content-center"><i class="fa-solid fa-headset fa-lg"></i></button>
                                 <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Emergency Service</h6>
                                    <span class="text-xs">112</span>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center text-danger text-sm font-weight-bold">
                                 <a href="tel:112"><i class="fa-solid fa-phone fa-lg" style="color: #4A3AFF"></i></a>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="card h-100 shadow">
               <div class="card-header pb-0 p-3">
                  <div class="row">
                     <div class="col-10 d-flex align-items-center">
                        <h6 class="mb-0">Connected Contacts</h6>
                     </div>
                     <div class="col-2 text-end">
                        @if ($contactCount <= 5)
                        <a href="/add-connected-contact"><i class="fa-solid fa-user-plus fa-md" style="color: #4A3AFF;"></i></a>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="card-body pb-0 mt-3" style="padding: 0px 5px 20px 16px">
                  <ul class="list-group">
                     @foreach ($contact as $contact)
                     <div id="data-container"></div>
                     <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center" >
                           <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm" style="text-transform: capitalize">
                                 {{ strlen($contact->name) > 15 ? substr($contact->name, 0, 15) . '...' : $contact->name }}
                              </h6>
                              <span class="text-xs">
                              {{ strlen($contact->username) > 15 ? '@' . substr($contact->username, 0, 15) . '...' : '@' . $contact->username }}
                           </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-end dropdown float-lg-end pe-2">
                           <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fa fa-ellipsis-v" style="color: grey"></i>
                           </a>
                           <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                              <li><a class="dropdown-item border-radius-md" href="https://t.me/{{ $contact->username }}">Chat</a></li>
                              <li><a class="dropdown-item border-radius-md" href="{{ route('contact.edit',$contact->contact_id) }}">Edit</a></li>
                              <li>
                                 <a>
                                    <form action="{{route('contact.destroy', $contact->contact_id)}}" method="POST">
                                       @csrf
                                       @method("delete")
                                       <button type="submit" class="text-danger dropdown-item">Delete</button>
                                    </form>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                     @endforeach
                  </ul>
                  @if ($contactCount == 0)
                  <div style="margin-right: 10px;text-align:justify" class="card bg-transparent shadow-xl mt-3">
                     <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 p-3">
                           <div class="d-flex">
                              <div class="d-flex">
                                 <div class="">
                                    <p class="text-white text-xs font-weight-bold mb-0" style="color: white">Add the Telegram contact that will receive emergency notifications before using the sensor.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @else
                  <div style="margin-right: 10px;text-align:justify" class="card bg-transparent shadow-xl mt-3">
                     <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 p-3">
                           <div class="d-flex">
                              <div class="d-flex">
                                 <div class="">
                                    <p class="text-white text-xs font-weight-bold mb-0" style="color: white">Ensure that the connected contacts can receive Telegram notifications after sensor activation, and always ensure that the system operates effectively for classification.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

