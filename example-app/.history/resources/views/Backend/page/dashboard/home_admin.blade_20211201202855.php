@extends('Backend.layout_admin')

@section('conten.admin')
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Today Expenses </div>
                        <div class="stat-digit"> 8500</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Income Detail</div>
                        <div class="stat-digit"> 7800</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Task Completed</div>
                        <div class="stat-digit">  500</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Task Completed</div>
                        <div class="stat-digit"> 650</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div> --}}
        <!-- /# column -->
    </div>
    <div class="row">
        {{-- <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project</h4>
                </div>
                <div class="card-body">
                    <div class="current-progress">
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Website</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-40" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                40%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Android</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-60" role="progressbar"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                60%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Ios</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-70" role="progressbar"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Mobile</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-90" role="progressbar"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                90%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Orders</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img width="35" src="./images/avatar/1.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-xxl-6 col-lg-6 col-md-12">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-facebook">
                            <span class="s-icon"><i class="fa fa-facebook"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k
                                    </h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k
                                    </h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-googleplus">
                            <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k
                                    </h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k
                                    </h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">?????a ??i???m</h4>
                </div>
                <div class="card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1835.9993542384136!2d106.63472016117058!3d10.846604874036151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529809630bdb9%3A0x21c165d4ca1c1e42!2zR2FsYXh5IENpbmVtYSBOZ3V54buFbiBWxINuIFF1w6E!5e0!3m2!1svi!2s!4v1638365286261!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
