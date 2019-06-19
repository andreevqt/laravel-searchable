<?php

namespace Spatie\Searchable;

use Illuminate\Support\Collection;

class SearchResultCollection extends Collection
{
    public function addResults(string $type, Collection $results, string $query = null)
    {
        $results->each(function ($result) use ($type, $query) {
            $this->items[] = $result->getSearchResult($query)->setType($type);
        });

        return $this;
    }

    public function groupByType(): Collection
    {
        return $this->groupBy(function (SearchResult $searchResult) {
            return $searchResult->type;
        });
    }

    public function aspect(string $aspectName): Collection
    {
        return $this->groupByType()->get($aspectName);
    }
}
