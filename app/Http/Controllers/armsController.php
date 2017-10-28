<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatearmsRequest;
use App\Http\Requests\UpdatearmsRequest;
use App\Repositories\armsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class armsController extends AppBaseController
{
    /** @var  armsRepository */
    private $armsRepository;

    public function __construct(armsRepository $armsRepo)
    {
        $this->armsRepository = $armsRepo;
    }

    /**
     * Display a listing of the arms.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->armsRepository->pushCriteria(new RequestCriteria($request));
        $arms = $this->armsRepository->all();

        return view('arms.index')
            ->with('arms', $arms);
    }

    /**
     * Show the form for creating a new arms.
     *
     * @return Response
     */
    public function create()
    {
        return view('arms.create');
    }

    /**
     * Store a newly created arms in storage.
     *
     * @param CreatearmsRequest $request
     *
     * @return Response
     */
    public function store(CreatearmsRequest $request)
    {
        $input = $request->all();

        $arms = $this->armsRepository->create($input);

        Flash::success('Arms saved successfully.');

        return redirect(route('arms.index'));
    }

    /**
     * Display the specified arms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $arms = $this->armsRepository->findWithoutFail($id);

        if (empty($arms)) {
            Flash::error('Arms not found');

            return redirect(route('arms.index'));
        }

        return view('arms.show')->with('arms', $arms);
    }

    /**
     * Show the form for editing the specified arms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $arms = $this->armsRepository->findWithoutFail($id);

        if (empty($arms)) {
            Flash::error('Arms not found');

            return redirect(route('arms.index'));
        }

        return view('arms.edit')->with('arms', $arms);
    }

    /**
     * Update the specified arms in storage.
     *
     * @param  int              $id
     * @param UpdatearmsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatearmsRequest $request)
    {
        $arms = $this->armsRepository->findWithoutFail($id);

        if (empty($arms)) {
            Flash::error('Arms not found');

            return redirect(route('arms.index'));
        }

        $arms = $this->armsRepository->update($request->all(), $id);

        Flash::success('Arms updated successfully.');

        return redirect(route('arms.index'));
    }

    /**
     * Remove the specified arms from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $arms = $this->armsRepository->findWithoutFail($id);

        if (empty($arms)) {
            Flash::error('Arms not found');

            return redirect(route('arms.index'));
        }

        $this->armsRepository->delete($id);

        Flash::success('Arms deleted successfully.');

        return redirect(route('arms.index'));
    }
}
