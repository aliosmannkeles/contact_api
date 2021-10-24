<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactMail;
use App\Http\Resources\ContactMailResource;
use App\Mail\SendContactMail;
use App\Models\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Mail;

class ContactMailController extends Controller
{
    public function sentContactMail(CreateContactMail $request): \Illuminate\Http\JsonResponse
    {
        $entity = ContactMail::query()
            ->create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ]);

        Mail::to('aliosman@test.com')
            ->queue(new SendContactMail($entity));

        return response()->json([
            'success' => true,
            'message' => 'Mesajınız alınmıştır.'
        ]);
    }

    public function getContactMails(Request $request): AnonymousResourceCollection
    {
        $query = ContactMail::query();

        if ($request->has('search')) {
            $query->where('message', 'like', '%' . $request->input('search') . '%');
        }

        $entity = $query->orderByDesc('created_at')->paginate(3);

        return ContactMailResource::collection($entity);
    }


    public function getContactMail($id)
    {
        $entity = ContactMail::query()->find($id);

        if ($entity) {
            return new ContactMailResource($entity);
        }

        return response(null, 204);
    }

    public function deleteContactMail($id)
    {
        $entity = ContactMail::query()->find($id);

        if ($entity) {
            $entity->delete();
        }

        return response(null, 204);
    }
}
