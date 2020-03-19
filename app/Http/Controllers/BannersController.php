<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use LacosFofos\Models\Banner;

class BannersController extends Controller
{
    public function addBanner(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $banner = New Banner;
            $banner->title = $data['title'];
            $banner->link = $data['link'];
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $banner_path = 'images/frontend_images/banners/'.$filename;
                    Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
                    $banner->image = $filename;
                }
            }
            $banner->status = $status;
            $banner->save();
            return redirect()->back()->with('flash_message_success', "Banner adicionado com sucesso!");
        }
        return view('admin.banners.add_banner');
    }

    public function viewBanners()
    {
        $banners = Banner::get();
        return view('admin.banners.view_banners')->with(compact('banners'));
    }
}
