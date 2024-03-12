<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Type;

use App\Http\Requests\type\StoreRequest as TypeStoreRequest;
use App\Http\Requests\type\UpdateRequest as TypeUpdateRequest;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeStoreRequest $request)
    {
        $typeData = $request->validated();
        $type = type::create($typeData);
        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeUpdateRequest $request, Type $type)
    {
        $typeData = $request->validated();
        $type->update($typeData);
        return redirect()->route('admin.types.show', ['type' => $type->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}