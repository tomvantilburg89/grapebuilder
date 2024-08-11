<?php

namespace Vedian\Grapebuilder\Controllers;

use Illuminate\Http\Client\Request;
use Vedian\Grapebuilder\Models\Layout;
use Vedian\Grapebuilder\Support\Facades\Template;
use Vedian\Grapebuilder\Support\Template as SupportTemplate;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $type)
    {
        return Template::make($type)->create([
            'name' => 'New Layout',
            'return_view' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $type, Layout $layout)
    {
        dd($type, $layout);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $type, Layout $layout)
    {
        return Template::$type()->edit($layout);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layout $layout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
