<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Varmegye;

class CountyController extends Controller
{
    public function index() {
        $data = Varmegye::orderBy('name')->get();
        $content = json_encode(['data' => $data, 'message' => 'Listed']);
        return response($content, Response::HTTP_OK);
    }

    public function save(Request $request)
    {
        $id = $request->get('id');
        if ($id) {
            $entity = Varmegye::find($id);
            if (!$entity) {
                $content = json_encode(['data' => [], 'message' => 'Not found!']);
                return response($content, Response::HTTP_NOT_FOUND);
            }
            $entity = $this->setEntityData($entity, $request);
            $entity->update();
            $content = json_encode(['data' => $entity, 'message' => 'Updated']);
            return response($content);
        }
        $entity = new Varmegye();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();
        $content = json_encode(['data' => $entity, 'message' => 'Created']);
        return response($content, Response::HTTP_CREATED);

    }

    public function search(Request $request) {
        $needle = $request->get('needle');
        $entities = $this->getQuery()
            ->where('name', 'like', "%$needle%")
            ->orderBy('name')
            ->get();
        if (!$entities || $entities->isEmpty()) {
            return response(json_encode(['data' => [], 'message' => 'Not found!']), Response::HTTP_NOT_FOUND);
        }

        return response(json_encode(['data' => $entities, 'message' => 'Found']), Response::HTTP_FOUND);
    }
    public function delete(Request $request, $id)
    {
        /** @var Varmegye $entity */
        $entity = Varmegye::find($id);
        $entity?->delete();

        return response(json_encode(['data' => [], 'message' => 'Deleted']), Response::HTTP_GONE);
    }

    private function getQuery()
    {
        return Varmegye::select('*');
    }

    private function setEntityData(Varmegye $entity, Request $request): ?Varmegye
    {
        $entity->name = $request->get('name');

        return $entity;
    }

    /**public function cities($idCounty)
    {
        // Fetch Types by County id
        $data['data'] = City::orderby("name")
            ->select('id', 'zip_code', 'name')
            ->where('id_county', $idCounty)
            ->get();

        return response()->json($data);
    }*/
}
