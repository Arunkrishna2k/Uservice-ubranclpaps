<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Rules extends Component
{
    public $params;

    public $rulesData = [];


    public $addRules = [];
    public $rulesDesc;

    public function mount()
    {
        $setting = Setting::all();
        count($setting) > 0 ? $this->rulesData = json_decode($setting[0]->rule_data, true) : false;
    }

    public function addRules()
    {
        $this->rulesData[] = ['days' => '', 'count' => ''];
    }

    public function updateSettings()
    {
        $this->dispatchBrowserEvent('swal:model', [
            'type' => 'info',
            'title' => 'Want to update setting ?',
            'text' => ''
        ]);
        $settingCount = Setting::all();
        if (count($settingCount) > 0) {
            Setting::where('id', $settingCount[0]->id)->update(['rule_data'=> json_encode($this->rulesData)]);
        } else {
            $setting = new Setting();
            $setting->rule_data = json_encode($this->rulesData);
            $setting->save();
        }
    }

    public function removeProduct($index)
    {
        unset($this->rulesData[$index]);
        $this->rulesData = array_values($this->rulesData);
        if (count($this->rulesData) == 0) {
            $this->rulesDesc = "";
        }
    }

    public function render()
    {
        return view('livewire.rules');
    }
}
