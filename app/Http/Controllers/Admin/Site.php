<?php

namespace App\Http\Controllers\Admin;
use App\Models\Site as SiteModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Site extends Controller
{
    //
    public function edit()
    {

        $site=SiteModel::find(1);
//     dd($site);
        return view('admin.site.index',compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $input=$request->except('_token');
//      dd( $input);


        $res= SiteModel::find($input['id'])->update($input);
//        dd($input);
        if ($res){

            return redirect('admin/index')->with('message', '修改成功!');
        }else{
            return redirect('admin/site/edit')->with('message', '修改失败!');
        }
    }

}
