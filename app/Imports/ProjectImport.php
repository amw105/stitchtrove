<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;

class ProjectImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Project([
            'name'     => $row[0],
            'artist'    => $row[1], 
            'source' => $row[2],
            'image' => $row[3],
            'threads' => $row[4],
         ]);
    }
}
