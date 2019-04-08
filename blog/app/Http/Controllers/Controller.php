<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Loaitin;
use App\Baiviet;
class Controller extends BaseController
{
	public function getLogin(){
		return view('login');
	}


	public function postLogin(Request $req){
        
		$user = $req->input('txt_user');
		$pass = $req->input('txt_pass');
		$data = User::where('name','=',$user)->where('password','=',$pass)->get();
        
		if(count($data)>0){
			return redirect('theloai');
		}
		else{
			return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
		}
    }

	public function getLoaitin(){
		$loaitin = Loaitin::all();
		return view('quantri3',['loaitin'=>$loaitin]);
	}
	public function getTheloai(){
		$theloai = Baiviet::all();
		return view('quantri2',['theloai'=>$theloai]);
	}
	public function getXoa($id){
		$loaitin = Loaitin::find($id);
		$loaitin->delete();	
		return redirect('quantri3');
	}
	public function getTintuc($id){
		$tintuc = Baiviet::where('idloaitin',$id)->get();
		return view('quantri4',['tintuc'=>$tintuc]);
	}
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
