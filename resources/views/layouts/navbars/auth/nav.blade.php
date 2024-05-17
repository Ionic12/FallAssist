<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                    {{ Request::path() === '/' ? 'Dashboard' : 
                       (Request::path() === 'search-user' ? 'User Management' : 
                       (Request::path() === 'search-contact' ? 'Contact Management' : 
                       (Request::path() === 'devices-management' ? 'Devices Management' : 
                       preg_replace('/[^a-zA-Z]/', ' ', Request::path())))) }}
                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">
                {{ Request::path() === '/' ? 'Dashboard' : 
                   (Request::path() === 'search-user' ? 'User Management' : 
                   (Request::path() === 'search-contact' ? 'Contact Management' : 
                   (Request::path() === 'device-management' ? 'Device Management' : 
                   preg_replace('/[^a-zA-Z]/', ' ', Request::path())))) }}
            </h6>                
        </nav>
    </div>
</nav>
