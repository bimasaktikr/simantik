<?php

namespace App\DataTables;
use App\Models\User;
use App\Models\Activity;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Response;

class ActivityDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable()
    {
        $activity = Activity::with('mitra', 'job', 'division');
        
        return datatables()
            ->eloquent($activity)
            ->addColumn('mitra', function (Activity $activity) {
                return $activity->mitra->name;
            })
            ->addColumn('job', function (Activity $activity) {
                return $activity->job->name;
                // return $activity->job->division->name;
            })
            ->addColumn('division', function (Activity $activity) {
                return $activity->division->name;
            });
            // ->addColumn('action', 'activitydatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ActivityDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $activity)
    {
        // $activity = Activity::all();
        $activity = Activity::with('mitra', 'job', 'division');
        
        return $this->applyScopes($activity);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('activity-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('mitra'),
            Column::make('job'),
            Column::make('division'),
            Column::make('waktu'),
            Column::make('kualitas'),
            Column::make('sikap'),
            Column::make('ipk')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Activity_' . date('YmdHis');
    }
}
