<?php

namespace App\Http\Controllers;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\function\function;
class TheLoaiController extends Controller
{
    public function getDanhSach(){
        $theloai=theloai::all();
          return view('admin/theloai/danhsach',['theloai'=>$theloai]);
    }
    public function getThem(){
        return view('admin/theloai/them');
    }
    public function postThem(Request $request){
        $request->validate([
            'Ten'=>'required|min:6|max:100|unique:TheLoai,Ten',
        ],[
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.min'=>'Tên thể loại phải có độ dài từ 6-100 ký tự',
            'Ten.max'=>'Tên thể loại phải có độ dài từ 6-100 ký tự',
            'Ten.unique'=>'Tên thể loaị này đã tồn tại',
        ]);
        $theloai=new TheLoai;
        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau= changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thanh công');

    }
    public function getSua($id){
          $theloai=TheLoai::find($id);
          return view('admin/theloai/sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $theloai= TheLoai::find($id);
        $request->validate([
            'Ten'=>'required|unique:TheLoai,Ten|min:6|max:100',
        ],[
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.unique'=>'Tên thể loaị này đã tồn tại',
            'Ten.min'=>'Tên thể loại phải có độ dài từ 6-100 ký tự',
            'Ten.max'=>'Tên thể loại phải có độ dài từ 6-100 ký tự',
        ]);
        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau= changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    public function getXoa($id){
        $theloai=TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công');
  }
}
