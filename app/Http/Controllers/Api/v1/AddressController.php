<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Services\AddressService;
use App\Services\BaseService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected AddressService $addressService;

    public function __construct()
    {
        $this->addressService = new AddressService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response($this->addressService->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function addNewAddress(Request $request)
    {
        //get Current Address
        $address = new Address();
        $address->street = $request->street;
        $address->number = (int)$request->number;
        $address->bus = (int)$request->bus;
        $address->zipcode = (int)$request->zipcode;
        $address->city = $request->city;
        $address->user_id = $request->route()->id;
        $address->country = $request->country;
        $address->active = 0;
        $address->save();

        return response()->json('success');
    }

    public function changeCurrentAddress(Request $request)
    {
        //get Current Address
        $adress = Address::where('id', $request->id)->firstOrFail();

        if($adress !== null) {
            Address::where('user_id', $adress->user->id)->update(['active' => 0]);
            Address::where('id', $adress->id)->update(['active' => 1]);

            return response()->json('succes', 200);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
