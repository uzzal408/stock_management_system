<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SettingController extends BaseController
{
    use UploadAble;
    public function index()
    {
        $this->setPageTitle('Settings','Manage Settings');
        return view('backend.settings.index');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'site_logo'   => 'mimes:jpg,jpeg,png,webp|max:500',
            'site_favicon'   => 'mimes:jpg,jpeg,png,webp|max:500',
        ]);
        if($request->has('site_logo') && $request->file('site_logo') instanceof UploadedFile){

            if(config('settings.site_logo')!=null){
                $this->deleteOne(config('settings.site_logo'));
            }

            $logo = $this->uploadOne($request->file('site_logo'),'img');
            Setting::set('site_logo',$logo);

        }elseif($request->has('site_favicon') && $request->file('site_favicon') instanceof UploadedFile){
            if(config('settings.site_favicon')!=null){
                $this->deleteOne(config('settings.site_favicon'));
            }

            $faviocn = $this->uploadOne($request->file('site_favicon'),'img');
            Setting::set('site_favicon',$faviocn);

        }else{
            $keys = $request->except('_token');

            foreach ($keys as $key => $value){
                Setting::set($key,$value);
            }
        }

        return $this->responseRedirectBack('Setting updated successfully.','success');
    }
}
