<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait FeteDuTravail
{
    /**
     * Setting Fête du Travail
     *
     * @param int $year The year to get the holiday in
     */
    private function setFeteDuTravail($year)
    {
        $date = Carbon::create($year, 5, 1, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Fête du Travail for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFeteDuTravailHoliday($year = null)
    {
        return $this->getHolidaysByYear("Fête du Travail", $year)[0];
    }
}
