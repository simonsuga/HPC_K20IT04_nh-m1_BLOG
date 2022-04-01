@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <hr/>
                <h1 class="page-header">User
                    <small>{{ $user->name }}</small>
                </h1>
            <hr/>
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
                <form action="{{ $user->id }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label>Họ tên</label>
                <input class="form-control" name="name" placeholder="Nhập tên  " value="{{ $user->name }}"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                <input class="form-control" name="email" placeholder="Nhập tên email " value="{{ $user->email}} readonly=""/>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="changePassword" id="changePassword" >
                    <label>Đổi lại Password</label>

                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu"  disabled=""/>
                </div>

                <div class="form-group">
                    <label>Nhập lại Password</label>
                <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled=""/>
                </div>
                <div class="form-group">
                    <label>Phân quyền</label>
                    <label class="radio-inline">
                        <input  name="quyen" value="0"
                        @if($user->quyen==0)
                             {{ "checked" }}
                        @endif
                        type="radio" />Thường
                    </label>
                    <label class="radio-inline">
                        <input  name="quyen" value="1"
                        @if($user->quyen==1)
                        {{ "checked" }}
                        @endif
                         type="radio" />Admin
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection

@section('script')
     <script>
         $(document).ready(function(){
             $("#changePassword").change(function(){
                 if($(this).is(":checked"){
                     $(".password").removeAttr('disabled');
                 }else{
                     $(".password").attr('disable','');
                 }
                 });
         });
     </script>
    </br></br></br></br></br></br></br></br></br>
@endsection
