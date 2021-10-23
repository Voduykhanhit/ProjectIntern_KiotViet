@extends('admin.layout.index')
@section('title')
    Sản phẩm đối tác
@endsection
@section('content')
    <div class="card mb-4 mt-4">
        <div class="card-header bg-success" style="color:#FFF;">
            <i class="fas fa-table mr-1"></i>
            DANH SÁCH SẢN PHẨM từ link đối tác : {{$link}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;font-size:8pt;">
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $qtt=(int)0; @endphp
                        @foreach($request as $req)
                            @php $qtt++; @endphp
                            @if($qtt<=$quantity) 
                                <tr style="text-align:center;font-size:10pt;">
                                    <td>
                                        @if(isset($code))
                                            @if(empty($code))
                                                @else
                                                    {{$req->code}}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($name))
                                            @if(empty($name))
                                                @else
                                                    {{$req->name}}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($price))
                                            @if(empty($price))
                                                @else
                                                    {{$req->basePrice}}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($images))
                                            @if(empty($images))
                                                @else
                                                    @if(isset($req->images))
                                                        @foreach($req->images as $img)
                                                            <img src="{{$img}}" style="width:80px;" alt=""> <br>
                                                        @endforeach
                                                    @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($cate))
                                            @if(empty($cate))
                                                @else
                                                    {{$req->categoryName}}
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @else
                                    @break
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection