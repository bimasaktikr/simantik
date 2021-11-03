<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Controllers\MitraController;
// use App\Http\Controllers\Datatables;
use App\Models\Job;
use App\Models\Mitra;
use Illuminate\Http\Request;
use App\DataTables\ActivityDataTable;
use Yajra\Datatables\Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActivityExport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{

    protected $MitraController;
    

    public function __construct(MitraController $MitraController)
    {
        $this->MitraController = $MitraController;
    }

    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        // public function index(ActivityDataTable $dataTable)
        // {
        //     return $dataTable->render('activity.index');
        // }
    // public function index()
    // {
    //     return view('activity.home');
    // }
    
    public function index(Request $request)
    {
        $activity = Activity::all();
        if($request->ajax()){

            $activity = Activity::with('mitra', 'job', 'division');
            
            return Datatables::of($activity)
            ->addColumn('mitra', function (Activity $activity) {
                return $activity->mitra->mitra;
            })
            ->addColumn('job', function (Activity $activity) {
                return $activity->job->name;
                // return $activity->job->division->name;
            })
            ->addColumn('division', function (Activity $activity) {
                return $activity->division->name;
                // return $activity->job->division->name;
            })
            ->toJson();
        }
        return view ('activity.index');
    }

    public function customFilter(Request $request)
    {
        $activity = Activity::all();
        if($request->ajax()){
            $waktu ='';
            $sikap = '';
            $kualitas = '';
            $ipk = '';

            if( ($request->input('waktu')) || 
                ($request->input('kualitas')) || 
                ($request->input('sikap'))|| 
                ($request->input('ipk')) ){
                $waktu = $request->input('waktu');  
                $sikap = $request->input('sikap');  
                $kualitas = $request->input('kualitas');  
                $ipk = $request->input('ipk');  
            }

       
            DB::enableQueryLog();

            // $activity = Activity::with('mitra', 'job', 'division')->get();

            $activity = Activity::with('mitra', 'job', 'division')
                        ->whereHas('division', function( Builder $query){
                            $user = Auth::user();
                            $div = Str::of($user->email)->after('3573');
                            $div2 = Str::of($div)->before('@bps.go.id');
                            $query -> where('division_id', "=", $div2);
                        })
                        ->where('waktu', ">=" , $waktu)
                        ->where('sikap', ">=" , $sikap)
                        ->where('kualitas', ">=" , $kualitas)
                        ->where('ipk', ">=" , $ipk)
                        ->get();

            // $activity = Activity::with('mitra', 'job', 'division')
            //             ->where('waktu', ">=" , $waktu)
            //             ->Where('sikap', ">=" , $sikap)
            //             ->Where('kualitas', ">=" , $kualitas)
            //             ->Where('ipk', ">=" , $ipk)
            //             ->get();
            
            // $query = DB::getQueryLog();
            // dd(end($query));
            
            return Datatables::of($activity)
            ->addColumn('mitra', function (Activity $activity) {
                return $activity->mitra->name;
            })
            ->addColumn('slug', function (Activity $activity) {
                return $activity->mitra->slug;
            })
            ->addColumn('job', function (Activity $activity) {
                return $activity->job->name;
            })
            ->addColumn('division', function (Activity $activity) {
                return $activity->division->name;
            })
            ->toJson();
        }
        return view ('activity.index');
    }
    
    // DOWNLOAD 
    public function export(Request $request)
    {

        $file_name = '';


        if($request->ajax()) {
            // $requestData = $request->all();
            $waktu = $request->input('waktu');  
            $sikap = $request->input('sikap');  
            $kualitas = $request->input('kualitas');  
            $ipk = $request->input('ipk');
            $file_name = 'Activity_Export.xlsx';
            
            // $data = [$waktu, $sikap, $kualitas, $ipk];
            // return $data;

            // to download directly need to return file
            // return Excel::download((new ActivityExport)
                    // ->forWaktu($waktu)
                    // ->forSikap($sikap)
                    // ->forKualitas($kualitas)
                    // ->forIpk($ipk),
            //         $file_name, null, []);
            
            return (new ActivityExport)
                    ->forWaktu($waktu)
                    ->forSikap($sikap)
                    ->forKualitas($kualitas)
                    ->forIpk($ipk)
                    ->download('invoices.xlsx');
            
        }

        // return Excel::download((new ActivityExport)
        //             ->forWaktu('8')
        //             ->forSikap('8')
        //             ->forKualitas('8')
        //             ->forIpk('8'),
        //             $file_name, null, [\Maatwebsite\Excel\Excel::XLSX]);
  

    }


    // FUNGSI DATA TABLES #2
    // public function getActivityData()
    // {
    //     $columns = [
    //         'id',
    //         'nama',
    //         'Kegiatan',
    //         'seksi',
    //         'waktu',
    //         'kualitas',
    //         'sikap',
    //         'ipk',
    //     ];

    //     $orderBy = $columns[request()->input("order.0.column")];
    //     $data = Activity::with('mitra', 'job', 'division');

    //     $recordsFiltered = $data->get()->count();
    //     $data = $data->orderBy($orderBy, \request()->input("order.0.dir"))->get();
    //     $recordsTotal = $data->count();
        
    //     return response()->json([
    //         'draw' => request()->input('draw'),
    //         'recordsTotal' => $recordsTotal,
    //         'recordsFiltered' => $recordsFiltered,
    //         'data' => $data
    //     ]);
    //     // dd( request()->all());

    // }

    public function searchName(Request $request)
    {
        $nameData = $request->all();
        $query = $nameData['query'];

        $filterdata = Mitra::select('name')
                        ->where('name', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filterdata);
    }
    public function searchJob(Request $request)
    {
        $nameData = $request->all();
        $query = $nameData['query'];
                        
        $user = Auth::user();
        $div = Str::of($user->email)->after('3573');
        $div2 = Str::of($div)->before('@bps.go.id');

        $filterdata = Job::select('name')
                        ->where('division_id', "=", $div2)
                        ->where('name', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filterdata);
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
    public function addActivity(Request $request)
    {
        $nameData = $request->name;
        $idMitra = Mitra::select('id')
                    ->where('name', '=', $nameData )
                    ->first();
        $idMitraValue = $idMitra->id;

        $jobData = $request->job;
        $idJob = Job::select('id')
                    ->where('name', '=', $jobData )
                    ->first(); 
        $idJobValue = $idJob->id;
        
        $waktu = floatval($request->waktu);
        $kualitas = floatval($request->kualitas);
        $sikap = floatval($request->sikap);
        $nilai = [$waktu, $kualitas, $sikap];
        $ipk = array_sum($nilai) / count($nilai);

        $data = [
            // 'mitra_id' => $idMitra,
            // 'job_id' => $idJob,
            'mitra_id' => $idMitraValue,
            'job_id' => $idJobValue,
            'tahun' => $request->tahun,
            'waktu' => $waktu,
            'kualitas' => $kualitas,
            'sikap' => $sikap,
            'ipk' => $ipk,
        ];

        Activity::create($data);
        $this->MitraController->updateNilai($idMitraValue); 
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }

    public function batchactivity()
    {   
        $user = Auth::user();
        $div = Str::of($user->email)->after('3573');
        $div2 = Str::of($div)->before('@bps.go.id');

        $filterdata = Job::select('name')
                        ->where('division_id', "=", $div2)
                        ->get();
        return view ('activity.add', [
            'jobs' => $filterdata
        ]);
    }
}
