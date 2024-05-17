@extends('layouts.user_type.auth')
@section('content')
{{-- @if( auth()->user()->setLevel == 1)
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
@else --}}
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
                        <div id="background1" class="icon icon-shape bg-primary shadow text-center border-radius-md">
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
                        <div id="background2" class="icon icon-shape bg-primary shadow text-center border-radius-md">
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
                        <div id="background3" class="icon icon-shape bg-primary shadow text-center border-radius-md">
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
               <span class="alert-text text-white text-sm font-weight-bold">Attention : 'No Activity' or 'No Data' may indicate that the wearable device is not in use or is offline. If the wearable device was previously in use but still shows 'No Activity' or 'No Data' ensure that the device is connected to the internet. Disregard this message if the device is intentionally not in use.</span>
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
                           <a href="https://t.me/{{ $contact->username }}" class="button-link text-xs font-weight-bold mb-0">{{ strlen($contact->username) > 15 ? '@' . substr($contact->username, 0, 15) . '...' : '@' . $contact->username }}</a>
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
{{-- </div>
@endif --}}
@endsection
@push('dashboard')
<script>
   let timeout1;
   let timeout2;
   let timeout3;
   const clientId = 'mqttjs_' + Math.random().toString(16).substr(2, 8);
   const connectUrl = 'ws://broker.sinaungoding.com:8090/mqtt';
   const client = mqtt.connect(connectUrl, {clientId,clean: false,username: 'uwais',password: 'uw415_4Lqarn1'});
   const topic1 = 'esp32/fallassist/24:62:AB:E6:AA:10/result';
   const topic2 = 'esp32/fallassist/24:62:AB:E6:AA:10/temperature';
   const topic3 = 'esp32/fallassist/24:62:AB:E6:AA:10/battery';
   const icon1 = document.getElementById('icon1');
   const icon2 = document.getElementById('icon2');
   const icon3 = document.getElementById('icon3');
   const icon4 = document.getElementById('icon4');
   const background = document.getElementById('background');
   const alertElement = document.getElementById('alert');
   const dateContainer = document.getElementById('date');
   const headDataContainer = document.getElementById('mqtt-head');
   const mqttDataContainer = document.getElementById('mqtt-data');
   const tempDataContainer = document.getElementById('temp-data');
   const htmpDataContainer = document.getElementById('temp-head');
   const battDataContainer = document.getElementById('batt-data');
   const hbatDataContainer = document.getElementById('batt-head');
   const todays = new Date();
   const formattedDate = `${todays.getFullYear()}-${(todays.getMonth() + 1).toString().padStart(2, '0')}-${todays.getDate().toString().padStart(2, '0')}`;
   const telegram = document.getElementById('telegram');
   const ctx2 = document.getElementById("chart-line").getContext("2d");
   const gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
   const gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
   
   icon1.className = 'fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10';
   icon2.className = 'fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10';
   icon3.className = 'fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10';
   icon4.className = 'fa-solid fa-spinner fa-spin-pulse fa-xl opacity-10';
   background1.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
   background2.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
   background3.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
   alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
   gradientStroke1.addColorStop(1,   'rgba(74, 58, 255, 0.2)');
   gradientStroke1.addColorStop(0.2, 'rgba(72, 72, 176, 0.0)');
   gradientStroke1.addColorStop(0,   'rgba(74, 58, 255, 0)');
   gradientStroke2.addColorStop(1,   'rgba(74, 58, 255, 0.2)');
   gradientStroke2.addColorStop(0.2, 'rgba(72, 72, 176, 0.0)');
   gradientStroke2.addColorStop(0,   'rgba(74, 58, 255, 0)');
   document.getElementById("datePicker").value = formattedDate;
   
   function updateClock() {
      const now = new Date();
      const formattedDateTime = `${now.toLocaleDateString("en-US", { year: "numeric", month: "2-digit", day: "2-digit" }).replace(/\//g, "-")} ${now.toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", second: "2-digit", hour12: false })}`;
      document.getElementById("clock").innerHTML = formattedDateTime;
      icon4.className = 'fa-solid fa-clock fa-xl opacity-10';
      dateContainer.textContent = "Datetime";
   }
   
   function updateChart() {
      const selectedDate = document.getElementById('datePicker').value;
      fetch('/chart?date=' + selectedDate)
      .then(response => response.json())
      .then(data => {
         chart.data.labels = data.labels;
         chart.data.datasets[0].data = data.data;
         chart.update();
      })
      .catch(error => {
         console.log('Error fetching data:', error);
      });
   }
   
   const chart = new Chart(ctx2, {
      type: 'line',
      data: {
         labels: ["Walking", "Standing", "Jogging", "Sitting", "Falling"],
         datasets: [{
            label: 'Total',
            tension: 0,
            borderWidth: 3,
            pointRadius: 2,
            pointStyle: 'circle',
            borderColor: '#4A3AFF',
            backgroundColor: gradientStroke1,
            fill: true,
            data: [0, 0, 0, 0, 0],
            maxBarThickness: 6,
         }]
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            legend: {
               display: false,
            }
         },
         interaction: {
            intersect: false,
            mode: 'index',
         },
         scales: {
            y: {
               beginAtZero: true,
               precision: 0,
               type: 'linear',
               grid: {
                  drawBorder: true,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5]
               },
               ticks: {
                  display: true,
                  padding: 10,
                  color: '#b2b9bf',
                  font: {
                     size: 11,
                     family: "Open Sans",
                     style: 'normal',
                     lineHeight: 2
                  },
               }
            },
            x: {
               grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderDash: [5, 5]
               },
               ticks: {
                  display: true,
                  color: '#b2b9bf',
                  padding: 20,
                  font: {
                     size: 11,
                     family: "Open Sans",
                     style: 'normal',
                     lineHeight: 2
                  },
               }
            },
         },
      },
   });
   
   function showAndHideAlert() {
      const telegramElement = document.getElementById('telegram');
      telegramElement.classList.remove('d-none');
      setTimeout(() => {
         telegramElement.classList.add('d-none');
      }, 10000);
   }
   
   client.on('connect', () => {
      icon1.className = 'fa-solid fa-check fa-xl opacity-10'
      icon2.className = 'fa-solid fa-check fa-xl opacity-10'
      icon3.className = 'fa-solid fa-check fa-xl opacity-10'
      mqttDataContainer.textContent = "Connected";
      tempDataContainer.textContent = "Connected";
      battDataContainer.textContent = "Connected";
      client.subscribe([topic1], () => {
         client.on('message', (receivedTopic, payload) => {
            clearTimeout(timeout1);
            if (receivedTopic === topic1) {
               const receivedMessage = payload.toString();
               mqttDataContainer.textContent = receivedMessage;
               headDataContainer.textContent = "Activity";
               if (receivedMessage.toLowerCase() === 'walking') {
                  icon2.className = 'fa-solid fa-person-walking fa-xl opacity-10';
                  background2.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
                  alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
               } else if (receivedMessage.toLowerCase() === 'standing') {
                  icon2.className = 'fa-solid fa-person fa-xl opacity-10';
                  background2.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
                  alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
               } else if (receivedMessage.toLowerCase() === 'jogging') {
                  icon2.className = 'fa-solid fa-person-running fa-xl opacity-10';
                  background2.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
                  alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
               } else if (receivedMessage.toLowerCase() === 'sitting') {
                  icon2.className = 'fa-solid fa-person-praying fa-xl opacity-10';
                  background2.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
                  alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
               } else if (receivedMessage.toLowerCase() === 'falling') {
                  icon2.className = 'fa-solid fa-triangle-exclamation fa-xl opacity-10';
                  background2.className = 'icon icon-shape bg-danger shadow text-center border-radius-md';
                  alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
                  showAndHideAlert();
               } else {
                  icon2.className = 'fa-solid fa-triangle-exclamation fa-xl opacity-10';
                  background2.className = 'icon icon-shape bg-warning shadow text-center border-radius-md';
                  alertElement.className = 'mt-4 mb-0 alert shadow bg-warning alert-dismissible fade show d-inline-flex';
               }
            }
         });
         timeout1 = setTimeout(() => {
            headDataContainer.textContent = "Activity";
            mqttDataContainer.textContent = "No Data";
            icon2.className = 'fa-solid fa-triangle-exclamation fa-xl opacity-10';
            background2.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
            alertElement.className = 'mt-4 mb-0 alert shadow bg-warning alert-dismissible fade show d-inline-flex';
         }, 90 * 1000);
      });
      
      client.subscribe([topic2], () => {
         client.on('message', (receivedTopic, payload) => {
            clearTimeout(timeout2);
            if (receivedTopic === topic2) {
               const receivedMessage = payload.toString();
               const colonIndex = receivedMessage.indexOf(':');
               if (colonIndex !== -1) {
                  const temperaturePart = receivedMessage.slice(colonIndex + 1).trim();
                  const temperature = parseFloat(temperaturePart);
                  const roundedTemperature = temperature.toFixed();
                     tempDataContainer.textContent = roundedTemperature + "°C";
                     htmpDataContainer.textContent = "Temperature";
                     background3.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
                     icon3.className = 'fa-solid fa-temperature-three-quarters fa-xl opacity-10'
                     alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
               }
            }
         });
         timeout2 = setTimeout(() => {
            tempDataContainer.textContent = "No Data";
            htmpDataContainer.textContent = "Temperature";
            background3.className = 'icon icon-shape bg-warning shadow text-center border-radius-md';
            icon3.className = 'fa-solid fa-triangle-exclamation fa-xl opacity-10';
            alertElement.className = 'mt-4 mb-0 alert shadow bg-warning alert-dismissible fade show d-inline-flex';
         }, 8 * 1000);
      });
      
      client.subscribe([topic3], () => {
         client.on('message', (receivedTopic, payload) => {
            clearTimeout(timeout3);
            if (receivedTopic === topic3) {
               const receivedMessage = payload.toString();
               const colonIndex = receivedMessage.indexOf(':');
               if (colonIndex !== -1) {
                  const batteryPart = receivedMessage.slice(colonIndex + 1).trim();
                  const battery = parseFloat(batteryPart);
                  const roundedBattery = battery.toFixed();
                  battDataContainer.textContent = roundedBattery + "%";
                  hbatDataContainer.textContent = "Battery";
                  background1.className = 'icon icon-shape bg-primary shadow text-center border-radius-md';
                  if (roundedBattery <= 25) {
                     icon1.className = 'fa-solid fa-battery-quarter fa-rotate-270 fa-xl opacity-10'
                  }
                  else if (roundedBattery > 25 && roundedBattery <= 50) {
                     icon1.className = 'fa-solid fa-battery-half fa-rotate-270 fa-xl opacity-10'
                  }
                  else if (roundedBattery > 50 && roundedBattery <= 75) {
                     icon1.className = 'fa-solid fa-battery-three-quarters fa-rotate-270 fa-xl opacity-10'
                  }
                  else if (roundedBattery > 75 && roundedBattery <= 99) {
                     icon1.className = 'fa-solid fa-battery-full fa-rotate-270 fa-xl opacity-10'
                  }
                  else if (roundedBattery == 100) {
                     icon1.className = 'fa-solid fa-battery-full fa-rotate-270 fa-xl opacity-10'
                  }
                  else{
                     icon1.className = 'fa-solid fa-battery-empty fa-rotate-270 fa-xl opacity-10'
                  }
                  alertElement.className = 'mt-4 mb-0 alert bg-warning alert-dismissible fade show d-none';
               }
            }
         });
         timeout3 = setTimeout(() => {
            battDataContainer.textContent = "No Data";
            hbatDataContainer.textContent = "Battery";
            background1.className = 'icon icon-shape bg-warning shadow text-center border-radius-md';
            icon1.className = 'fa-solid fa-triangle-exclamation fa-xl opacity-10';
            alertElement.className = 'mt-4 mb-0 alert shadow bg-warning alert-dismissible fade show d-inline-flex';
         }, 8 * 1000);
      });
   });
   setInterval(updateChart, 1000);
   setInterval(updateClock, 1000);
</script>   
@endpush