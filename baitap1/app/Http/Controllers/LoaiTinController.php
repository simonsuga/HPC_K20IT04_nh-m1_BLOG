<?php

namespace App\Http\Controllers;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
        $loaitin = loaiTin::all();

          return view('admin/loaitin/danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem(){
        $theloai=TheLoai::all();
          return view('admin/loaitin/them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        $request->validate([
            'Ten'=>'required|min:1|max:100|unique:LoaiTin,Ten',
            'TheLoai'=>'required'
        ],[
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải có độ dài từ 1-100 ký tự',
            'Ten.max'=>'Tên loại tin phải có độ dài từ 1-100 ký tự',
            'Ten.unique'=>'Tên loại tin này đã tồn tại',
            'TheLoai.required'=>'Bạn chưa chon thể loại',
        ]);
        $loaitin=new LoaiTin;
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau= changeTitle($request->Ten);
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm thanh công');

    }
    public function getSua($id){
        $theloai=TheLoai::all();
        $loaitin= LoaiTin::find($id);
          return view('admin/loaitin/sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){

        $request->validate([
            'Ten'=>'required|min:1|max:100|unique:LoaiTin,Ten',
            'TheLoai'=>'required'
        ],[
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải có độ dài từ 1-100 ký tự',
            'Ten.max'=>'Tên loại tin phải có độ dài từ 1-100 ký tự',
            'Ten.unique'=>'Tên loại tin này đã tồn tại',
            'TheLoai.required'=>'Bạn chưa chon thể loại',
        ]);
        $loaitin=LoaiTin::find($id);
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau= changeTitle($request->Ten);
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sua thành công');

    }
    public function getXoa($id){
        $loaitin=LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công');
  }
}
