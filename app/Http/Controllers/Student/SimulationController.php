<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Simulation;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class SimulationController extends Controller
{
    public function index()
    {

        return view('student.simulation.list' , ['simulations' => Simulation::where('available', true)->get()]);
    }
}
