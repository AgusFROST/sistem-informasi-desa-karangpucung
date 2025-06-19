<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\RuleCategory;
use Illuminate\Support\Str;

class DashboardRuleController extends Controller
{
    public function index($categorySlug)
    {
        $category = RuleCategory::where('slug', $categorySlug)->firstOrFail();
        return view('dashboard.ui.peraturan.aturan.aturans', [
            'title' => $category->name,
            'category' => $category,
            'rules' => $category->rules
        ]);
    }

    public function create($categorySlug)
    {
        $category = RuleCategory::where('slug', $categorySlug)->firstOrFail();
        return view('dashboard.ui.peraturan.aturan.create', [
            'title' => 'Tambah Aturan',
            'category' => $category
        ]);
    }

    public function store(Request $request, $categorySlug)
    {
        $category = RuleCategory::where('slug', $categorySlug)->firstOrFail();

        $request->validate([
            'name' => 'required|unique:rules,name',
            'body' => 'required'
        ]);

        Rule::create([
            'rule_category_id' => $category->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'body' => $request->body
        ]);

        return redirect("/dashboard/ui/peraturan/{$categorySlug}")->with('success', 'Aturan berhasil ditambahkan.');
    }

    public function edit($categorySlug, $ruleSlug)
    {
        $rule = Rule::where('slug', $ruleSlug)->firstOrFail();
        return view('dashboard.ui.peraturan.aturan.edit', [
            'title' => 'Edit Aturan',
            'rule' => $rule,
            'categorySlug' => $categorySlug
        ]);
    }

    public function update(Request $request, $categorySlug, $ruleSlug)
    {
        $rule = Rule::where('slug', $ruleSlug)->firstOrFail();

        $request->validate([
            'name' => 'required|unique:rules,name,' . $rule->id,
            'body' => 'required'
        ]);

        $rule->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'body' => $request->body
        ]);

        return redirect("/dashboard/ui/peraturan/{$categorySlug}")->with('success', 'Aturan berhasil diperbarui.');
    }

    public function destroy($categorySlug, $ruleSlug)
    {
        $rule = Rule::where('slug', $ruleSlug)->firstOrFail();
        $rule->delete();

        return redirect("/dashboard/ui/peraturan/{$categorySlug}")->with('success', 'Aturan berhasil dihapus.');
    }
}
