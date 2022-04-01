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
                            <th>Tiêu đề</th>
                            <th>Tóm tắt</th>
                            <th>Thể loại</th>
                            <th>Loại tin</th>
                            <th>Số lần xem</th>
                            <th>Nổi bật</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tintuc as $tt )
                        <tr class="odd gradeX" align="center">
                            <td>{{ $tt->id }}</td>
                           <p><td>{{ $tt->TieuDe }}</p>

                                <img width="100px" src="upload/tintuc/{{ $tt->Hinh }}"/>
                            </td>
                            <td>{{ $tt->TomTat }}</td>
                            <td>{{ $tt->loaitin->theloai->Ten }}</td>
                            <td>{{ $tt->loaitin->Ten }}</td>
                            <td>{{ $tt->SoLuotXem }}</td>
                            <td>
                               @if ($tt->NoiBat==0)
                                    {{ 'không' }}
                               @else
                                    {{'có'}}
                               @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{ $tt->id }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{ $tt->id }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
