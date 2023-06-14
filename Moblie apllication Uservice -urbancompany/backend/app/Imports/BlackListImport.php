<?php

namespace App\Imports;

use App\Models\Blocklist;
use App\Models\Whitelist;
use Maatwebsite\Excel\Concerns\ToModel;

class BlackListImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $ifPhoneExist = Whitelist::where('phone', $row[0])->first();
        if($ifPhoneExist){
            return;
        }
        $ifExistInBlockList = Blocklist::where('phone', $row[0])->first();
        if($ifExistInBlockList){
            return;
        }
        return new Blocklist([
            'phone'     => $row[0],
            'name'    => $row[1],
            'remarks' => $row[2],
            'status' => $row[3],
            'created_by' => $row[4],
            'updated_by' => $row[5],
        ]);
    }
}
