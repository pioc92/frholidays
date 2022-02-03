<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait Noel
{
    /**
     * Setting Noel
     *
     * @param int $year The year to get the holiday in
     */
    private function setNoel($year)
    {
        return Carbon::create($year, 12, 25, 0, 0, 0);
    }

    /**
     * Return object of Noel for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getNoelHoliday($year = null)
    {
        return $this->getHolidaysByYear("Noël", $year)[0];
    }
}
