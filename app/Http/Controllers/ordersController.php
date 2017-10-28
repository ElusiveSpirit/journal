<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateordersRequest;
use App\Http\Requests\UpdateordersRequest;
use App\Models\duties as Duty;
use App\Repositories\ordersRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ordersController extends AppBaseController
{
    /** @var  ordersRepository */
    private $ordersRepository;
    private $duty;

    public function __construct(ordersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
        $this->middleware(function ($request, $next) {
            $this->duty = Duty::find($request->route()->parameters()['duty']);

            return $next($request);
        });
    }

    /**
     * Display a listing of the orders.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orders = $this->duty->orders;

        return view('orders.index')
            ->with('orders', $orders)
            ->with('duty', $this->duty);
    }

    /**
     * Show the form for creating a new orders.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create')
            ->with('users', User::get_cases())
            ->with('duty', $this->duty);
    }

    /**
     * Store a newly created orders in storage.
     *
     * @param CreateordersRequest $request
     *
     * @return Response
     */
    public function store(CreateordersRequest $request)
    {
        $input = $request->all();
        if (!isset($input['is_night'])) {
            $input['is_night'] = 0;
        }
        $input['duty_id'] = $this->duty->id;

        $orders = $this->ordersRepository->create($input);

        Flash::success('Наряд сохранён');

        return redirect(route('duties.orders.index', $this->duty->id));
    }

    /**
     * Display the specified orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($dutyId, $id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Наряд не найден');

            return redirect(route('duties.orders.index', $this->duty->id));
        }

        return view('orders.show')
            ->with('duty', $this->duty)
            ->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($dutyId, $id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Наряд не найден');

            return redirect(route('duties.orders.index', $this->duty->id));
        }

        return view('orders.edit')
            ->with('users', User::get_cases())
            ->with('duty', $this->duty)
            ->with('orders', $orders);
    }

    /**
     * Update the specified orders in storage.
     *
     * @param  int              $id
     * @param UpdateordersRequest $request
     *
     * @return Response
     */
    public function update($dutyId, $id, UpdateordersRequest $request)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Наряд не найден');

            return redirect(route('duties.orders.index', $this->duty->id));
        }

        $orders = $this->ordersRepository->update($request->all(), $id);

        Flash::success('Наряд обновлён');

        return redirect(route('duties.orders.index', $this->duty->id));
    }

    /**
     * Remove the specified orders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Наряд не найден');

            return redirect(route('duties.orders.index', $this->duty->id));
        }

        $this->ordersRepository->delete($id);

        Flash::success('Orders deleted successfully.');

        return redirect(route('duties.orders.index', $this->duty->id));
    }
}
