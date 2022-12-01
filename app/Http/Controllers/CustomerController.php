<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customer = Customer::all();
        return response()->json([
            'success' => true,
            'message' => 'Danh sách người dùng',
            'data' => $customer
        ]);
        //return CustomerResource::collection(Customer::paginate(4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'username' => 'required|unique:customer',
        //     'email' => 'required|email|unique:customer',
        //     'password' => 'required|min:8'
        // ],[
        //     'username.required' => 'Tài khoản không được bỏ trống',
        //     'username.unique' => 'Tài khoản đã tồn tại',
        //     'email.required' => 'Email không được bỏ trống',
        //     'email.email' => 'Email không đúng định dạng',
        //     'email.unique' => 'Email đã tồn tại',
        //     'password.required' => 'Mật khẩu không được để trống',
        //     'password.min' => 'Mật khẩu ít nhất phải :min ký tự trở lên'
        // ]);
        // $customer = Customer::create($request->all());
        // return response()->json([
        //     'message' => 'Thêm người dùng thành công',
        //     'data' => $customer
        // ]);
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'required|unique:customer',
            'email' => 'required|email|unique:customer',
            'password' => 'required|min:8'
        ],[
            'username.required' => 'Tài khoản không được bỏ trống',
            'username.unique' => 'Tài khoản đã tồn tại',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất phải :min ký tự trở lên'

        ]);
        if($validator->fails()){
        return response()->json([
            'massage' => $validator->errors()
        ]) ;       
        }
        $customer = Customer::create($input);
        return response()->json([
        'success' => true,
        'message' => 'Thêm người dùng thành công',
        'data' => $customer
        ]);

        // $customer = Customer::create($request->all());
        // return response()->json([
        //     'message' => ' Thêm người dùng thành công',
        //     'data' => $customer
        // ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
        return response()->json([
            'message' => 'Không tìm thấy người dùng'
        ]);
        }
        return response()->json([
        'success' => true,
        'data' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        // $customer->update($request->all());
        // return response()->json([
        //     'message' => 'Cập nhập thành công',
        //     'data' => $customer
        // ]);
        $customer = Customer::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
        'username' => 'required|unique:customer,username,'.$id,
        'email' => 'required|email|unique:customer,email,'.$id,
        'password' => 'required|min:8s'
        ],[
            'username.required' => 'Tài khoản không được bỏ trống',
            'username.unique' => 'Tài khoản đã tồn tại',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất phải :min ký tự trở lên'
        ]);
        if($validator->fails()){
            return response()->json([
                'massage' => $validator->errors()
            ]) ;       
            }
            $customer->update($input);
            return response()->json([
            'success' => true,
            'message' => 'Thêm người dùng thành công',
            'data' => $customer
            ]);
        // $customer->update($request->all());
        // return response()->json([
        //     "success" => true,
        //     "message" => "Cập nhập thành công",
        //     "data" => $customer
        // ]);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, $id)
    {
        // $customer->delete();
        // return response()->json([
        //     "message" => "Xóa thành công",
        //     "data" => $customer
        // ]);
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json([
        'success' => true,
        'message' => 'Xóa dữ liệu thành công',
        'data' => $customer
        ]);
        
    }
}
