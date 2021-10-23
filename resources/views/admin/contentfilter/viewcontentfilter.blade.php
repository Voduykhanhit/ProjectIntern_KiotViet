@extends('admin.layout.index')
    @section('title')
        Trang nội dung
    @endsection
@section('content')
    <div class="card mb-4 mt-4">
        <div class="card-header bg-success" style="color:#fff;">
            <i class="fas fa-table mr-1"></i>
                CONTENT FILTER <span class="badge badge-success">Đưa dữ liệu vào file json</span>
        </div>
        <div class="card-body">
            <span class="badge badge-warning">Ghi chú: Bạn hãy sao chép một văn bản và đưa nó vào sau đó click chuột vào từ khóa bạn muốn ghi chú.</span> <br>
            <form class="mt-2" action="{{url('/contentfilter/postContent')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Văn bản mẫu</label> 
                    <textarea class="md-textarea form-control" name="content" id="content" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Nhập dữ liệu</label>
                </div>
                <div class="row" id="data"></div>
                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Lưu vào file Json</button>
            </form>                   
        </div>
    </div>
@endsection
@section('script')
    <script>
            $(document).ready(function(){
                $("textarea").select(function(){
                    var text = "";
                    if (window.getSelection) {
                        text = window.getSelection().toString();
                    } else if (document.selection && document.selection.type != "Control") {
                        text = document.selection.createRange().text;
                    }
                    $('#data').append('<input type="text" name="key[]" placeholder="Key" class="form-control col-md-4 mt-2 mb-2 ml-2"/> <input type="text" name="value[]" data-id="[]" value="'+text+'" placeholder="value"  class="form-control col-md-4 mt-2 mb-2 ml-2">');
                })
            })
    </script>
@endsection