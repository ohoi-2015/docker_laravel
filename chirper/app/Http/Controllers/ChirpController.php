<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // バリデーション
        $validated = $request->validate([
            'message' => 'required | string | max:255',
        ],
        [
            'message.required' => '入力してください。',
            'message.string' => '文字列として入力してください。',
            'message.max' => '255文字以内で入力してください。',
        ]
        );

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {
        // 現在のユーザーに対して指定されたアクションを許可する
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        // 現在のユーザーに対して指定されたアクションを許可する
        $this->authorize('update', $chirp);

        // バリデーション
        $validated = $request->validate([
            'message' => 'required | string | max:255',
        ],
        [
            'message.required' => '入力してください。',
            'message.string' => '文字列として入力してください。',
            'message.max' => '255文字以内で入力してください。',
        ]
        );

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        // 現在のユーザーに対して指定されたアクションを許可する
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
