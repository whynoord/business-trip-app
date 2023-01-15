<div class="d-flex flex-column bg-white sidebar">
    <div class="p-3">
        <img src="/img/logo.jpg" alt="" class="img-fluid" style="width: 150px">
    </div>
    <div class="p-3">{{ \Auth::user()->role == 'hrd' ? 'HRD' : 'Employee' }}</div>
    <a href="{{ route('myBusinessTrip') }}">
        <div class="p-3 box {{ \Auth::user()->role == 'hrd' ? 'd-none' : '' }}">
            <i class="bi bi-stack"></i> My Business Trip
        </div>
    </a>
    <a href="{{ route('submission') }}">
        <div class="p-3 box {{ \Auth::user()->role == 'employee' ? 'd-none' : '' }}">
            <i class="bi bi-stack"></i> Business Trip Submission
        </div>
    </a>
    <a href="{{ route('cityMaster') }}">
        <div class="p-3 box {{ \Auth::user()->role == 'employee' ? 'd-none' : '' }}">
            <i class="bi bi-stack"></i> City Master
        </div>
    </a>
</div>