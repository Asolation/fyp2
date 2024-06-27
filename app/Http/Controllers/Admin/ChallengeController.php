<?php
namespace App\Http\Controllers\Admin;

use App\Models\Challenge;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Admin\ChallengeRequest;

class ChallengeController extends Controller
{
    public function index(): View
    {
        $challenges = Challenge::all();
        return view('admin.challenge.index', compact('challenges'));
    }

    public function create(): View
    {
        return view('admin.challenge.create');
    }

    public function store(ChallengeRequest $request): RedirectResponse
    {
        $challenge = Challenge::create($request->all());
        return redirect()->route('admin.challenges.index')->with([
            'message' => 'Challenge successfully created!',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Challenge $challenge): View
    {
        return view('admin.challenge.edit', compact('challenge'));
    }

    public function update(ChallengeRequest $request, Challenge $challenge): RedirectResponse
    {
        $challenge->update($request->all());
        return redirect()->route('admin.challenges.index')->with([
            'message' => 'Challenge successfully updated!',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Challenge $challenge): RedirectResponse
    {
        $challenge->delete();
        return redirect()->route('admin.challenges.index')->with([
            'message' => 'Challenge successfully deleted!',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Challenge::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
