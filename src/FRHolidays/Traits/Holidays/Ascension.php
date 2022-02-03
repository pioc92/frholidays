<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait Ascension
{
    /**
     * Setting Ascension 40 days after Pâques
     *
     * @param int $year The year to get the holiday in
     */
    private function setAscension($year)
    {
        $date = Carbon::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);
        $days= $days+40;

        return $date->addDays($days);
    }

    /**
     * Return object of Paques for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getAscensionHoliday($year = null)
    {
        return $this->getHolidaysByYear("Ascension", $year)[0];
    }
}
