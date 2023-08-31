<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use Illuminate\Http\Request;
use function PHPUnit\Framework\at;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributesGroup = AttributeGroup::paginate(10);

        return view('admin.attributes.index' , compact(['attributesGroup']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributesGroup = new AttributeGroup();
        $attributesGroup->title = $request->input('title');
        $attributesGroup->type = $request->input('type');
        $attributesGroup->save();

        session()->flash('add_attribute' , 'ویژگی جدید اضافه شد');
        return redirect('/administrator/attributes-group/');
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
        $attributeGroup = AttributeGroup::findOrFail($id);

        return view('admin.attributes.edit' , compact(['attributeGroup']));
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


        $attributeGroup = AttributeGroup::findOrFail($id);
        $attributeGroup->title = $request->input('title');
        $attributeGroup->type = $request->input('type');
        $attributeGroup->save();

        session()->flash('update_attribute' , "ویژگی $attributeGroup->title با موفقیت ویرایش شد ");
        return redirect('/administrator/attributes-group/');
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
}
