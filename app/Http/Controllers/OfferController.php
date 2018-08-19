<?php

namespace App\Http\Controllers;

use App\Repositories\OfferRepository;
use App\Services\OfferService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * @var OfferRepository
     */
    private $repository;
    /**
     * @var OfferService
     */
    private $service;

    public function __construct(OfferRepository $repository, OfferService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = $this->repository->paginate(50);
        if (request()->wantsJson()) {
            return $offers;
        }

        $data = ['offers' => $offers];

        return view('offer.offer_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashBoard()
    {
        $offers = $this->repository->paginate(50);
        $data = ['offers' => $offers];

        return view('layout.dashboard', $data);
    }

    public function create()
    {
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer_created = $this->service->create($request->all());

        return redirect()->action(
          'OfferController@show', ['id' => $offer_created->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $offer = $this->service->show($id);
        if (request()->wantsJson()) {
            return $offer;
        }

        $data = ['offer' => $offer];

        return view('offer.offer_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
