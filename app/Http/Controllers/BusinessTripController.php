<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\BusinessTrip;

class BusinessTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = \Auth::user()->id;
        return view('my-business-trip', [
            'title' => 'My Business Trip',
            'cities' => City::all(),
            'bustrips' => BusinessTrip::with('city1', 'city2')->where('user_id', $uid)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new BusinessTrip;
        $data['city_id_1'] = $request->origin_city;
        $data['city_id_2'] = $request->destination_city;
        $data['departure_date'] = date('Y-m-d H:i:s', strtotime($request->departure_date));
        $data['return_date'] = date('Y-m-d H:i:s', strtotime($request->return_date));
        $data['description'] = $request->description;
        $data['user_id'] = \Auth::user()->id;
        $data->save();
        return redirect()->back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function submission(Request $request)
    {
        $submissions = BusinessTrip::with('city1', 'city2', 'user')
        ->where('status', 'pending')
        ->latest()
        ->get();

        $histories = BusinessTrip::with('city1', 'city2', 'user')
        ->where('status', 'approved')
        ->orWhere('status', 'rejected')
        ->latest('updated_at')
        ->get();

        return view('business-trip-submission', [
            'title' => 'Business Trip Submission',
            'request' => $request,
            'submissions' => $submissions,
            'histories' => $histories,
            'sum' => $submissions->count()
        ]);
    }

    public function approve(Request $request)
    {
        $data = BusinessTrip::where('id', $request->get('idbustrip'));

        switch ($request->input('action')) {
            case 'approve':
                $data->update(['status' => 'approved']);
                break;
    
            case 'reject':
                $data->update(['status' => 'rejected']);
                break;
        }

        return redirect()->back();
    }
}
