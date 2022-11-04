<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(){
        {
            $data = [
                'script' => 'components.scripts.category.index'
            ];
            return view('pages.category.index', $data);
        }
    }
    public function store(Request $request){
        if ($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama kategori',
                'status'    => false
            ];
    }else{
        try{
            DB::transaction(function () use ($request) {
                DB::table('category')->insert([
                    'created_at' => date('Y-m-d H:i:s'),
                    'name' => $request->name,
                ]);
            });
            $json = [
                'msg' => 'Produk berhasil ditambahkan',
                'status' => true
            ];
        }catch (Exception $e) {
            $json = [
                'msg'       => 'error',
                'status'    => false,
                'e'         => $e
            ];
        }
    }
    return Response::json($json);
}
public function show($id){
    if(is_numeric($id)) {
        $data = DB::table('category')->where('id', $id)->first();
        return Response::json($data);
    }

    $data = DB::table('category')
        ->orderBy('category.id', 'desc');
    return DataTables::of($data)
        ->addColumn(
            'action',
            function($row) {
                $data = [
                    'id' => $row->id
                ];

                return view('components.buttons.category', $data);
            }
        )
        ->addIndexColumn()
        ->make(true);
}
public function update(Request $request, $id){
    {
            try{
                DB::transaction(function() use($request ,$id) {
                    DB::table('category')->where('id',$id)->update([
                        'name' => $request->name,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                });

                $json = [
                    'msg' => 'categori berhasil disunting',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }
        return Response::json($json);
}
public function destroy($id){
    try{
        DB::transaction(function()use($id)
        {
            DB::table('category')->where('id',$id)->delete();
        });
        $json =[
            'msg'=>'category Berhasil Dihapus',
            'status'=>true

        ];
    }catch(Exception $e){
            $json =[
                'msg'=>'error',
                'status'=>false,
                'e'=>$e,
            ];
        };
    return Response::json($json);
}
}

