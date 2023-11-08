<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidUntilMail;
use App\Models\Client;
use App\Models\Vehicle;
use Exception;

class ClientController extends Controller
{
    public function index()
    {
        return view('client/list', ['entities' =>
            Client::where('is_active', true)->orderBy('name')->get()]);
    }

    public function create() {
        return view('client/create');
    }

    public function edit($id) {
        $entity = Client::find($id);

        return view('client/edit', ['entity' => $entity]);
    }

    public function update(Request $request, $id)
    {
        if ($id) {
            /** @var Client $entity */
            $entity = Client::find($id);
        }
        if (!$entity) {
            abort(404);
        }
        $entity = $this->setEntityData($entity, $request);
        $entity->update();

        return redirect(route('clients') . '#' . $entity->id);
    }

    public function delete(Request $request, $id)
    {
        /** @var Client $entity */
        $entity = Client::find($id);
        $entity->is_active = false;
        $entity->save();

        return redirect(route('clients'));
    }

    public function save(Request $request)
    {
        $entity = new Client();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();

        return redirect(route('clients') . '#' . $entity->id);
    }

    private function setEntityData(Client $entity, Request $request): ?Client
    {
        $entity->name = $request->get('name');
        $entity->email = $request->get('email');
        $entity->phone_number = $request->get('phone_number');
        $entity->address = $request->get('address');
        $entity->notes = $request->get('notes');
        return $entity;
    }

    private function getQuery()
    {
        return Client::select('*');
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

        return view('client/list', ['entities' => $entities]);
    }

    public function sendValidUntilMail($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return view('404');
        }
        // Egyelőre nincs kapcsolat az ügyfelek és a járművek között,
        // ezért egy jármű adatait bedrótoztuk.
        $vehicle = new Vehicle();
        $vehicle->registration_plate = 'AA-AA-001';
        $vehicle->valid_until = '2023-12-01';
        try {
            Mail::to($client->email)
                ->send(new ValidUntilMail($client, $vehicle));
        }
        catch (Exception $e) {
            return $e->message;
        }

        return $this->index();
    }
}
