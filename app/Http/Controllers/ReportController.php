<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $q          = $request->query('q');
        $department = $request->query('department');
        $position   = $request->query('position');
        $status     = $request->query('status');

        $query = Employee::query()->with(['department','position']);

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('nama_lengkap','like',"%{$q}%")
                    ->orWhere('email','like',"%{$q}%")
                    ->orWhere('nomor_telepon','like',"%{$q}%");
            });
        }

        if ($department) {
            if (Schema::hasColumn('employees','departemen')) {
                $query->where('departemen', $department);
            } else {
                $query->where('departemen_id', $department);
            }
        }

        if ($position) {
            if (Schema::hasColumn('employees','jabatan')) {
                $query->where('jabatan', $position);
            } else {
                $query->where('jabatan_id', $position);
            }
        }

        if ($status) {
            $query->where('status', $status);
        }

        $employees = $query->latest()->paginate(15)->withQueryString();

        $departments = Department::orderBy('nama_departments')->pluck('nama_departments','nama_departments');
        $positions   = Position::orderBy('nama_jabatan')->pluck('nama_jabatan','nama_jabatan');

        if ($departments->isEmpty() && Schema::hasTable('departments')) {
            $departments = Department::orderBy('nama_departments')->pluck('nama_departments','id');
        }
        if ($positions->isEmpty() && Schema::hasTable('positions')) {
            $positions = Position::orderBy('nama_jabatan')->pluck('nama_jabatan','id');
        }

        return view('reports.index', compact('employees','departments','positions','q','department','position','status'));
    }

    public function export(Request $request): StreamedResponse
    {
        $dataQuery = $this->indexQueryFromRequest($request);

        $filename = 'employees-report-'.date('Ymd_His').'.csv';

        $response = new StreamedResponse(function () use ($dataQuery) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID','Nama','Email','Telepon','Tanggal Lahir','Alamat','Tanggal Masuk','Status','Departemen','Jabatan','Dibuat']);

            $dataQuery->orderBy('id')->chunk(200, function($rows) use ($handle) {
                foreach ($rows as $r) {
                    $dept = $r->departemen ?? optional($r->department)->nama_departments ?? '';
                    $pos  = $r->jabatan ?? optional($r->position)->nama_jabatan ?? '';
                    fputcsv($handle, [
                        $r->id,
                        $r->nama_lengkap,
                        $r->email,
                        $r->nomor_telepon,
                        $r->tanggal_lahir,
                        $r->alamat,
                        $r->tanggal_masuk,
                        $r->status,
                        $dept,
                        $pos,
                        $r->created_at ? $r->created_at->toDateTimeString() : ''
                    ]);
                }
            });

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);

        return $response;
    }

    protected function indexQueryFromRequest(Request $request)
    {
        $q          = $request->query('q');
        $department = $request->query('department');
        $position   = $request->query('position');
        $status     = $request->query('status');

        $query = Employee::with(['department','position']);

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('nama_lengkap','like',"%{$q}%")
                    ->orWhere('email','like',"%{$q}%")
                    ->orWhere('nomor_telepon','like',"%{$q}%");
            });
        }

        if ($department) {
            if (Schema::hasColumn('employees','departemen')) {
                $query->where('departemen', $department);
            } else {
                $query->where('departemen_id', $department);
            }
        }

        if ($position) {
            if (Schema::hasColumn('employees','jabatan')) {
                $query->where('jabatan', $position);
            } else {
                $query->where('jabatan_id', $position);
            }
        }

        if ($status) {
            $query->where('status', $status);
        }

        return $query;
    }
}