<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = DB::table('vendors')->get();

        return view('vendor.index', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            if ($request->input('vendor_name') == null) {
                $response = array(
                    'status' => false,
                    'message' => 'Nama Vendor tidak boleh kosong.'
                );

                return Response::json($response);
            }

            if ($request->input('vendor_address') == null) {
                $response = array(
                    'status' => false,
                    'message' => 'Alamat Vendor tidak boleh kosong.'
                );

                return Response::json($response);
            }

            $id_generator = DB::table('id_generators')->where('remark', '=', 'vendor')->first();
            $number = sprintf("%'.0" . $id_generator->length . "d", $id_generator->index);

            $vendor_id = $id_generator->prefix . $number;
            $vendor_name = $request->input('vendor_name');
            $vendor_address = $request->input('vendor_address');
            $remark = $request->input('remark');


            $insert_vendor = db::table('vendors')->insert([
                'vendor_id' => $vendor_id,
                'vendor_name' => $vendor_name,
                'vendor_address' => $vendor_address,
                'remark' => $remark,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('id_generators')
                ->where('remark', '=', 'vendor')
                ->update(['index' => $id_generator->index + 1]);

            $response = array(
                'status' => true,
                'message' => 'Vendor berhasil dibuat.',
            );

            return Response::json($response);

        } catch (\Throwable $e) {
            $response = array(

                'status' => false,
                'message' => 'Vendor gagal dibuat.',
            );

            return Response::json($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.edit', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $vendor = DB::table('vendors')->where('id', $id)->first();

            $vendor->vendor_name = $request->get('vendor_name');
            $vendor->vendor_address = $request->get('vendor_address');
            $vendor->remark = $request->get('remark');

            $update_vendor = db::table('vendors')->where('id', $id)->update([
                'vendor_name' => $vendor->vendor_name,
                'vendor_address' => $vendor->vendor_address,
                'remark' => $vendor->remark,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $response = array(
                'status' => true,
                'message' => 'Vendor berhasil diubah.',
            );

            return Response::json($response);

        } catch (\Throwable $e) {
            
            $response = array(
                'status' => false,
                'message' => 'Vendor gagal diubah.',
            );
            return Response::json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vendor = Vendor::find($id);

            if (!$vendor) {
                return redirect()->route('vendor.index')->with('error', 'Vendor not found.');
            }

            $vendor->delete();

            return redirect()->route('vendor.index')->with('success', 'Vendor deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('vendor.index')->with('error', $th->getMessage());
        }
    }
}
