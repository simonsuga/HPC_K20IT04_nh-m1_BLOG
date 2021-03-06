@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            </hr>
                <h1 class="page-header">Slide
                    <small>Thêm</small>
                </h1>
            </hr>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ( $errors->all() as $err )
                        {{ $err }}<br>
                    @endforeach
                </div>
                @endif

                @if (session('thongbao'))
                    <div class="alert alert-danger">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <div class="form-group">
                        <label>Ten</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tên tiêu đề " />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="5" name="NoiDung"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" placeholder="Nhập link " />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                         <input type="file" name="Hinh" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</br></br></br></br></br></br></br></br>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
        $("#TheLoai").change(function(){
            var idTheLoai=$(this).val();
            $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                $("#LoaiTin").html(data);
            });
        });
    });
   </script>
@endsection
