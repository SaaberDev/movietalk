@extends("backend.admin-panel.layouts.main")
@section('body')
    <div class="panel-header panel-header-sm">
    </div>
<div class="content">
    <div class="row">
        {{-- Card One Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Visitors</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card One End --}}

        {{-- Card Two Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Total User</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card Two End --}}

        {{-- Card Three Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Active Now</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card Three End --}}

        {{-- Card Four Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Total Blog</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card Four End --}}
    </div>

    <div class="row">
        {{-- Card Four Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Pending User Request</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card Four End --}}

        {{-- Card Four Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Banned Users</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card Four End --}}
    </div>

    <div class="row">
        {{-- Card Four Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Total Categories</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card Four End --}}

        {{-- Card Four Start --}}
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex" style="margin-top: 30px; margin-bottom: 30px;">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Banned Users</span>
                            <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user()->count()}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- Card Four End --}}
    </div>
</div>
@endsection
