<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Pelanggan;
use App\Models\Layanan;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'nullable|integer',
            'id_barber' => 'nullable|integer',
            'id_pesanan' => 'nullable|integer',
            'id_history' => 'nullable|integer',
            'nama_pelanggan' => 'nullable|string|max:255',
            'nama_barber' => 'nullable|string|max:255',
            'jenis_layanan' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        $review = Review::create($validated);

        return response()->json(['success' => true, 'data' => $review], 201);
    }

    public function show($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return response()->json($review, 200);
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['success' => false, 'message' => 'Review not found'], 404);
        }
        $review->delete();
        return response()->json(['success' => true, 'message' => 'Review deleted successfully'], 200);
    }

    public function getReviewsByBarber($barber_id) {
        $reviews = Review::where('id_barber', $barber_id)
            ->with(['pelanggan', 'layanan']) 
            ->get();
    
        if ($reviews->isEmpty()) {
            return response()->json([], 200); 
        }
    
        return response()->json($reviews, 200);
    }
    
}

