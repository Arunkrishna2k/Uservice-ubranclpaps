<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HealthController extends Controller
{
    public function index(){
        if(DB::connection()->getDatabaseName())
        {
            $dbStatus ="Running";
            $result = DB::select(DB::raw('SELECT table_name AS "Table",
            ((data_length + index_length) / 1024) AS "Size"
            FROM information_schema.TABLES
            WHERE table_schema ="'.DB::connection()->getDatabaseName(). '"
            ORDER BY (data_length + index_length) DESC'));
            $size = array_sum(array_column($result, 'Size'));
            $dbName = DB::connection()->getDatabaseName();

        }else{
            $dbStatus = 'Failed';
        }

        $command = "service httpd status";
        $php_version = phpversion();
        $res = exec($command);
        $array = explode(" ", $res);
        $mem_usage = memory_get_usage();
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            exec('wmic OS get FreePhysicalMemory /Value 2>&1', $output, $return);
            $memory = substr($output[2],19);
            $totalRam = "";
            $usedMemInGB= "";

            $_ENV['typeperfCounter'] = '\processor(_total)\% processor time';
            exec('typeperf -sc 1 "'.$_ENV['typeperfCounter'].'"', $p);
           // $line = explode(',', $p[2]);
           $line = "";
            // if($line[1]){
            //     $load = trim($line[1], '"');
            // }else{
            //     $load = 'NA';
            // }
            $load = 'NA';

        } else {
            //RAM usage
            $free = shell_exec('free');
            $free = (string)trim($free);
            $free_arr = explode("\n", $free);
            $mem = explode(" ", $free_arr[1]);
            $mem = array_filter($mem);
            $mem = array_merge($mem);
            $usedmem = $mem[2];
            $usedMemInGB = number_format($usedmem / 1048576, 2) . ' GB';
            $memory1 = $mem[2] / $mem[1] * 100;
            $memory = round($memory1) . '%';
            $fh = fopen('/proc/meminfo', 'r');
            $mem = 0;
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                    $mem = $pieces[1];
                    break;
                }
            }
            fclose($fh);
            $totalRam = number_format($mem / 1048576, 2) . ' GB';

            //cpu usage
            $cpu_load = sys_getloadavg();
            $load = $cpu_load[0] . '% / 100%';
        }

        $total_disk = disk_total_space('/');
        $total_disk_size = $total_disk / 1073741824;

        $free_disk = disk_free_space('/');
        $used_disk = $total_disk - $free_disk;

        $disk_used_size = $used_disk / 1073741824;
        $use_disk = round(100 - (($disk_used_size / $total_disk_size) * 100));

        $diskUse = round(100 - ($use_disk)) . '%';

        return view('health',compact('dbStatus','dbName', 'php_version', 'mem_usage', 'memory','totalRam','usedMemInGB','load', 'diskUse'));
    }

}
