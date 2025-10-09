<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::with('leader')->latest()->paginate(10);
        return view("admin.groups.index", compact("groups"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leader = User::where('role',2)->where('status',1)->latest()->get();
        return view("admin.groups.create",compact('leader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        try {
            DB::beginTransaction();
            $group = new Group();
            $group->fill($request->all());
            $group->total_members = $request->total_cycles;
            $group->save();
            for ($i=0; $i < $request->total_cycles ; $i++) { 
                $groupMember = new GroupMember();
                $groupMember->user_id = 0;
                $groupMember->group_id = $group->id;
                $groupMember->payout_order = rand(1,$request->total_cycle);
                $groupMember->has_received = 'no';
                $groupMember->status = 1;
                $groupMember->save();
                
            }
            DB::commit();
            return redirect()->route('groups.index')->with('success','Add group successfully');
            
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
        $groups = Group::findOrFail($id);
        $leader = User::where('role',2)->where('status',1)->latest()->get();

        return view('admin.groups.edit', compact('groups','leader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                $group =  Group::findOrFail($id);
        $group->fill($request->all());
        $group->total_members = $request->total_cycles;
        $group->save();
        return redirect()->route('groups.index')->with('success','Update group successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::destroy($id);
        return redirect()->route('groups.index')->with('success','Deleted group successfully');

    }
    public function assignMember($id){
        $group = Group::findOrFail($id);
        $groupMember = GroupMember::with('member')->where('group_id',$id)->paginate(10);
        $member = User::where('role',3)->where('status',1)->latest()->get();
        return view('admin.groups.assign-member',compact('group','member','groupMember'));

    }
    public function assignMemberAdd(Request $request){
        $groupMember = GroupMember::where('group_id',$request->group_id)->where('user_id',$request->user_id)->first();
        if ($groupMember) {
        return redirect()->back()->with('error','Member alredy assign in this group');
            
        }

        $groupMember = GroupMember::where('id',$request->group_member_id)->where('group_id',$request->group_id)->update(['user_id'=>$request->user_id]);
        return redirect()->back()->with('success','Assign member successfully');

    }
}
