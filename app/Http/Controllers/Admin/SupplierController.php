<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SupplierContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SupplierController extends BaseController
{
    protected $repository;

    public function __construct(SupplierContract $contract)
    {
        $this->repository = $contract;
    }

    public function index()
    {
        $suppliers = $this->repository->listSupplier();
        $this->setPageTitle('Suppliers','List of all suppliers');
        return view('backend.suppliers.index',compact('suppliers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('Suppliers','Create New Supplier');
        return view('backend.suppliers.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'         => 'required|max:191|unique:suppliers',
        ]);

        $params = $request->except('_token');


        $content = $this->repository->createSupplier($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while creating content','error',true,true);
        }

        return $this->responseRedirect('admin.suppliers.index','Content Added Successfully','success',false,false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $t_supplier = $this->repository->findSupplierById($id);
        $this->setPageTitle('Suppliers','Edit supplier : '.$t_supplier->name);
        return view('backend.suppliers.edit',compact('t_supplier'));
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

        $content = $this->repository->updateSupplier($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }

        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function delete($id){
        $content = $this->repository->deleteSupplier($id);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while deleting content','error',true,true);
        }

        return $this->responseRedirect('admin.suppliers.index','Content deleted successfully','success',false,false);
    }
}
