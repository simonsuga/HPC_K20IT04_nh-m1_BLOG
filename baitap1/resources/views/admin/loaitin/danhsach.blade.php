@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thể loại /</span> Danh sách</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
            <!-- /.col-lg-12 -->
            @if (session('thongbao'))
            <div class="alert alert-danger">
                {{ session('thongbao') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên loai tin</th>
                        <th>Tên không dấu</th>
                        <th>Thể loại</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loaitin as $lt )
                    <tr class="odd gradeX" align="center">
                        <td>{{ $lt->id }}</td>
                        <td>{{ $lt->Ten }}</td>
                        <td>{{ $lt->TenKhongDau }}</td>
                        <td>{{ $lt->theloai->Ten }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="xoa/{{ $lt->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sua/{{ $lt->id }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>


    @endsection
