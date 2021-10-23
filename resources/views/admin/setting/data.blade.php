@extends('admin.layout.index')
    @section('title')
        Trang đồng bộ dữ liệu
    @endsection
@section('content')
    <div class="card mb-4 mt-4">
        <div class="card-header bg-success" style="color:#fff;">
            <i class="fas fa-table mr-1"></i>
                CẤU HÌNH KẾT NỐI <span class="badge badge-success">kết nối đến link đối tác</span>
        </div>
        <div class="card-body">
            
            <form class="mt-2" action="{{url('/setting/data')}}" method="post">
                @csrf
                <div class="form-group row">
                <label for="inputlink" class="col-sm-2 col-form-label">Nhập link đối tác</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="link" value="http://khanhhieu.thuctapoptimus:8080/KiotViet_Api/public/api/products" id="inputlink" required placeholder="Nhập link đối tác">
                    </div>
                    <div class="col-sm-4">
                    <h6 style="font-size:8pt;color:red;">VD: http://khanhhieu.thuctapoptimus:8080/KiotViet_Api/public/api/products</h6>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="client_secret" class="col-sm-2 col-form-label">Client Secret (Mã bảo mật từ đối tác)</label>
                    <div class="col-md-6">
                        <input type="text" name="client_secret" class="form-control" required id="client_secret">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Dữ liệu cung cấp</label>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="name" value="name" />
                                Tên sản phẩm
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="images" value="images" />
                                Hình ảnh
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="code" value="code" />
                                Mã sản phẩm
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="price" value="basePrice" />
                                Giá sản phẩm
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" checked blocked name="categoryName"  value="categoryName" />
                                Danh mục
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Số tin cung cấp</label>
                    <input type="number" required class="form-group" min="1" max="50" name="quantity">
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-network-wired"></i> Kết nối</button>
            </form>                   
        </div>
    </div>
@endsection