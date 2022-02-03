<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait Victoire1945
{
    /**
     * Setting Fête du Travail
     *
     * @param int $year The year to get the holiday in
     */
    private function setVictoire1945($year)
    {
        $date = Carbon::create($year, 5, 8, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Fête du Travail for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getVictoire1945Holiday($year = null)
    {
        return $this->getHolidaysByYear("Victoire 1945", $year)[0];
    }
}
