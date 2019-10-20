<?php

namespace App\Http\Controllers;

use App\User;
use App\Repositories\InvoiceConfiguration\InterfaceInvoiceConfiguration;
use Illuminate\Http\Request;
use PDF;
use App\Http\Requests\Invoice\UpdateInvoiceConfigurationRequest;

class InvoiceController extends Controller
{
    function __construct(InterfaceInvoiceConfiguration $repository) 
    {
        $this->repository = $repository;
    }

    /**
     * View all the users
     */
    public function index(Request $request)
    {
        $users = User::all();

        return view('home.index')
            ->with('users', $users);
    }

    /**
     * To download the invoice
     */
    public function show($user_id)
    {
        $user = User::find($user_id);
        $data['user'] = $user;

        $pdf = PDF::loadView('invoice.download', $data);
        return $pdf->download('Invoice -' . time() . '.pdf');
    }

    /**
     * View the current invoice configuration
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);

        if($user){
            return view('invoice.show')
                ->with('user', $user);
        }

        return redirect('/')->with('errors','Invalid user');
    }

    /**
     * Update the invoice configuration based on user
     */
    public function update($id, UpdateInvoiceConfigurationRequest $request)
    {
        $result = $this->repository->update($request->all());

        if($result){
            return back()->with('success','Configuration updated successfully');
        }

        return back()->with('error','Opps! Looks like something went wrong');
    }

    public function requirement()
    {
        return view('home.requirement');
    }

}
