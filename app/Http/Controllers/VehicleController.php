<?php

namespace App\Http\Controllers;

use App\Models\Cassis;
use App\Models\Fuel;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\Manufacturer;
use App\Models\Client;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    private function getQuery()
    {
        return Vehicle::select(
                'vehicles.*',
                'fuels.name as fuel',
                'manufacturers.name as manufacturer',
                'types.name as type'
            )
            ->leftJoin('fuels', 'fuels.id', '=',  'vehicles.id_fuel')
            ->leftJoin('manufacturers', 'manufacturers.id', '=',  'vehicles.id_manufacturer')
            ->leftJoin('types', 'types.id', '=',  'vehicles.id_type')
            ->leftJoin('cassis', 'cassis.id', '=',  'vehicles.id_cassis')
            ;
    }

    public function search(Request $request) {
        $needle = $request->get('needle');
        $entities = $this->getQuery()
            ->orWhere('registration_plate', 'like', "%{$needle}%")
            ->orWhere('vin', 'like', "%{$needle}%")
            ->orWhere('notes', 'like', "%{$needle}%")
            ->orWhere('manufacturers.name', 'like', "%{$needle}%")
            ->orWhere('types.name', 'like', "%{$needle}%")
            ->where('vehicles.is_active', true)
            ->orderBy('registration_plate')
            ->get();
        if (!$entities) {
            return view('404');
        }

        return view('vehicle/list', ['entities' => $entities]);
    }

    public function index()
    {
        return view('vehicle/list', [
            'entities' => $this->getQuery()->where('vehicles.is_active', true)->orderBy('registration_plate')->get(),
//            'notifications_count' => NotificationController::count(),
        ]);
    }

    public function filter($id)
    {
        return view('vehicle/list', [
            'entities' => $this->getQuery()
                ->where('vehicles.is_active', true)
                ->where('vehicles.id', $id)
                ->orderBy('registration_plate')->get()
        ]);
    }

    public function create() {
        return view('vehicle/create', [
            'fuels' => Fuel::where('is_active', true)->get(),
            'manufacturers' => Manufacturer::where('is_active', true)->get(),
            'cassises' => Cassis::where('is_active', true)->get(),
        ]);
    }

    public function edit($id) {
        $vehicle = Vehicle::find($id);
        if (!$vehicle) {
            return view('404');
        }
        return view('vehicle/edit', [
            'entity' => $vehicle,
            'fuels' => Fuel::where('is_active', true)->get(),
            'manufacturers' => Manufacturer::where('is_active', true)->get(),
            'types' => Type::where('id_manufacturer', $vehicle->id_manufacturer)->get(),
            'logo' => ManufacturerController::getLogo($vehicle->id_manufacturer),
            'cassises' => Cassis::where('is_active', true)->get(),
        ]);
    }

    public function save(Request $request)
    {
        $entity = new Vehicle();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();

        return redirect(route('vehicles') . '#' . $entity->id);
    }

    public function update(Request $request, $id)
    {
        if ($id) {
            /** @var Vehicle $entity */
            $entity = Vehicle::find($id);
        }
        if (!$entity) {
            return view('404');
        }
        $valid_until = $entity->valid_until;
        $entity = $this->setEntityData($entity, $request);
        $entity->update();

//        if ($valid_until < $entity->valid_until) {
//            $client =  ClientController::getLastOwner($entity->id);
//            if ($client) {
//                $notification = new Notification();
//                $notification->id_client = $client->id;
//                $notification->id_vehicle = $entity->id;
//                $notification_types = array_flip(Notification::NOTIFICATION_TYPES);
//                $notification->type = $notification_types[Notification::NOTIFICATION_TYPE_VALID_UNTIL];
//                $notification->save();
//            }
//        }

        return redirect(route('vehicles') . '#' . $entity->id);
    }

    public function delete($id)
    {
        /** @var Vehicle entity */
        $entity = Vehicle::find($id);
        $entity->is_active = false;
        $entity->save();

        return redirect(route('vehicles'));
    }

    private function setEntityData(Vehicle $entity, Request $request): ?Vehicle
    {
        $entity->id_manufacturer = $request->get('id_manufacturer');
        $entity->id_type = $request->get('id_type');
        $entity->id_fuel = $request->get('id_fuel');
        $entity->id_cassis = $request->get('id_cassis');

        $entity->registration_plate = strtoupper($request->get('registration_plate'));
        $entity->vin = strtoupper($request->get('vin'));
        $entity->valid_until = $request->get('valid_until');
        $entity->notes = $request->get('notes');

        return $entity;
    }
}
