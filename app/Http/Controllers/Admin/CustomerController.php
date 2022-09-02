<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CustomerContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $repository;

    public function __construct(CustomerContract $contract)
    {
        $this->repository = $contract;
    }

    public function index()
    {
        $customers = $this->repository->listCustomer();
        $this->setPageTitle('Customers','List of all customers');
        return view('backend.customers.index',compact('customers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('Customers','Create New Customer');
        return view('backend.customers.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'         => 'required|max:191|unique:categories',
        ]);

        $params = $request->except('_token');


        $content = $this->repository->createCustomer($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while creating content','error',true,true);
        }

        return $this->responseRedirect('admin.categories.index','Content Added Successfully','success',false,false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $t_customer = $this->repository->findCustomerById($id);
        $this->setPageTitle('Customers','Edit category : '.$t_customer->name);
        return view('backend.customers.edit',compact('t_customer'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request){

        $this->validate($request,[
            'name'         => 'required|max:191',
        ]);

        $params = $request->except('_token');

        $content = $this->repository->updateCustomer($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }

        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function delete($id){
        $content = $this->repository->deleteCustomer($id);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while deleting content','error',true,true);
        }

        return $this->responseRedirect('admin.customers.index','Content deleted successfully','success',false,false);
    }
}
