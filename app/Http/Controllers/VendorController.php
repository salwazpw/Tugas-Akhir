<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('vendor.create');
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

            $id_generator = DB::table('id_generators')->where('remark', '=', 'vendor')->first();
            $number = sprintf("%'.0" . $id_generator->length . "d", $id_generator->index + 1);

            $vendor_id = $id_generator->prefix . $number;
            $vendor_name = $request->input('vendor_name');
            $vendor_address = $request->input('vendor_address');
            $remark = $request->input('remark');

            DB::table('id_generators')
                ->where('remark', '=', 'vendor')
                ->update(['index' => $id_generator->index + 1]);

            $insert_vendor = db::table('vendors')->insert([
                'vendor_id' => $vendor_id,
                'vendor_name' => $vendor_name,
                'vendor_address' => $vendor_address,
                'remark' => $remark,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $response = array(
                'status' => true,
            );

            return redirect()->route('vendor.index')->with('success', 'Add Vendor successfully.');
        } catch (\Throwable $th) {
            $response = array(
                'status' => false,
                'message' => $th->getMessage(),
            );
            return $response;
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
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
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
