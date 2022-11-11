<?php

namespace App\Http\Controllers;

use App\Sale;
use Exception;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'script' => 'components.scripts.sale.index',
            'products' => Product::get(),
        ];
        return view('pages.sale.index', $data);
    }

    public function data()
    {
        $sales = Sale::with(['category', 'product'])->get();
        return datatables()
            ->of($sales)
            ->addIndexColumn()
            ->addColumn('category_id', function ($row) {
                return $row->category->name;
            })
            ->addColumn('product_id', function ($row) {
                return $row->product->name;
            })
            ->addColumn('price', function ($row) {
                return 'Rp. ' . number_format($row->product->price);
            })
            ->addColumn('quantity', function ($row) {
                return number_format($row->quantity);
            })
            ->addColumn('total', function ($row) {
                return 'Rp. ' . number_format($row->total);
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];

                return view('components.buttons.sale', $data);
            })

            ->rawColumns(['action'])
            ->make(true);
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
        $product = Product::find($request->product);
        $stock = $product->stock;
        if ($request->product == NULL) {
            $json = [
                'msg'       => 'Mohon pilih produk',
                'status'    => false
            ];
        } elseif ($request->quantity == NULL or $request->quantity == 0) {
            $json = [
                'msg'       => 'Mohon isi kuantitas produk',
                'status'    => false
            ];
        } elseif ($request->quantity > $stock) {
            $json = [
                'msg'       => 'Mohon maaf stok kurang',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request, $stock) {
                    Sale::create([
                        'category_id' => $request->category,
                        'product_id' => $request->product,
                        'quantity' => $request->quantity,
                        'total' => $request->total,
                    ]);

                    $nowStock = $stock - $request->quantity;
                    Product::where('id', $request->product)
                        ->update([
                            'stock' => $nowStock,
                        ]);
                });
                $json = [
                    'msg' => 'Produk berhasil terjual!',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }
        return Response::json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale, $id)
    {
        try {
            DB::transaction(function () use ($id) {
                DB::table('sales')->where('id', $id)->delete();
            });
            $json = [
                'msg' => 'Penjualan Berhasil Dihapus',
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