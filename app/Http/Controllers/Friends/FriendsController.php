<?php

namespace App\Http\Controllers\Friends;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_amigos')->only(['create','store']);
        $this->middleware('role_or_permission:read_amigos')->only(['index','show']);
        $this->middleware('role_or_permission:update_amigos')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_amigos')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $friends = Friend::all();
            return  DataTables::of($friends)
                ->addIndexColumn()
                ->editColumn('nombre', function ($friends){
                    return $friends->nombre .' '.  $friends->paterno .' '. $friends->materno;
                })
                ->addColumn('buttons', function ($friends){
                    $opciones = '';
                    if (Auth::user()->can('create_amigos')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon info icon-dual-info"><i class="mdi mdi-account-details"></i></button>';
                    }
                    if (Auth::user()->can('update_amigos')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon edit icon-dual-warning"><i class="mdi mdi-account-edit"></i></button>';
                    }
                    if (Auth::user()->can('delete_amigos')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon delete icon-dual-danger"><i class="mdi mdi-account-remove"></i></button>';
                    }
                return $opciones;

                    return  $opciones  =    '<button
                                                type="button"
                                                class="btn btn-sm action-icon icon-dual-blue">
                                                <i class="mdi mdi-account-details"></i>
                                            </button>';
                })
                ->rawColumns(['buttons'])
                ->toJson();
        }

        return view('amigos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $amigos = Friend::create($request->all());
        return redirect()->back()->with('status_success','Nuevo Amigo Registrado');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
