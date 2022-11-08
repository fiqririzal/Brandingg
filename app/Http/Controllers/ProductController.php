<?php

namespace App\Http\Controllers;

use Exception;
use App\Product;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'script' => 'components.scripts.product.index',
            'category' => category::all()->pluck('name', 'id'),
        ];
        return view('pages.product.index', $data);
    }

    public function data()
    {
        $product = Product::Join('category', 'category.id', '=', 'products.category_id')
            ->select(['products.*', 'category.name as category_name'])
            ->orderBy('products.id', 'desc')
            ->get();

        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('image', function ($product) {
                return '<img class="img-thumbnail" src="' . asset('images/' . $product->image) . '">';
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];

                return view('components.buttons.product', $data);
            })

            ->rawColumns(['action', 'image'])
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
        if ($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon berikan nama produk',
                'status'    => false
            ];
        } elseif ($request->category == NULL) {
            $json = [
                'msg'       => 'Mohon pilih kategori produk',
                'status'    => false
            ];
        } elseif ($request->price == NULL) {
            $json = [
                'msg'       => 'Mohon berikan harga produk',
                'status'    => false
            ];
        } elseif ($request->stock == NULL) {
            $json = [
                'msg'       => 'Beri stock produk 0, Jika Kosong',
                'status'    => false
            ];
        } elseif ($request->description == NULL) {
            $json = [
                'msg'       => 'Mohon berikan deskripsi produk',
                'status'    => false
            ];
        } elseif ($request->file('image') == NULL) {
            $json = [
                'msg'       => 'Mohon berikan image',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $destination = base_path('public/images/');
                    $request->file('image')->move($destination, $image);

                    Product::create([
                        'category_id' => $request->category,
                        'name' => $request->name,
                        'price' => $request->price,
                        'stock' => $request->stock,
                        'description' => $request->description,
                        'image' => $image,
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        return Response::json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        if ($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon berikan nama produk',
                'status'    => false
            ];
        } elseif ($request->category == NULL) {
            $json = [
                'msg'       => 'Mohon pilih kategori produk',
                'status'    => false
            ];
        } elseif ($request->price == NULL) {
            $json = [
                'msg'       => 'Mohon berikan harga produk',
                'status'    => false
            ];
        } elseif ($request->stock == NULL) {
            $json = [
                'msg'       => 'Beri stock produk 0, Jika Kosong',
                'status'    => false
            ];
        } elseif ($request->description == NULL) {
            $json = [
                'msg'       => 'Mohon berikan deskripsi produk',
                'status'    => false
            ];
        } else {
            DB::transaction(function () use ($request, $id) {
                Product::where('id', $id)->update([
                    'name' => $request->name,
                    'category_id' => $request->category,
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'description' => $request->description,
                ]);

                if ($request->has('image')) {
                    $product = Product::where('id', $id)->first();
                    $oldImage = $product->image;

                    if ($oldImage) {
                        $pleaseRemove = base_path('public/images/') . $oldImage;

                        if (file_exists($pleaseRemove)) {
                            unlink($pleaseRemove);
                        }
                    }

                    $extension = $request->file('image')->getClientOriginalExtension();
                    $image = strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $destination = base_path('public/images/');
                    $request->file('image')->move($destination, $image);

                    Product::where('id', $id)->update([
                        'image' => $image,
                    ]);
                }
            });

            $json = [
                'msg' => 'Produk berhasil disunting',
                'status' => true
            ];
        }
        return Response::json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        try {
            DB::transaction(function () use ($id) {
                DB::table('products')->where('id', $id)->delete();
            });
            $json = [
                'msg' => 'Produk Berhasil Dihapus',
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
