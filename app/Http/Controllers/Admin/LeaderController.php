<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminLeaderRequest;
use App\Http\Requests\StoreLeaderRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\returnArgument;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leader = User::where('role',2)->latest()->paginate(10);
        return view('admin.users.index', compact('leader'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminLeaderRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $file = $request->file('profile_image');

        if (!$file) {
            return redirect()->back()->withErrors('No file uploaded.');
        }

        $destinationPath = public_path('uploads');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0775, true);
        }

        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);
        chmod($destinationPath . '/' . $fileName, 0775);

        $user->profile_image = $fileName;
        $user->role = 2;
        $user->save();
            return redirect()->route('leader.index')->with('success','Add Leader successfully');

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
              $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $user =  User::findOrFail($id);
        $user->fill($request->all());
        $file = $request->file('profile_image');

        if ($file) {
            $destinationPath = public_path('uploads');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }
    
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            chmod($destinationPath . '/' . $fileName, 0775);
    
            $user->profile_image = $fileName;
        }

        $user->role = 2;
        $user->save();
            return redirect()->route('leader.index')->with('success','Update Leader successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
            return redirect()->route('leader.index')->with('success','Deleted    Leader successfully');

    }
    public function toggleStatus(Request $request){
        $user = User::where('role',2)->find($request->id);
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();
        return response()->json($user->status);
    }
    public function groupLink($id){
        $group = Group::where('leader_id',$id)->latest()->paginate(10);
        return view('admin.users.groups',compact('group'));
    }
}
