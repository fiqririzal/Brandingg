<?php

namespace App\Http\Controllers;

use Exception;
use App\product;
use App\category;
use App\Supplier;
use App\buy_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TransactionController extends Controller
{
    Public function index(){
        $category = category::all()->pluck('id');
        $product = product::all()->pluck('id');
        $suppliers = supplier::all()->pluck('id');
        $data = [
            'script' => 'components.scripts.buy_transaction.index',
            'category' => category::all()->pluck('name', 'id'),
            'product' => Product::all()->pluck('name', 'id'),
            'supplier' => supplier::all()->pluck('name', 'id'),
        ];

        return view('pages.buy_transaction.index', $data);
    }
    public function data($id){
        if(is_numeric($id)) {
            $data = Product::where('id', $id)->first();

            return Response::json($data);
        }
        $transaction = buy_transaction::with(['category','product','supplier'])->get();
        return DataTables()->of($transaction)
        ->addIndexColumn()
        ->addColumn('category_id', function($row){
            return $row->category->name;

        })
        ->addColumn('product_id', function($row){
            return $row->product->name;

        })
        ->addColumn('supplier_id', function($row){
            return $row->supplier->name;

        })
        ->addColumn('qty', function($row){
            return $row->qty;

        })
        ->addColumn('cost', function($row){
            return $row->cost;

        })
        ->addColumn('action', function($row){
            $data = [
                'id' =>$row->id
            ];
            return view('components.buttons.transaction',$data);
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function store(Request $request){
        //masukan query stock for update
        $product = product::find($request->product);
        $stock = $product->stock;
        if ($request->category == NULL) {
            $json = [
                'msg'       => 'Mohon Pilih Kategori',
                'status'    => false
            ];
        } elseif ($request->supplier == NULL) {
            $json = [
                'msg'       => 'Mohon pilih Supplier',
                'status'    => false
            ];
        } elseif
        ($request->product == NULL) {
            $json = [
                'msg'       => 'Mohon pilih produk',
                'status'    => false
            ];
        } elseif ($request->qty == NULL) {
            $json = [
                'msg'       => 'Beri stock produk 0, Jika Kosong',
                'status'    => false
            ];
        }else{
             try {
                DB::transaction(function () use ($request, $stock) {
                    buy_transaction::insert([
                        'category_id' => $request->category,
                        'product_id' => $request->product,
                        'supplier_id' => $request->supplier,
                        'qty' => $request->qty,
                        'cost' => $request->cost,
                    ]);
                    //update stock dengan mengambil query dari atas
                    $stockNow = $stock + $request->qty;
                    Product::where('id', $request->product)
                    ->update([
                        'stock' => $stockNow
                    ]);
                });

                $json = [
                    'msg' => 'Produk ditambahkan',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg'       => 'Error',
                    'status'    => false,
                    'e'         => $e
                ];
            }

        }
        return Response::json($json);

    }
    public function destroy($id){
        {
            try {
                DB::transaction(function () use ($id) {
                    DB::table('buy_transaction')->where('id', $id)->delete();
                });
                $json = [
                    'msg' => 'Transaksi Berhasil Dihapus',
                    'status' => true

                ];
            } catch (Exception $e) {
                $json = [
                    'msg' => 'error',
                    'status' => false,
                    'e' => $e,
                ];
            };
            return Response::json($json);
        }
    }
}
