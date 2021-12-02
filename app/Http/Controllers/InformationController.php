<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return view('information.category.create');
    }

    public function category_list()
    {   
        $count = 1;
        $information = Information::where('information_type', 'CATEGORY')->orderBy('id', 'Desc')->paginate(10);

        return view('information.category.list', compact('information', 'count'));
    }

    public function category_store(Request $request)
    {
        Information::create([
            
            'information_id' => 'category_' . uniqid(),
            'name' => $request->name,
            'short_code' => $request->short_code,
            'location_details' => 0,
            'information_type' => 'CATEGORY',
            'size' => 0,

        ]);

        return redirect()->back()->with('success', 'Category Saved.');
    }

    public function category_search(Request $request)
    {
        $count = 1;
        $information = Information::where('name', 'LIKE' , '%' . $request->name . '%')->where('information_type', 'CATEGORY')->orderBy('id', 'Desc')->paginate(10);


        if(count($information) > 0)
        {
            return view('information.category.list', compact('information', 'count'));

        }else{

            return redirect()->back()->with('error', 'Not found any category.');
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Location
    |--------------------------------------------------------------------------
    */


    public function location()
    {
        return view('information.location.create');
    }

    public function location_list()
    {   
        $count = 1;
        $information = Information::where('information_type', 'LOCATION')->orderBy('id', 'Desc')->paginate(10);

        return view('information.location.list', compact('information', 'count'));
    }


    public function location_store(Request $request)
    {
        Information::create([

            'information_id' => 'location_' .uniqid(),
            'name' => $request->name,
            'short_code' => 0,
            'location_details' => $request->location_details,
            'information_type' => 'LOCATION',
            'size' => 0,

        ]);

        return redirect()->back()->with('success', 'Location Saved.');

    }

    public function location_search(Request $request)
    {
        $count = 1;
        $information = Information::where('name', 'LIKE' , '%' . $request->name . '%')->orWhere('location_details', 'LIKE' , '%' . $request->name . '%')->where('information_type', 'LOCATION')->orderBy('id', 'Desc')->paginate(10);


        if(count($information) > 0)
        {
            return view('information.location.list', compact('information', 'count'));

        }else{

            return redirect()->back()->with('error', 'Not found any location.');
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Suppliers
    |--------------------------------------------------------------------------
    */


    public function suppliers()
    {
        return view('information.suppliers.create');
    }

    public function suppliers_list()
    {   
        $count = 1;
        $information = Information::where('information_type', 'SUPPLIERS')->orderBy('id', 'Desc')->paginate(10);

        return view('information.suppliers.list', compact('information', 'count'));
    }

    public function suppliers_store(Request $request)
    {
        Information::create([

            'information_id' => 'suppliers_' .uniqid(),
            'name' => $request->name,
            'short_code' => 0,
            'location_details' => $request->location_details,
            'information_type' => 'SUPPLIERS',
            'size' => 0,

        ]);

        return redirect()->back()->with('success', 'Supplier Saved.');

    }

    public function suppliers_search(Request $request)
    {
        $count = 1;
        $information = Information::where('name', 'LIKE' , '%' . $request->name . '%')->orWhere('location_details', 'LIKE' , '%' . $request->name . '%')->where('information_type', 'SUPPLIERS')->orderBy('id', 'Desc')->paginate(10);


        if(count($information) > 0)
        {
            return view('information.suppliers.list', compact('information', 'count'));

        }else{

            return redirect()->back()->with('error', 'Not found any suppliers.');
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Shirt
    |--------------------------------------------------------------------------
    */


    public function shirt_size()
    {
        return view('information.shirt.create');
    }

    public function shirt_size_store(Request $request)
    {
        Information::create([

            'information_id' => 'size_' . uniqid(),
            'name' => $request->name,
            'short_code' => 0,
            'location_details' => 0,
            'information_type' => 'SIZE',
            'size' => $request->size,

        ]);

        return redirect()->back()->with('success', 'Size Saved.');

    }

    public function size_list()
    {   
        $count = 1;
        $information = Information::where('information_type', 'SIZE')->orderBy('id', 'Desc')->paginate(10);

        return view('information.shirt.list', compact('information', 'count'));
    }

    public function size_search(Request $request)
    {
        $count = 1;
        $information = Information::where('name', 'LIKE' , '%' . $request->name . '%')->where('information_type', 'SIZE')->orderBy('id', 'Desc')->paginate(10);


        if(count($information) > 0)
        {
            return view('information.shirt.list', compact('information', 'count'));

        }else{

            return redirect()->back()->with('error', 'Not found any size.');
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Destroy
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $information = Information::where('information_id', $id);

        $information->delete();

        return redirect()->back()->with('success', 'Remove successfully.');
    }

}
