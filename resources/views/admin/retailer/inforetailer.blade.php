@extends('admin.layout.index')
@section('title')
    Thông tin cửa hàng
@endsection
@section('content')
    <div class="row mt-2">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Tổng danh mục <span class="badge badge-pill badge-light">{{$countctg}}</span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/categories/list-categories')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Tổng số sản phẩm <span class="badge badge-pill badge-light">{{$countpd}}</span> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/product/product-list')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Tổng hóa đơn <span class="badge badge-pill badge-light">{{$countod}}</span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/order/list-order')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Tổng khách hàng <span class="badge badge-pill badge-light">{{$countctm}}</span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/customer/list-customer')}}">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header bg-success" style="color:#fff">
            <i class="fas fa-table mr-1"></i>
            THÔNG TIN CỬA HÀNG
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;font-size:8pt;">
                            <th>Id cửa hàng</th>
                            <th>Tên cửa hàng</th>
                            <th>Ngày tạo cửa hàng</th>
                            <th>Thời hạn sử dụng</th>
                            <th>Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($info as $if) 
                            <tr style="text-align:center;font-size:10pt;">
                                <td>{{$if['retailerId']}}</td>
                                <td>{{$retailer}}</td>
                                <td>{{\Carbon\Carbon::parse($if['createdDate'])->format('d/m/Y H:i:s')}}</td>
                                <td>{{('15 ngày')}}</td>
                                <td>{{$if['address']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection