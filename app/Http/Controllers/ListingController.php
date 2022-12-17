<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Listing;
use App\Models\User;

class ListingController extends Controller
{
    //All listings
    public function index()
    {
        return view("listings.index", [
            'listings' => Listing::query()->latest()->filter(request(["tag", "search"]))->simplepaginate("6")
        ]);
    }

    public function userLists()
    {
        $listings = User::query()->find(auth()->user()->id)->listings;
        return view('listings.manage', compact('listings'));
    }

    //Show Create form
    public function create()
    {
        return view("listings.create");
    }

    //save form data
    public function store(ListingRequest $request)
    {
        if ($request->hasFile("logo")) {
            $logo = $request->file('logo')->store("logos", "public");
        }
        Listing::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'company' => $request->company,
            'logo' => $logo ?? null,
            'tags' => $request->tags,
            'location' => $request->location,
            'email' => $request->email,
            'website' => $request->website,
            'description' => $request->description
        ]);
        return redirect()->route("home")
            ->with("message", "Created for you :)");
    }

    //Show one listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function edit(Listing $listing)
    {
        return view("listings.edit", ['listing' => $listing]);
    }

    public function update(Listing $listing, ListingRequest $request)
    {
        if ($listing->user_id != auth()->user()->id) {
            abort(403);
        }
        if ($request->hasFile("logo")) {

            $logo = $request->file('logo')->store("logos", "public");
        }

        $listing->update([
            'title' => $request->title,
            'company' => $request->company,
            'logo' => $logo ?? null,
            'tags' => $request->tags,
            'location' => $request->location,
            'email' => $request->email,
            'website' => $request->website,
            'description' => $request->description
        ]);
        return redirect()->route("home")
            ->with("message", "Edited for you :)");
    }

    public function delete(Listing $listing)
    {
        if ($listing->user_id != auth()->user()->id) {
            abort(403);
        }
        $listing->delete();
        return redirect()->route("home")
            ->with("message", "delete for you :(((((");
    }

}
