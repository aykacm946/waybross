<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
            'recent_contacts' => Contact::where('created_at', '>=', now()->subDays(7))->count(),
            'total_users' => User::count()
        ];

        $recentMessages = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }

    public function contacts(Request $request)
    {
        $query = Contact::query();

        // Filtreleme
        switch ($request->filter) {
            case 'unread':
                $query->where('is_read', false);
                break;
            case 'read':
                $query->where('is_read', true);
                break;
            case 'today':
                $query->whereDate('created_at', today());
                break;
        }

        // Arama
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $contacts = $query->latest()->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function contactShow($id)
    {
        $contact = Contact::findOrFail($id);

        // Mesajı okundu olarak işaretle
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function contactDelete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts')
            ->with('success', 'Mesaj başarıyla silindi.');
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Mesaj okundu olarak işaretlendi.');
    }
}
