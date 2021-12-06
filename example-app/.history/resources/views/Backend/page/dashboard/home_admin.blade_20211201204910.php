@extends('Backend.layout_admin')

@section('conten.admin')
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Số ghế/vé đã được đặt</div>
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
                        <div class="stat-text">Lợi nhuận hôm nay</div>
                        <div class="stat-digit"> {{ $sumPriceOneDay }}</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary  w-{{ $sumPriceOneDay/$sumPrice  }}" role="progressbar"
                            aria-valuenow="{{ $sumPriceOneDay }}"
                            aria-valuemin="0" aria-valuemax="{{ $sumPrice }}"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">


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

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Địa điểm</h4>
                </div>
                <div class="card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1835.9993542384136!2d106.63472016117058!3d10.846604874036151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529809630bdb9%3A0x21c165d4ca1c1e42!2zR2FsYXh5IENpbmVtYSBOZ3V54buFbiBWxINuIFF1w6E!5e0!3m2!1svi!2s!4v1638365286261!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
