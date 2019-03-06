<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Controllers\Controller;
use App\Team;
use Yajra\Datatables\Datatables;

class ArrayResponseController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.array');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        $builder = Team::query()->select('name');

        return $datatables->eloquent($builder)
            ->editColumn('name', function ($team) {
                return '<a>' . $team->name . '</a>';
            })
            ->addColumn('action', 'eloquent.tables.teams-action')
            ->rawColumns([1])
            ->make();
    }
}

