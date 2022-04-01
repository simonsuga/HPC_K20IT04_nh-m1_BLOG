<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDanhSach(){
        $user=User::all();
          return view('admin/user/danhsach',['user'=>$user]);
    }
    public function getThem(){
        return view('admin/user/them');
    }
    public function postThem(Request $request){
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:32',
            'passwordAgain'=>'required|same:password',
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng ',
            'name.min'=>'Tên người dùng phải ít nhất 6 kí tự',
            'email.required'=>'Bạn chưa nhập email ',
            'email.unique'=>' email đã tồn tại ',
            'password.required'=>'Bạn chưa nhập mật khẩu ',
            'password.min'=>' mật khẩu phải có ít nhất 8 kí tự',
            'password.max'=>' mật khẩu chỉ tối đa 32 kí tự ',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu ',
            'passwordAgain.same'=>' mật khẩu nhập lại chưa khớp ',
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->quyen=$request->quyen;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thanh công');

    }
    public function getSua($id){
        $user=User::find($id);
          return view('admin/user/sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id){
        $request->validate([
            'name'=>'required|min:3',
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng ',
            'name.min'=>'Tên người dùng phải ít nhất 6 kí tự',
        ]);
        $user=User::find($id);
        $user->name=$request->name;
        $user->quyen=$request->quyen;
        if($request->changePassword=="on"){
            $request->validate([
                'password'=>'required|min:6|max:32',
                'passwordAgain'=>'required|same:password',
            ],[
                'password.required'=>'Bạn chưa nhập mật khẩu ',
                'password.min'=>' mật khẩu phải có ít nhất 8 kí tự',
                'password.max'=>' mật khẩu chỉ tối đa 32 kí tự ',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu ',
                'passwordAgain.same'=>' mật khẩu nhập lại chưa khớp ',
            ]);
            $user->password=bcrypt($request->password);
        }
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thanh công');
    }
    public function getXoa($id){
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }
    public function getdangnhapAdmin(){
        return view('admin/login');
    }
    public function postdangnhapAdmin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:6|max:32',
        ],[
            'email.required'=>'Bạn chưa nhập email ',
            'password.required'=>'Bạn chưa nhập mật khẩu ',
            'password.min'=>' mật khẩu phải có ít nhất 8 kí tự',
            'password.max'=>' mật khẩu chỉ tối đa 32 kí tự ',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect(('admin/theloai/danhsach'));
        }else{
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại');
        }
    }
    public function getdangxuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
