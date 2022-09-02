<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $repository;

    public function __construct(CategoryContract $contract)
    {
        $this->repository = $contract;
    }

    public function index()
    {
        $categories = $this->repository->listCategory();
        $this->setPageTitle('Categories','List of all categories');
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('Category','Create New Category');
        return view('backend.categories.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'         => 'required|max:191|unique:categories',
        ]);

        $params = $request->except('_token');


        $content = $this->repository->createCategory($params);

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
        $t_category = $this->repository->findCategoryById($id);
        $this->setPageTitle('Category','Edit category : '.$t_category->name);
        return view('backend.categories.edit',compact('t_category'));
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

        $content = $this->repository->updateCategory($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }

        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function delete($id){
        $content = $this->repository->deleteCategory($id);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while deleting content','error',true,true);
        }

        return $this->responseRedirect('admin.categories.index','Content deleted successfully','success',false,false);
    }
}
