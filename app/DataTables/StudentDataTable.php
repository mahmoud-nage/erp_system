<?php

namespace App\DataTables;

use App\StudentAffairs\Stage;
use App\StudentAffairs\Student;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', 'studentAffairs.student.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
    {
        // dd($model->id);
        return $model->newQuery()->select(['stages.name_'.app()->getLocale().' as stage_name',
        'levels.name_'.app()->getLocale().' as level_name',
        'classes.name_'.app()->getLocale().' as class_name',
        'students.name_'.app()->getLocale().' as std_name'])
        ->where('students.id', '=',$model->id)
        ->join('level_student', 'level_student.student_id', '=', 'students.id')
        ->join('stages', 'level_student.stage_id', '=', 'stages.id')
        ->join('levels', 'level_student.level_id', '=', 'levels.id')
        ->join('classes', 'level_student.stage_id', '=', 'classes.id')->get();

    }

//     protected function getdata(){


// // dd(auth()->user()->roles->pluck('model_id'));

// // $data = $model->select(['stages.name_'.app()->getLocale().' as stage_name',
// // 'levels.name_'.app()->getLocale().' as level_name',
// // 'classes.name_'.app()->getLocale().' as class_name',
// // 'students.name_'.app()->getLocale().' as std_name'])
// // ->join('level_student', 'level_student.student_id', '=', 'students.id')
// // ->join('stages', 'level_student.stage_id', '=', 'stages.id')
// // ->join('levels', 'level_student.level_id', '=', 'levels.id')
// // ->join('classes', 'level_student.stage_id', '=', 'classes.id')->get()->response()->json();

// // return $data;

//     }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->setTableId('data-table')
        ->minifiedAjax()
        ->addTableClass('table table-bordered table-striped')
        ->parameters([
            'dom'          => 'Bfrtip',
            "lengthMenu"=> [[10, 25, 50, -1], [10, 25, 50, "All"]],

            'buttons'      =>[
                ['extend' => 'create', 'className' => 'btn btn-success', 'text' => __('lang.create')],
                ['extend' => 'print', 'className' => 'btn btn-info', 'text' => __('lang.print')],
                ['extend' => 'excel', 'className' => 'btn btn-warning', 'text' => __('lang.excel')],
                ['extend' => 'pdf', 'className' => 'btn btn-danger', 'text' => __('lang.pdf')],
            ], 
            'initComplete' => "function () {
                // alert($.fn.dataTable.ext.errMode = 'throw');
                this.api().columns([1,2,3,4,5]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    input.className = \"f_search\";
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }"
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        
        // $datas = $this->getdata();
// $s = Student::find(17);
        // dd($this->query($s)->toJson());
// dd($datas);
        return [
            [
                'defaultContent' => '',
                'data'           => 'DT_RowIndex',
                'name'           => 'DT_RowIndex',
                'title'          => '#',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
            ],

            [
                'name' => 'name_'.app()->getLocale(),
                'data' => 'name_'.app()->getLocale(),
                'title' => __('lang.name')
            ], 

           [
                'name' => 'action',
                'data' => 'action',
                'title' => __('lang.actions'),
                'width' => 70,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                'printable' => false
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Students_' . date('YmdHis');
    }
}
