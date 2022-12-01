<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donvi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'donvi';
    protected $fillable = [
        'name', 'loaidonvi', 'description','address','webside','phone','email','fax'
    ];
    protected $primarykey = 'id';

    // public function getAllUsers($keywords = null){

    //     $users = DB::table($this->table);

    //     if(!empty($keywords)){
    //         $users = $users->where(function($query) use ($keywords){
    //             $query->orWhere('name','like','%'.$keywords.'%');

    //         });
    //     }
    //    // $users = $users->get();
    //    $users = $users->paginate(3);

    //     return $users;
    // }
    // public function getDetail($id){

    //     return DB::select('SELECT * FROM '.$this->table.' WHERE id =?', [$id]);

    // }   
    // public function deteleUser($id){

    //     return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    // }

}
