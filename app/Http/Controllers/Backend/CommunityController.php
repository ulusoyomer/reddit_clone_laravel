<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;
use App\Models\Community;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $communities = Community::paginate(5)->through(fn($community) =>[
            'id' => $community->id,
            'name' => $community->name,
            'slug' => $community->slug
        ]);
        return Inertia::render('Communities/Index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Communities/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommunityStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CommunityStoreRequest $request): RedirectResponse
    {
        Community::create($request->validated() + ['user_id' => auth()->id()]);

        return to_route('communities.index')->with('message','Community Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Community $community
     * @return Response
     */
    public function edit(Community $community): Response
    {
        return  Inertia::render('Communities/Edit',compact('community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CommunityStoreRequest $request
     * @param Community $community
     * @return RedirectResponse
     */
    public function update(CommunityStoreRequest $request, Community $community): RedirectResponse
    {
        $community->update($request->validated());

        return to_route('communities.index')->with('message','Community Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Community $community
     * @return RedirectResponse
     */
    public function destroy(Community $community): RedirectResponse
    {
        $community->delete();
        return back()->with('message','Community Deleted Successfully.');
    }
}
