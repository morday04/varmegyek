<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Manufacturer;


class TypeController extends Controller
{
    public function index()
    {
        return view('type/list', [
            'entities' => [],
            'manufacturers' => Manufacturer::select('id', 'name', 'logo')
                ->where('is_active', true)
                ->orderBy('name')
                ->get(),
            'idManufacturer' => 0,
        ]);
    }

    public function create() {
        return view('type/create');
    }

    public function edit($id) {
        $entity = Type::find($id);

        return view('type/edit', ['entity' => $entity]);
    }

    public function update(Request $request, $id)
    {
        if ($id) {
            /** @var Type $entity */
            $entity = Type::find($id);
        }
        if (!$entity) {
            abort(404);
        }
        $entity = $this->setEntityData($entity, $request);
        $entity->update();

        return redirect(route('types') . '#' . $entity->id);
    }

    public function delete(Request $request, $id)
    {
        /** @var Type $entity */
        $entity = Type::find($id);
        $entity->is_active = false;
        $entity->save();

        return redirect(route('types'));
    }

    public function save(Request $request)
    {
        $entity = new Type();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();

        return redirect(route('types') . '#' . $entity->id);
    }

    private function setEntityData(Type $entity, Request $request): ?Type
    {
        $entity->name = $request->get('name');

        return $entity;
    }

    private function getQuery()
    {
        return Type::select('types.*', 'manufacturers.name as manufacturer')
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'types.id_manufacturer');
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

        return view('type/list', ['entities' => $entities]);
    }
    public function filter(Request $request)
    {
        $idManufacturer = $request->get('id_manufacturer');
        return view('type/list', [
            'entities' => $this->getQuery()
                ->where('id_manufacturer', $idManufacturer)
                ->orderBy('types.name')->get(),
            'manufacturers' => Manufacturer::select('id', 'name', 'logo')
                ->where('is_active', true)
                ->orderBy('name')
                ->get(),
            'logo' => ManufacturerController::getLogo($idManufacturer),
            'idManufacturer' => $idManufacturer,
        ]);
    }
    
}
