@extends('layout/mainlayout')

@section('page-content')
    {{-- <div class="zubuz-breadcrumb">
        <div class="container">
            <h1 class="post__title">Our Apps</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{route('DrongoERP.home')}}">Home</a></li>
                    <li aria-current="page"> Our Apps</li>
                </ul>
            </nav>

        </div>
    </div> --}}

    <div class="container text-center" style="margin-top: 100px; margin-bottom: 200px;">

        <div class="d-flex flex-wrap gap-5 justify-content-center">
            
            <a href="{{ route('DrongoERP.appsDetail', 1)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center">
                  <div class="mb-3">
                    <img src="{{asset("images/apps_logo/Library-1.svg")}}" width="60px" height="60px" />
                  </div>
                  <h5 class="card-title mb-0">Products</h5>
                </div>
            </a>
          
            <a href="{{ route('DrongoERP.appsDetail', 2)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Shop-Bag.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Sales</h5>
              </div>
            </a>
          
            <a href="{{ route('DrongoERP.appsDetail', 3)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center">
                  <div class="mb-3">
                    <img src="{{asset("images/apps_logo/Medical.svg")}}" width="60px" height="60px" />
                  </div>
                  <h5 class="card-title mb-0">Medical Center</h5>
                </div>
            </a>
          
            <a href="{{ route('DrongoERP.appsDetail', 4)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center">
                  <div class="mb-3">
                    <img src="{{asset("images/apps_logo/Grad.svg")}}" width="60px" height="60px" />
                  </div>
                  <h5 class="card-title mb-0">LMS</h5>
                </div>
            </a>
          
            <a href="{{ route('DrongoERP.appsDetail', 5)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center">
                  <div class="mb-3">
                    <img src="{{asset("images/apps_logo/Relationships.svg")}}" width="60px" height="60px" />
                  </div>
                  <h5 class="card-title mb-0">Relationships</h5>
                </div>
            </a>
          
            <a href="{{ route('DrongoERP.appsDetail', 6)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center">
                  <div class="mb-3">
                    <img src="{{asset("images/apps_logo/Manufacturing.svg")}}" width="60px" height="60px" />
                  </div>
                  <h5 class="card-title mb-0">Manufacturing</h5>
                </div>
            </a>
          
            <a href="{{ route('DrongoERP.appsDetail', 7)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center">
                  <div class="mb-3">
                    <img src="{{asset("images/apps_logo/Book.svg")}}" width="60px" height="60px" />                  </div>
                  <h5 class="card-title mb-0">Projects</h5>
                </div>
            </a>
          
            <a href="{{ route('DrongoERP.appsDetail', 8)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center">
                  <div class="mb-3">
                    <img src="{{asset("images/apps_logo/Tickets.svg")}}" width="60px" height="60px" />
                  </div>
                  <h5 class="card-title mb-0">Tickets</h5>
                </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 9)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Full-Cart.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Purchases</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 10)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Megaphone.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Marketing</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 11)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Library.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">HRM</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 12)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Book.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Knowledge Base</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 13)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Document-Award.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Documentations</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 14)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Book.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Meeting</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 15)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Car.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Fleet Management</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 16)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Coins.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Accounting</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 17)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Relationships.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">CRM</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 18)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Message.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Messaging</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 19)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Home.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Property</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 20)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Grad.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">School</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 21)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Library-1.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Services</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 22)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Bar-Chart-Empty.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Notice Board</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 23)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Packages.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Warehouse</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 24)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Transfers.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Transfer</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 25)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Expense.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Expenses</h5>
              </div>
            </a>

            <a href="{{ route('DrongoERP.appsDetail', 26)}}" class="card text-center p-3 text-black" style="width: 15rem; height: 15rem;">
              <div class="card-body d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <img src="{{asset("images/apps_logo/Bar-Chart.svg")}}" width="60px" height="60px" />
                </div>
                <h5 class="card-title mb-0">Dashboard</h5>
              </div>
            </a>
        </div>
    </div>
      
@endsection