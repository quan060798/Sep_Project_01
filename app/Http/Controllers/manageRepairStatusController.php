<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manageRepairStatusModel;
use Illuminate\Support\Facades\DB;

class manageRepairStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*$$data = manageRepairStatusModel::where([
            ['OrderID', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('OrderID', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('OrderID', 'desc')
            ->paginate(10);

        return view('manageRepairStatus.staffViewRequestedRepairList', compact("data"))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/
            $data = DB::table('requestdetails')
            ->join('customers', 'requestdetails.Customer_ID', '=', 'customers.Customer_ID')
            ->where('requestdetails.Send_Status', "SUBMIT")
            ->paginate(3);
        //$data = manageRepairStatusModel::where('Send_Status', "SUBMIT")->get();
        return view('manageRepairStatus.staffViewRequestedRepairList', compact("data"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = DB::table('requestdetails')
            ->join('customers', 'requestdetails.Customer_ID', '=', 'customers.Customer_ID')
            ->where('requestdetails.OrderID', 'LIKE', '%' . $search. '%')
            ->paginate(3);
        //$data = manageRepairStatusModel::where('OrderID', 'like', '%' . $search. '%')->paginate(5);
        return view('manageRepairStatus.staffViewRequestedRepairList', compact("data"));
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
        $data = DB::table('requestdetails')
            ->join('customers', 'requestdetails.Customer_ID', '=', 'customers.Customer_ID')
            ->where('OrderID', $id)
            ->first();
        //$data = manageRepairStatusModel::findOrFail($id);
        return view('manageRepairStatus.staffUpdateRepairStatus', compact("data"));
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
        $validatedData = $request->validate([
            'Order_Status' => 'required|max:255',
            'Estimated_Cost' => 'required',
            'Reason' => 'required',
        ]);
        manageRepairStatusModel::where('OrderID', $id)->update($validatedData);
        return redirect('/manageRepairStatus')->with('success', 'Repair Status is successfully updated');
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
        $data = manageRepairStatusModel::find($id);
        $data->delete();
        return redirect('/manageRepairStatus')->with('success', 'Repair Record is Deleted');
    }

    public function custViewAll($id)
    {
        $data = manageRepairStatusModel::where('Customer_ID', $id)->where('Send_Status', "SUBMIT")->paginate(3);
        return view('manageRepairStatus.customerViewRequestedRepairList', compact("data"));
    }

    public function custEdit($id)
    {
        //
        $data = manageRepairStatusModel::findOrFail($id);
        return view('manageRepairStatus.customerConfirmRepair', compact("data"));
    }

    public function custConfirm($id, $idtwo)
    {
        //
        manageRepairStatusModel::where('OrderID', $id)->update(array('Confirmation_Status' => 'CONFIRMED'));
        $data = manageRepairStatusModel::where('Customer_ID', $idtwo)->paginate(3);
        return view('manageRepairStatus.customerViewRequestedRepairList', compact("data"));
    }

    public function custCancel($id, $idtwo)
    {
        //
        manageRepairStatusModel::where('OrderID', $id)->update(array('Confirmation_Status' => 'CANCELLED'));
        $data = manageRepairStatusModel::where('Customer_ID', $idtwo)->paginate(3);
        return view('manageRepairStatus.customerViewRequestedRepairList', compact("data"));
    }
}