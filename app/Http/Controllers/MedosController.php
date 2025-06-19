<?php

namespace App\Http\Controllers;

use App\Models\MediaSosial;
use Illuminate\Http\Request;
use App\Models\MedsosSvg;

class MedosController extends Controller
{
    public function index()
    {
        $mediaSosial = MediaSosial::with('medsosSvg')->get();
        $title = 'Media Sosial';
        return view('dashboard.ui.footer.medsos.medsos', compact('mediaSosial', 'title'));
    }


    public function create()
    {
        $medsosSvgs = MedsosSvg::all();
        $title = 'Tambah Media Sosial';
        return view('dashboard.ui.footer.medsos.create', compact('medsosSvgs', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medsos_svg_id' => 'required|exists:medsos_svg,id',
            'url' => 'nullable|url',
        ]);

        MediaSosial::create($request->all());

        return redirect()->route('media-sosial.index')->with('success', 'Media Sosial berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mediaSosial = MediaSosial::findOrFail($id);
        $medsosSvgs = MedsosSvg::all();
        $title = 'Edit Media Sosial';
        return view('dashboard.ui.footer.medsos.edit', compact('mediaSosial', 'medsosSvgs', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'medsos_svg_id' => 'required|exists:medsos_svg,id',
            'url' => 'nullable|url',
        ]);

        $mediaSosial = MediaSosial::findOrFail($id);
        $mediaSosial->update($request->all());

        return redirect()->route('media-sosial.index')->with('success', 'Media Sosial berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mediaSosial = MediaSosial::findOrFail($id);
        $mediaSosial->delete();

        return redirect()->route('media-sosial.index')->with('success', 'Media Sosial berhasil dihapus');
    }
}
