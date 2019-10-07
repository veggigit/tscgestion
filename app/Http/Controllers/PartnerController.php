<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Region;
use App\CivilStatus;
use App\Office;
use App\PartnerStatus;
use App\Http\Requests\PartnerStoreFormRequest;
use App\Http\Requests\PartnerUpdateFormRequest;
use Illuminate\Support\Arr;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // add <<select region to array>>
        $rdata = Region::get(['id', 'name'])->toArray();
        $regions = Arr::prepend($rdata, ['id' => 0, 'name' => 'Selecciona una region']);
        // add <<select civil status to array>>
        $civdata = CivilStatus::get(['id', 'name'])->toArray();
        $civilStatuses = Arr::prepend($civdata, ['id' => 0, 'name' => 'Selecciona un estado']);
        // add <<select offices to array>>
        $offidata = Office::get(['id', 'name'])->toArray();
        $offices = Arr::prepend($offidata, ['id' => 0, 'name' => 'Selecciona una oficina']);

        return view('admin.partner.create', compact('regions', 'civilStatuses', 'offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerStoreFormRequest $request)
    {
        Partner::create($request->all());

        return redirect()->route('partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        // add <<select region to array>>
        $rdata = Region::get(['id', 'name'])->toArray();
        $regions = Arr::prepend($rdata, ['id' => 0, 'name' => 'Selecciona una region']);
        // add <<select civil status to array>>
        $civdata = CivilStatus::get(['id', 'name'])->toArray();
        $civilStatuses = Arr::prepend($civdata, ['id' => 0, 'name' => 'Selecciona un estado']);
        // add <<select offices to array>>
        $offidata = Office::get(['id', 'name'])->toArray();
        $offices = Arr::prepend($offidata, ['id' => 0, 'name' => 'Selecciona una oficina']);
        // partner status
        $partnerStatuses = PartnerStatus::all();

        return view('admin.partner.edit', compact('partner', 'regions', 'civilStatuses', 'offices', 'partnerStatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerUpdateFormRequest $request, $id)
    {
        Partner::where('id', $id)->update([
            'rut' => $request->input('rut'),
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'first_surname' => $request->input('first_surname'),
            'second_surname' => $request->input('second_surname'),
            'phone' => $request->input('phone'),
            'personal_email' => $request->input('personal_email'),
            'birthday' => $request->input('birthday'),
            'social_charges' => $request->input('social_charges'),
            'civil_status_id' => $request->input('civil_status_id'),
            'region_id' => $request->input('region_id'),
            'address' => $request->input('address'),
            'corporative_email' => $request->input('corporative_email'),
            'office_id' => $request->input('office_id'),
            'date_admission' => $request->input('date_admission'),
            'partner_status_id' => $request->input('partner_status_id')
        ]);

        return redirect()->route('partner.index');
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
