<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait FeteNationale
{
    /**
     * Setting FeteNationale
     *
     * @param int $year The year to get the holiday in
     */
    private function setFeteNationale($year)
    {
        return Carbon::create($year, 7, 14, 0, 0, 0);
    }

    /**
     * Return object of Fête Nationale for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFeteNationaleHoliday($year = null)
    {
        return $this->getHolidaysByYear("Fête nationale", $year)[0];
    }
}
