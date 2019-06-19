<?php

namespace Spatie\Searchable;

interface Searchable
{
    public function getSearchResult(string $query): SearchResult;
}
