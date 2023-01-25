<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProvidersModel extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'tbl_providers';
    protected $fillable = [
        'name',
        'url'
    ];

    protected function get_providers() {
        $providers = DB::table('tbl_providers')
                    ->select('*')
                    ->where('status', 'active')
                    ->get();
        
        return $providers;
    }

    protected function get_provider_by_id($id) {
        $providers = DB::table('tbl_providers')
                    ->select('*')
                    ->where('status', 'active')
                    ->where('id', $id)
                    ->first();

        return $providers;
    }
}
