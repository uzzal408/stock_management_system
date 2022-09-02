<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $repository;
    protected $categoryRepository;

    public function __construct(ProductContract $contract, CategoryContract $categoryContract)
    {
        $this->repository = $contract;
        $this->categoryRepository = $categoryContract;
    }

    public function index()
    {
        $products = $this->repository->listProduct();
        $this->setPageTitle('Products','List of all products');
        return view('backend.products.index',compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('Products','Create New Products');
        $categories = $this->categoryRepository->listCategory();
        return view('backend.products.create',compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'         => 'required|max:191|unique:products',
            'sku'          => 'required|max:191|unique:products',
            'category_id'  => 'required|integer',
            'unit'         => 'required|max:20',
        ]);

        $params = $request->except('_token');


        $content = $this->repository->createProduct($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while creating content','error',true,true);
        }

        return $this->responseRedirect('admin.products.index','Content Added Successfully','success',false,false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $t_product = $this->repository->findProductById($id);
        $categories = $this->categoryRepository->listCategory();
        $this->setPageTitle('Category','Edit category : '.$t_product->name);
        return view('backend.products.edit',compact('t_product','categories'));
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

        $content = $this->repository->updateProduct($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }

        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function delete($id){
        $content = $this->repository->deleteProduct($id);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while deleting content','error',true,true);
        }

        return $this->responseRedirect('admin.products.index','Content deleted successfully','success',false,false);
    }
}
