<?php

namespace App\Http\Controllers;

use Exception;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'script' => 'components.scripts.supplier.index'
        ];
        return view('pages.supplier.index', $data);
    }

    public function data()
    {
        $supplier = Supplier::orderBy('id', 'desc')->get();
        return datatables()
            ->of($supplier)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];

                return view('components.buttons.supplier', $data);
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
        if ($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon masukan supplier',
                'status'    => false
            ];
        } elseif ($request->address == NULL) {
            $json = [
                'msg'       => 'Mohon masukan alamat supplier',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    Supplier::create([
                        'name' => $request->name,
                        'address' => $request->address,
                    ]);
                });

                $json = [
                    'msg' => 'Supplier berhasil ditambahkan',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg' => 'error',
                    'status' => false,
                    'e' => $e
                ];
            }
        }
        return Response::json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier, $id)
    {
        $data = DB::table('suppliers')->where('id', $id)->first();
        return Response::json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->name == NULL) {
            $json = [
                'msg' => 'Mohon isi nama supplier',
                'status' => false
            ];
        } elseif ($request->address == NULL) {
            $json = [
                'msg' => 'Mohon isi alamat supplier',
                'status' => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request, $id) {
                    DB::table('suppliers')->where('id', $id)->update([
                        'updated_at' => date('Y-m-d H:i:s'),
                        'name' => $request->name,
                        'address' => $request->address,

                    ]);
                });

                $json = [
                    'msg' => 'Supplier berhasil disunting',
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                DB::table('suppliers')->where('id', $id)->delete();
            });
            $json = [
                'msg' => 'Supplier Berhasil Dihapus',
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