<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Type;

class ManufacturerController extends Controller
{
    public function index()
    {
        return view('manufacturer/list', ['entities' =>
            Manufacturer::where('is_active', true)->orderBy('name')->get()]);
    }

    public function create() {
        return view('manufacturer/create');
    }

    public function edit($id) {
        $entity = Manufacturer::find($id);

        return view('manufacturer/edit', ['entity' => $entity]);
    }

    public function update(Request $request, $id)
    {
        if ($id) {
            /** @var Manufacturer $entity */
            $entity = Manufacturer::find($id);
        }
        if (!$entity) {
            abort(404);
        }
        $entity = $this->setEntityData($entity, $request);
        $entity->update();

        return redirect(route('manufacturers') . '#' . $entity->id);
    }

    public function delete(Request $request, $id)
    {
        /** @var Manufacturer $entity */
        $entity = Manufacturer::find($id);
        $entity->is_active = false;
        $entity->save();

        return redirect(route('manufacturers'));
    }

    public function save(Request $request)
    {
        $entity = new Manufacturer();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();

        return redirect(route('manufacturers') . '#' . $entity->id);
    }

    private function setEntityData(Manufacturer $entity, Request $request): ?Manufacturer
    {
        $entity->name = $request->get('name');
        $entity->logo = $request->get('logo');

        return $entity;
    }

    private function getQuery()
    {
        return Manufacturer::select('*');
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

        return view('manufacturer/list', ['entities' => $entities]);
    }
    public static function getLogo($id)
    {
        $entity = Manufacturer::find($id);
        if(empty($entity->logo)){
            return '';
        }
        return "/logos/" . $entity->logo;
    }

    public function types($idManufacturer)
    {
        // Fetch Types by Manufacturer id
        $data['data'] = Type::orderby("name")
            ->select('id','name')
            ->where('id_manufacturer', $idManufacturer)
            ->get();
        $data['logo'] = $this->getLogo($idManufacturer);

        return response()->json($data);
    }
}
