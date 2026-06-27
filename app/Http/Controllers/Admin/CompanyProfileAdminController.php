<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyProfileRequest;
use App\Http\Requests\UpdateCompanyProfileRequest;

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

    public function store(StoreCompanyProfileRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode($file->get());
            $mime = $file->getClientMimeType();
            $data['image'] = "data:{$mime};base64,{$base64}";
        }

        CompanyProfile::create($data);

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil dibuat');
    }

    public function edit(CompanyProfile $companyProfile)
    {
        return view('admin.company_profiles.edit', compact('companyProfile'));
    }

    public function update(UpdateCompanyProfileRequest $request, CompanyProfile $companyProfile)
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode($file->get());
            $mime = $file->getClientMimeType();
            $data['image'] = "data:{$mime};base64,{$base64}";
        } else {
            unset($data['image']);
        }

        $companyProfile->update($data);

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil diperbarui');
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        // Vercel Base64 handling - no file to delete on disk

        $companyProfile->delete();

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil perusahaan dihapus');
    }
}
