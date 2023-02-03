<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function ShowReviews()
    {
        $data['reviews'] = Review::with('user', 'product')->latest()->get();

        return view('admin.review.show', $data);
    }

    public function StoreReview(Request $request)
    {
        $product = $request->product_id;

        Review::create([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'summary' => $request->summary,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'created_at' => now(),
        ]);

        return back();
    }

    public function ReviewStatusUpdate(Request $request, $id)
    {

        $review = Review::findOrFail($id)->update([
            'status' => $request->status,
            'updated_at' => now()
        ]);

        return json_encode($review);
    }


    public function DeleteReview($id)
    {
        Review::findOrFail($id)->delete();

        return back();
    }
}