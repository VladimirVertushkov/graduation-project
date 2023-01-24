<?php

namespace App\Entities\Matches\Filters;

use EloquentFilter\ModelFilter;

class MatchesFilter extends ModelFilter
{
    public function groupId($groupId)
    {
        if (empty($groupId)) {
            return;
        }

        $this->where(
            function ($query) use ($groupId) {
                $query->whereHas('competition',
                    function ($query) use ($groupId) {
                        $query->whereHas('groups',
                            function ($query) use ($groupId) {
                                $query->where('id', $groupId);
                            });
                    });
            });
    }
}
