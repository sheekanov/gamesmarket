<?php

namespace App\CustomClasses;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Pagination
{
    public $allItems;
    public $itemsPerPage;
    public $routeParameter;
    public $currentPage;
    public $pagesQty;
    public $itemsOnPage;
    public $getRequestParameters;

    public function __construct(
        Collection $allItems,
        int $itemsPerPage,
        Request $request,
        array $routeParameter = [],
        string $getRequestParameters = ''
    ) {
        $this->allItems = $allItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->routeParameter = $routeParameter;
        $this->request = $request;
        $this->getRequestParameters = $getRequestParameters;

        $this->calcPagination();
    }

    public function calcPagination()
    {
        if (isset($this->request->all()['p'])) {
            $this->currentPage = $this->request->all()['p'];
        } else {
            $this->currentPage = 1;
        }

        $this->pagesQty = (int)ceil($this->allItems->count()/$this->itemsPerPage);
        $this->itemsOnPage = $this->allItems->forPage($this->currentPage, $this->itemsPerPage);
    }

    public function renderPagination()
    {
        return view('front.pagination', ['currentPage' => $this->currentPage,
            'pagesQty' => $this->pagesQty,
            'routeParameter' => $this->routeParameter,
            'getRequestParameters' => $this->getRequestParameters
        ]);
    }
}

