<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{

    public $numberImg;

    public function __construct()
    {
        $this->numberImg = 1;
    }


    public function create(Listing $listing)
    {

        $listing->load(['images']);

        return inertia(
            'Realtor/ListingImage/Create',
            [
                'listing' => $listing
            ]
        );

    }

    public function store(Listing $listing, Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $request->validate([
                    'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
                ], [
                    'images.*.mimes' => 'The file should be in one of the formats: jpg, png, jpeg, webp'
                ]);

                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }


        return redirect()->back()->with('success', 'Image was Upload!');


    }

    public function destroy(Listing $listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();
        return redirect()->back()->with('success', 'Image was deleted!');

    }
}
