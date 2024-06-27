<?php

namespace App\Http\Controllers\Admin;

use App\Models\Simulation;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Admin\SimulationRequest;



class SimulationController extends Controller
{

    public function index(): View
    {
        $simulations = Simulation::all();
        return view('admin.simulation.index', compact('simulations'));
    }

    public function create(): View
    {
        return view('admin.simulation.create');
    }

    public function store(SimulationRequest $request): RedirectResponse
    {
        $simulation = Simulation::create($request->all());
        return redirect()->route('admin.simulations.index')->with([
            'message' => 'Simulation successfully created!',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Simulation $simulation): View
    {
        return view('admin.simulation.edit', compact('simulation'));
    }

    public function update(SimulationRequest $request, Simulation $simulation): RedirectResponse
    {
        $simulation->update($request->all());
        return redirect()->route('admin.simulations.index')->with([
            'message' => 'Simulation successfully updated!',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Simulation $simulation): RedirectResponse
    {
        $simulation->delete();
        return redirect()->route('admin.simulations.index')->with([
            'message' => 'Simulation successfully deleted!',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Simulation::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
