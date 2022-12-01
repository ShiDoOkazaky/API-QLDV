<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donvi;
use App\Http\Resources\DonviResource;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class DonviController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return  DonviResource::collection(Donvi::paginate(4));

        // $keywords = null;

        // $users = new quanly_donvi_api;

        // if(!empty($request->keywords)){
        //     $keywords = $request->keywords;
        // }

        // $usersList = $this->users->getAllUsers($keywords);
       

        // return view('quanly-donvi-crud', compact('usersList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return view('add-donvi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

    // $rule = array(
    //     "name"=>"required",
    //     "loaidonvi"=>"required",
    //     "description"=>"required",
    //     "address"=>"required",
    //     "webside"=>"required",
    //     "phone"=>"required|digits:10",
    //     "email"=>"required|email",
    //     "fax"=>"required|numeric"
    // );
    // $message = array(
    //         'name.required' => 'Bắt buộc phải nhập tên',
    //         'address.required' => 'Bắt buộc phải nhập địa chỉ',
    //         'webside.required' => 'Bắt buộc phải nhập webside',
    //         'phone.required' => 'Bắt buộc phải nhập số điện thoại',
    //         'phone.digits' => 'Số điện thoại phải là số và từ 10 ký tự trở lên',
    //         'phone.unique' => 'Số điện thoại đã trùng',
    //         'email.required' => 'Bắt buộc phải nhập email',
    //         'email.email' => 'Email không đúng định dạng',
    //         'email.unique' => 'Email đã trùng',
    //         'fax.required' => 'Bắt buộc phải nhập số Fax',
    //         'fax.numeric' => 'Fax phải là số',
    //         'fax.unique' => 'Số Fax đã trùng'
    // );
    // $validator = Validator::make($request->all());
    //     if ($validator->fails()){
    //         return response()->json([
    //             "message" => "Vui lòng kiểm tra lại",
    //             "data" => $validator->errors()
    //         ]);
    //     }else{
    //     $donvi = Donvi::create($request->all()); 
    //       return response()->json([
    //         "message" => "Thêm thành công",
    //         "data" => $donvi
    //       ]);
    //     }
    // $validator = Validator::make($request->all(),$rule,$message);
    //     if ($validator->fails()){
    //         return redirect()->route('add')->with('msg','Thêm thất bại');
    //     }else{
    //     $quanly_donvi = quanly_donvi_api::create($request->all()); 
    //         return redirect()->route('index')->with('msg','Thêm người dùng thành công');
    //     }
    $request->validate([
        'name'=>'required',
        'address'=>'required',
        'webside'=>'required',
        'phone'=>'required|digits:10|unique:donvi',
        'email'=>'required|email|unique:donvi',
        'fax'=>'required|numeric|unique:donvi'
    ],[
        'name.required' => 'Bắt buộc phải nhập tên',
        'address.required' => 'Bắt buộc phải nhập địa chỉ',
        'webside.required' => 'Bắt buộc phải nhập webside',
        'phone.required' => 'Bắt buộc phải nhập số điện thoại',
        'phone.digits' => 'Số điện thoại phải là số và từ 10 ký tự trở lên',
        'phone.unique' => 'Số điện thoại đã trùng',
        'email.required' => 'Bắt buộc phải nhập email',
        'email.email' => 'Email không đúng định dạng',
        'email.unique' => 'Email đã trùng',
        'fax.required' => 'Bắt buộc phải nhập số Fax',
        'fax.numeric' => 'Fax phải là số',
        'fax.unique' => 'Số Fax đã trùng'
    ]);
    // $validator = Validator::make($request->all());
    //     if ($validator->fails()){
    //         return response()->json([
    //             "message" => "Vui lòng kiểm tra lại",
    //             "data" => $validator->errors()
    //         ]);
    //     }else{
    //     $donvi = Donvi::create($request->all()); 
    //       return response()->json([
    //         "message" => "Thêm thành công",
    //         "data" => $donvi
    //       ]);
    //     }
        $donvi = Donvi::create($request->all()); 
          return response()->json([
            "message" => "Thêm thành công",
            "data" => $donvi
          ]);
    
    // $dataInsert = [
    //     $request->name,
    //     $request->loaidonvi,
    //     $request->description,
    //     $request->address,
    //     $request->webside,
    //     $request->phone,
    //     $request->email,
    //     $request->fax
    //     
    // ];

    // $this->users->addUser($dataInsert);

    // return redirect()->route('index')->with('msg','Thêm người dùng thành công');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Donvi $donvi)
    {
        
        return new DonviResource($donvi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=0)
    {
        // if(!empty($id)){
        //     $userDetail = $this->users->getDetail($id);
        //     if(!empty($userDetail[0])){
        //         $userDetail = $userDetail[0];
        //     }else{
        //         return redirect()->route('index')->with('msg','Không tồn tại đơn vị này');
        //     }

        // }else{
        //     return redirect()->route('index')->with('msg','Không tồn tại đơn vị này');
        // };

        // return view('edit-donvi', compact('userDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=0)
    {
        $donvi = Donvi::find($id);
        $donvi->update($request->all());
        return response()->json([
           "message" => "Cập nhập dữ liệu thành công",
           "data" => $donvi
        ]);
    //    $request->validate([
    //     'name'=>'required',
    //     'addres'=>'required',
    //     'webside'=>'required',
    //     'phone'=>'required|digits:10|unique:quanly_donvi,phone,'.$id,
    //     'email'=>'required|email|unique:quanly_donvi,email,'.$id,
    //     'fax'=>'required|numeric|unique:quanly_donvi,fax,'.$id
    //     ],[
    //     'name.required' => 'Bắt buộc phải nhập tên',
    //     'address.required' => 'Bắt buộc phải nhập địa chỉ',
    //     'webside.required' => 'Bắt buộc phải nhập webside',
    //     'phone.required' => 'Bắt buộc phải nhập số điện thoại',
    //     'phone.digits' => 'Số điện thoại phải là số và từ 10 ký tự trở lên',
    //     'phone.unique' => 'Số điện thoại đã trùng',
    //     'email.required' => 'Bắt buộc phải nhập email',
    //     'email.email' => 'Email không đúng định dạng',
    //     'email.unique' => 'Email đã trùng',
    //     'fax.required' => 'Bắt buộc phải nhập số Fax',
    //     'fax.numeric' => 'Fax phải là số',
    //     'fax.unique' => 'Số Fax đã trùng'
    //     ]);

    //     $validator = Validator::make($request->all());
    //     if ($validator->fails()){
    //         return redirect()->route('update')->with('msg','Cập nhập thất bại');
    //     }else{
    //     $quanly_donvi = quanly_donvi_api::update($request->all());
    //         return redirect()->route('index')->with('msg','Cập nhập thành công');
    //     }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donvi $donvi, $id)
    {
        $donvi = Donvi::find($id);
        $donvi->delete();
        return response()->json([
            "message" => "Xóa thành công",
            "data" => $donvi
        ]);
        
    }
}
