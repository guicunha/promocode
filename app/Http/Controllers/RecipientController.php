<?php

namespace App\Http\Controllers;

use App\Entities\Recipient;
use App\Repositories\RecipientRepository;
use App\Services\RecipientService;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    /**
     * @var RecipientRepository
     */
    private $repository;

    /**
     * @var RecipientService
     */
    private $service;

    public function __construct(RecipientRepository $repository, RecipientService $service)
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
        $recipients = $this->repository->orderBy('last_name')->orderBy('first_name')->paginate(50);
        if (request()->wantsJson()) {
            return $recipients;
        }

        $data = ['recipients' => $recipients];

        return view('recipient.recipients_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipient.create');
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
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Recipient as object and voucher as array for this recipient
     */
    public function show($id)
    {
        $recipientVouchers = $this->repository->with(['vouchers'])->find($id);
        if (request()->wantsJson()) {
            return $recipientVouchers;
        }

        $data = [
          'recipient' => $recipientVouchers,
        ];

        return view('recipient.recipient_vouchers', $data);
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
