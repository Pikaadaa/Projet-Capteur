<?php

namespace App\Observers;

use App\Models\Captur;

class CapturObserver
{
    /**
     * Handle the Captur "created" event.
     *
     * @param  \App\Models\Captur  $captur
     * @return void
     */
    public function created(Captur $captur)
    {
        //
    }

    /**
     * Handle the Captur "updated" event.
     *
     * @param  \App\Models\Captur  $captur
     * @return void
     */
    public function updated(Captur $captur)
    {
        //
    }

    /**
     * Handle the Captur "deleted" event.
     *
     * @param  \App\Models\Captur  $captur
     * @return void
     */
    public function deleted(Captur $captur)
    {
        Location::where('captur_id', '=', $captur->id)->delete();
    }

    /**
     * Handle the Captur "restored" event.
     *
     * @param  \App\Models\Captur  $captur
     * @return void
     */
    public function restored(Captur $captur)
    {
        //
    }

    /**
     * Handle the Captur "force deleted" event.
     *
     * @param  \App\Models\Captur  $captur
     * @return void
     */
    public function forceDeleted(Captur $captur)
    {
        //
    }
}
