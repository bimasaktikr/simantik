<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\Office;
use App\DataTables\UsersDataTable;
use App\Imports\MitraImport;
use App\Models\Activity;
use Illuminate\Support\Str;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mitraList = Mitra::all();
        
        if($request->ajax()){
                return datatables()->of($mitraList)
                            ->addColumn('action', function($data){
                                // $button = '<a href="/mitra/'.$data->slug.'" data-toggle="tooltip"  data-id="'.$data->slug.'" data-original-title="Detail" class="edit btn btn-primary btn-sm detailBtn"><i class="far fa-edit"></i> Detail </a>';
                                $button = '<a href="/mitra/'.$data->slug.'" data-toggle="tooltip"  data-id="'.$data->slug.'" data-original-title="Detail" class="edit btn btn-primary btn-sm detail-post"><i class="far fa-edit"></i> Detail </a>';
                                $button .= '&nbsp;&nbsp;';
                                $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                                $button .= '&nbsp;&nbsp;';
                                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                                return $button;
                            })
                            ->rawColumns(['action'])
                            ->addIndexColumn()
                            ->make(true);
        }
    
        return view('mitra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $waktu = $request->waktu;
        $kualitas = $request->kualitas;
        $sikap = $request->sikap;

        $ipk = ($waktu + $kualitas + $sikap)/3;

        $post   =   Mitra::updateOrCreate(['id' => $id],
                    [
                        'name' => $request->name,
                        'slug' => Str::slug($request->name),
                        'gender' => $request->gender,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                        // 'address' => $request->address,
                        'waktu' => $waktu,
                        'sikap' => $sikap,
                        'kualitas' => $kualitas,
                        'ipk' => $ipk,
                    ]); 

        return response()->json($post);
    }

    public function addMitra(Request $request)
    {   
        
        $name = $request->name;
        $slug = Str::slug($name);

        $data = [
            'name' => $request->name,
            'slug' => $slug,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ];
        Mitra::create($data);
        return response()->json(true);

    }

    public function updateNilai($id){

        $waktuTotal = Activity::select('waktu')
                        ->where('mitra_id', '=', $id)
                        ->avg('waktu');
        $kualitasTotal = Activity::select('kualitas')
                        ->where('mitra_id', '=', $id)
                        ->avg('kualitas');
        $sikapTotal = Activity::select('sikap')
                        ->where('mitra_id', '=', $id)
                        ->avg('sikap');
        $ipkTotal = Activity::select('ipk')
                        ->where('mitra_id', '=', $id)
                        ->avg('ipk');

        $model = Mitra::find($id);
        $model->update([
                'waktu'=>$waktuTotal,
                'kualitas'=>$kualitasTotal,
                'sikap'=>$sikapTotal,
                'ipk'=>$ipkTotal,
            ]);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $where = array('slug' => $slug);
        $mitra  = Mitra::where($where)->first();
        $count  = $mitra->activity->count();
        // return $mitra;
        // return response()->json($mitra);  
        return view('mitra.profil', [
            "mitra" => $mitra,
            "userAct" => $mitra->activity,
            "count" => $count
        ]);     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Mitra::where($where)->first();
     
        return response()->json($post);
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


    // IMPORT MITRA
    public function importMitra (Request $request){
        
        Excel::import(new MitraImport(), $request->file('importFile'));

        return 'SUCCESS';
    }
}
