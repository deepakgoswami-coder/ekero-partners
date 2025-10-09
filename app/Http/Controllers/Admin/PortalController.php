<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortalRequest;
use App\Models\Portal;
use App\Models\PortalSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portal = PortalSet::latest()->paginate(10);
        return view("admin.portal.index", compact("portal"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.portal.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortalRequest $request)
    {
        try {
            DB::beginTransaction();
            $portal = new PortalSet();
            $portal->fill($request->all());
            $portal->save();
          DB::commit();
            return redirect()->route('portal.index')->with('success','Add portal successfully');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portal = PortalSet::findOrFail($id);
    
        return view('admin.portal.edit', compact('portal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                $portal =  PortalSet::findOrFail($id);
        $portal->fill($request->all());
        $portal->save();
        return redirect()->route('portal.index')->with('success','Update portal successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PortalSet::destroy($id);
        return redirect()->route('portal.index')->with('success','Deleted group successfully');

    }
 
   
}
