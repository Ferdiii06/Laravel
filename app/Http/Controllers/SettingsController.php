<?php
namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::latest()->paginate(10);
        return view('settings.index', compact('settings'));
    }

    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'nullable|string|max:191',
            'site_description' => 'nullable|string|max:2000',
            'company_name' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:2000',
            'timezone' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Settings::create($data);

        return redirect()->route('settings.index')->with('success', 'Settings saved.');
    }

    public function edit($id)
    {
        $setting = Settings::findOrFail($id);
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Settings::findOrFail($id);

        $data = $request->validate([
            'site_name' => 'nullable|string|max:191',
            'site_description' => 'nullable|string|max:2000',
            'company_name' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:2000',
            'timezone' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // delete existing file if present
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $setting->update($data);

        return redirect()->route('settings.index')->with('success', 'Settings updated.');
    }

    public function destroy($id)
    {
        $setting = Settings::findOrFail($id);
        if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
            Storage::disk('public')->delete($setting->logo);
        }
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Settings deleted.');
    }
}