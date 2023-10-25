<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Manufacturer;


class TypeController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/

    private function getQuery()
    {
        return Type::select('types.*', 'manufacturers.name as manufacturer')
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'types.id_manufacturer');
    }

    public function search(Request $request) {
        $needle = $request->get('needle');
        $idManufacturer = $request->get('id_manufacturer');
        $entities = $this->getQuery()
            ->orWhere('types.name', 'like', "%{$needle}%")
            ->where('types.is_active', true)
            ->where('manufacturers.id', $idManufacturer)
            ->orderBy('types.name')
            ->get();
        if (!$entities) {
            return view('404');
        }

        return view('type/list', [
            'entities' => $entities,
            'manufacturers' => Manufacturer::select('id', 'name', 'logo')
                ->where('is_active', true)
                ->orderBy('name')
                ->get(),
            'logo' => ManufacturerController::getLogo($idManufacturer),
            'idManufacturer' => $idManufacturer,
        ]);
    }

    public function filter(Request $request)
    {
        $idManufacturer = $request->get('id_manufacturer');
        return view('type/list', [
            'entities' => $this->getQuery()
                ->where('manufacturers.id', $idManufacturer)
                ->orderBy('types.name')->get(),
            'manufacturers' => Manufacturer::select('id', 'name', 'logo')
                ->where('is_active', true)
                ->orderBy('name')
                ->get(),
            'logo' => ManufacturerController::getLogo($idManufacturer),
            'idManufacturer' => $idManufacturer,
        ]);
    }

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

    public function create(Request $request) {
        $idManufacturer = $request->get('id_manufacturer');
        $manufacturer = Manufacturer::where('id', $idManufacturer)->first();
        if (!$manufacturer) {
            return view('404');
        }
        return view('type/create', [
            'manufacturer' => $manufacturer,
            'logo' => ManufacturerController::getLogo($manufacturer->id)
        ]);
    }

    public function edit($id) {
        $entity = Type::find($id);
        $manufacturer = Manufacturer::find($entity->id_manufacturer);
        return view('type/edit', [
            'entity' => $entity,
            'manufacturer' => $manufacturer,
            'logo' => ManufacturerController::getLogo($manufacturer->id)
        ]);
    }

    public function save(Request $request)
    {
        $entity = new Type();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();

        return redirect(route('getTypesFilter', ['id_manufacturer' => $entity->id_manufacturer]));
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

        return redirect(route('getTypesFilter', ['id_manufacturer' => $entity->id_manufacturer]));
    }

    public function delete(Request $request, $id)
    {
        /** @var Type $entity */
        $entity = Type::find($id);
        $entity->is_active = false;
        $entity->save();

        return redirect(route('types'));
    }

//    public function trims($idModel)
//    {
//        // Fetch Trims by Model id
//        $entities['data'] = Trim::orderby("name")
//            ->select('id','name')
//            ->where('id_type', $idModel)
//            ->get();
//
//        return response()->json($entities);
//    }

    private function setEntityData(Type $entity, Request $request): ?Type
    {
        $entity->id_manufacturer = $request->get('id_manufacturer');
        $entity->name = $request->get('name');

        return $entity;
    }
}
