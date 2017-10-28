<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedutiesRequest;
use App\Http\Requests\UpdatedutiesRequest;
use App\Repositories\dutiesRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class dutiesController extends AppBaseController
{
    /** @var  dutiesRepository */
    private $dutiesRepository;

    public function __construct(dutiesRepository $dutiesRepo)
    {
        $this->dutiesRepository = $dutiesRepo;
    }

    /**
     * Display a listing of the duties.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dutiesRepository->pushCriteria(new RequestCriteria($request));
        $duties = $this->dutiesRepository->all();

        return view('duties.index')
            ->with('duties', $duties);
    }

    /**
     * Show the form for creating a new duties.
     *
     * @return Response
     */
    public function create()
    {
        return view('duties.create')
            ->with('users', $this->get_users_cases());
    }

    /**
     * Store a newly created duties in storage.
     *
     * @param CreatedutiesRequest $request
     *
     * @return Response
     */
    public function store(CreatedutiesRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();

        $this->dutiesRepository->create($input);

        Flash::success('Duties saved successfully.');

        return redirect(route('duties.index'));
    }

    /**
     * Display the specified duties.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $duties = $this->dutiesRepository->findWithoutFail($id);

        if (empty($duties)) {
            Flash::error('Duties not found');

            return redirect(route('duties.index'));
        }

        return view('duties.show')->with('duties', $duties);
    }

    /**
     * Show the form for editing the specified duties.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $duties = $this->dutiesRepository->findWithoutFail($id);

        if (empty($duties)) {
            Flash::error('Duties not found');

            return redirect(route('duties.index'));
        }

        return view('duties.edit')
            ->with('duties', $duties)
            ->with('users', $this->get_users_cases());
    }

    /**
     * Update the specified duties in storage.
     *
     * @param  int              $id
     * @param UpdatedutiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedutiesRequest $request)
    {
        $duties = $this->dutiesRepository->findWithoutFail($id);

        if (empty($duties)) {
            Flash::error('Duties not found');

            return redirect(route('duties.index'));
        }

        $duties = $this->dutiesRepository->update($request->all(), $id);

        Flash::success('Duties updated successfully.');

        return redirect(route('duties.index'));
    }

    /**
     * Remove the specified duties from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $duties = $this->dutiesRepository->findWithoutFail($id);

        if (empty($duties)) {
            Flash::error('Duties not found');

            return redirect(route('duties.index'));
        }

        $this->dutiesRepository->delete($id);

        Flash::success('Duties deleted successfully.');

        return redirect(route('duties.index'));
    }

    private function get_users_cases()
    {
        $users = User::all();
        $users_cases = [];
        foreach ($users as $user) {
            $users_cases[$user['id']] = $user['username'];
        }
        return $users_cases;
    }
}
