<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributesValue = AttributeValue::with('attributeGroup')->paginate(10);

        return view('admin.attributes-value.index' , compact(['attributesValue']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributesGroup = AttributeGroup::all();
        return view('admin.attributes-value.create',compact(['attributesGroup']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributeValue = new AttributeValue();
        $attributeValue->name = $request->input('title');
        $attributeValue->attributeGroup_id = $request->input('attribute_group');

        $attributeValue->save();

        session()->flash('add_value' , "مقدار $attributeValue->name با موفقیت اضافه شد");
        return redirect('/administrator/attributes-value');

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
        $attributeValue = AttributeValue::findOrFail($id);
        $attributesGroup = AttributeGroup::all();
        return view('admin.attributes-value.edit' , compact(['attributeValue','attributesGroup']));
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
