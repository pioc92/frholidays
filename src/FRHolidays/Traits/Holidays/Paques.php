<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait Paques
{
    /**
     * Setting Paques
     *
     * @param int $year The year to get the holiday in
     */
    private function setPaques($year)
    {
        $date = Carbon::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);

        return $date->addDays($days);
    }

    /**
     * Return object of Paques for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPaquesHoliday($year = null)
    {
        return $this->getHolidaysByYear("Pâques", $year)[0];
    }
}
