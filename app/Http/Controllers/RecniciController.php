<?php
namespace App\Http\Controllers;

use App\RecniciImena;
use App\Sadrzaj;
use Illuminate\Http\Request;
use Redirect;

class RecniciController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imena = RecniciImena::all();
        
        return view('welcome', compact('imena'));
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ime_recnika = $request->get('ime_recnika');
        RecniciImena::firstOrCreate(['recnici' => $ime_recnika]);
        
        return Redirect::back();
    }
    
    
    
    public function search(Request $request)
    {
        $id = '%'.$request->get('search').'%';
        $search = Sadrzaj::with('recnika')->where('engleski', 'LIKE', $id)
                         ->orWhere('srpski', 'LIKE', $id)->get();
        foreach ($search as $row) {
            $ids[] = $row->id_recnika;
        }
        if ( ! empty($ids)) {
            $imena = RecniciImena::findMany($ids);
        } else {
            $imena = [];
        }
        
        return view('search', compact('search', 'imena'));
    }
    
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sadrzaj::create($request->all());
        
        return Redirect::back();
    }
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Sadrzaj::find($id);
        
        return view('show', compact('show'));
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Sadrzaj::find($id);
        
        return view('recnik/edit', compact('edit'));
    }
    
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Sadrzaj::find($id);
        $edit->update($request->all());
        
        return Redirect::to('/recnik/'.$edit->id);
    }
    
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sadrzaj::destroy($id);
        
        return Redirect::to('/recnik');
    }
}
