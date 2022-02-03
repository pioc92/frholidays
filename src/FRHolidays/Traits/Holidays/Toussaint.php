<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait Toussaint
{
    /**
     * Setting Toussaint
     *
     * @param int $year The year to get the holiday in
     */
    private function setToussaint($year)
    {
        return Carbon::create($year, 7, 14, 0, 0, 0);
    }

    /**
     * Return object of Toussaint for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getToussaintHoliday($year = null)
    {
        return $this->getHolidaysByYear("Toussaint", $year)[0];
    }
}
