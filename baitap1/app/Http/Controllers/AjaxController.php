<?php

namespace App\Http\Controllers;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
        $loaitin=LoaiTin::where('idTheLoai',$idTheLoai)->get();
        foreach($loaitin as$lt)
        {
           echo " <option value='".$lt->id." '>". $lt->Ten."</option>";
        }
    }
}
