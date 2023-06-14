<?php

namespace App\Imports;

use App\Models\Blocklist;
use App\Models\Whitelist;
use Maatwebsite\Excel\Concerns\ToModel;

class WhiteListImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $ifExistInBlockList = Blocklist::where('phone', $row[0])->first();
        if($ifExistInBlockList){
            return;
        }
        $ifPhoneExist = Whitelist::where('phone', $row[0])->first();
        if($ifPhoneExist){
            return;
        }
        return new Whitelist([
            'phone'     => $row[0],
            'name'    => $row[1],
            'department' => $row[2],
            'duration' => $row[3],
            'remarks' => $row[4],
            'status' => $row[5],
            'created_by' => $row[6],
            'updated_by' => $row[7],
        ]);
    }
}
