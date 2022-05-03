<?php

namespace App\Console\Commands;

use App\Models\Captur;
use App\Models\Location;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PositionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'position';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $capturs = Captur::all();

        foreach($capturs as $captur){
            $data = Http::get('https://api.capturs.com/device/'. $captur->device .'/position/limit/1?login=DzSaFKtfJhWY73qpI2mC94888QU2&password=228E7F9CED1DEDBE')->json();
        }

        $result = $data['result'];

        $locations = Location::create([
            'latitude' => $data['position'][$result-1]['latitude'],
            'longitude' => $data['position'][$result-1]['longitude'],
            'captur_id' => Captur::where('device' , 'like', $data['position'][$result-1]['device'])->get('id')
        ]);

        return 0;
    }
}   
