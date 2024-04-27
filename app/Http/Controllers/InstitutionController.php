<?php

namespace App\Http\Controllers;

use App\Models\institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index()
    {
        $institution = institution::find(1);


        return view('admins.institutions.index', [
            'institution' => $institution,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'fax' => 'required',
        ]);

        $file = $request->file('logo');
        $path = null;

        if ($file) {
            $path = $file->store('institution');
        }

        auth()->user()->institution()->create([
            'logo' => $path,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'fax' => $request->fax,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('institutions.index');
    }

    public function update(Request $request)
    {
        $id = 1;

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'fax' => 'required',
        ]);

        $file = $request->file('logo');
        $path = null;

        if ($file) {
            $path = $file->store(public_path('logo'), 'public');
        }


        $institution = institution::find($id);
        $institution->logo = $path;
        $institution->name = $request->name;
        $institution->phone = $request->phone;
        $institution->address = $request->address;
        $institution->fax = $request->fax;
        $institution->save();

        return redirect()->route('institutions.index');
    }
}
