<?php

namespace App\Http\Controllers;


use App\Models\Module;
use App\Traits\UploadAble;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    use UploadAble;
    public function index()
    {
        $modules = Module::whereHas('users', function($q)
        {
            $q->where('users.id', auth()->id());
        })->latest()->get();
        return view('modules', compact('modules'));
    }

    public function show($id)
    {
        $module = Module::with(['lessons', 'tutorials', 'works'])->findOrFail($id);
        return view('modules-show', compact('module'));
    }

    public function storeLesson($id, Request $request)
    {
        $data = $request->validate([
           'file' => 'required|file'
        ]);

        $module = Module::findOrFail($id);

        $path = $this->uploadOne($data['file']);

        $module->lessons()->create([
            'file' => $path,
            'name' => 'cours '.$module->lessons()->count()+1
        ]);

        return back();
    }

    public function storeWork($id, Request $request)
    {
        $data = $request->validate([
            'file' => 'required|file'
        ]);

        $module = Module::findOrFail($id);

        $path = $this->uploadOne($data['file']);
        $module->works()->create([
            'file' => $path,
            'name' => 'devoir '.$module->works()->count()+1

        ]);

        return back();
    }

    public function storeTutorial($id, Request $request)
    {
        $data = $request->validate([
            'file' => 'required|file'
        ]);

        $module = Module::findOrFail($id);

        $path = $this->uploadOne($data['file']);
        $module->tutorials()->create([
            'file' => $path,
            'name' => 'TD '.$module->tutorials()->count()+1

        ]);

        return back();
    }
}
