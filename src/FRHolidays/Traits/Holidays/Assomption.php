<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait Assomption
{
    /**
     * Setting Assomption Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setAssomption($year)
    {
        return Carbon::create($year, 7, 14, 0, 0, 0);
    }

    /**
     * Return object of Assomption for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getAssomptionHoliday($year = null)
    {
        return $this->getHolidaysByYear("Assomption", $year)[0];
    }
}
