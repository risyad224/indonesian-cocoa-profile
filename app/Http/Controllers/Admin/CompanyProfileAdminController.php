<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileAdminController extends Controller
{
    public function index()
    {
        $profiles = CompanyProfile::latest()->paginate(10);
        return view('admin.company_profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.company_profiles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:company_profiles,slug',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('company_profiles', 'public');
        }

        CompanyProfile::create($data);

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil perusahaan dibuat');
    }

    public function edit(CompanyProfile $companyProfile)
    {
        return view('admin.company_profiles.edit', compact('companyProfile'));
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:company_profiles,slug,' . $companyProfile->id,
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($companyProfile->image) {
                Storage::disk('public')->delete($companyProfile->image);
            }
            $data['image'] = $request->file('image')->store('company_profiles', 'public');
        } else {
            unset($data['image']);
        }

        $companyProfile->update($data);

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil perusahaan diperbarui');
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        if ($companyProfile->image) {
            Storage::disk('public')->delete($companyProfile->image);
        }

        $companyProfile->delete();

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil perusahaan dihapus');
    }
}
