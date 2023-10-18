<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cassis;

class CassisController extends Controller
{
    public function index()
    {
        return view('cassis/list', ['entities' =>
            Cassis::where('is_active', true)->orderBy('name')->get()]);
    }

    public function create() {
        return view('cassis/create');
    }

    public function edit($id) {
        $entity = Cassis::find($id);

        return view('cassis/edit', ['entity' => $entity]);
    }

    public function update(Request $request, $id)
    {
        if ($id) {
            /** @var Cassis $entity */
            $entity = Cassis::find($id);
        }
        if (!$entity) {
            abort(404);
        }
        $entity = $this->setEntityData($entity, $request);
        $entity->update();

        return redirect(route('cassises') . '#' . $entity->id);
    }

    public function delete(Request $request, $id)
    {
        /** @var Cassis $entity */
        $entity = Cassis::find($id);
        $entity->is_active = false;
        $entity->save();

        return redirect(route('cassises'));
    }

    public function save(Request $request)
    {
        $entity = new Cassis();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();

        return redirect(route('cassises') . '#' . $entity->id);
    }

    private function setEntityData(Cassis $entity, Request $request): ?Cassis
    {
        $entity->name = $request->get('name');

        return $entity;
    }

    private function getQuery()
    {
        return Cassis::select('*');
    }

    public function search(Request $request) {
        $needle = $request->get('needle');
        $entities = $this->getQuery()
            ->orWhere('name', 'like', "%{$needle}%")
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
        if (!$entities) {
            return view('404');
        }

        return view('cassis/list', ['entities' => $entities]);
    }
}
