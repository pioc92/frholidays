<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait Armistice
{
    /**
     * Setting Armistice
     *
     * @param int $year The year to get the holiday in
     */
    private function setArmistice($year)
    {
        return Carbon::create($year, 11, 11, 0, 0, 0);
    }

    /**
     * Return object of Armistice Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getArmisticeHoliday($year = null)
    {
        return $this->getHolidaysByYear("Armistice", $year)[0];
    }
}
