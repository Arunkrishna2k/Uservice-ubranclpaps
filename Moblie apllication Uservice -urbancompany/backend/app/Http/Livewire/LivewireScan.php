<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Scan;
use App\Models\Customer;

class LivewireScan extends Component
{
    public $scannedValue;
    public $selectedMethod;
    public $showMethodInfo;
    public $clearButton;
    public $scans;
    public $message;
    protected $listeners = ['message'];
    public function render()
    {
        $this->scans = Scan::get()->sortByDesc("id")->take(10);
        $this->methods = ["Select Option", "Bag", "Lunch", "Dinner"];
        return view('livewire.livewire-scan');
    }

    public function updatedScannedValue($registerNumber)
    {
        $from_date = "2022-08-26";
        $to_date = "2022-08-28";
        if(date("Y/m/d") < '2022/08/26' || date("Y/m/d") > '2022/08/28'){
            self::messageHandler("Invalid Date. Event happen only at 26 Aug to 28 Aug", "red");
            return;
         }
        if (is_numeric($registerNumber) && (strlen($registerNumber) == 4)) {
            $fullRegisterNumber = 'MADPEDI' . $registerNumber;

            if ($this->selectedMethod == "Select Option" || $this->selectedMethod == null) {
                self::messageHandler("Select any option", "red");
                return;
            }

            $split_reg_number = substr($fullRegisterNumber, -4);
            if ((int)$split_reg_number >= 2500 && (int)$split_reg_number <= 3000) {
                if ($this->selectedMethod == "Bag") {
                    self::messageHandler("One time customer not eligible for bag", "red");
                    return;
                }
                $oneTimeUser = Scan::where('register_number', $fullRegisterNumber)->whereBetween('date', [$from_date, $to_date])->first();
                if ($oneTimeUser) {
                    self::messageHandler("One time user get access only one time", "blue");
                    return;
                }
                if(date("Y/m/d") == '2022/08/26'){
                    if ($this->selectedMethod == "Dinner") {
                        self::messageHandler("Today Lunch only available", "red");
                        return;
                    }
                }else if(date("Y/m/d") == '2022/08/28'){
                    if ($this->selectedMethod == "Dinner") {
                        self::messageHandler("Today Lunch only available", "red");
                        return;
                    }
                }

                $scan = new Scan();
                $scan->register_number = $fullRegisterNumber;
                $scan->date = date("Y/m/d");
                $scan->bag = 0;
                if ($this->selectedMethod == "Lunch") {
                    $scan->lunch = 1;
                } else if ($this->selectedMethod == "Dinner") {
                    $scan->dinner = 1;
                }
                $scan->other_1 = "One time customer.";
                $scan->save();
                $this->scannedValue = null;
                $this->scans = Scan::all()->sortByDesc("id")->take(10);
                return;
            }
            $this->scannedValue = null;
            $isCustomerExist = Customer::where('register_number', $fullRegisterNumber)->first();
            if(!isset($isCustomerExist)){
                self::messageHandler("Customer Register number not exist in the Database", "red");
                return;
            }
            if(date("Y/m/d") == '2022/08/26'){
                if ($this->selectedMethod == "Dinner") {
                    self::messageHandler("Today Lunch only available", "red");
                    return;
                }
            }else if(date("Y/m/d") == '2022/08/28'){
                if ($this->selectedMethod == "Dinner") {
                    self::messageHandler("Today Lunch only available", "red");
                    return;
                }
            }

            $checkData = Scan::where('register_number', $fullRegisterNumber)
                ->where('date', date("Y/m/d"))->first();

            if (!isset($checkData)) {
                $bagCheck = Scan::where('register_number', $fullRegisterNumber)->where('bag', 1)
                    ->whereBetween('date', [$from_date, $to_date])->first();

                if (isset($bagCheck)) {
                    if ($bagCheck->bag == 1 && $this->selectedMethod == "Bag") {
                        $this->message = "User got bag already. Today eligible for food only.";
                        $this->dispatchBrowserEvent('updatedMessage', ['message' => $this->message, 'color' => 'green']);
                        return;
                    }
                }

                $scan = new Scan();
                $scan->register_number = $fullRegisterNumber;
                $scan->date = date("Y/m/d");
                if ($this->selectedMethod == "Bag") {
                    $scan->bag = 1;
                    $scan->other_1 = $fullRegisterNumber. " "."got bag";
                } else if ($this->selectedMethod == "Lunch") {
                    $scan->lunch = 1;
                } else if ($this->selectedMethod == "Dinner") {
                    $scan->dinner = 1;
                }
                $scan->save();
                return;
            }
            $bagCheck = Scan::where('register_number', $fullRegisterNumber)->where('bag', 1)
                ->whereBetween('date', [$from_date, $to_date])->first();

            if (isset($bagCheck)) {
                if (($bagCheck->bag == 1 || $checkData->bag == 1) && $this->selectedMethod == "Bag") {
                    self::messageHandler("Eligible only for food", "red");
                    return;
                }
            }

            if ($checkData->bag == 1 && $this->selectedMethod == "Bag") {
                self::messageHandler("Already bag disposed for this user.", "red");
                return;
            } else if (($checkData->dinner == 1 && $this->selectedMethod == "Dinner") || ($checkData->lunch == 1 && $this->selectedMethod == "Lunch")) {
                self::messageHandler("Already food distributed for this user", "red");
                return;
            }else if (($checkData->bag == 1 && $checkData->lunch == 1) && ($checkData->bag == 1 && $checkData->dinner == 1)) {
                self::messageHandler("Food already distributed for this user.", "red");
                return;
            }else if (($checkData->lunch == 0 && $this->selectedMethod == "Lunch") || ($checkData->dinner == 0 && $this->selectedMethod == "Dinner")) {
                if ($this->selectedMethod == "Lunch") {
                    Scan::where('id', $checkData->id)->update(['lunch' => 1]);
                } else if ($this->selectedMethod == "Dinner") {
                    Scan::where('id', $checkData->id)->update(['dinner' => 1]);
                }
                return;
            } else if ($checkData->bag == 0 && $this->selectedMethod == "Bag") {
                Scan::where('id', $checkData->id)->update(['bag' => 1, 'other_1' => $fullRegisterNumber. " "."got bag"]);
            }
            $this->scans = Scan::all()->sortByDesc("id")->take(10);
        }else{
            $fullRegisterNumber = $registerNumber;

            if ($this->selectedMethod == "Select Option" || $this->selectedMethod == null) {
                self::messageHandler("Select any option", "red");
                return;
            }

            $split_reg_number = substr($fullRegisterNumber, -4);
            if ((int)$split_reg_number >= 2500 && (int)$split_reg_number <= 3000) {
                if ($this->selectedMethod == "Bag") {
                    self::messageHandler("One time customer not eligible for bag", "red");
                    return;
                }
                $oneTimeUser = Scan::where('register_number', $fullRegisterNumber)->whereBetween('date', [$from_date, $to_date])->first();
                if ($oneTimeUser) {
                    self::messageHandler("One time user get access only one time", "blue");
                    return;
                }
                if(date("Y/m/d") == '2022/08/26'){
                    if ($this->selectedMethod == "Dinner") {
                        self::messageHandler("Today Lunch only available", "red");
                        return;
                    }
                }else if(date("Y/m/d") == '2022/08/28'){
                    if ($this->selectedMethod == "Dinner") {
                        self::messageHandler("Today Lunch only available", "red");
                        return;
                    }
                }

                $scan = new Scan();
                $scan->register_number = $fullRegisterNumber;
                $scan->date = date("Y/m/d");
                $scan->bag = 0;
                if ($this->selectedMethod == "Lunch") {
                    $scan->lunch = 1;
                } else if ($this->selectedMethod == "Dinner") {
                    $scan->dinner = 1;
                }
                $scan->other_1 = "One time customer.";
                $scan->save();
                $this->scannedValue = null;
                $this->scans = Scan::all()->sortByDesc("id")->take(10);
                return;
            }
            $this->scannedValue = null;
            $isCustomerExist = Customer::where('register_number', $fullRegisterNumber)->first();
            if(!isset($isCustomerExist)){
                self::messageHandler("Customer Register number not exist in the Database", "red");
                return;
            }
            if(date("Y/m/d") == '2022/08/26'){
                if ($this->selectedMethod == "Dinner") {
                    self::messageHandler("Today Lunch only available", "red");
                    return;
                }
            }else if(date("Y/m/d") == '2022/08/28'){
                if ($this->selectedMethod == "Dinner") {
                    self::messageHandler("Today Lunch only available", "red");
                    return;
                }
            }

            $checkData = Scan::where('register_number', $fullRegisterNumber)
                ->where('date', date("Y/m/d"))->first();

            if (!isset($checkData)) {
                $bagCheck = Scan::where('register_number', $fullRegisterNumber)->where('bag', 1)
                    ->whereBetween('date', [$from_date, $to_date])->first();

                if (isset($bagCheck)) {
                    if ($bagCheck->bag == 1 && $this->selectedMethod == "Bag") {
                        $this->message = "User got bag already. Today eligible for food only.";
                        $this->dispatchBrowserEvent('updatedMessage', ['message' => $this->message, 'color' => 'green']);
                        return;
                    }
                }

                $scan = new Scan();
                $scan->register_number = $fullRegisterNumber;
                $scan->date = date("Y/m/d");
                if ($this->selectedMethod == "Bag") {
                    $scan->bag = 1;
                    $scan->other_1 = $fullRegisterNumber. " "."got bag";
                } else if ($this->selectedMethod == "Lunch") {
                    $scan->lunch = 1;
                } else if ($this->selectedMethod == "Dinner") {
                    $scan->dinner = 1;
                }
                $scan->save();
                return;
            }
            $bagCheck = Scan::where('register_number', $fullRegisterNumber)->where('bag', 1)
                ->whereBetween('date', [$from_date, $to_date])->first();

            if (isset($bagCheck)) {
                if (($bagCheck->bag == 1 || $checkData->bag == 1) && $this->selectedMethod == "Bag") {
                    self::messageHandler("Eligible only for food", "red");
                    return;
                }
            }

            if ($checkData->bag == 1 && $this->selectedMethod == "Bag") {
                self::messageHandler("Already bag disposed for this user.", "red");
                return;
            } else if (($checkData->dinner == 1 && $this->selectedMethod == "Dinner") || ($checkData->lunch == 1 && $this->selectedMethod == "Lunch")) {
                self::messageHandler("Already food distributed for this user", "red");
                return;
            }else if (($checkData->bag == 1 && $checkData->lunch == 1) && ($checkData->bag == 1 && $checkData->dinner == 1)) {
                self::messageHandler("Food already distributed for this user.", "red");
                return;
            }else if (($checkData->lunch == 0 && $this->selectedMethod == "Lunch") || ($checkData->dinner == 0 && $this->selectedMethod == "Dinner")) {
                if ($this->selectedMethod == "Lunch") {
                    Scan::where('id', $checkData->id)->update(['lunch' => 1]);
                } else if ($this->selectedMethod == "Dinner") {
                    Scan::where('id', $checkData->id)->update(['dinner' => 1]);
                }
                return;
            } else if ($checkData->bag == 0 && $this->selectedMethod == "Bag") {
                Scan::where('id', $checkData->id)->update(['bag' => 1, 'other_1' => $fullRegisterNumber. " "."got bag"]);
            }
            $this->scans = Scan::all()->sortByDesc("id")->take(10);
        }
    }

    public function updatedShowMethodInfo($selected)
    {
        $this->selectedMethod = $selected;
    }

    public function messageHandler($msg, $color)
    {
        $this->message = $msg;
        $this->dispatchBrowserEvent('updatedMessage', ['message' => $this->message, 'color' => $color]);
    }

    public function clearButton()
    {
        $this->scannedValue = null;
    }
}
